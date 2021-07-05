<?php
/**
* @package LIFT Creations 
* @subpackage Theme by Nguyen Pham
* https://baonguyenyam.github.io/cv
* @since 2021
*/

if ( file_exists( get_template_directory() . '/docs/info.html' ) ) {
	$liftHTML = '';
	Redux_Functions::initWpFilesystem();
	global $wp_filesystem;
	
	$liftHTML = $wp_filesystem->get_contents( get_template_directory() . '/docs/info.html' );

	$section = array(
		'title'      => __( 'Addons', 'lift-theme-options' ),
        'id'         => 'lift-theme-info',
		'icon'   => 'bi bi-box-seam',
		'fields'     => array(
            array(
                'id'       => 'lift-theme-info-details',
				'full_width' => true,
				'type'     => 'raw',
                'content'  => $liftHTML,
            )
        )
	);
	Redux::setSection( $opt_name, $section );

}

if ( file_exists( get_template_directory() . '/docs/README.md' ) ) {
	$section = array(
		'icon'   => 'bi bi-book',
		'title'  => __( 'Documentation', 'lift-theme-options' ),
		'fields' => array(
			array(
				'id'       => '17',
				'type'     => 'raw',
				'markdown' => true,
				'content_path' => get_template_directory() . '/docs/README.md', // FULL PATH, not relative please
				//'content' => 'Raw content here',
			),
		),
	);
	Redux::setSection( $opt_name, $section );
}


if ( file_exists( get_template_directory() . '/docs/CLASS.md' ) ) {
	$section = array(
		'title'  => __( 'Class name', 'lift-theme-options' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => '18',
				'type'     => 'raw',
				'markdown' => true,
				'content_path' => get_template_directory() . '/docs/CLASS.md', // FULL PATH, not relative please
				//'content' => 'Raw content here',
			),
		),
	);
	Redux::setSection( $opt_name, $section );
}

if ( file_exists( get_template_directory() . '/docs/DEVELOPER.md' ) ) {
	$section = array(
		'title'  => __( 'For developers', 'lift-theme-options' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'    => 'info_dev',
				'type'  => 'info',
				'title' => __('Sass Basics', 'lift-theme-options'),
				'style' => 'success',
				'icon' => 'bi bi-info',
				'desc'       => __( 'Did you know that LIFT sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <b>$lift_theme</b>', 'lift-theme-options' ),
			),
			array(
				'id'       => '19',
				'type'     => 'raw',
				'markdown' => true,
				'content_path' => get_template_directory() . '/docs/DEVELOPER.md', // FULL PATH, not relative please
				//'content' => 'Raw content here',
			),
		),
	);
	Redux::setSection( $opt_name, $section );
}
