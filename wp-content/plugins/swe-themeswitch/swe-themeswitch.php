<?php
/*
Plugin Name: SWE swe-themeswitch
Plugin URI: http://washinengine.com
Description: Auto switch theme base on UA
Version: 1.1.0
Author: Mines
Author URI: http://washinengine.com
*/

/*
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once( dirname(__FILE__) .'/Mobile_Detect.php');

function filter_switchTheme($theme)
{
	if (is_admin()) return $theme;

    $uri_home = preg_replace('/(http|https)\:\/\/'.$_SERVER['SERVER_NAME'].'/', '', WP_HOME);
    $uri_home = str_replace($uri_home.'', '', $_SERVER['REQUEST_URI']);
    $uri_home = substr ($uri_home, -1) ==='/' ? substr ($uri_home,0, -1) : $uri_home;

    if (preg_match('#(\/takuhai_old)#i', $uri_home)){
        $theme = 'takuhai';
    }
    else{
        $theme = 'twentytwelve';
    }
	return $theme;
}

function checkPageAndRedirect($page, $pageRedirect){	
	if(class_exists('Mobile_Detect')){
		$detect = new Mobile_Detect;
		if($detect->isMobile() || $detect->isTablet()){
			if(is_page($page)){				
				wp_redirect(get_page_link(get_page_by_path($pageRedirect)->ID));
				exit;
			}
		}	
	}	
	return false;
}
add_filter('template', 'filter_switchTheme');
add_filter('stylesheet', 'filter_switchTheme');

