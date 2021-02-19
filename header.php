<?php
/**
 * Header
 *
 * @package ridgeway
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $excerpt; ?>">
    <meta name="keywords" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo the_title(); ?></title>

    <link rel="stylesheet" href="https://use.typekit.net/axv0hre.css">
    <!--TYPEKIT INJECT-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />


    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <section class="navigation">
        <div class="container">
            <div id="menu-toggle">
                <div id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- <div id="cross">
                    <span></span>
                    <span></span>
                </div> -->
                <div id="close-menu"></div>
            </div>
            <div class="nav">
                <?wp_nav_menu( array( 
						'theme_location' => 'main-menu'
					) ); ?>
            </div>
            <div class="contact-button">
                <a href="#contact-form">Contact</a>
            </div>
        </div>
    </section>
    <header>

        <div id="mobileNav" class="overlay">
            <!-- Overlay content -->
            <div class="overlay-content">
                <?wp_nav_menu( array( 
						'theme_location' => 'mobile-menu'
					) ); ?>

                <div class="overlay-button"><a href="#contact-form">Contact</a></div>
            </div>
        </div>
    </header><!-- Mobile Menu Overlay -->
    <main><!--closes in footer.php-->
        <div class="contact-box">
            <?php get_template_part("template-parts/socials");?>    
            <a
            href="tel:<?php the_field('phone_number', 'options');?>" class="call-us"><i class="fas fa-phone"></i><span>Click to call us on <?php the_field('phone_number', 'options');?></span></a>             
        </div>
        
        <?php if (is_page_template('page-templates/home.php')) { 
             get_template_part("template-parts/hero"); 
        } else  ?>
    
    



   