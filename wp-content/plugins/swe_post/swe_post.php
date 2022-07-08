<?php
/*
 Plugin Name: SWE Post
 Plugin URI: http://washinengine.com/
 Description: Control post show in Today Customer
 Version: 2.6
 Author: Duyen Hoang
 Author URI: http://lopo.it
 Text Domain: swe_post
 */

// Version of the plugin
define('SWE_POST_CURRENT_VERSION', '1.0' );


add_filter("plugin_action_links_".plugin_basename(__FILE__), "swe_post_plugin_actions", 10, 4);

function swe_post_plugin_actions( $actions, $plugin_file, $plugin_data, $context ) {
    array_unshift($actions, "<a href=\"".menu_page_url('swepost', false)."\">".__("Settings")."</a>");
    return $actions;
}

require_once (dirname(__FILE__).'/swe-post-common.php');

if (is_admin()){
    require_once (dirname(__FILE__).'/swe-post-admin.php');
}
