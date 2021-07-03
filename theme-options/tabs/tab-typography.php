<?php

    // -> START Footer
    Redux::setSection( $opt_name, array(
        'title' => __( 'Typography', 'lift-theme-options' ),
        'id'    => 'lift-theme-typography',
        'icon'  => 'bi bi-type'
    ) );

	Redux::setSection( $opt_name, array(
        'title'      => __( 'Header', 'lift-theme-options' ),
        'id'         => 'lift-theme-typography-header',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-typography-header-menu',
                'type'     => 'typography',
				'title'    => __('Typography', 'lift-theme-options'),
				'google'      => true, 
				'font-backup' => true,
				'output'      => array('h2.site-description'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '33px', 
					'line-height' => '40'
				),
			),
		),
    ) );
	