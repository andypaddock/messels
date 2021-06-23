<?php
/**
 * The template for displaying all single posts
 *
 * @package messels
 */
get_header(); ?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/researchhero"); ?>

<!-- ******************* Hero Content END ******************* -->


<div class="row">
    <div class="flex-container">

        <?php
get_header();
 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
        // the_content();
        get_template_part('template-parts/postcontent');
        endwhile;
        else :
        _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
        endif;

        ?>

    </div>
</div>

<?php get_footer(); ?>