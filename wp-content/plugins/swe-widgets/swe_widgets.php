<?php
/**
 * Plugin Name: Swe Widgets
 * Plugin URI: https://washinengine.com
 * Description: This plugin have all widgets of washinengine staff
 * Version: 1.0
 * Author: Duyen Hoang
 * Author URI: http://washinengine.com
 * License: GPL2
 * Text Domain: swe-widgets
 * Domain Path: /languages/
 */

class SWE_Widgets {
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'load' ) );
		add_action( 'widgets_init', array( $this, 'init' ) );
		register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );
	}

	public function load() {
		$dir = plugin_dir_path( __FILE__ );

		include_once( $dir . 'inc/widget-count-posts.php' );
	}

	public function init() {
		if ( ! is_blog_installed() ) {
			return;
		}

		load_plugin_textdomain( 'swe-widgets', false, 'swe-widgets/languages');

		register_widget( 'WE_Count_Posts' );

	}

	public function uninstall() {}
}

$swe_widgets = new SWE_Widgets();
