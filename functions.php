<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

require plugin_dir_path( __FILE__ ) . 'lift_redux_frame.php';
require plugin_dir_path( __FILE__ ) . 'theme-config/setup.php';
require plugin_dir_path( __FILE__ ) . 'theme-config/sidebar.php';
require plugin_dir_path( __FILE__ ) . 'theme-config/scripts.php';
require plugin_dir_path( __FILE__ ) . 'theme-config/styles.php';
require plugin_dir_path( __FILE__ ) . 'theme-config/non-latin-language.php';
require plugin_dir_path( __FILE__ ) . 'theme-config/content-width.php';
require plugin_dir_path( __FILE__ ) . 'theme-config/customize-tab.php';

// SVG Icons class.
require get_template_directory() . '/classes/class-nguyen-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-nguyen-custom-colors.php';
new LIFT_Theme_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-nguyen-customize.php';
new LIFT_Theme_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

