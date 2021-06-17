<?php
/**
 * ============== Template Name: Contact Page Template
 *
 * @package ridgeway
 */
get_header();?>
<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/subhero"); ?>

<!-- ******************* Hero Content END ******************* -->
<div class="row">
    <div class="container contact-page">

        <div class="contact-page__sidebar">
            <div class="contact-logo"><?php get_template_part("inc/img/featherlogo");?></div>
            <div class="contact-details">


                <?php if( have_rows('team_member_details', 'options') ): ?>

                <?php while( have_rows('team_member_details', 'options') ): the_row(); ?>
                <div class="team-block">
                    <h2 class="heading-primary"><?php the_sub_field('team_name'); ?></h2>
                    <p><a class="robo-font"
                            href="tel:<?php the_sub_field('team_phone_number');?>"><?php the_sub_field('team_phone_number');?></a>
                    </p>
                    <p><a class="robo-font"
                            href="mailto:<?php the_sub_field('team_email_address');?>"><?php the_sub_field('team_email_address');?></a>
                    </p>
                </div>


                <?php endwhile; ?>

                <?php endif; ?>




                <div class="team-block"></div>
                <div class="address-block"></div>
                <?php get_template_part("template-parts/socials");?>

            </div>


        </div>
        <div class="contact-page__main">
            <?php echo do_shortcode('[contact-form-7 id="3897" title="Contact Form"]');?>
        </div>


    </div>

    <?php get_footer();?>