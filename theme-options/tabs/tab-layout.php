<?php
    /**
* @package LIFT Creations 
* @subpackage Theme by Nguyen Pham
* https://baonguyenyam.github.io/cv
* @since 2021
*/

	// -> START layout
	Redux::setSection( $opt_name, array(
		'title' => __( 'Layout', 'lift-theme-options' ),
		'id'    => 'lift-theme-layout',
		'desc'       => __( 'For full documentation on this field, visit: ', 'lift-theme-options' ) . '<a href="//getbootstrap.com/docs/5.0/layout/containers/" target="_blank">getbootstrap.com/docs/5.0/layout/containers/</a>',
		'icon'  => 'bi bi-columns'
	) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Layout content', 'lift-theme-options' ),
        'id'         => 'lift-theme-layout-init',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-layout-style',
                'type'     => 'switch',
                'title'    => __( 'Containers', 'lift-theme-options' ),
                'subtitle' => __( 'Containers are a fundamental building block of Bootstrap that contain, pad, and align your content within a given device or viewport.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'Fullwidth',
                'off'      => 'Boxed',
            ),
			array(
				'id'       => 'lift-theme-layout-size',
                'type'     => 'switch',
                'required' => array( 'lift-theme-layout-style', '=', '1' ),
                'title'    => __( 'Max width container', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-layout-size-value',
				'type'          => 'slider',
                'required' => array( 'lift-theme-layout-size', '=', '1' ),
				'title'         => __( 'Bootstrap comes with three different containers', 'lift-theme-options' ),
				'min'           => 960,
				'step'          => 20,
				'default'       => 1320,
				'max'           => 1820,
				'display_value' => 'text'
			),
		),
    ) );


	Redux::setSection( $opt_name, array(
        'title'      => __( 'Content padding', 'lift-theme-options' ),
        'id'         => 'lift-theme-layout-row',
        'desc'       => __( 'For full documentation on this field, visit: ', 'lift-theme-options' ) . '<a href="//getbootstrap.com/docs/5.0/layout/gutters/" target="_blank">getbootstrap.com/docs/5.0/layout/gutters/</a>',
        'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'lift-theme-layout-content-option',
                'type'     => 'switch',
                'title'    => __( 'Content padding', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-layout-content-spacing',
				'required' => array( 'lift-theme-layout-content-option', '=', '1' ),
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'rem', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                'default'        => array(
                    'units'     => 'em'
                )
            ),
			array(
				'id'       => 'lift-theme-layout-row-option',
                'type'     => 'switch',
                'title'    => __( 'Row padding', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
                'subtitle'       => __( 'This one apply for &lt;section&gt; tag only', 'lift-theme-options' ),
            ),
			array(
				'id'       => 'lift-theme-layout-row-spacing',
				'required' => array( 'lift-theme-layout-row-option', '=', '1' ),
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'rem', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                'default'        => array(
                    'units'     => 'em',
                )
            ),
		)
	));


	Redux::setSection( $opt_name, array(
		'title'      => __( 'Layout style', 'lift-theme-options' ),
		'id'         => 'lift-theme-layout-style',
		'subsection' => true,
		'fields'     => array(
			array(
                'id'       => 'lift-theme-layout-style-bg',
                'type'     => 'background',
				'output'   => array( '#content' ),
                'title'    => __( 'Layout background', 'lift-theme-options' ),
                'subtitle' => __( 'Pick a layout background for the theme (default: #000).', 'lift-theme-options' ),
                'default'  => '#000000',
				'preview_media' => true,
				'preview' => false,
				'class' => 'lift-theme-admin-layout-style lift-theme-admin-layout-style-bg',
            ),
			array(
                'id'       => 'lift-theme-layout-style-border',
                'type'     => 'border',
                'title'    => __( 'Layout Border Option', 'lift-theme-options' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'lift-theme-options' ),
				'output'    => array(
					'border-top'  => '#content'
				),
                'right'         => false,     // Disable the right
                'bottom'        => false,     // Disable the bottom
                'left'          => false,     // Disable the left
                'default'  => array(
                    'border-color'  => 'transparent',
                    'border-style'  => 'solid',
                    'border-top'    => '0px',
                ),
            ),
			array(
                'id'       => 'lift-theme-layout-style-color',
                'type'     => 'color_rgba',
				'output'    => array(
					'color'  => '#content'
				),
				// 'compiler' => array(
				// 	'color'  => '#content'
				// ),
                'title'    => __( 'Layout color', 'lift-theme-options' ),
                'subtitle' => __( 'Pick a layout color for the theme (default: #000).', 'lift-theme-options' ),
                'default'  => '#000000',
            ),
			array(
                'id'       => 'lift-theme-layout-style-link',
                'type'     => 'link_color',
				'output'    => array(
					'color'  => '#content a'
				),
				'title'    => __('Layout links', 'lift-theme-options'),
				'subtitle' => __('Only color validation can be done on this field type', 'lift-theme-options'),
				'default'  => array(
					'regular'  => '#007bff', // blue
					'hover'    => '#dd3333', // red
					'active'   => '#8224e3',  // purple
					'visited'  => '#8224e3',  // purple
				)
            ),
		)
	));
