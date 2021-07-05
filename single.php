<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'wp-lift-theme' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	$lift_theme_next = is_rtl() ? lift_get_icon_svg( 'ui', 'arrow_left' ) : lift_get_icon_svg( 'ui', 'arrow_right' );
	$lift_theme_prev = is_rtl() ? lift_get_icon_svg( 'ui', 'arrow_right' ) : lift_get_icon_svg( 'ui', 'arrow_left' );

	$lift_theme_next_label     = esc_html__( 'Next post', 'wp-lift-theme' );
	$lift_theme_previous_label = esc_html__( 'Previous post', 'wp-lift-theme' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $lift_theme_next_label . $lift_theme_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $lift_theme_prev . $lift_theme_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile; // End of the loop.

get_footer();
