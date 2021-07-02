<?php
/**
 * Customize API: Twenty_Twenty_One_Customize_Notice_Control class
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * @since 2021
 */

/**
 * Customize Notice Control class.
 *
 * @since LIFT 2021
 *
 * @see WP_Customize_Control
 */
class Twenty_Twenty_One_Customize_Notice_Control extends WP_Customize_Control {
	/**
	 * The control type.
	 *
	 * @since LIFT 2021
	 *
	 * @var string
	 */
	public $type = 'lift-assets-notice';

	/**
	 * Renders the control content.
	 *
	 * This simply prints the notice we need.
	 *
	 * @access public
	 *
	 * @since LIFT 2021
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<div class="notice notice-warning">
			<p><?php esc_html_e( 'To access the Dark Mode settings, select a light background color.', 'wp-lift-theme' ); ?></p>
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/support/article/lift-assets/#dark-mode-support', 'wp-lift-theme' ) ); ?>">
				<?php esc_html_e( 'Learn more about Dark Mode.', 'wp-lift-theme' ); ?>
			</a></p>
		</div>
		<?php
	}
}
