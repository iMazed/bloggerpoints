<?php

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class BP_count_words{

    /**
     * BP_count_words constructor.
     * Add hooks/filters
     */

    public function __construct() {
        // add word count to user total when post is published
        add_action( 'publish_post',  );
    }

    public function add_word_count() {
        global $bp_word_count;


    }
}