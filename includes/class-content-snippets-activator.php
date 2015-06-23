<?php

/**
 * Fired during plugin activation
 *
 * @link       https://selenastrain.com
 * @since      1.0.0
 *
 * @package    Content_Snippets
 * @subpackage Content_Snippets/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Content_Snippets
 * @subpackage Content_Snippets/includes
 * @author     Selena Strain <s@selenastrain.com>
 */
class Content_Snippets_Activator {

	/**
	 * Calls the snippet_post_type function which registers the snippet post type.
	 * Runs flush_rewrite_rules to update .htaccess upon plugin activation.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		Content_Snippets_Admin::snippet_post_type();

		flush_rewrite_rules();
	}

}
