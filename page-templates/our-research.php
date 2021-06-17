<?php
/**
 * ============== Template Name: Research Template
 *
 * @package ridgeway
 */
get_header();?>
<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/researchhero"); ?>

<!-- ******************* Hero Content END ******************* -->
<div class="row">
    <div class="container research-archive">


        <div class="research-archive__sidebar">
            <ul>
                <?php wp_list_categories( array(
        'orderby'    => 'name',
        'show_count' => true,
        'exclude'    => array( 10 )
    ) ); ?>
            </ul>

            <?php wp_custom_archive(); ?>
        </div>
        <div class="research-archive__main"><?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

            <?php if ( $wpb_all_query->have_posts() ) : ?>

            <ul>

                <!-- the loop -->
                <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <li><?php 
$image = get_field('thumbnail_image');
$fallbackImage = get_field ('fallback_image', 'options'); ?>
                    <img
                        src="<?php if (empty($image)){echo esc_url($fallbackImage['url']);} else {echo esc_url($image['url']);}   ?>">
                    <div class="research-meta">
                        <span class="pub-date"><?php the_date(); ?></span>
                        <h3 class="heading-tertiary"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <a class="research-link alt-font" href="<?php the_permalink(); ?>">Read More <i
                                class="fas fa-arrow-right"></i></a>
                        <span class="pub-date">(Requires Log In)</span>
                    </div>
                </li>
                <?php endwhile; ?>
                <!-- end of the loop -->

            </ul>

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>


    </div>

    <?php get_footer();?>