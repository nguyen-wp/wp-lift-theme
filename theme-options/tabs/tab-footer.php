<?php

    // -> START Footer
    Redux::setSection( $opt_name, array(
        'title' => __( 'Footer', 'lift-theme-options' ),
        'id'    => 'lift-theme-footer',
        'icon'  => 'bi bi-layout-three-columns'
    ) );

	Redux::setSection( $opt_name, array(
		'title'      => __( 'Footer style', 'lift-theme-options' ),
		'id'         => 'lift-theme-footer-style',
		'subsection' => true,
		'fields'     => array(
			array(
                'id'       => 'lift-theme-footer-style-bg',
                'type'     => 'background',
				'output'   => array( '#footer' ),
                'title'    => __( 'Footer background', 'lift-theme-options' ),
                'subtitle' => __( 'Pick a footer background for the theme (default: #000).', 'lift-theme-options' ),
                'default'  => '#000000',
				'preview_media' => true,
				'preview' => false,
				'class' => 'lift-theme-admin-footer-style lift-theme-admin-footer-style-bg',
            ),
			array(
                'id'       => 'lift-theme-footer-style-border',
                'type'     => 'border',
                'title'    => __( 'Footer Border Option', 'lift-theme-options' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'lift-theme-options' ),
				'output'    => array(
					'border-top'  => '#footer'
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
                'id'       => 'lift-theme-footer-style-color',
                'type'     => 'color_rgba',
				'output'    => array(
					'color'  => '#footer'
				),
				// 'compiler' => array(
				// 	'color'  => '#footer'
				// ),
                'title'    => __( 'Footer color', 'lift-theme-options' ),
                'subtitle' => __( 'Pick a footer color for the theme (default: #000).', 'lift-theme-options' ),
                'default'  => '#000000',
            ),
			array(
                'id'       => 'lift-theme-footer-style-link',
                'type'     => 'link_color',
				'output'    => array(
					'color'  => '#footer a'
				),
				'title'    => __('Footer links', 'lift-theme-options'),
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

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer row', 'lift-theme-options' ),
        'id'         => 'lift-theme-footer-row',
        'desc'       => __( 'For full documentation on this field, visit: ', 'lift-theme-options' ) . '<a href="//getbootstrap.com/docs/5.0/layout/gutters/" target="_blank">getbootstrap.com/docs/5.0/layout/gutters/</a>',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-footer-row-option',
                'type'     => 'switch',
                'title'    => __( 'Row padding', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-footer-row-spacing',
				'required' => array( 'lift-theme-footer-row-option', '=', '1' ),
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'rem', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                'title'          => __( 'Padding Option', 'lift-theme-options' ),
                'subtitle'       => __( 'Allow your users to choose the spacing or margin they want.', 'lift-theme-options' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'lift-theme-options' ),
                'default'        => array(
                    'margin-top'    => '1px',
                    'margin-right'  => '2px',
                    'margin-bottom' => '3px',
                    'margin-left'   => '4px'
                )
            ),
		)
	));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer columns', 'lift-theme-options' ),
        'id'         => 'lift-theme-footer-column',
        'desc'       => __( 'For full documentation on this field, visit: ', 'lift-theme-options' ) . '<a href="//getbootstrap.com/docs/5.0/layout/columns/" target="_blank">getbootstrap.com/docs/5.0/layout/columns/</a>',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'lift-theme-footer-columns',
                'type'     => 'image_select',
                'title'    => __( 'Footer columns', 'lift-theme-options' ),
                'subtitle' => __( 'How many columns du you need?', 'lift-theme-options' ),
                'desc'     => __( 'Number of columns', 'lift-theme-options' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '2' => array(
                        'alt' => '2 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '3' => array(
                        'alt' => '3 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '4' => array(
                        'alt' => '4 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '5' => array(
                        'alt' => '5 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '6' => array(
                        'alt' => '6 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
					),
					'7' => array(
                        'alt' => '7 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '8' => array(
                        'alt' => '8 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '9' => array(
                        'alt' => '9 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '10' => array(
                        'alt' => '10 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '11' => array(
                        'alt' => '11 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '12' => array(
                        'alt' => '12 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    )
                ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-img',
				'default'  => '4'
            ),
			array(
				'id'       => 'lift-theme-footer-columns-gutters',
                'title'    => __( 'Footer columns gutters', 'lift-theme-options' ),
				'desc'       => __( 'Set -1 for default gutters', 'lift-theme-options' ),
				'type'          => 'slider',
				'min'           => -1,
				'step'          => 1,
				'default'       => 3,
				'max'           => 5,
				'display_value' => 'text',
				'default'  => '-1'
			),
			array(
				'id'       => 'lift-theme-footer-columns-1',
				'type'     => 'text',
				'title'    => __( 'Column 1', 'lift-theme-options' ),
				'subtitle' => __( 'Class name', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-1',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-2',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '2' ),
				'title'    => __( 'Column 2', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-2',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-3',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '3' ),
				'title'    => __( 'Column 3', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-3',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-4',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '4' ),
				'title'    => __( 'Column 4', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-4',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-5',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '5' ),
				'title'    => __( 'Column 5', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-5',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-6',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '6' ),
				'title'    => __( 'Column 6', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-6',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-7',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '7' ),
				'title'    => __( 'Column 7', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-7',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-8',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '8' ),
				'title'    => __( 'Column 8', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-8',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-9',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '9' ),
				'title'    => __( 'Column 9', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-9',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-10',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '10' ),
				'title'    => __( 'Column 10', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-10',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-11',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '11' ),
				'title'    => __( 'Column 11', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-11',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),
			array(
				'id'       => 'lift-theme-footer-columns-12',
				'type'     => 'text',
				'required' => array( 'lift-theme-footer-columns', '>=', '12' ),
				'title'    => __( 'Column 12', 'lift-theme-options' ),
				'class' => 'lift-theme-admin-footer-column lift-theme-admin-footer-column-12',
				'default'  => 'col-sm-6 col-md-4 col-lg-3'
			),

        ),

		
	));
	
	