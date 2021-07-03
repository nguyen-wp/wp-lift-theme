<?php

    // -> START Header
    Redux::setSection( $opt_name, array(
        'title' => __( 'Header', 'lift-theme-options' ),
        'id'    => 'lift-theme-header',
        'icon'  => 'bi bi-menu-button-wide'
    ) );

	Redux::setSection( $opt_name, array(
		'title'      => __( 'Header options', 'lift-theme-options' ),
		'id'         => 'lift-theme-header-options',
		'subsection' => true,
		'fields'     => array(
			array(
                'id'       => 'lift-theme-header-logo',
                'type'     => 'media', 
				'url'      => true,
				'output'   => array( '#header .site-branding' ),
                'title'    => __( 'Header Logo', 'lift-theme-options' ),
            ),
		)
	));

	Redux::setSection( $opt_name, array(
		'title'      => __( 'Header style', 'lift-theme-options' ),
		'id'         => 'lift-theme-header-style',
		'subsection' => true,
		'fields'     => array(
			array(
                'id'       => 'lift-theme-header-style-bg',
                'type'     => 'background',
				'output'   => array( '#header' ),
                'title'    => __( 'Header background', 'lift-theme-options' ),
                'subtitle' => __( 'Pick a header background for the theme (default: #000).', 'lift-theme-options' ),
                'default'  => '#000000',
				'preview_media' => true,
				'preview' => false,
				'class' => 'lift-theme-admin-header-style lift-theme-admin-header-style-bg',
            ),
			array(
                'id'       => 'lift-theme-header-style-border-top',
                'type'     => 'border',
                'title'    => __( 'Header Border Top', 'lift-theme-options' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'lift-theme-options' ),
				'output'    => array(
					'border-top'  => '#header'
				),
                'right'         => false,     
                'bottom'        => false,  
                'left'          => false,  
                'top'          => true,  
                'default'  => array(
                    'border-color'  => 'transparent',
                    'border-style'  => 'solid',
                    'border-top'    => '0px',
                ),
            ),
			array(
                'id'       => 'lift-theme-header-style-border-bottom',
                'type'     => 'border',
                'title'    => __( 'Header Border Bottom', 'lift-theme-options' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'lift-theme-options' ),
				'output'    => array(
					'border-bottom'  => '#header'
				),
                'right'         => false,     
                'top'        => false,     
                'left'          => false,  
                'bottom'          => true,  
                'default'  => array(
                    'border-color'  => 'transparent',
                    'border-style'  => 'solid',
                    'border-bottom'    => '0px',
                ),
            ),
			array(
                'id'       => 'lift-theme-header-style-color',
                'type'     => 'color_rgba',
				'output'    => array(
					'color'  => '#header'
				),
                'title'    => __( 'Header color', 'lift-theme-options' ),
                'subtitle' => __( 'Pick a header color for the theme (default: #000).', 'lift-theme-options' ),
                'default'  => '#000000',
            ),
			array(
                'id'       => 'lift-theme-header-style-link',
                'type'     => 'link_color',
				'output'    => array(
					'color'  => '#header a'
				),
				'title'    => __('Header links', 'lift-theme-options'),
				'subtitle' => __('Only color validation can be done on this field type', 'lift-theme-options'),
				'default'  => array(
					'regular'  => '#1e73be', // blue
					'hover'    => '#dd3333', // red
					'active'   => '#8224e3',  // purple
					'visited'  => '#8224e3',  // purple
				)
            ),
		)
	));

    