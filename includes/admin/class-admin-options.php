<?php
/**
 * Admin page for Bloggerpoints
 */

add_action('admin_menu', 'bloggerpoints_setup_menu');

function bloggerpoints_setup_menu(){
	/**
	 * Add wp-admin menu page
	 */
	// Add an item to the menu.
	add_menu_page(
		__( 'Wp Bloggerpoints', 'bloggerpoints' ),
		__( 'WP Bloggerpoints', 'bloggerpoints' ),
		'manage_options',
		'bloggerpoints',
		'bloggerpoints_init',
		'dashicons-admin-page'
	);
}

function bloggerpoints_init(){
	?>
	<div class="wrap">
		<h1 class="page-title">WP Bloggerpoints</h1>
		<hr>
		<h3>Your Writing Stats</h3>
		<p>
		<strong>Your current word count:</strong>
		<?php
			$word_count = new word_count();
			echo $word_count->word_count_total();
		?>
		</p>
	</div>

<?php
}
?>