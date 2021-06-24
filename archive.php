<?php

get_header();

if ( have_posts() ) :
    ?>
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
        'exclude'    => array( 10 ),
        'title_li' => '<h3 class="archive">' . __('Filter', 'textdomain') . '</h3>'
     ) ); ?>
            </ul>
            <h3 class="archive">Arhive</h3>


            <ul>
                <?php
/**/
$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date)
FROM $wpdb->posts WHERE post_status = 'publish'
AND post_type = 'post' ORDER BY post_date DESC");
foreach($years as $year) :
?>
                <li class="archive-year"><?php echo $year; ?>

                    <ul class="archive-sub-menu">
                        <?    $months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date)
        FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post'
        AND YEAR(post_date) = '".$year."' ORDER BY post_date ASC");
        foreach($months as $month) :
        ?>
                        <li><a href="<?php echo get_month_link($year, $month); ?>">

                                <?php echo date( 'F', mktime(0, 0, 0, $month) );?></a>

                        </li>

                        <?php endforeach;?>

                    </ul>

                </li>

                <?php endforeach; ?>

            </ul>


        </div>
        <div class="research-archive__main">

            <ul>
                <?php
	while ( have_posts() ) : the_post(); ?>

                <li><?php 
$image = get_field('thumbnail_image');
$fallbackImage = get_field ('fallback_image', 'options'); ?>
                    <img
                        src="<?php if (empty($image)){echo esc_url($fallbackImage['url']);} else {echo esc_url($image['url']);}   ?>">
                    <div class="research-meta">
                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        <p class="post-meta"><?php the_time( 'F jS, Y' ); ?> | <a
                                href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                            | <?php
				$categories = get_the_category();
				$comma      = ', ';
				$output     = '';
				
				if ( $categories ) {
					foreach ( $categories as $category ) {
						$output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $comma;
					}
					echo trim( $output, $comma );
				} ?>
                        </p>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                    </div>
                </li>

                <?php endwhile;

else :
	echo '<p>There are no posts!</p>';

endif;?>
            </ul>
        </div>
    </div>
</div>
<?php get_footer();?>