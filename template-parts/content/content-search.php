<?php
/**
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$lift_theme_unique_id = wp_unique_id( 'search-form-' );
$lift_theme_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';

global $lift_theme;
$global_search_value['search_label'] = $lift_theme['lift-theme-search-layout-label'];
$global_search_value['search_icon'] = $lift_theme['lift-theme-search-layout-icon'];
$global_search_value['search_text'] = $lift_theme['lift-theme-search-layout-text'];
$global_search_value['search_placeholder'] = $lift_theme['lift-theme-search-layout-placeholder'];
$global_search_value['search_placeholder_value'] = $lift_theme['lift-theme-search-layout-placeholder-value'];
$global_search_value['search_text_value'] = $lift_theme['lift-theme-search-layout-text-value'];
$global_search_type = $lift_theme['lift-theme-search-type'];

$search_value = '';
$placeholder_value = '';
if(!isset($global_search_value['search_label']) || $global_search_value['search_label'] == 0) {
	$search_value .= ' no-label';
}
if(!isset($global_search_value['search_icon']) || $global_search_value['search_icon'] == 0) {
	$search_value .= ' no-icon';
}
if(!isset($global_search_value['search_text']) || $global_search_value['search_text'] == 0) {
	$search_value .= ' no-text';
}
if(isset($global_search_value['search_placeholder']) && $global_search_value['search_placeholder'] != 0) {
	$placeholder_value = ' placeholder="'.$global_search_value['search_placeholder_value'].'"';
}
?>
<div id="content-search">
	<form role="search" <?php echo $lift_theme_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="d-flex search-form<?=$search_value?><?= isset($global_search_type) && $global_search_type !== '' ? ' search-'.$global_search_type: ' search-normal'?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="<?php echo esc_attr( $lift_theme_unique_id ); ?>"><?= $global_search_value['search_text_value'] !== '' ? $global_search_value['search_text_value'] : 'Search' ; // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>
		<div class="input-group">
			<input type="search"<?=$placeholder_value?> id="<?php echo esc_attr( $lift_theme_unique_id ); ?>" class="form-control search-field" value="<?php echo get_search_query(); ?>" name="s" />
			<!-- <input type="hidden" name="post_type[]" value="book" />
			<input type="hidden" name="post_type[]" value="magazine" />
			<input type="hidden" name="post_type[]" value="ebook" />
			<input type="hidden" name="post_type[]" value="pdf" /> -->
			<button type="submit" class="search-submit-toggle"><i class="fas fa-search"></i></button>
			<button type="submit" class="btn btn-primary search-submit"><span><?php echo esc_attr_x( 'Search', 'submit button', 'wp-lift-theme' ); ?></span><i class="fas fa-search"></i></button>
			
			<!-- <input type="submit" class="btn btn-primary search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wp-lift-theme' ); ?>" /> -->
		</div>
	</form>
</div>
