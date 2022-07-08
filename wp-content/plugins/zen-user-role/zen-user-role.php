<?php

/*
 * Plugin Name: Zen User Role
 * Description: Add application's role to User
 * Version: 0.1
 * Author: Zen Dang
 *
 */

add_action ('set_user_role', "zen_add_application_user_role", 10, 2);

function zen_add_application_user_role($user_id, $role)
{
	global $wpdb;
	// Check user_id and role
	if (empty($user_id) OR empty($role)) {
		return;
	}
	// Get Application's Role corresponding with WP's Role
	$corres_role = $wpdb->get_row("SELECT ID FROM sec_roles WHERE LOWER(role_name) = '{$role}'");
	if (empty($corres_role)) {
		return;
	}
	// Add Application's Role for User
	$wpdb->replace(
		'sec_user_role',
		array(
			'user_id' => $user_id,
			'role_id' => $corres_role->ID
		),
		array(
			'%d',
			'%d'
		)
	);
}