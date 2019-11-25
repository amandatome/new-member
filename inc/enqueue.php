<?php

/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts()
	{
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get('Version');

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
		wp_enqueue_style('understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version);

		wp_enqueue_script('jquery');

		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');
		wp_enqueue_script('understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');


function base_theme_scripts()
{
	wp_enqueue_script(
		'flickity', //handle
		"https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js",
		false, //dependencies
		2.2, // version number
		false //load in footer
	);
	wp_enqueue_script(
		'font-awesome', //handle
		'https://kit.fontawesome.com/6b46070716.js',
		array(), //dependencies
		'5.10.2', // version number
		true //load in footer
	);
}

add_action('wp_enqueue_scripts', 'base_theme_scripts');

//Google Fonts
function google_fonts()
{
	wp_enqueue_style( 'flickity-css', get_template_directory_uri(), 'https://unpkg.com/flickity@2/dist/flickity.min.css', 'all');



	$query_args = array(
		'family' => 'Barlow|Grand+Hotel|Roboto',
		'subset' => 'latin,latin-ext'
	);
	wp_enqueue_style('google_fonts', add_query_arg($query_args, "//fonts.googleapis.com/css"), array(), null);
}
add_action('wp_enqueue_scripts', 'google_fonts');
