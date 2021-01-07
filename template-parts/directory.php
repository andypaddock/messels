<?php $directoryImage = get_field('directory_image', 'options');
$linkImage = get_field('link_icon', 'options');
$fileLink = get_field('file_link', 'options');
?>


<div class="section mt5" style="background-image: url(<?php echo $directoryImage;?>">
    <h2 class="light-text"><?php the_field('directory_title','options');?></h2>
    <p class="light-text"><?php the_field('directory_desc','options');?></p>


    <a href="<?php echo $fileLink['url'];?>">
        <img src="<?php echo $linkImage['url']; ?>" alt="<?php echo $linkImage['alt'] ?>" />
    </a>
    <p class="light-text"><?php echo $fileLink['type'];?></p>
    <p class="light-text sub-text">(Opens in a new window)</p>
</div>