<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php lift_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<?php

global $lift_theme;
$layout_value['layout_style'] = $lift_theme['lift-theme-layout-style'];
$theme_value['layout_logo'] = $lift_theme['lift-theme-header-logo'];

?>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site lift-wrapper">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-lift-theme' ); ?></a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>

	<main id="content" class="site-content lift-content">
		<div id="primary" class="content-area container<?= isset($layout_value['layout_style']) && $layout_value['layout_style'] === '1' ? '-fluid': ''?>">
			<div id="main" class="site-main lift-main" role="main">
