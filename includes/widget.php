<?php
/**
 * Add the Bloggerpoints widget
 */

// Prevent direct file access
defined( 'ABSPATH' ) or exit;

//Add the widget!
add_action( 'widgets_init', function(){
    register_widget( 'Bloggerpoints_widget' );
});

class blogpoint_widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'Bloggerpoints_widget', // Base ID
            __('Bloggerpoints Widget', 'bloggerpoints'), // Name
            array( 'description' => __( 'Display your latest Bloggerpoints badges', 'bloggerpoints' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }
        echo __( 'Hello, World!', 'bloggerpoints' );
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     * @return string|void
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Bloggerpoints Badges', 'bloggerpoints' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }
}