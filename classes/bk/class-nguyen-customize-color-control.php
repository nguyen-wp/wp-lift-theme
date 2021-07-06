<?php
/**
 * Customize API: WP_Customize_Color_Control class
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

/**
 * Customize Color Control class.
 *
 * @since LIFT 2021
 *
 * @see WP_Customize_Control
 */
class LIFT_Theme_Customize_Color_Control extends WP_Customize_Color_Control {
	/**
	 * The control type.
	 *
	 * @since LIFT 2021
	 *
	 * @var string
	 */
	public $type = 'lift-assets-color';

	/**
	 * Colorpicker palette
	 *
	 * @access public
	 *
	 * @since LIFT 2021
	 *
	 * @var array
	 */
	public $palette;

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 *
	 * @since LIFT 2021
	 *
	 * @return void
	 */
	public function enqueue() {
		parent::enqueue();

		// Enqueue the script.
		// wp_enqueue_script(
		// 	'lifttheme-control-color',
		// 	get_theme_file_uri( 'assets/js/palette-colorpicker.js' ),
		// 	array( 'customize-controls', 'jquery', 'customize-base', 'wp-color-picker' ),
		// 	(string) filemtime( get_theme_file_path( 'assets/js/palette-colorpicker.js' ) ),
		// 	false
		// );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @access public
	 *
	 * @since LIFT Theme 1.0
	 *
	 * @uses WP_Customize_Control::to_json()
	 *
	 * @return void
	 */
	public function to_json() {
		parent::to_json();
		$this->json['palette'] = $this->palette;
	}
}
