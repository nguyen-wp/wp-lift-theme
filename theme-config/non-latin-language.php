<?php

/** Enqueue non-latin language styles
 *
 * @since LIFT 2021
 *
 * @return void
 */
function lift_non_latin_languages() {
	$custom_css = lift_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'lift-assets-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'lift_non_latin_languages' );
