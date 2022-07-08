<?php
if(!defined('ABSPATH'))exit;

add_filter('qtranslate_load_admin_page_config','qwpseo_add_admin_page_config');
function qwpseo_add_admin_page_config($page_configs)
{
	{// for post.php
	$page_config = array();
	$page_config['pages'] = array( 'post.php' => '' );
	//$page_config['anchors'] = array( 'titlediv' );

	$page_config['forms'] = array();

	$f = array();
	$f['form'] = array( 'id' => 'post' );//identify the form which input fields described below belong to

	$f['fields'] = array();
	$fields = &$f['fields']; // shorthand

	$fields[] = array( 'id' => 'yoast_wpseo_title' );
	$fields[] = array( 'id' => 'yoast_wpseo_focuskw' );
	$fields[] = array( 'id' => 'yoast_wpseo_metadesc' );
	$fields[] = array( 'id' => 'yoast_wpseo_metakeywords' );
	$fields[] = array( 'id' => 'wpseosnippet_title', 'encode' => 'display' );

	$page_config['forms'][] = $f;
	$page_configs[] = $page_config;
	}
	
	
	{// for locations
	$page_config = array();
	$page_config['pages'] = array( 'edit-tags.php' => 'action=edit' );
//	$page_config['anchors'] = array( 'titlediv', 'loc_description' ); //id of elements, at front of which the Language Switching Buttons are placed
	$page_config['forms'] = array();
	$f = array();
	$f['form'] = array( 'id' => 'edittag' ); //identify the form which fields described below belong to
	$f['fields'] = array();
	$fields = &$f['fields']; // shortcut
	$fields[] = array( 'id' => 'wpseo_title' );
	$fields[] = array( 'id' => 'wpseo_desc' );
	$fields[] = array( 'id' => 'wpseo_metakey' );
	$fields[] = array( 'id' => 'wpseo_bctitle' );
	$page_config['forms'][] = $f;
	$page_configs[] = $page_config;
	}
	return $page_configs;
}
?>
