<?php

/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style()
{
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme('OceanWP');
	$version = $theme->get('Version');
	// Load JQuery
	wp_enqueue_script(
		'script', // name your script so that you can attach other scripts and de-register, etc.
		get_stylesheet_directory_uri() . '/scripts/script.js', // this is the location of your script file
		array('jquery') // this array lists the scripts upon which your script depends
		,'1.0', true
	);
	// Load the stylesheet
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('oceanwp-style'), $version);
}
add_action('wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style');




function contact_btn($items, $args)
{
	$items .= '<a href="/contact" class="contact-btn">Nous contacter</a>';
	return $items;
}

add_filter('wp_nav_menu_items', 'contact_btn', 10, 2);
