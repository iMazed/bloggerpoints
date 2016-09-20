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
        global $wpdb;

        // initialize the custom table names
        $this->user_bp_log_db_tablename = $wpdb->prefix . 'bloggerpoints_log';
        $this->user_bp_db_tablename     = $wpdb->prefix . 'bloggerpoints';

        // include required files
        $this->includes();

        // initialize user point balance on user create/update, and remove the user points record on user delete
        add_action( 'user_register',  array( $this, 'refresh_user_points_balance' ) );
        add_action( 'profile_update', array( $this, 'refresh_user_points_balance' ) );
        add_action( 'delete_user',    array( $this, 'delete_user_points' ) );
    }
}