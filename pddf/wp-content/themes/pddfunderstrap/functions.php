<?php

/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ($understrap_includes as $file) {
	require_once $understrap_inc_dir . $file;
}

add_action('template_redirect', 'redirect_if_user_not_logged_in');

function redirect_if_user_not_logged_in()
{

	if (is_page('frontend-post') && !is_user_logged_in()) { //example can be is_page(23) where 23 is page ID

		wp_redirect('https://pddf.test/login/');

		exit; // never forget this exit since its very important for the wp_redirect() to have the exit / die

	}
}


// function generate_post_excerpt($post_excerpt, $post_content, $post_excerpt_length = 30){
// 	if (!empty($post_excerpt)){
// 		return $post_excerpt;
// 	}

// 	return wp_trim_words($post_content, $post_excerpt_length,'');
// }


add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} //elseif ( is_tag() ) {    
	// 	$title = single_tag_title( '', false );    
	// } elseif ( is_author() ) {    
	// 	$title = '<span class="vcard">' . get_the_author() . '</span>' ;    
	// } elseif ( is_tax() ) { //for custom post types
	// 	$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
	// } elseif (is_post_type_archive()) {
	// 	$title = post_type_archive_title( '', false );
	// }
	return $title;
});

function custom_the_excerpt($trim_char_count = 0)
{
	if (!has_excerpt() || 0 === $trim_char_count) {
		// the_excerpt();

		$excerpt = wp_strip_all_tags(get_the_excerpt());
		$excerpt = substr($excerpt, 0, $trim_char_count);
		$excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

		echo $excerpt;
		// echo $excerpt . '[...]';
		return;
	}

	$excerpt = wp_strip_all_tags(get_the_excerpt());
	$excerpt = substr($excerpt, 0, $trim_char_count);
	$excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

	echo $excerpt;
	// echo $excerpt . '[...]';
}

