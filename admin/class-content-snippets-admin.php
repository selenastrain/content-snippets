<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://selenastrain.com
 * @since      1.0.0
 *
 * @package    Content_Snippets
 * @subpackage Content_Snippets/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Content_Snippets
 * @subpackage Content_Snippets/admin
 * @author     Selena Strain <s@selenastrain.com>
 */
class Content_Snippets_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Registers the snippet custom post type
	 */
	public static function snippet_post_type() {
		$labels = array(
			'name'								=> __( 'Snippets', 'content-snippets' ),
			'singular_name'				=> __( 'Snippet', 'content-snippets' ),
			'add_new_item'				=> __( 'Add New Snippet', 'content-snippets' ),
			'new_item'						=> __( 'New Snippet', 'content-snippets' ),
			'edit_item'						=> __( 'Edit Snippet', 'content-snippets' ),
			'view_item'						=> __( 'View Snippet', 'content-snippets' ),
			'all_items'						=> __( 'All Snippets', 'content-snippets' ),
			'search_items'				=> __( 'Search Snippets', 'content-snippets' ),
			'not_found'						=> __( 'No snippets found', 'content-snippets' ),
			'not_found_in_trash'	=> __( 'No snippets found in Trash', 'content-snippets' ),
		);

		$args = array(
			'labels' 							=> $labels,
			'public'							=> true,
			'exclude_from_search' => true,
			'show_in_nav_menus'		=> false,
			'show_in_admin_bar' 	=> false,
			'query_var'						=> true,
			'rewrite'							=> array( 'slug' => 'snippet' ),
			'capability_type' 		=> 'post',
			'menu_position'				=> 20,
			'supports'						=> array( 'title', 'editor' ),
		);

		register_post_type( 'snippet', $args );
	}

	/**
	 * Registers the content snippet widget
	 */
	public function register_widget() {
		register_widget( 'Content_Snippets_Widget' );
	}

}
