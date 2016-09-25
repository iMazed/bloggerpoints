<?php
/**
* Calls the class on the post edit screen.
*/
function call_someClass() {
    new someClass();
}

if ( is_admin() ) {
    add_action( 'load-post.php',     'call_someClass' );
    add_action( 'load-post-new.php', 'call_someClass' );
}

/**
* The Class.
*/
class someClass {

    /**
    * Hook into the appropriate actions when the class is constructed.
    */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post',      array( $this, 'save'         ) );
    }

    /**
    * Adds the meta box container.
    */
    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        $post_types = array( 'post', 'page' );

        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
            'bp_meta_box',
            __( 'Bloggerpoints', 'bloggerpoints' ),
            array( $this, 'render_meta_box_content' ),
            $post_type,
            'advanced',
            'high'
            );
        }
    }

    /**
    * Save the meta when the post is saved.
    *
    * @param int $post_id The ID of the post being saved.
    */
    public function save( $post_id ) {

        /*
        * We need to verify this came from the our screen and with proper authorization,
        * because save_post can be triggered at other times.
        */

        // Check if our nonce is set.
        if ( ! isset( $_POST['bp_inner_custom_box_nonce'] ) ) {
        return $post_id;
        }

        $nonce = $_POST['bp_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'bp_inner_custom_box' ) ) {
            return $post_id;
        }

        /*
        * If this is an autosave, our form has not been submitted,
        * so we don't want to do anything.
        */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
         }
         else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }

        /* OK, it's safe for us to save the data now. */

        // Sanitize the user input.
        $mydata = sanitize_text_field( $_POST['bloggerpoints_new_field'] );
    }


    /**
    * Render Meta Box content.
    *
    * @param WP_Post $post The post object.
    */
    public function render_meta_box_content( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'bp_inner_custom_box', 'bp_inner_custom_box_nonce' );

        // Use get_post_meta to retrieve an existing value from the database.
        $word_count = get_post_meta( $post->ID, 'word_count', true );

        // Display the form, using the current value.
        ?>
        <strong>
            <?php _e( "You've already written this many words:", 'bloggerpoints' ); ?>
        </strong><br />
        <?php
        echo $word_count;
    }
}