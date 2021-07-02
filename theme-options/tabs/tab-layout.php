<?php
    // -> START layout
    Redux::setSection( $opt_name, array(
        'title' => __( 'Layout', 'lift-theme-options' ),
        'id'    => 'layout',
        'icon'  => 'el el-list-alt'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Layout', 'lift-theme-options' ),
        'id'         => 'lift-theme-layout',
        'desc'       => __( 'For full documentation on this field, visit: ', 'lift-theme-options' ) . '<a href="//getbootstrap.com/docs/5.0/layout/containers/" target="_blank">getbootstrap.com/docs/5.0/layout/containers/</a>',
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
				'default'       => 1140,
				'max'           => 1320,
				'display_value' => 'text'
			),
		),
    ) );
