<?php

$heroImage = get_field('hero_image');

?>

<section class="hero-outer">
    <div class="hero-image" style="background-image: url(<?php echo $heroImage;?>"></div>
    <canvas id='canvas' class="h-75"></canvas>
    <div class="hero-title">
        <?php get_template_part("inc/img/logo");?>
        <h1 class="heading-hero"><?php the_field("hero_title"); ?></h1>
    </div>
</section>