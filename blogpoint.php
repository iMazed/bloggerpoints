<?php
/*
Plugin Name: Bloggerpoints
Plugin URI: https://wpbloggerpoints.com
Description: Gamify your blogging!
Author: Ines van Essen
Version: 0.0.1
Author URI: http://inesvanessen.nl
Text domain: bloggerpoints
*/


// Prevent direct file access
defined( 'ABSPATH' ) or exit;

/**
 * Include required core files used in admin and on the frontend.
 */
include_once('includes/widget.php');

/**
 * Translation ready!
 */
add_action('after_setup_theme', 'bloggerpoints_load_textdomain');
function blogpoint_load_textdomain() {
    load_plugin_textdomain( 'bloggerpoints-translate', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}