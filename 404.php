<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

global $lift_theme;
$layout_style = $lift_theme['lift-theme-layout-style'];

get_header();
?>

	<header class="page-header alignwide">
		<div class="container<?= isset($layout_style) && $layout_style === '1' ? '-fluid': ''?>">
			<h1 class="page-title"><?php esc_html_e( 'Nothing here', 'wp-lift-theme' ); ?></h1>
		</div>
	</header><!-- .page-header -->

	<div class="error-404 not-found default-max-width">
		<div class="page-content">
			<div class="container<?= isset($layout_style) && $layout_style === '1' ? '-fluid': ''?>">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'wp-lift-theme' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div><!-- .page-content -->
	</div><!-- .error-404 -->

<?php
get_footer();
