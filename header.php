<?php
/**
 * Header
 *
 * @package messels
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SYQ9W4RGF4"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-SYQ9W4RGF4');
    </script>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $excerpt; ?>">
    <meta name="keywords" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo the_title(); ?></title>

    <link rel="stylesheet" href="https://use.typekit.net/duq7wxv.css">
    <!--TYPEKIT INJECT-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />


    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <section class="navigation">
        <div class="nav-holder">

            <div class="row">
                <div class="container">
                    <div class="nav-logo"><?php get_template_part("inc/img/headerlogo");?></div>



                    <div class="nav">
                        <?wp_nav_menu( array( 
						'theme_location' => 'main-menu'
					) ); ?>
                    </div>
                    <div class="contact-button">
                        <a href="/contact">Contact</a>
                        <!-- <div id="main-menu-toggle">
                            <div id="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div> -->
                        <div class="sign-in"><a href="/wp-login.php">Sign In</a></div>
                        <div class="sign-out"><a href="/wp-login.php?action=logout">Sign Out</a></div>
                    </div>

                </div>
            </div>
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
    <main>
        <!--closes in footer.php-->