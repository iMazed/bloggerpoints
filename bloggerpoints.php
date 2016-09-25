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
include_once('includes/functions.php');
include_once('includes/meta_box.php');
include_once('includes/class-publish-post.php');
include_once('includes/shortcodes.php');
include_once('includes/admin/class-admin-options.php');

/**
 * Translation ready!
 */
/* TODO add translation */

class Bloggerpoints {
    /** plugin version number */
    const VERSION = '0.0.1';

    /** @var string the plugin path */
    private $plugin_path;

    /** @var string the plugin url */
    private $plugin_url;

    /**
     * Initialize the plugin
     */
    public function __construct() {
    }
}