<?php
$galleryVideo = get_field('video');
$videoImage = get_field('video_placeholder');
$galleryVideoLower = get_field('video_lower');
$videoImageLower = get_field('video_placeholder_lower');
?>
<?php if($galleryVideo):?>
<div class="video">
    <video playsinline muted controls loop poster="<?php echo $videoImage['url'];?>" id="bgvideo" width="x" height="y">
        <source src="<?php echo $galleryVideo['url'];?>" type="video/mp4">
    </video>
</div>
<?php endif; ?>


<?php 
$images = get_field('gallery_fixed');
$counter = 0;
$galleryCount = get_field('select_gallery_size');

if( $images && $counter < $galleryCount) : ?>
<div class="parent parent__<?php echo ($galleryCount); ?>">

    <?php foreach( $images as $image ):
            $counter++; ?>
    <?php if( $counter <= $galleryCount) : ?>
    <?php $caption = $image['caption'];?>
    <div class="div<?php echo ($counter); ?> slide-up gallery-images"><a href="<?php echo $image['url']; ?>"
            class="lightbox-gallery"><img src="<?php echo esc_url($image['sizes']['large']); ?>"
                alt="<?php echo $image['alt']; ?>" /></a>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<?php if($galleryVideoLower):?>
<div class="video">
    <video playsinline muted controls loop poster="<?php echo $videoImageLower['url'];?>" id="bgvideo" width="x"
        height="y">
        <source src="<?php echo $galleryVideoLower['url'];?>" type="video/mp4">
    </video>
</div>
<?php endif; ?>

<div class="flexible-content">

    <?php if( get_field('research_post_type') == 'mail' ):?>

    <div class="embed-block">
        <?php if (get_field('mailchimp_url')):?>
        <iframe src="<?php the_field('mailchimp_url'); ?>">
        </iframe>
        <?php endif; ?>
    </div>

    <?php elseif( get_field('research_post_type') == 'video' ): ?>

    <div class="video-block">
        Video
    </div>
    <?php endif; ?>

</div>