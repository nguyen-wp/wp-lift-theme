<?php
    /**
* @package LIFT Creations 
* @subpackage Theme by Nguyen Pham
* https://baonguyenyam.github.io/cv
* @since 2021
*/

// -> START layout
    Redux::setSection( $opt_name, array(
        'title' => __( 'Blog', 'lift-theme-options' ),
        'icon'  => 'bi bi-stickies',
        'id'         => 'lift-theme-blog',
	));
	Redux::setSection( $opt_name, array(
		'title'      => __( 'Styling', 'lift-theme-options' ),
		'id'         => 'lift-theme-blog-style',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-blog-style-sidebar',
                'type'     => 'switch',
                'title'    => __( 'Hide Sidebar on Single Post', 'lift-theme-options' ),
                'subtitle' => __( 'Using this will remove the sidebar from appearing on your single post page.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),			
		),
    ) );
