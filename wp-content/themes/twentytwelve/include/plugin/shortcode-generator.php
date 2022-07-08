<?php		
	// shortcode for tab
	$swe_tab_array = array();
	add_shortcode('tab', 'swe_tab_shortcode');
	function swe_tab_shortcode( $atts, $content = null ){
		global $swe_tab_array;
		$swe_tab_array = array();
		
		do_shortcode($content);
		
		$num = sizeOf($swe_tab_array);
		$tab = '<div class="swe-tab clearfix">';
		
		// tab title
		$tab = $tab . '<ul class="swe-tab-title">';
		for($i=0; $i<$num; $i++){
			$active = ( $i == 0 )? 'class="active" ' : '';
		
//			$tab = $tab . '<li><a data-tab="tab-' . $i  . '" ' . $active;
			$tab = $tab . '<li><a href="#tab-' . ($i+1)  . '" ' . $active;
			$tab = $tab . '>' . $swe_tab_array[$i]["title"] . '</a></li>';
		}				
		$tab = $tab . '</ul>';
		
		// tab content
//		$tab = $tab . '<div class="clear"></div>';
		$tab = $tab . '<ul class="swe-tab-content">';
		for($i=0; $i<$num; $i++){
			$active = ( $i == 0 )? 'class="active" ' : '';

//			$tab = $tab . '<li data-tab="tab-' . $i . '" ' . $active;
			$tab = $tab . '<li id="tab-' . ($i+1) . '" ' . $active;
			$tab = $tab . '>' . $swe_tab_array[$i]["content"] . '</li>';
		}
		$tab = $tab . "</ul>"; // swe-tab-content
		
		$tab = $tab . "</div>"; // swe-tab

		return $tab;
	}
	add_shortcode('tab_item', 'swe_tab_item_shortcode');
	function swe_tab_item_shortcode( $atts, $content = null ){
		extract( shortcode_atts(array("title" => ''), $atts) );
		
		global $swe_tab_array;

		$swe_tab_array[] = array("title" => $title , "content" => do_shortcode($content));
	}	
	
	// shortcode for toggle box
	add_shortcode('toggle_box', 'swe_toggle_box_shortcode');
	function swe_toggle_box_shortcode( $atts, $content = null ){
		$toggle_box = "<ul class='swe-toggle-box'>";
		$toggle_box = $toggle_box . do_shortcode($content);
		$toggle_box = $toggle_box . "</ul>";
		return $toggle_box;
	}
	add_shortcode('toggle_item', 'swe_toggle_item_shortcode');
	function swe_toggle_item_shortcode( $atts, $content = null ){
		extract( shortcode_atts(array("title" => '', "active" => 'false'), $atts) );
		
		$active = ( $active == "true" )? " active": '';
		$toggle_item = "<li class='" . $active . "'>";
		$toggle_item = $toggle_item . "<h3 class='toggle-box-title'><span class='toggle-box-icon'></span>" . $title . "</h3>";
		$toggle_item = $toggle_item . "<div class='toggle-box-content'>" . do_shortcode($content) . "</div>";
		$toggle_item = $toggle_item . "</li>";

		return $toggle_item;
	}	
	
	// Add button to visual editor
	add_action('init', 'add_shortcode_button');
	function add_shortcode_button(){
	
		if ( current_user_can('edit_posts') ||  current_user_can('edit_pages') ){  
			 add_filter('mce_external_plugins', 'add_shortcode_plugin');  
			 add_filter('mce_buttons_3', 'register_shortcode_button');  
		   }  	
	
	}
	function register_shortcode_button($buttons){		
		array_push($buttons, "tab", "toggle_box", "column_content", 'course_content');		
		return $buttons;
	}
	function add_shortcode_plugin($plugin_array) {  	   
	   $plugin_array['tab'] = SWE_PATH . '/include/js/shortcode/tab.js';  	
	   $plugin_array['toggle_box'] = SWE_PATH . '/include/js/shortcode/toggle-box.js';  
	   $plugin_array['column_content'] = SWE_PATH . '/include/js/shortcode/column-content.js';  
	   $plugin_array['course_content'] = SWE_PATH . '/include/js/shortcode/course-content.js';  
	   return $plugin_array;  
	}
	
	function fix_shortcodes($content){   
		global $shortcode_tags;
	 
		// Backup current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		remove_all_shortcodes();
				
		add_shortcode('tab', 'swe_tab_shortcode');
		add_shortcode('tab_item', 'swe_tab_item_shortcode');
		
		add_shortcode('toggle_box', 'swe_toggle_box_shortcode');
		add_shortcode('toggle_item', 'swe_toggle_item_shortcode');
			 
		// Do the shortcode (only the one above is registered)
		$content = do_shortcode( $content );
	 
		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;
 
	    return $content;
    }
    add_filter('the_content', 'fix_shortcodes', 7);
	
?>