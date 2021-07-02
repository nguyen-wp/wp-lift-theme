<?php
	/*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'lift-help-tab-1',
            'title'   => __( 'Theme Setup', 'lift-theme-options' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'lift-theme-options' )
        ),
        array(
            'id'      => 'lift-help-tab-2',
            'title'   => __( 'Theme Config', 'lift-theme-options' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'lift-theme-options' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'lift-theme-options' );
    Redux::setHelpSidebar( $opt_name, $content );
