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

<link rel="stylesheet" href="https://use.typekit.net/axv0hre.css"><!--TYPEKIT INJECT-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="page" class="site-wrapper">

	<header>
            <div class="container">
			<div id="menu-toggle">
                    <div id="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div id="cross">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="nav">
                    <?wp_nav_menu( array( 
						'theme_location' => 'main-menu'
					) ); ?>
                </div>
                <div class="contact-button">
                    <a href="/contact">Contact</a>
                </div>
                

        </header>
        <!-- Mobile Menu Overlay -->
<div id="mobileNav" class="overlay">
            <!-- Overlay content -->
            <div class="overlay-content">
                <?wp_nav_menu( array( 
						'theme_location' => 'mobile-menu'
					) ); ?>

                <div class="overlay-button"><a href="/contact">Contact</a></div>
            </div>
        </div>
            </div>

		<main><!--closes in footer.php-->
