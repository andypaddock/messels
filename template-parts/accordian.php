<?php if( have_rows('accordian') ): 
    $counter = 0; ?>
<div class="text-content accordion-outer mt5">
    <?php while( have_rows('accordian') ): the_row();
    $counter++; ?>
    <button class="info-accordion"><span class="auto-counter">Q<?php echo sprintf("%'.01d\n",$counter);?>.</span>
        <span><?php the_sub_field('accordian_header');?></span></button>
    <div class="info-panel">
        <?php the_sub_field('accordian_text');?>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>