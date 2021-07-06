<?php
/**
* @package LIFT Creations 
* @subpackage Theme by Nguyen Pham
* https://baonguyenyam.github.io/cv
* @since 2021
*/

    // -> START Social
		
	Redux::setSection( $opt_name, array(
		'title' => __( 'Product license', 'lift-theme-options' ),
		'id'         => 'lift-theme-license',
		'desc'       => __( 'In order to receive all benefits of LIFT Theme, you need to activate your copy of the plugin. By activating LIFT Theme license you will unlock premium options - direct plugin updates, access to template library and official support. Don\'t have direct license yet? ', 'lift-theme-options' ) . '<a href="//liftcreations.com" target="_blank">Purchase LIFT Theme license.</a>',
		'icon'  => 'bi bi-key',
		'class' => 'lift-theme-admin-license-code',
		'subsection' => false,
		'fields'     => array(
			
			array(
				'id'       => 'lift-theme-license-code-domain',
                'type'     => 'text',
				'title'    => __('Your domain', 'lift-theme-options'),
				'default'  => "",
			),
			array(
				'id'       => 'lift-theme-license-code-email',
                'type'     => 'text',
				'title'    => __('Your email', 'lift-theme-options'),
				'default'  => "",
			),
			array(
				'id'       => 'lift-theme-license-code-package',
                'type'     => 'text',
				'title'    => __('Your package', 'lift-theme-options'),
				'default'  => "",
			),
			array(
				'id'       => 'lift-theme-license-code-key',
                'type'     => 'text',
				'title'    => __('Your Key', 'lift-theme-options'),
				'default'  => "",
			),
			array(
				'id'       => 'lift-theme-license-code-license',
                'type'     => 'text',
				'title'    => __('Your License', 'lift-theme-options'),
				'default'  => "",
			),
			array(
				'id'    => 'info_contact',
				'type'  => 'info',
				'style' => 'success',
				'desc'       => __( '<p style="margin-top:0;margin-bottom:0"><strong>Email:</strong> <a href="mailto:hello@liftcreations.com" target="_blank">hello@liftcreations.com</a></p><p style="margin-top:0;margin-bottom:0"><strong>Website:</strong> <a href="https://liftcreations.com/" target="_blank">liftcreations.com</a></p><p style="margin-top:0;margin-bottom:0"><strong>Call Us:</strong> <a href="tel:866-244-1150" target="_blank">866-244-1150</a></p>', 'lift-theme-options' ),
			),
			
		),
	) );
	
