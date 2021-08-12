<?php
/**
* @package LIFT Creations 
* @subpackage Theme by Nguyen Pham
* https://baonguyenyam.github.io/cv
* @since 2021
*/

    // -> START Social
		
	Redux::setSection( $opt_name, array(
		'title' => __( 'Social media', 'lift-theme-options' ),
		'id'         => 'lift-theme-social-media',
		'desc'       => __( 'Enter in your social media locations here and then activate which ones you would like to display in your footer options & header options tabs. Remember to include the "http://" in all URLs!', 'lift-theme-options' ),
		'icon'  => 'bi bi-bullseye',
		'class' => 'lift-theme-admin-social-media',
		'subsection' => false,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-social-media-enable',
                'type'     => 'switch',
                'title'    => __( 'Enable/Disable <i style="color:red">(*)</i>', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
			array(
				'id'       => 'lift-theme-social-media-facebook',
                'type'     => 'text',
				'title'    => __('Facebook URL', 'lift-theme-options'),
                'required' => array( 'lift-theme-social-media-enable', '=', '1' ),
				'default'  => "",
			),
			array(
				'id'       => 'lift-theme-social-media-twitter',
                'type'     => 'text',
				'title'    => __('Twitter URL', 'lift-theme-options'),
                'required' => array( 'lift-theme-social-media-enable', '=', '1' ),
				'default'  => "",
			),
			array(
				'id'       => 'lift-theme-social-media-vimeo',
                'type'     => 'text',
				'title'    => __('Vimeo URL', 'lift-theme-options'),
                'required' => array( 'lift-theme-social-media-enable', '=', '1' ),
				'default'  => "",
			),
			array(
				'id'       => 'lift-theme-social-media-youtube',
                'type'     => 'text',
				'title'    => __('Youtube URL', 'lift-theme-options'),
                'required' => array( 'lift-theme-social-media-enable', '=', '1' ),
				'default'  => "",
			),
			array(
				'id'       => 'lift-theme-social-media-linkedin',
                'type'     => 'text',
				'title'    => __('LinkedIn URL', 'lift-theme-options'),
                'required' => array( 'lift-theme-social-media-enable', '=', '1' ),
				'default'  => "",
			),
			array(
				'id'       => 'lift-theme-social-media-instagram',
                'type'     => 'text',
				'title'    => __('Instagram URL', 'lift-theme-options'),
                'required' => array( 'lift-theme-social-media-enable', '=', '1' ),
				'default'  => "",
			),
		),
	) );
	