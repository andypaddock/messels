<?php if (get_sub_field('testimonial_content')):?>

<div class="container cols-offset4-16 cols-sm-24 text-center">
	<div class="col">
		<blockquote>
			<?php the_sub_field('testimonial_content');?>
			<footer><?php the_sub_field('customer_name');?></footer>
		</blockquote>
	</div>
</div>
<?php endif;?>
