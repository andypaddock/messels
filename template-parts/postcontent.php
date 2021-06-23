<?php
$researchVideo = get_field('video_file');
$videoImage = get_field('video_placeholder');

?>

<div class="flexible-content">

    <?php if( get_field('research_post_type') == 'mail' ):?>

    <div class="embed-block">
        <?php if (get_field('mailchimp_url')):?>
        <iframe src="<?php the_field('mailchimp_url'); ?>">
        </iframe>
        <?php endif; ?>
    </div>

    <?php elseif( get_field('research_post_type') == 'video' ): ?>
    <div class="row">
        <div class="container">
            <div class="video-block">
                <video playsinline controls loop poster="<?php echo $videoImage['url'];?>" id="bgvideo" width="x"
                    height="y">
                    <source src="<?php echo $researchVideo['url'];?>" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>