<?php
/**
 *
 *
 * Created by PhpStorm.
 * Author: Eyeta Co.,Ltd.(http://www.eyeta.jp)
 * 
 */


function wpcf7c_load_textdomain( $locale = null ) {
	global $l10n;

	$domain = 'contact-form-7-add-confirm';

	if ( get_locale() == $locale ) {
		$locale = null;
	}

	if ( empty( $locale ) ) {
		if ( is_textdomain_loaded( $domain ) ) {
			return true;
		} else {
			return load_plugin_textdomain( $domain, false, $domain . '/languages' );
		}
	} else {
		$mo_orig = $l10n[$domain];
		unload_textdomain( $domain );

		$mofile = $domain . '-' . $locale . '.mo';
		$path = WP_PLUGIN_DIR . '/' . $domain . '/languages';

		if ( $loaded = load_textdomain( $domain, $path . '/'. $mofile ) ) {
			return $loaded;
		} else {
			$mofile = WP_LANG_DIR . '/plugins/' . $mofile;
			return load_textdomain( $domain, $mofile );
		}

		$l10n[$domain] = $mo_orig;
	}

	return false;
}


function wpcf7c_load_modules() {
	$dir = WPCF7C_PLUGIN_MODULES_DIR;

	if ( empty( $dir ) || ! is_dir( $dir ) ) {
		return false;
	}

	$mods = array(
		'confirm', 'back' );

	foreach ( $mods as $mod ) {
		$file = trailingslashit( $dir ) . $mod . '.php';

		if ( file_exists( $file ) ) {
			include_once $file;
		}
	}
}


function wpcf7c_plugin_url( $path = '' ) {
	$url = untrailingslashit( WPCF7C_PLUGIN_URL );

	if ( ! empty( $path ) && is_string( $path ) && false === strpos( $path, '..' ) )
		$url .= '/' . ltrim( $path, '/' );

	return $url;
}


function my_wpcf7_form_elements($html) {
	function ov3rfly_replace_include_blank($name, $text, &$html) {
		$matches = false;
		preg_match('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $html, $matches);
		if ($matches) {
			$select = str_replace('<option value="">---</option>', '<option value=""  selected="selected">' . $text . '</option>', $matches[0]);
			$html = preg_replace('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $select, $html);
		}
	}
	ov3rfly_replace_include_blank('drop-down-menu-shops', '店舗を選択してください', $html);
	return $html;
}
add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');