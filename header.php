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
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


    <header>
        <!-- <div class="navigation">
            <input type="checkbox" class="navigation__checkbox" id="navi-toggle">

            <label for="navi-toggle" class="navigation__button">
                <span class="navigation__icon">&nbsp;</span>
            </label>

            <div class="navigation__background">&nbsp;</div>

            <nav class="navigation__nav">
                <ul class="navigation__list">
                    <li class="navigation__item"><a href="#" class="navigation__link"><span>01</span>About Natous</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link"><span>02</span>Your benfits</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link"><span>03</span>Popular tours</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link"><span>04</span>Stories</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link"><span>05</span>Book now</a></li>
                    </ul>
            </nav>
        </div> -->




        <section class="navigation">
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
                    <a href="/#contact-form">Contact</a>
                </div>
            </div>
        </section>
        <?php get_template_part("template-parts/hero"); ?>
        <section class="hero-text">
            <div class="container">
                <div class="section section__extranarrow">
                    <div class="header__text-box">
                        <h1 class="heading-primary">
                            <span class="heading-primary--main">An exciting new events venue set in the rolling
                                Wiltshire countryside</span>
                        </h1>

                        <a href="#section-intro">Find Out More</a>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- Mobile Menu Overlay -->
    <div id="mobileNav" class="overlay">
        <!-- Overlay content -->
        <div class="overlay-content">
            <?wp_nav_menu( array( 
						'theme_location' => 'mobile-menu'
					) ); ?>

            <div class="overlay-button"><a href="/#contact-form">Contact</a></div>
        </div>
    </div>


    <main>
        <!--closes in footer.php-->