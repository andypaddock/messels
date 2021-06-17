<div class="container-fluid"><?php  $imageIcon = get_sub_field('icon');
$bgColor = get_sub_field('background'); ?>
    <div class="bg-color <?php if($bgColor == true): echo 'highlight'; endif;?>">
        <div class="container pt5">
            <div class="row text-center">

                <div class="col-8 offset-2 pb3">
                    <img class="block_icon" src="<?php echo $imageIcon['url'];?>"
                        alt="<?php echo $imageIcon['alt'];?>" />
                    <h2 class="heading heading__caps heading__lg"><?php the_sub_field('header'); ?></h2>
                    <h5 class="heading heading__caps heading__sm heading__alt"><?php the_sub_field('sub_header'); ?>
                    </h5>
                </div>
                <div class="col-8 offset-2 pb3">
                    <div class="heading__caps"><?php the_sub_field('lead_copy'); ?></div>
                    <div><?php the_sub_field('main_copy'); ?></div>
                    <?php 
$link = get_sub_field('button_target');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="button button__light" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>