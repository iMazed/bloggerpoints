<?php
/**
 * General functions for Bloggerpoints
 */

/**
 * Retrieve total word count for user
 */
class BP_Word_Count {

	/**
	 * Retrieve all meta values
	 */
	public function bp_get_meta_values( $key = '', $type = 'post', $status = 'publish', $user_id = '' ) {

		global $wpdb;

		if ( empty( $key ) && empty($user_id) ) {
			exit;
		}

		$r = $wpdb->get_col( $wpdb->prepare( "
	        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
	        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
	        WHERE pm.meta_key = '%s' 
	        AND p.post_status = '%s' 
	        AND p.post_type = '%s'
	        AND p.post_author = '%s'
	    ", $key, $status, $type, $user_id ) );

		return $r;
	}

	/**
	 * Add up total word count for current user
	 * @return mixed
	 */
	public function bp_word_count_total() {

		/* Set ID for current user */
		$current_user       = wp_get_current_user();
		$current_user_id    = $current_user->ID;

		/* Retrieve word count of all posts that current user has published */
		$all_post = $this->bp_get_meta_values('word_count', 'post', 'publish', $current_user_id);

		/* Add all integers to get to a total */
		$count_all_post = array_sum($all_post);

		return $count_all_post;
	}
}