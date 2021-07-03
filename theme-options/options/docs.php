<?php



if ( file_exists( dirname( __DIR__ ) . '/info.html' ) ) {
	$liftHTML = '';
	Redux_Functions::initWpFilesystem();
	global $wp_filesystem;
	
	$liftHTML = $wp_filesystem->get_contents( dirname( __DIR__ ) . '/info.html' );

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

if ( file_exists( dirname( __DIR__ ) . '/README.md' ) ) {
	$section = array(
		'icon'   => 'bi bi-book',
		'title'  => __( 'Documentation', 'lift-theme-options' ),
		'fields' => array(
			array(
				'id'       => '17',
				'type'     => 'raw',
				'markdown' => true,
				'content_path' => dirname( __DIR__ ) . '/README.md', // FULL PATH, not relative please
				//'content' => 'Raw content here',
			),
		),
	);
	Redux::setSection( $opt_name, $section );
}
