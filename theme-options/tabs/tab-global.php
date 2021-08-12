<?php
    /**
* @package LIFT Creations 
* @subpackage Theme by Nguyen Pham
* https://baonguyenyam.github.io/cv
* @since 2021
*/

// -> START layout
    Redux::setSection( $opt_name, array(
        'title' => __( 'Global configuration', 'lift-theme-options' ),
        'icon'  => 'bi bi-sliders',
        'id'         => 'lift-theme-global',
	));
	Redux::setSection( $opt_name, array(
		'title' => __( 'Styling', 'lift-theme-options' ),
        'id'         => 'lift-theme-global-style',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-global-style-theme',
                'type'     => 'select',
                'title'    => __( 'Theme Skin <i style="color:red">(*)</i>', 'lift-theme-options' ),
                'subtitle' => __( 'This will alter the overall styling of various theme elements', 'lift-theme-options' ),
                'options'  => array(
					'default'       => 'Default', 
					'modern'       => 'Modern', 
					'material'       => 'Material', 
					'monokai'       => 'Monokai', 
				),
				'default'         => 'default'
            ),
			array(
				'id'       => 'lift-theme-global-style-theme-dark',
                'type'     => 'switch',
                'title'    => __( 'Dark mode <i style="color:red">(*)</i>', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
            array(
				'id'       => 'lift-theme-global-style-theme-scrollbar',
                'type'     => 'switch',
                'title'    => __( 'Scrollbar Style', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
            // TODO: Add more option scrollbar here
		),
    ) );

	Redux::setSection( $opt_name, array(
		'title' => __( 'Functionality', 'lift-theme-options' ),
        'id'         => 'lift-theme-global-function',
        'desc'       => __( 'For full documentation on this field, visit: ', 'lift-theme-options' ) . '<a href="//getbootstrap.com/docs/5.0/layout/breakpoints/" target="_blank">getbootstrap.com/docs/5.0/layout/breakpoints/</a>',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-global-function-backtotop',
                'type'     => 'switch',
                'title'    => __( 'Back to top', 'lift-theme-options' ),
                'subtitle' => __( 'Toggle whether or not to enable a back to top button when viewing on a PC device. (≥1200px)', 'lift-theme-options' ),
                'default'  => 1,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-global-function-backtotop-smallpc',
                'required' => array( 'lift-theme-global-function-backtotop', '=', '1' ),
                'type'     => 'switch',
                'title'    => __( 'Keep Back To Top Button On Small PC', 'lift-theme-options' ),
                'subtitle' => __( 'Toggle whether or not to show or hide the back to top button when viewing on a small PC device. (≥992px)', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-global-function-backtotop-tablet',
                'required' => array( 'lift-theme-global-function-backtotop-smallpc', '=', '1' ),
                'type'     => 'switch',
                'title'    => __( 'Keep Back To Top Button On Tablet', 'lift-theme-options' ),
                'subtitle' => __( 'Toggle whether or not to show or hide the back to top button when viewing on a tablet device. (≥768px)', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-global-function-backtotop-phalet',
                'required' => array( 'lift-theme-global-function-backtotop-tablet', '=', '1' ),
                'type'     => 'switch',
                'title'    => __( 'Keep Back To Top Button On Phalet', 'lift-theme-options' ),
                'subtitle' => __( 'Toggle whether or not to show or hide the back to top button when viewing on a phalet device (≥576px).', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-global-function-backtotop-mobile',
                'required' => array( 'lift-theme-global-function-backtotop-phalet', '=', '1' ),
                'type'     => 'switch',
                'title'    => __( 'Keep Back To Top Button On Mobile', 'lift-theme-options' ),
                'subtitle' => __( 'Toggle whether or not to show or hide the back to top button when viewing on a mobile device. (<576px)', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-global-function-backtotop-spacing',
				'required' => array( 'lift-theme-global-function-backtotop', '=', '1' ),
                'type'           => 'spacing',
                'mode'           => 'absolute',
                'all'            => false,
                'bottom'            => true,
                'right'            => true,
				'top'            => false,
                'left'            => false,
				// 'compiler' => true,
                'units'          => array( 'em', 'rem', 'px', '%' ),      
                'units_extended' => 'true',    
                'title'          => __( 'Back To Top Button Position', 'lift-theme-options' ),
                'subtitle'       => __( 'Allow your users to choose the position they want.', 'lift-theme-options' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Right, Bottom, or Units.', 'lift-theme-options' ),
                'default'        => array(
                    'bottom'    => '2em',
                    'right'  => '2em',
                    'units'     => 'em'
                )
            ),
			
			
			
		),
    ) );


    Redux::setSection( $opt_name, array(
		'title' => __( 'Develop Tool', 'lift-theme-options' ),
        'id'         => 'lift-theme-global-dev',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-global-dev-toolbar',
                'type'     => 'switch',
                'title'    => __( 'FrontEnd Admin Toolbar', 'lift-theme-options' ),
                'default'  => 1,
                'on'       => 'On',
                'off'      => 'Off',
            ),
            array(
				'id'       => 'lift-theme-global-dev-toogle-tag',
                'type'     => 'switch',
                'title'    => __( 'FrontEnd Tag Viewer', 'lift-theme-options' ),
                'default'  => 1,
                'on'       => 'On',
                'off'      => 'Off',
            ),
		),
    ) );
