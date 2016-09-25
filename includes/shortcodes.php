<?php
/**
 * Shortcodes for the Bloggerpoints
 */
function show_total_word_count(){
    global $post;

    $word_count = get_post_meta( $post->ID, 'word_count', true );

    echo "<p>".$word_count."</p";
}
add_shortcode( 'bloggerpoints', 'show_total_word_count' );