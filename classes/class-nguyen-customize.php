<?php
/**
 * Customizer settings for this theme.
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

if ( ! class_exists( 'LIFT_Theme_Customize' ) ) {
	/**
	 * Customizer Settings.
	 *
	 * @since LIFT 2021
	 */
	class LIFT_Theme_Customize {

		/**
		 * Constructor. Instantiate the object.
		 *
		 * @access public
		 *
		 * @since LIFT 2021
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'register' ) );
			add_action( 'customize_register', array( $this, 'prefix_remove_css_section' ) );
		}

		/**
		 * Register customizer options.
		 *
		 * @access public
		 *
		 * @since LIFT 2021
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return void
		 */
		public function prefix_remove_css_section( $wp_customize ) {
			$wp_customize->remove_section('custom_css');
		}

		public function register( $wp_customize ) {

			// Change site-title & description to postMessage.
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.

			// Add partial for blogname.
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title',
					'render_callback' => array( $this, 'partial_blogname' ),
				)
			);

			// Add partial for blogdescription.
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'partial_blogdescription' ),
				)
			);

			// Add "display_title_and_tagline" setting for displaying the site-title & tagline.
			$wp_customize->add_setting(
				'display_title_and_tagline',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			// Add control for the "display_title_and_tagline" setting.
			$wp_customize->add_control(
				'display_title_and_tagline',
				array(
					'type'    => 'checkbox',
					'section' => 'title_tagline',
					'label'   => esc_html__( 'Display Site Title & Tagline', 'wp-lift-theme' ),
				)
			);

			/**
			 * Add excerpt or full text selector to customizer
			 */
			// $wp_customize->add_section(
			// 	'excerpt_settings',
			// 	array(
			// 		'title'    => esc_html__( 'Excerpt Settings', 'wp-lift-theme' ),
			// 		'priority' => 120,
			// 	)
			// );

			// $wp_customize->add_setting(
			// 	'display_excerpt_or_full_post',
			// 	array(
			// 		'capability'        => 'edit_theme_options',
			// 		'default'           => 'excerpt',
			// 		'sanitize_callback' => function( $value ) {
			// 			return 'excerpt' === $value || 'full' === $value ? $value : 'excerpt';
			// 		},
			// 	)
			// );

			// $wp_customize->add_control(
			// 	'display_excerpt_or_full_post',
			// 	array(
			// 		'type'    => 'radio',
			// 		'section' => 'excerpt_settings',
			// 		'label'   => esc_html__( 'On Archive Pages, posts show:', 'wp-lift-theme' ),
			// 		'choices' => array(
			// 			'excerpt' => esc_html__( 'Summary', 'wp-lift-theme' ),
			// 			'full'    => esc_html__( 'Full text', 'wp-lift-theme' ),
			// 		),
			// 	)
			// );

			// // Background color.
			// // Include the custom control class.
			// include_once get_theme_file_path( 'classes/class-nguyen-customize-color-control.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			// // Register the custom control.
			// $wp_customize->register_control_type( 'LIFT_Theme_Customize_Color_Control' );

			// // Get the palette from theme-supports.
			// $palette = get_theme_support( 'editor-color-palette' );

			// // Build the colors array from theme-support.
			// $colors = array();
			// if ( isset( $palette[0] ) && is_array( $palette[0] ) ) {
			// 	foreach ( $palette[0] as $palette_color ) {
			// 		$colors[] = $palette_color['color'];
			// 	}
			// }

			// // Add the control. Overrides the default background-color control.
			// $wp_customize->add_control(
			// 	new LIFT_Theme_Customize_Color_Control(
			// 		$wp_customize,
			// 		'background_color',
			// 		array(
			// 			'label'   => esc_html_x( 'Background color', 'Customizer control', 'wp-lift-theme' ),
			// 			'section' => 'colors',
			// 			'palette' => $colors,
			// 		)
			// 	)
			// );

			
		}

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @access public
		 *
		 * @since LIFT 2021
		 *
		 * @param bool $checked Whether or not a box is checked.
		 *
		 * @return bool
		 */
		public static function sanitize_checkbox( $checked = null ) {
			return (bool) isset( $checked ) && true === $checked;
		}

		/**
		 * Render the site title for the selective refresh partial.
		 *
		 * @access public
		 *
		 * @since LIFT 2021
		 *
		 * @return void
		 */
		public function partial_blogname() {
			bloginfo( 'name' );
		}

		/**
		 * Render the site tagline for the selective refresh partial.
		 *
		 * @access public
		 *
		 * @since LIFT 2021
		 *
		 * @return void
		 */
		public function partial_blogdescription() {
			bloginfo( 'description' );
		}
	}
}
