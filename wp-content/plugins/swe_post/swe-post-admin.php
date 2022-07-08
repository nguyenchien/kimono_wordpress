<?php
// Added by WarmStal
if(!is_admin())
return;

require_once (dirname(__FILE__).'/swe-post-options.php');

/**
 * Wrapper for the option 'swe_post_version'
 */
function swe_post_get_installed_version() {
	return get_option( 'swe_post_version' );
}

/**
 * Wrapper for the defined constant SWE_POST_CURRENT_VERSION
 */
function swe_post_get_current_version() {
	return SWE_POST_CURRENT_VERSION;
}

/**
 * Plugin upgrade
 */
add_action('admin_init','swe_post_plugin_upgrade');

function swe_post_plugin_upgrade() {
	$installed_version = swe_post_get_installed_version();

	if (empty($installed_version)) { // first install

		// Add capability to admin and editors

		// Get default roles
		$default_roles = array(
		3 => 'editor',
		8 => 'administrator',
		);

		// Cycle all roles and assign capability if its level >= swe_post_edit_user_level
		foreach ($default_roles as $level => $name){
			$role = get_role($name);
			if(!empty($role)) $role->add_cap( 'edit_posts' );
		}
		add_option('swe_post_show_row','1');
	} else if ( $installed_version==swe_post_get_current_version() ) { //re-install
		// do nothing
	}
	// Update version number
	update_option( 'swe_post_version', swe_post_get_current_version() );

}

if (get_option('swe_post_show_row') == 1){
	add_filter('post_row_actions', 'swe_post_make_link_row',10,2);
}

/**
 * Add the link to action list for post_row_actions
 */
function swe_post_make_link_row($actions, $post) {

	if (swe_post_is_current_user_allowed_to_edit()) {
        global $custom_post_type;
        if($custom_post_type['blog'] == get_post_type($post)){
            $showtoday = get_post_meta( $post->ID, 'showtoday', true );
            if(empty($showtoday) || $showtoday === 'yes'){
                $actions['showtoday_no'] = '<a href="'.swe_post_get_showtoday_post_link( $post->ID , 'display').'" title="'
                    . 'Don\'t show this in Today Customer'
                    . '">' .  'Hide Today' . '</a>';
            }else{
                $actions['showtoday_yes'] = '<a href="'.swe_post_get_showtoday_post_link( $post->ID , 'display').'" title="'
                    . 'Make this post show in Today Customer'
                    . '">' .  'Show Today' . '</a>';
            }
        }


	}
	return $actions;
}

/**
 * Connect actions to functions
 */
add_action('admin_action_swe_post_save_postmeta_showtoday', 'swe_post_save_postmeta_showtoday');
/*
 * This function calls the creation of a new copy of the selected post (by default preserving the original publish status)
 * then redirects to the post list
 */

function swe_post_save_postmeta_showtoday($status=''){

    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'swe_post_save_postmeta_showtoday' == $_REQUEST['action'] ) ) ) {
        wp_die('No post to show today has been supplied!');
    }


	// Get the original post
	$id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
	$post = get_post($id);

	// Copy the post and insert it
	if (isset($post) && $post!=null) {
        $showtoday = get_post_meta( $id, 'showtoday', true );
        if(empty($showtoday) || $showtoday === 'yes'){
            update_post_meta($id, 'showtoday', 'no', $showtoday);
        }else{
            update_post_meta($id, 'showtoday', 'yes', $showtoday);
        }

		if ($status == ''){
			// Redirect to the post list screen
			wp_redirect( admin_url( 'edit.php?post_type='.$post->post_type) );
		} else {
			// Redirect to the edit screen for the new draft post
			wp_redirect( admin_url( 'post.php?action=edit&post=' . $id ) );
		}
		exit;

	}

}
/**
 * Get the currently registered user
 */
function swe_post_get_current_user() {
	if (function_exists('wp_get_current_user')) {
		return wp_get_current_user();
	} else if (function_exists('get_currentuserinfo')) {
		global $userdata;
		get_currentuserinfo();
		return $userdata;
	} else {
		$user_login = $_COOKIE[USER_COOKIE];
		$sql = $wpdb->prepare("SELECT * FROM $wpdb->users WHERE user_login=%s", $user_login);
		$current_user = $wpdb->get_results($sql);			
		return $current_user;
	}
}

add_filter('manage_staff-blog_posts_columns' , 'add_blog_columns');
add_action( 'manage_posts_custom_column' , 'custom_columns', 10, 2 );
function add_blog_columns($columns) {
    return array_merge($columns,
        array('showtoday' => 'Show Today Customer'));
}
function custom_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'showtoday':
            $link_no = '<img  src="'.WP_HOME.'/images/icon_active_2.png" width="20"></a>';//disable
            $link_yes = '<img src="'.WP_HOME.'/images/icon_active_1.png" width="20"></a>';//enable
            $showtoday = get_post_meta( $post_id, 'showtoday', true );
            echo (empty($showtoday) || $showtoday==='yes') ? $link_yes : $link_no; // default yes
            break;
    }
}