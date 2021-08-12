<?php
    /**
* @package LIFT Creations 
* @subpackage Theme by Nguyen Pham
* https://baonguyenyam.github.io/cv
* @since 2021
*/

// -> START layout
    Redux::setSection( $opt_name, array(
        'title' => __( 'Posts/Blogs', 'lift-theme-options' ),
        'icon'  => 'bi bi-stickies',
        'id'         => 'lift-theme-blog',
	));
	Redux::setSection( $opt_name, array(
		'title'      => __( 'Post and Sidebar', 'lift-theme-options' ),
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
            array(
				'id'       => 'lift-theme-blog-style-content-columns',
				'type'     => 'text',
				'required' => array( 'lift-theme-blog-style-sidebar', '=', '0' ),
				'title'    => __( 'Content Columns', 'lift-theme-options' ),
				'default'  => 'col-xl-8 col-xxl-9'
			),
            array(
				'id'       => 'lift-theme-blog-style-content-columns-padding',
				// 'required' => array( 'lift-theme-blog-style-sidebar', '=', '0' ),
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'bottom'            => true,
                'right'            => false,
				'top'            => true,
                'left'            => false,
				// 'compiler' => true,
                'units'          => array( 'em', 'rem', 'px', '%' ),      
                'units_extended' => 'true',    
                'title'          => __( 'Content Padding', 'lift-theme-options' ),
                'subtitle'       => __( 'Allow your users to choose the padding they want.', 'lift-theme-options' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Top, Bottom, or Units.', 'lift-theme-options' ),
                'default'        => array(
                    'bottom'    => '2em',
                    'top'       => '2em',
                    'units'     => 'em', 
                )
            ),
            array(
				'id'       => 'lift-theme-blog-style-sidebar-columns',
				'type'     => 'text',
				'required' => array( 'lift-theme-blog-style-sidebar', '=', '0' ),
				'title'    => __( 'Sidebar Columns', 'lift-theme-options' ),
				'default'  => 'col-xl-4 col-xxl-3'
			),
            array(
				'id'       => 'lift-theme-blog-style-sidebar-columns-padding',
				'required' => array( 'lift-theme-blog-style-sidebar', '=', '0' ),
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'bottom'            => true,
                'right'            => false,
				'top'            => true,
                'left'            => false,
				// 'compiler' => true,
                'units'          => array( 'em', 'rem', 'px', '%' ),      
                'units_extended' => 'true',   
                'title'          => __( 'Sidebar Padding', 'lift-theme-options' ),
                'subtitle'       => __( 'Allow your users to choose the padding they want.', 'lift-theme-options' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Top, Bottom, or Units.', 'lift-theme-options' ),
                'default'        => array(
                    'bottom'    => '2em',
                    'top'       => '2em',
                    'units'     => 'em', 
                )
            ),
            array(
				'id'       => 'lift-theme-blog-style-sidebar-position',
				'required' => array( 'lift-theme-blog-style-sidebar', '=', '0' ),
                'type'     => 'switch',
                'title'    => __( 'Sidebar Align', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'Left',
                'off'      => 'Right',
            ),				
		),
    ) );

    Redux::setSection( $opt_name, array(
		'title'      => __( 'Post Functionality', 'lift-theme-options' ),
		'id'         => 'lift-theme-blog-style-function',
        'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'lift-theme-blog-style-content-thumbnail',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Thumbnail', 'lift-theme-options' ),
                'subtitle' => __( 'Using this will remove the post thumbnail on your single post page.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),			
            array(
				'id'       => 'lift-theme-blog-style-content-nextprev',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Navigation', 'lift-theme-options' ),
                'subtitle' => __( 'Using this will remove the next/prev button on your single post page.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),
            array(
				'id'       => 'lift-theme-blog-style-breadcrumb',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Breadcrumb', 'lift-theme-options' ),
                'subtitle' => __( 'Using this will remove the breadcrumb on your single post page.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),	
            array(
				'id'       => 'lift-theme-blog-style-content-category',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Category', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),	
            array(
				'id'       => 'lift-theme-blog-style-content-tag',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Tag', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),	
            array(
				'id'       => 'lift-theme-blog-style-content-author',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Author', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),	
            array(
				'id'       => 'lift-theme-blog-style-content-date',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Date', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),			
		),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Excerpt Settings', 'lift-theme-options' ),
        'id'         => 'lift-theme-blog-excerpt',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-blog-excerpt-option',
                'type'     => 'switch',
                'title'    => __( 'Enable excerpt', 'lift-theme-options' ),
                'default'  => 1,
                'on'       => 'On',
                'off'      => 'Off',
            ),
            
			array(
				'id'       => 'lift-theme-blog-excerpt-value',
				'type'          => 'slider',
                'required' => array( 'lift-theme-blog-excerpt-option', '=', '1' ),
                'title'    => __( 'Excerpt length', 'lift-theme-options' ),
				'min'           => 10,
				'step'          => 10,
				'default'       => 120,
				'max'           => 500,
				'display_value' => 'text'
			),
            array(
				'id'       => 'lift-theme-blog-excerpt-readmore',
                'type'     => 'text',
				'title'    => __('Readmore text', 'lift-theme-options'),
                'required' => array( 'lift-theme-blog-excerpt-option', '=', '1' ),
				'default'  => "Readmore",
			),
            array(
				'id'       => 'lift-theme-blog-excerpt-morestring',
                'type'     => 'text',
				'title'    => __('More string', 'lift-theme-options'),
                'required' => array( 'lift-theme-blog-excerpt-option', '=', '1' ),
				'default'  => "[...]",
			),
		),
    ) );


    Redux::setSection( $opt_name, array(
		'title'      => __( 'Archive and Sidebar', 'lift-theme-options' ),
		'id'         => 'lift-theme-blog-style-archive',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'lift-theme-blog-style-archive-sidebar',
                'type'     => 'switch',
                'title'    => __( 'Hide Sidebar on Archive', 'lift-theme-options' ),
                'subtitle' => __( 'Using this will remove the sidebar from appearing on your archive page.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),			
            array(
				'id'       => 'lift-theme-blog-style-archive-content-columns',
				'type'     => 'text',
				'required' => array( 'lift-theme-blog-style-archive-sidebar', '=', '0' ),
				'title'    => __( 'Content Columns', 'lift-theme-options' ),
				'default'  => 'col-xl-8 col-xxl-9'
			),
            array(
				'id'       => 'lift-theme-blog-style-archive-content-columns-padding',
				// 'required' => array( 'lift-theme-blog-style-archive-sidebar', '=', '0' ),
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'bottom'            => true,
                'right'            => false,
				'top'            => true,
                'left'            => false,
				// 'compiler' => true,
                'units'          => array( 'em', 'rem', 'px', '%' ),      
                'units_extended' => 'true',    
                'title'          => __( 'Content Padding', 'lift-theme-options' ),
                'subtitle'       => __( 'Allow your users to choose the padding they want.', 'lift-theme-options' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Top, Bottom, or Units.', 'lift-theme-options' ),
                'default'        => array(
                    'bottom'    => '2em',
                    'top'       => '2em',
                    'units'     => 'em', 
                )
            ),
            array(
				'id'       => 'lift-theme-blog-style-archive-sidebar-columns',
				'type'     => 'text',
				'required' => array( 'lift-theme-blog-style-archive-sidebar', '=', '0' ),
				'title'    => __( 'Sidebar Columns', 'lift-theme-options' ),
				'default'  => 'col-xl-4 col-xxl-3'
			),
            array(
				'id'       => 'lift-theme-blog-style-archive-sidebar-columns-padding',
				'required' => array( 'lift-theme-blog-style-archive-sidebar', '=', '0' ),
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'bottom'            => true,
                'right'            => false,
				'top'            => true,
                'left'            => false,
				// 'compiler' => true,
                'units'          => array( 'em', 'rem', 'px', '%' ),      
                'units_extended' => 'true',   
                'title'          => __( 'Sidebar Padding', 'lift-theme-options' ),
                'subtitle'       => __( 'Allow your users to choose the padding they want.', 'lift-theme-options' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Top, Bottom, or Units.', 'lift-theme-options' ),
                'default'        => array(
                    'bottom'    => '2em',
                    'top'       => '2em',
                    'units'     => 'em', 
                )
            ),
            array(
				'id'       => 'lift-theme-blog-style-archive-sidebar-position',
				'required' => array( 'lift-theme-blog-style-archive-sidebar', '=', '0' ),
                'type'     => 'switch',
                'title'    => __( 'Sidebar Align', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'Left',
                'off'      => 'Right',
            ),				
		),
    ) );


    Redux::setSection( $opt_name, array(
		'title'      => __( 'Archive Functionality', 'lift-theme-options' ),
		'id'         => 'lift-theme-blog-style-archive-function',
        'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'lift-theme-blog-style-archive-thumbnail',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Thumbnail', 'lift-theme-options' ),
                'subtitle' => __( 'Using this will remove the post thumbnail on your archive page.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),			
            array(
				'id'       => 'lift-theme-blog-style-archive-breadcrumb',
                'type'     => 'switch',
                'title'    => __( 'Hide Breadcrumb', 'lift-theme-options' ),
                'subtitle' => __( 'Using this will remove the breadcrumb on your archive page.', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),	
            array(
				'id'       => 'lift-theme-blog-style-archive-category',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Category', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),	
            array(
				'id'       => 'lift-theme-blog-style-archive-tag',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Tag', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),	
            array(
				'id'       => 'lift-theme-blog-style-archive-author',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Author', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),	
            array(
				'id'       => 'lift-theme-blog-style-archive-date',
                'type'     => 'switch',
                'title'    => __( 'Hide Post Date', 'lift-theme-options' ),
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
            ),			
		),
    ) );


    
