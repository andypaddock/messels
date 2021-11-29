<?php
/**
 * kitjames functions and definitions
 *
 * @package kitjames
 */

/****************************************************/
/*                       Hooks                       /
/****************************************************/

/* Enqueue scripts and styles */
add_action('wp_enqueue_scripts', 'kitjames_scripts');

/* Add Menus */
add_action('init', 'kitjames_custom_menu');

/* Dashboard Config */
add_action('wp_dashboard_setup', 'kitjames_dashboard_widget');

/* Dashboard Style */
add_action('admin_head', 'kitjames_custom_fonts');

/* Remove Default Menu Items */
add_action('admin_menu', 'kitjames_remove_menus');

/* Change Posts Columns */
add_filter('manage_posts_columns', 'kitjames_manage_columns');

/* Reorder Admin Menu */
add_filter('custom_menu_order', 'kitjames_reorder_menu');
add_filter('menu_order', 'kitjames_reorder_menu');

/* Remove Comments Link */
add_action('wp_before_admin_bar_render', 'kitjames_manage_admin_bar');


/****************************************************/
/*                     Functions                     /
/****************************************************/

function kitjames_scripts() {
	wp_enqueue_style( 'kitjames-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);
	wp_enqueue_script( 'kitjames-core-js', get_template_directory_uri() . '/inc/js/compiled.js', array('jquery'), filemtime( get_stylesheet_directory() . '/inc/js/compiled.js' ), true);
	// wp_enqueue_script( 'kitjames-intersection-js', get_template_directory_uri() . '/inc/js/intersection.js', array('jquery'), false, true);
	wp_enqueue_script( 'anime-js', '//cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js', array(), true); 
    wp_enqueue_script( 'lodash-js', '//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js', array(), true); 
}

add_filter( 'script_loader_tag', function ( $tag, $handle ) {

	if ( 'kitjames-intersection-js' !== $handle )
		return $tag;

	return str_replace( ' src', ' defer="defer" src', $tag );
}, 10, 2 );

function kitjames_custom_menu() {
	register_nav_menus(array(
		'main-menu' => __( 'Main Menu' )
	));

	register_nav_menus(array(
		'mobile-menu' => __( 'Mobile Menu' )
    ));
    
    register_nav_menus(array(
		'footer-menu' => __( 'Footer Menu' )
	));
}

function kitjames_dashboard_widget() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'kitjames Support', 'kitjames_dashboard_help');
}

function kitjames_dashboard_help() {
	echo file_get_contents(__DIR__ . "/admin-settings/dashboard.html");
}

function kitjames_custom_fonts() {
	echo '<style type="text/css">' . file_get_contents(__DIR__ . "/admin-settings/style-admin.css") . '</style>';
}

if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

function kitjames_remove_menus(){
	remove_menu_page( 'edit-comments.php' ); //Comments
}

function kitjames_manage_columns($columns) {
	unset($columns["comments"]);
	return $columns;
}

function kitjames_reorder_menu() {
    return array(
		'index.php',                        // Dashboard
		'separator1',                       // --Space--
		'edit.php',                         // Posts
		'edit.php?post_type=page',          // Pages
		'upload.php',                       // Media
		'separator2',                       // --Space--
		'themes.php',                       // Appearance
		'plugins.php',                      // Plugins
		'users.php',                        // Users
		'tools.php',                        // Tools
		'options-general.php',              // Settings
		'wpcf7',                            // Contact Form 7
   );
}

function kitjames_manage_admin_bar(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}

/* ADD CUSTOM RESPONSIVE IMAGE SIZES
================================================== */

