<?php
/**
 * General functions for Bloggerpoints
 */

/* Add database table */
    function bp_table() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();
        $table_name      = $wpdb->prefix . 'bloggerpoints';

        $sql = "CREATE TABLE $table_name (
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
          name tinytext NOT NULL,
          text text NOT NULL,
          url varchar(55) DEFAULT '' NOT NULL,
          
          PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }