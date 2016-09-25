<?php

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action('publish_post', 'add_word_count');
function add_word_count($post) {

	/* Check and set the post ID */
    global $post;
    $post_ID    = $post->ID;

	/* Retrieve post content */
    $content = get_post_field( 'post_content', $post_ID );

	/* Strip HTML tags; they shouldn't count towards word total */
    $word_count = str_word_count( strip_tags( $content ) );

	/* Add word count for this post to the word_count meta field */
    update_post_meta($post_ID, 'word_count', $word_count);
}