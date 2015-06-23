<?php

/**
 * Content Snippets Widget Class
 */
class Content_Snippets_Widget extends WP_Widget {

  /**
   * Holds default widget settings which are populated in the constructor.
   * @var array
   */
  protected $defaults;

  /**
   * Constructor. Sets the default widget options and creates the widget.
   */
  function __construct() {

    $this->defaults = array(
      'title'       => '',
      'snippet_id'  => '',
    );

    $id_base = 'content-snippet';

    $widget_ops = array(
      'classname'   => $id_base,
      'description' => __( 'A simple widget for displaying content snippets.', 'content-snippets' ),
    );

    $control_ops = array(
      'id_base' => $id_base,
      'width'   => 200,
      'height'  => 250,
    );

    parent::__construct( $id_base, __( 'Content Snippet', 'content-snippets' ), $widget_ops, $control_ops );
  }

  /**
   * Echoes the widget content.
   * @param  array $args     Display arguments including before_title, after_title, before_widget and after_widget.
   * @param  array $instance The settings for the particular instance of the widget.
   */
  function widget( $args, $instance ) {

    global $wp_query;

    // Merge with defaults
    $instance = wp_parse_args( (array) $instance, $this->defaults );

    echo $args['before_widget'];

    if ( ! empty( $instance['title'] ) )
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];

    // Gets the selected snippet
    $snippet = get_post( $instance['snippet_id'] );
    $content = $snippet->post_content;

    echo '<div class="content-snippet-entry">';

    echo $content;

    echo '</div>';

    echo $args['after_widget'];
  }

  /**
   * Update a particular instance.
   *
   * This function should check that $new_instance is set correctly.
   * The newly calculated value of $instance should be returned.
   * If "false" is returned, the instance won't be saved/updated.
   * 
   * @param  array $new_instance New settings for this instance as input by the user via form()
   * @param  array $old_instance Old settings for this instance
   */
  function update( $new_instance, $old_instance ) {
    $new_instance['title'] = strip_tags( $new_instance['title'] );

    return $new_instance;
  }

  /**
   * Echo the settings update form
   * @param  array $instance Current settings
   */
  function form( $instance ) {

    // Merge with defaults
    $instance = wp_parse_args( (array) $instance, $this->defaults );

    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'content-snippets' ); ?>: </label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'snippet_id' ); ?>"><?php _e( 'Content Snippet', 'content-snippets' ); ?>: </label>

      <?php $snippets = get_posts( array( 'post_type' => 'snippet', 'posts_per_page' => -1 ) ); ?>

      <select name="<?php echo $this->get_field_name( 'snippet_id' ); ?>" id="<?php echo $this->get_field_id( 'snippet_id' ); ?>">
        
        <?php foreach ( $snippets as $snippet ) { ?>
          <option value="<?php echo $snippet->ID; ?>" <?php selected( $instance['snippet_id'], $snippet->ID ); ?>><?php echo $snippet->post_title; ?></option>
        <?php } ?>

      </select>
    </p>

    <?php
  }
}
