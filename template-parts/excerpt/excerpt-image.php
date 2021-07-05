<?php
/**
 * Show the appropriate content for the Image post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

// If there is no featured-image, print the first image block found.
if (
	! lift_can_show_post_thumbnail() &&
	has_block( 'core/image', get_the_content() )
) {

	lift_print_first_instance_of_block( 'core/image', get_the_content() );
}

the_excerpt();
