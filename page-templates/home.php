<?php
/**
 * ============== Template Name: Home Page
 *
 * @package ridgeway
 */
get_header();?>

<!--HERO-->




<!--RESIDENTIAL & HOSTPITALITY BLOCKS -->

<div class="container">
    <div id="section-intro" class="section section__extranarrow introduction text-block mt5">

        <?php the_field('intro_copy');?>

    </div>
    <div id="gallery" class="section gallery mt5">
        <h1 class="heading-primary">Gallery</h1>

        <?php get_template_part('template-parts/fixed-gallery');?>
    </div>


    <?php get_template_part('template-parts/directory');?>

    <div id="testimonials" class="section section__extranarrow testimonials mt5">
        <h1 class="heading-primary">Testimonials</h1>

        <?php get_template_part('template-parts/testimonial');?>
    </div>

    <div id="faq" class="section section__narrow faq mt3">
        <h1 class="heading-primary">FAQ</h1>

        <?php get_template_part('template-parts/accordian');?>

    </div>
    <div id="contact-form" class="section section__narrow contact mt5 mb5">
        <h1 class="heading-primary">Contact</h1>
        <div class="contact-details">
            <div class="phone"></div>
            <div class="email"></div>
        </div>
        <div class="form-section">

            <h2 class="heading heading__7 mb1"><?php the_sub_field('heading');?></h2>
            <p class="mb1"><?php the_sub_field('copy');?></p>
            <?php echo do_shortcode('[contact-form-7 id="88" title="Contact Form"]');?>

        </div>

    </div>

</div>
<div id="location" class="mt5">
    <?php get_template_part('template-parts/map');?>
</div>
<?php get_footer();?>