function aw_custom_responsive_image_sizes($sizes, $size) {
  $width = $size[0];
  // blog posts
  if ( is_singular( 'post' ) ) {
    // half width images - medium size
    if ( $width === 600 ) {
      return '(min-width: 768px) 322px, (min-width: 576px) 255px, calc( (100vw - 30px) / 2)';
    }
    // full width images - large size
    if ( $width === 1024 ) {
      return '(min-width: 768px) 642px, (min-width: 576px) 510px, calc(100vw - 30px)';
    }
    // default to return if condition is not met
    return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
  }
  // default to return if condition is not met
  return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
}
add_filter('wp_calculate_image_sizes', 'aw_custom_responsive_image_sizes', 10 , 2);

 function manage_my_category_columns($columns)
{
 // only edit the columns on the current taxonomy
 if ( !isset($_GET['taxonomy']) || $_GET['taxonomy'] != 'category' )
 return $columns;

 // unset the description columns
 if ( $posts = $columns['description'] ){ unset($columns['description']); }

 return $columns;
}
add_filter('manage_edit-category_columns','manage_my_category_columns');

show_admin_bar(false);


function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyAww1oT-GyrFh_DTnnBF6LwtUBkEVunVlU';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
	}
	
//List archives by year, then month
function wp_custom_archive($args = '') {
    global $wpdb, $wp_locale;

    $defaults = array(
        'limit' => '',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => false,
        'echo' => 1
    );

    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if ( '' != $limit ) {
        $limit = absint($limit);
        $limit = ' LIMIT '.$limit;
    }

    // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
    $archive_date_format_over_ride = 0;

    // options for daily archive (only if you over-ride the general date format)
    $archive_day_date_format = 'Y/m/d';

    // options for weekly archive (only if you over-ride the general date format)
    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format   = 'Y/m/d';

    if ( !$archive_date_format_over_ride ) {
        $archive_day_date_format = get_option('date_format');
        $archive_week_start_date_format = get_option('date_format');
        $archive_week_end_date_format = get_option('date_format');
    }

    //filters
    $where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
    $join = apply_filters('customarchives_join', "", $r);

    $output = '<ul>';

        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
        $key = md5($query);
        $cache = wp_cache_get( 'wp_custom_archive' , 'general');
        if ( !isset( $cache[ $key ] ) ) {
            $arcresults = $wpdb->get_results($query);
            $cache[ $key ] = $arcresults;
            wp_cache_set( 'wp_custom_archive', $cache, 'general' );
        } else {
            $arcresults = $cache[ $key ];
        }
        if ( $arcresults ) {
            $afterafter = $after;
            foreach ( (array) $arcresults as $arcresult ) {
                $url = get_month_link( $arcresult->year, $arcresult->month );
                $year_url = get_year_link($arcresult->year);
                /* translators: 1: month name, 2: 4-digit year */
                $text = sprintf(__('%s'), $wp_locale->get_month($arcresult->month));
                $year_text = sprintf('%d', $arcresult->year);
                if ( $show_post_count )
                    $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;
                $year_output = get_archives_link($year_url, $year_text, $format, $before, $after);              
                $output .= ( $arcresult->year != $temp_year ) ? $year_output : '';
                $output .= get_archives_link($url, $text, $format, $before, $after);

                $temp_year = $arcresult->year;
            }
        }

    $output .= '</ul>';

    if ( $echo )
        echo $output;
    else
        return $output;
}
// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );





/*	
* Getting script tags
* Thanks http://wordpress.stackexchange.com/questions/54064/how-do-i-get-the-handle-for-all-enqueued-scripts
*/

// add_action( 'wp_print_scripts', 'wsds_detect_enqueued_scripts' );
// function wsds_detect_enqueued_scripts() {
// 	global $wp_scripts;
// 	foreach( $wp_scripts->queue as $handle ) :
// 		echo $handle . ' | ';
// 	endforeach;
// }

add_filter( 'script_loader_tag', 'wsds_defer_scripts', 10, 3 );
function wsds_defer_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
    'contact-form-7',
    'plyr-js',
    'kitjames-core-js',
    'anime-js',
    'lodash-js',
    'google-recaptcha',
    'wpcf7-recaptcha',
	);

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    
    return $tag;
} 