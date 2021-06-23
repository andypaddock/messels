<?php
$researchVideo = get_field('video_file');
$videoImage = get_field('video_placeholder');

?>


<?php
// STARTS - wrapp your content with this conditional statement
if ( post_password_required() ) :

    // if your post is password protected with our Pro version, show our password form instead
    echo get_the_password_form();

/* display the password protected content if the correct password is entered */ 
else : ?>

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
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php the_content(); ?>
    </main>
</div>
<?php endif; ?>