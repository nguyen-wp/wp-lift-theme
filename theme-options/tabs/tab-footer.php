<?php

    // -> START Footer
    Redux::setSection( $opt_name, array(
        'title' => __( 'Footer', 'lift-theme-options' ),
        'id'    => 'lift-theme-footer',
        'icon'  => 'el el-list-alt'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer row', 'lift-theme-options' ),
        'id'         => 'lift-theme-footer-row',
        // 'desc'       => __( 'For full documentation on this field, visit: ', 'lift-theme-options' ) . '<a href="//docs.reduxframework.com/core/fields/image-select/" target="_blank">docs.reduxframework.com/core/fields/image-select/</a>',
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
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
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
        // 'desc'       => __( 'For full documentation on this field, visit: ', 'lift-theme-options' ) . '<a href="//docs.reduxframework.com/core/fields/image-select/" target="_blank">docs.reduxframework.com/core/fields/image-select/</a>',
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
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    '3' => array(
                        'alt' => '3 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                    '4' => array(
                        'alt' => '4 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/3cm.png'
                    ),
                    '5' => array(
                        'alt' => '5 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/3cl.png'
                    ),
                    '6' => array(
                        'alt' => '6 Columns',
                        'img' => ReduxFramework::$_url . 'assets/img/3cr.png'
                    )
                ),
                'default'  => '4'
            ),

			array(
				'id'       => 'lift-theme-footer-columns-gutters',
                'title'    => __( 'Footer columns gutters', 'lift-theme-options' ),
				'type'          => 'slider',
				'min'           => 0,
				'step'          => 1,
				'default'       => 3,
				'max'           => 5,
				'display_value' => 'text'
			),
			

        )
    ) );
