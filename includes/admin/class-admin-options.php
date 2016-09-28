<?php
/**
 * Admin page for Bloggerpoints
 */

add_action('admin_menu', 'bp_setup_menu');

function bp_setup_menu(){
	/**
	 * Add wp-admin menu page
	 */
	// Add an item to the menu.
	add_menu_page(
		__( 'WP Bloggerpoints', 'bloggerpoints' ),
		__( 'WP Bloggerpoints', 'bloggerpoints' ),
		'manage_options',
		'bloggerpoints',
		'bloggerpoints_init',
		'dashicons-admin-customizer'
	);
}

function bloggerpoints_init(){
	?>
	<div class="wrap">
		<h1 class="page-title">WP Bloggerpoints</h1>
		<hr>
		<h3><?php _e('Your Writing Stats', 'bloggerpoints'); ?></h3>
		<p>
		<strong><?php _e('Your current word count:', 'bloggerpoints'); ?></strong>
		<?php
			$word_count = new BP_Word_Count();
			echo $word_count->bp_word_count_total();
		?>
		</p>
		<hr>
		<h3><?php _e("Your Badges", "bloggerpoints"); ?></h3>
		<?php
			$badge = new Badge();
			echo $badge->bp_assign_badge();
		?>
	</div>

<?php
}
?>