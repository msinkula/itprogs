<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */


//add support for post thumbnails
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' );  
}

add_theme_support( 'automatic-feed-links' );

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'id' => 'home_right',
		'name' => __( 'Home Right' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));

    register_sidebar(array(
        'id' => 'home_left',
		'name' => __( 'Home Left' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	
    register_sidebar(array(
        'id' => 'page_left',
		'name' => __( 'Page Left' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

function register_it_menus() {
	register_nav_menu('main-menu', 'Main Menu');
	//register_nav_menu('projects-cats-menu', 'Project Cats Menu');
}
add_action('init', 'register_it_menus');

function excerpt_ellipse($text) {
   return str_replace('[...]', ' <a href="'.get_permalink().'" class="more">Read More...</a>', $text);
}
add_filter('get_the_excerpt', 'excerpt_ellipse');

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function scripts() {
if ( !is_admin() ) { // this if statement will insure the following code only gets added to your wp site and not the admin page cause your code has no business in the admin page right unless that's your intentions
		wp_register_script('instructors', ( get_bloginfo('template_url') . '/javascript/instructors.js'), false); //first register your custom script
		wp_enqueue_script('instructors'); // then let wp insert it for you or just delete this and add it directly to your template
	}
}
add_action( 'wp_print_scripts', 'scripts'); // now just run the function