<?php
function lift_disable_customize_register() {     
	global $wp_customize;
	$wp_customize->remove_section( 'lift-theme-layout' );  //Modify this line as needed  
	$wp_customize->remove_panel( 'lift-theme-header' );  //Modify this line as needed  
	$wp_customize->remove_panel( 'lift-theme-footer' );  //Modify this line as needed  
	$wp_customize->remove_panel( 'lift-theme-global' );  //Modify this line as needed  
	$wp_customize->remove_panel( 'lift-theme-blog' );  //Modify this line as needed  
	$wp_customize->remove_panel( 'lift-theme-layout' );  //Modify this line as needed  
	$wp_customize->remove_panel( 'lift-theme-search' );  //Modify this line as needed  
	$wp_customize->remove_section( 'lift-theme-social-media' );  //Modify this line as needed  
	// $wp_customize->remove_section( 'background_image' );  //Modify this line as needed  
	// $wp_customize->remove_section( 'colors' );  //Modify this line as needed  
}

add_action( 'customize_register', 'lift_disable_customize_register', 11 );
