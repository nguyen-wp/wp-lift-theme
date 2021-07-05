<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since LIFT Theme 1.0
	 *
	 * @return void
	 */
	function lift_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'lifttheme-columns-overlap',
				'label' => esc_html__( 'Overlap', 'wp-lift-theme' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'lifttheme-border',
				'label' => esc_html__( 'Borders', 'wp-lift-theme' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'lifttheme-border',
				'label' => esc_html__( 'Borders', 'wp-lift-theme' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'lifttheme-border',
				'label' => esc_html__( 'Borders', 'wp-lift-theme' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'lifttheme-image-frame',
				'label' => esc_html__( 'Frame', 'wp-lift-theme' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'lifttheme-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'wp-lift-theme' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'lifttheme-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'wp-lift-theme' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'lifttheme-border',
				'label' => esc_html__( 'Borders', 'wp-lift-theme' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'lifttheme-separator-thick',
				'label' => esc_html__( 'Thick', 'wp-lift-theme' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'lifttheme-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'wp-lift-theme' ),
			)
		);
	}
	add_action( 'init', 'lift_register_block_styles' );
}
