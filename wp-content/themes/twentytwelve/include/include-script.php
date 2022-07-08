<?php

	/*	
	*	Goodlayers Include Script File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		Goodlayers
	* 	@link		http://goodlayers.com
	* 	@copyright	Copyright (c) Goodlayers
	*	---------------------------------------------------------------------
	*	This file manage to embed the stylesheet and javascript to each page
	*	based on the content of that page.
	*	---------------------------------------------------------------------
	*/
	
	add_action('init', 'register_all_swe_scripts');
	function register_all_swe_scripts(){
	
//		wp_enqueue_script('jquery');
		
		// all other style			
		add_action('wp_print_scripts','register_non_admin_scripts');
		
	}
	
	/* 	---------------------------------------------------------------------
	*	this section include the front-end script
	*	---------------------------------------------------------------------
	*/ 
	
	
	// Register all scripts
	function register_non_admin_scripts(){
	
		global $post;		

		wp_deregister_script('swe-scripts');
		wp_register_script('swe-scripts', SWE_PATH.'/js/swe-scripts.js', false, '1.0', true);
		wp_enqueue_script('swe-scripts');
		
//		wp_deregister_script('swe-scripts-common');
//		wp_register_script('swe-scripts-common', '/wp-content/themes/themes_common/js/swe-scripts-common.js', false, '1.0', true);
//		wp_enqueue_script('swe-scripts-common');

	}
?>