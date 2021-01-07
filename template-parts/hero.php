<?php $heroImage = get_field('hero_image', 'options'); ?>
<section class="header" style="background-image: url(<?php echo $heroImage;?>">
    <div class="container header__logo-box">
        <div class="section section__narrow">
            <?php get_template_part("inc/img/logo");?>
        </div>
    </div>
</section>