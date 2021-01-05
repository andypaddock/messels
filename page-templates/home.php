<?php
/**
 * ============== Template Name: Home Page
 *
 * @package ridgeway
 */
get_header();?>

<!--HERO-->

<?php get_template_part("template-parts/hero"); ?>

<!--INTRODUCTION-->
<?php if( have_rows('introduction') ):
    while( have_rows('introduction') ): the_row(); ?>
	<?php get_template_part("template-parts/intro-content"); ?>
<?php endwhile; endif;?>

<!--RESIDENTIAL & HOSTPITALITY BLOCKS -->

	<div class="container">
		<div class="section section__extranarrow introduction">
			
				<div>

						<div class="overview-block col" style="background-image:url(<?php echo $image['url']; ?>);">
							<div>
								<h3><?php the_sub_field('title');?></h3>
								<a class="button <?php echo esc_attr($colourValue);?>" href="<?php the_sub_field('cta_target');?>"><span><?php the_sub_field('cta_title');?></span></a>
							</div>
						</div>
				</div>
			
		</div>
		<div class="section gallery">
			
				<div>

						<div class="overview-block col" style="background-image:url(<?php echo $image['url']; ?>);">
							<div>
								<h3><?php the_sub_field('title');?></h3>
								<a class="button <?php echo esc_attr($colourValue);?>" href="<?php the_sub_field('cta_target');?>"><span><?php the_sub_field('cta_title');?></span></a>
							</div>
						</div>
				</div>
			
		</div>
		<div class="section section__narrow faq">
			
				<div>

						<div class="overview-block col" style="background-image:url(<?php echo $image['url']; ?>);">
							<div>
								<h3><?php the_sub_field('title');?></h3>
								<a class="button <?php echo esc_attr($colourValue);?>" href="<?php the_sub_field('cta_target');?>"><span><?php the_sub_field('cta_title');?></span></a>
							</div>
						</div>
				</div>
			
		</div>
		<div class="section section__narrow testimonials">

		<?php get_template_part('template-parts/testimonial');?>
</div>
		<div class="section section__narrow contact">
			
				<div>

						<div class="overview-block col" style="background-image:url(<?php echo $image['url']; ?>);">
							<div>
								<h3><?php the_sub_field('title');?></h3>
								<a class="button <?php echo esc_attr($colourValue);?>" href="<?php the_sub_field('cta_target');?>"><span><?php the_sub_field('cta_title');?></span></a>
							</div>
						</div>
				</div>
			
		</div>
		
	</div>
<?php get_footer();?>
