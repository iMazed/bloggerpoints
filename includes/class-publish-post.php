<?php

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action('save_post', 'add_word_count');
function add_word_count($post) {

	/* Check and set the post ID */
    global $post;
    $post_ID    = $post->ID;

	/* Retrieve post content */
    $content = get_post_field( 'post_content', $post_ID );

	/* Strip HTML tags; they shouldn't count towards word total */
    $word_count = str_word_count( strip_tags( strip_shortcodes( $content ) ) );

	/* Add word count for this post to the word_count meta field */
    update_post_meta($post_ID, 'word_count', $word_count);
}

add_action('save_post', 'check_for_badge');
function check_for_badge(){
	/* Check and set the post ID */
	global $post;
	$post_ID    = $post->ID;

	/* Check total word count */
	$word_count = new word_count();
	$user_total = $word_count->word_count_total();

	/* If user has written nothing, motivate them! */
	if( empty($user_total) || $user_total == 0 ){
		$response = "Boo, you haven't published anything yet!";
		return $response;
	}

	/*

}