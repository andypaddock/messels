<?php
/**
 * ============== Template Name: Privacy Page
 *
 * @package ridgeway
 */
get_header();?>

<!--HERO-->

<?php get_template_part("template-parts/hero"); ?>

	<div id="content" class="boxed-content <?php echo $colour;?>">
		<div class="container grid-gap container-small cols-24 no-sm-gutter">
			<div class="col">
				<?php the_field('content'); ?>
			</div>
		</div>
	</div>


<?php get_footer();?>