<?php
/**
* @package LIFT Creations 
* @subpackage Theme by Nguyen Pham
* https://baonguyenyam.github.io/cv
* @since 2021
*/

use ScssPhp\ScssPhp\Compiler;

add_action('redux/options/' . $opt_name . '/saved',  "lift_compiler_sass"  );
add_action('redux/options/' . $opt_name . '/saved',  "lift_save_css"  );
add_action('redux/options/' . $opt_name . '/saved',  "lift_save_js"  );
add_filter('redux/options/' . $opt_name . '/compiler', 'lift_compiler_css', 10, 3);

	if ( ! function_exists( 'lift_compiler_css' ) ) {
		function lift_compiler_css( $options, $css, $changed_values) {
			global $wp_filesystem;
			global $lift_theme;

			$filename = get_template_directory() . '/dist/css/export.css';
		
			if( empty( $wp_filesystem ) ) {
				require_once( ABSPATH .'/wp-admin/includes/file.php' );
				WP_Filesystem();
			}

			// OUTPUT
			$gen_css = '';

			// BACKTOTOP
			// if($options['lift-theme-global-function-backtotop-spacing']) {
			// 	$gen_css .= '#backtotop{right:'.$options['lift-theme-global-function-backtotop-spacing']['right'].';bottom:'.$options['lift-theme-global-function-backtotop-spacing']['bottom'].'}';
			// }
			

			$tmp = '/*!
* ╦  ╦╔═╗╔╦╗  ╔═╗┬─┐┌─┐┌─┐┌┬┐┬┌─┐┌┐┌┌─┐
* ║  ║╠╣  ║   ║  ├┬┘├┤ ├─┤ │ ││ ││││└─┐
* ╩═╝╩╚   ╩   ╚═╝┴└─└─┘┴ ┴ ┴ ┴└─┘┘└┘└─┘
* Coding by Nguyen Pham
* https://baonguyenyam.github.io
*/';
		
			if( $wp_filesystem ) {
				$wp_filesystem->put_contents(
					$filename,
					$tmp.$gen_css,
					FS_CHMOD_FILE // predefined mode settings for WP files
				);
			}
		}
	}

	if ( ! function_exists( 'lift_compiler_sass' ) ) {
		function lift_compiler_sass($values) {
			global $wp_filesystem;
			global $lift_theme;
		
			$filename = get_template_directory() . '/dist/css/style.css';

			if( empty( $wp_filesystem ) ) {
				require_once( ABSPATH .'/wp-admin/includes/file.php' );
				WP_Filesystem();
			}
		
			if( $wp_filesystem ) {

				$tmp = '/*!
* ╦  ╦╔═╗╔╦╗  ╔═╗┬─┐┌─┐┌─┐┌┬┐┬┌─┐┌┐┌┌─┐
* ║  ║╠╣  ║   ║  ├┬┘├┤ ├─┤ │ ││ ││││└─┐
* ╩═╝╩╚   ╩   ╚═╝┴└─└─┘┴ ┴ ┴ ┴└─┘┘└┘└─┘
* Coding by Nguyen Pham
* https://baonguyenyam.github.io
*/';

				$scss = new Compiler();
				$css = $scss->compileString($tmp.$lift_theme['lift-theme-cssjs-scss-code'])->getCss();
		
				$wp_filesystem->put_contents(
					$filename,
					$css,
					FS_CHMOD_FILE // predefined mode settings for WP files
				);
			}
		}
	}	

	if ( ! function_exists( 'lift_save_css' ) ) {
		function lift_save_css($values) {
			global $wp_filesystem;
			global $lift_theme;

			$filename = get_template_directory() . '/dist/css/theme.css';
		
			if( empty( $wp_filesystem ) ) {
				require_once( ABSPATH .'/wp-admin/includes/file.php' );
				WP_Filesystem();
			}

			$tmp = '/*!
* ╦  ╦╔═╗╔╦╗  ╔═╗┬─┐┌─┐┌─┐┌┬┐┬┌─┐┌┐┌┌─┐
* ║  ║╠╣  ║   ║  ├┬┘├┤ ├─┤ │ ││ ││││└─┐
* ╩═╝╩╚   ╩   ╚═╝┴└─└─┘┴ ┴ ┴ ┴└─┘┘└┘└─┘
* Coding by Nguyen Pham
* https://baonguyenyam.github.io
*/';
		
			if( $wp_filesystem ) {
				$css = $tmp.$lift_theme['lift-theme-cssjs-css-code'];
				$wp_filesystem->put_contents(
					$filename,
					$css,
					FS_CHMOD_FILE // predefined mode settings for WP files
				);
			}
		}
	}

	if ( ! function_exists( 'lift_save_js' ) ) {
		function lift_save_js($values) {
			global $wp_filesystem;
			global $lift_theme;

			$filename = get_template_directory() . '/dist/js/theme.js';
		
			if( empty( $wp_filesystem ) ) {
				require_once( ABSPATH .'/wp-admin/includes/file.php' );
				WP_Filesystem();
			}

			$tmp = '/*!
* ╦  ╦╔═╗╔╦╗  ╔═╗┬─┐┌─┐┌─┐┌┬┐┬┌─┐┌┐┌┌─┐
* ║  ║╠╣  ║   ║  ├┬┘├┤ ├─┤ │ ││ ││││└─┐
* ╩═╝╩╚   ╩   ╚═╝┴└─└─┘┴ ┴ ┴ ┴└─┘┘└┘└─┘
* Coding by Nguyen Pham
* https://baonguyenyam.github.io
*/';
		
			if( $wp_filesystem ) {
				$js = $tmp.$lift_theme['lift-theme-cssjs-js-code'];
				$wp_filesystem->put_contents(
					$filename,
					$js,
					FS_CHMOD_FILE // predefined mode settings for WP files
				);
			}
		}
	}

