<?php
/*
Plugin Name: Bloggerpoints
Plugin URI: https://wpbloggerpoints.com
Description: Gamify your blogging!
Author: Ines van Essen
Version: 0.0.1
Author URI: http://inesvanessen.nl
Text domain: bloggerpoints
Domain Path: /languages/
*/


// Prevent direct file access
defined( 'ABSPATH' ) or exit;

/**
 * Include required core files used in admin and on the frontend.
 */
include_once('includes/widget.php');
include_once('includes/functions.php');
include_once('includes/class-publish-post.php');
include_once('includes/shortcodes.php');
include_once('includes/badges.php');
include_once('includes/admin/class-admin-options.php');

/**
 * Translation ready!
 */
add_action( 'plugins_loaded', 'load_bp_textdomain' );
function load_bp_textdomain() {
    load_plugin_textdomain( 'bloggerpoints', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}