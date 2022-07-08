<?php

/**
 * Test if the user is allowed to edit posts
 */
function swe_post_is_current_user_allowed_to_edit() {
	return current_user_can('edit_posts');
}

/**
 * Wrapper for the option 'swe_post_create_user_level'
 */
function swe_post_get_edit_user_level() {
	return get_option( 'swe_post_edit_user_level' );
}

// Template tag
/**
 * Retrieve swe post link for post.
 *
 *
 * @param int $id Optional. Post ID.
 * @param string $context Optional, default to display. How to write the '&', defaults to '&amp;'.
 * @param string $draft Optional, default to true
 * @return string
 */
function swe_post_get_showtoday_post_link( $id = 0, $context = 'display') {

	if ( !swe_post_is_current_user_allowed_to_edit() )
	return;

	if ( !$post = get_post( $id ) )
	return;

	$action_name = "swe_post_save_postmeta_showtoday";

	if ( 'display' == $context )
	    $action = '?action='.$action_name.'&amp;post='.$post->ID;
	else
	    $action = '?action='.$action_name.'&post='.$post->ID;

	$post_type_object = get_post_type_object( $post->post_type );
	if ( !$post_type_object )
	return;

	return apply_filters( 'swe_post_get_showtoday_post_link', admin_url( "admin.php". $action ), $post->ID, $context );
}
/**
 * Display swe post link for post.
 *
 * @param string $link Optional. Anchor text.
 * @param string $before Optional. Display before edit link.
 * @param string $after Optional. Display after edit link.
 * @param int $id Optional. Post ID.
 */
function swe_post_showtoday_post_link( $link = null, $before = '', $after = '', $id = 0 ) {
	if ( !$post = get_post( $id ) )
	return;

	if ( !$url = swe_post_get_showtoday_post_link( $post->ID ) )
	return;

	if ( null === $link )
	$link = 'No today';

	$post_type_obj = get_post_type_object( $post->post_type );
	$link = '<a class="post-showtoday-link" href="' . $url . '" title="'
	. 'Show Today'
	.'">' . $link . '</a>';
	echo $before . apply_filters( 'swe_post_showtoday_post_link', $link, $post->ID ) . $after;
}