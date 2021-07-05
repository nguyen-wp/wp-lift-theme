<?php
/**
 * Enqueue scripts.
 *
 * @since LIFT 2021
 *
 * @return void
 */
function lift_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	
	// Responsive embeds script.
	wp_enqueue_script(
		'lift-assets-core-script',
		get_template_directory_uri() . '/dist/js/lift.js',
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_enqueue_script(
		'lift-assets-main-script',
		get_template_directory_uri() . '/dist/js/main.js',
		wp_get_theme()->get( 'Version' ),
		true,
		true
	);
	wp_enqueue_script(
		'lift-assets-theme-script',
		get_template_directory_uri() . '/dist/js/theme.js',
		wp_get_theme()->get( 'Version' ),
		true,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'lift_scripts' );


function lift_admin_scripts() {

	wp_enqueue_script(
		'lift-admin-main-script',
		get_template_directory_uri() . '/admin/js/dist/admin.prod.js',
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_enqueue_script(
		'lift-admin-prism-script',
		get_template_directory_uri() . '/admin/js/prism.js',
		wp_get_theme()->get( 'Version' ),
		true
	);
}

add_action( 'admin_enqueue_scripts', 'lift_admin_scripts' );
