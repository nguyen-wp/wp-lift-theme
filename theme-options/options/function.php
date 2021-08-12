<?php
/**
* @package LIFT Creations 
* @subpackage Theme by Nguyen Pham
* https://baonguyenyam.github.io/cv
* @since 2021
*/

function get_lift_theme_options() {

	$legacy_options  = get_option( 'lift_theme' );
	$current_options = get_option( 'lift_theme_redux' );

	if ( ! empty( $current_options ) ) {
		return $current_options;
	} elseif ( ! empty( $legacy_options ) ) {
		return $legacy_options;
	} else {
		return $current_options;
	}
}

$lift_options = get_lift_theme_options();

// Theme Skin Toggle Class Name
function lift_theme_skin_body_class( $classes ) {

	$lift_options = get_lift_theme_options();
	// LAYOUT 
	$theme_style = $lift_options['lift-theme-global-style-theme'];
	$theme_dark_mode = $lift_options['lift-theme-global-style-theme-dark'];

	$classes[] = '';

	if ( $theme_style === 'modern' ) {
		$classes[] = 'lift-theme-modern';
	} else if ( $theme_style === 'material' ) {
		$classes[] = 'lift-theme-material';
	} else if ( $theme_style === 'monokai' ) {
		$classes[] = 'lift-theme-monokai';
	} else {
		$classes[] = 'lift-theme-default';
	}

	if ( $theme_dark_mode) {
		$classes[] = 'lift-theme-dark-mode';
	}

	return $classes;
}
add_filter( 'body_class', 'lift_theme_skin_body_class' );

// Remove Redux Menu 
function remove_redux_fw_submenu() {
    remove_submenu_page( 'tools.php', 'redux-about' );
}
add_action( 'admin_menu', 'remove_redux_fw_submenu', 999 );

// Add Menu URL Class
function __add_header_menu_item_class($atts) {
	$atts['class'] = "nav-link";
	return $atts;
}
add_filter('nav_menu_link_attributes', '__add_header_menu_item_class');

// Add Bootstrap 
function lift_custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
	if ( $tag == 'vc_row' || $tag == 'vc_row_inner' ) {
		//   $class_string = str_replace( 'vc_row-fluid', 'my_row-fluid', $class_string ); 
		$class_string = str_replace( 'vc_row', 'row', $class_string ); 
	}
	// var_dump($class_string);
	// if ( $class_string == 'row wpb_row vc_inner row-fluid' ) {
	// 	$class_string = str_replace( $class_string, 'row wpb_row vc_inner row-fluid container', $class_string ); 
	// }
	if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
		// $class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'my_col-sm-$1', $class_string );
		$class_string = preg_replace( '/vc_column_container/', '', $class_string );
		$class_string = preg_replace( '/vc_col-(xs|sm|md|lg|xl|xxl)-(\d{1,2})/', 'col-$1-$2', $class_string );
		$class_string = preg_replace( '/vc_col-(xs|sm|md|lg|xl|xxl)-offset-(\d{1,2})/', 'offset-$1-$2', $class_string );
	}
	return $class_string; 
}
add_filter( 'vc_shortcodes_css_class', 'lift_custom_css_classes_for_vc_row_and_vc_column', 10, 2 );


// Check License
function _____LIFTcheckLicense() {

	$lift_options = get_lift_theme_options();

	$lift_license['domain'] = $lift_options['lift-theme-license-code-domain'];
	$lift_license['email'] = $lift_options['lift-theme-license-code-email'];
	$lift_license['package'] = $lift_options['lift-theme-license-code-package'];
	$lift_license['key'] = $lift_options['lift-theme-license-code-key'];
	$lift_license['license'] = $lift_options['lift-theme-license-code-license'];
	$password = trim($lift_license['key'].$lift_license['domain'].$lift_license['email'].$lift_license['package']);
	$LicenseVerify = true;
	if (!password_verify($password, $lift_license['license'])) {
		$LicenseVerify = false;
	} else {
		if($lift_license['domain'] !== $_SERVER['SERVER_NAME']) {
			$LicenseVerify = false;
		} else {
			date_default_timezone_set('America/Chicago'); 
			$time1 = strtotime($lift_license['package']);
			$time2 = strtotime(date('m/d/Y'));
			if($time1<$time2){
				$LicenseVerify = false;
			}
		}
	}
	if(!$LicenseVerify){
		echo '<div class="wrap"><div style="margin: 1rem 0; display: block; background: #ffcfcf; border: 1px solid #d28585; padding: 1rem; border-radius: 5px;">Your license is expired. Please renew the license to get the latest update of LIFT Theme. In order to receive all benefits of LIFT Theme, you need to activate your copy of the plugin. By activating LIFT Theme license you will unlock premium options - direct plugin updates, access to template library and official support. Don\'t have direct license yet? <a href="//liftcreations.com" target="_blank">Purchase LIFT Theme license.</a></div></div>';
	}

}
add_action( 'admin_notices', '_____LIFTcheckLicense' );



