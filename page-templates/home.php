<?php
/**
 * ============== Template Name: Home Page
 *
 * @package messels
 */
get_header();?>


<?php get_template_part("template-parts/hero"); ?>




<section class="section-about">
    <div class="row">
        <div class="container">
            <div class="about-heading">
                <h2 class="heading-primary u-margin-bottom-small"><?php the_field("about_title"); ?></h2>
            </div>
            <div class="about-copy">
                <?php the_field("about_copy"); ?>
            </div>
        </div>
    </div>
</section>
<section class="section-features">
    <div class="row">
        <div class="flex-link">
            <div class="flex-text">
                <h2 class="heading-primary u-margin-bottom-small"><?php the_field("hosting_title"); ?></h2>
                <?php the_field("hosting_copy"); ?>
                <?php 
$link = get_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="btn btn--darkblue" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
            <?php $featureImage = get_field('feature_image');?>
            <div class="flex-image">
                <img src="<?php echo $featureImage['url']; ?>" alt="<?php echo $featureImage['alt'] ?>" />
            </div>
        </div>
    </div>
</section>
<section class="section-about section-about__team">
    <div class="row">
        <div class="container">
            <div class="about-heading">
                <h2 class="heading-primary u-margin-bottom-small"><?php the_field("about_team_title"); ?></h2>
            </div>
            <div class="about-copy">
                <?php the_field("about_team_copy"); ?>
            </div>
        </div>
    </div>
</section>





<?php if( have_rows('flexible_blocks') ): ?>
<?php while( have_rows('flexible_blocks') ): the_row(); ?>

<?php if( get_row_layout() == 'text_block' ):?>

<?php get_template_part('template-parts/text');?>

<?php elseif( get_row_layout() == 'process_block' ): ?>

<?php get_template_part('template-parts/process');?>

<?php elseif( get_row_layout() == 'video' ): ?>

<?php get_template_part('template-parts/video');?>

<?php elseif( get_row_layout() == 'double_image_links' ): ?>

<?php get_template_part('template-parts/double', 'links');?>

<?php elseif( get_row_layout() == 'background_bleed' ): ?>

<?php get_template_part('template-parts/bleed');?>

<?php elseif( get_row_layout() == 'product_feed' ): ?>

<?php get_template_part('template-parts/product', 'feed');?>

<?php elseif( get_row_layout() == 'full_width_image' ): ?>

<?php get_template_part('template-parts/full', 'image');?>



<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
<div class="dark-background">
    <?php get_template_part('template-parts/latestresearch');?>
</div>


<?php get_footer();?>