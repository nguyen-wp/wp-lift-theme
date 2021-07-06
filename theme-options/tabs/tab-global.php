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
                'title'    => __( 'Theme Skin', 'lift-theme-options' ),
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
                'title'    => __( 'Dark mode', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			
		),
    ) );
	Redux::setSection( $opt_name, array(
		'title' => __( 'Functionality', 'lift-theme-options' ),
        'id'         => 'lift-theme-global-function',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-global-function-backtotop',
                'type'     => 'switch',
                'title'    => __( 'Back to top', 'lift-theme-options' ),
                'subtitle' => __( 'Toggle whether or not to enable a back to top button on your pages.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-global-function-backtotop-mobile',
                'type'     => 'switch',
                'title'    => __( 'Keep Back To Top Button On Mobile', 'lift-theme-options' ),
                'subtitle' => __( 'Toggle whether or not to show or hide the back to top button when viewing on a mobile device.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			
		),
    ) );
