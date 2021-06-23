<?php
/**
 * ============== Template Name: Terms and Privacy
 *
 * @package ridgeway
 */
get_header();?>
<div class="row">
    <div class="container">
        <div class="terms-side-bar">
            <div class="feather-icon">
                <?php get_template_part("inc/img/featherlogo");?></div>
        </div>
        <div class="terms">

            <h2 class="heading-secondary"><?php the_field("page_heading"); ?></h2>



            <?php the_field("main_body_text"); ?>

        </div>

    </div>
</div>

<?php get_footer();?>