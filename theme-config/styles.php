<?php
/**
 * Enqueue styles.
 *
 * @since LIFT 2021
 *
 * @return void
 */
function lift_styles() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts, $lift_theme;

	// LAYOUT 
	$theme_value['theme_style'] = $lift_theme['lift-theme-global-style-theme'];

	// RTL styles.
	wp_style_add_data( 'lift-assets-style', 'rtl', 'replace' );

	// Styles.
	wp_enqueue_style(
		'lift-assets-core-style', 
		get_template_directory_uri() . '/dist/css/lift.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	wp_enqueue_style(
		'lift-assets-main-style', 
		get_template_directory_uri() . '/dist/css/main.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	// THEME SKIN
	if ( $theme_value['theme_style'] === 'modern' ) {
		wp_enqueue_style(
			'lift-assets-theme-modern-style', 
			get_template_directory_uri() . '/dist/css/theme-modern.css', 
			array(), 
			wp_get_theme()->get( 'Version' ), 'all' 
		);
	} else if ( $theme_value['theme_style'] === 'material' ) {
		wp_enqueue_style(
			'lift-assets-theme-material-style', 
			get_template_directory_uri() . '/dist/css/theme-material.css', 
			array(), 
			wp_get_theme()->get( 'Version' ), 'all' 
		);
	} else if ( $theme_value['theme_style'] === 'monokai' ) {
		wp_enqueue_style(
			'lift-assets-theme-monokai-style', 
			get_template_directory_uri() . '/dist/css/theme-monokai.css', 
			array(), 
			wp_get_theme()->get( 'Version' ), 'all' 
		);
	}
	wp_enqueue_style(
		'lift-assets-theme-style', 
		get_template_directory_uri() . '/dist/css/theme.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	wp_enqueue_style(
		'lift-assets-style-style', 
		get_template_directory_uri() . '/dist/css/style.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);

	// Print.
	wp_enqueue_style(
		'lift-assets-print-style', 
		get_template_directory_uri() . '/dist/css/print.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'print' 
	);

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lift_styles' , 999999 );

function lift_admin_styles() {
	// Styles.
	wp_enqueue_style(
		'lift-assets-icon-style', 
		get_template_directory_uri() . '/admin/css/bootstrap-icons.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	wp_enqueue_style(
		'lift-assets-main-style', 
		get_template_directory_uri() . '/admin/css/dist/admin.min.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	wp_enqueue_style(
		'lift-assets-prism-style', 
		get_template_directory_uri() . '/admin/css/prism.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
}

add_action( 'admin_enqueue_scripts', 'lift_admin_styles' );
