<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

global $lift_theme;
$layout_style = $lift_theme['lift-theme-layout-style'];
$archive_sidebar = $lift_theme['lift-theme-blog-style-archive-sidebar'];
$archive_sidebar_position = $lift_theme['lift-theme-blog-style-archive-sidebar-position'];
$archive_sidebar_content_columns = isset($lift_theme['lift-theme-blog-style-archive-content-columns']) ? $lift_theme['lift-theme-blog-style-archive-content-columns'] : 'col-xl-8 col-xxl-9';
$archive_sidebar_columns = isset($lift_theme['lift-theme-blog-style-archive-sidebar-columns']) ? $lift_theme['lift-theme-blog-style-archive-sidebar-columns'] : 'col-xl-4 col-xxl-3';
$archive_breadcrumb = $lift_theme['lift-theme-blog-style-archive-breadcrumb'];


get_header();

if ( have_posts() ) {
	?>
	<header class="page-header alignwide">
		<div class="container<?= isset($layout_style) && $layout_style === '1' ? '-fluid': ''?>">
			<h1 class="page-title">
				<?php
				printf(
					/* translators: %s: Search term. */
					esc_html__( 'Results for "%s"', 'wp-lift-theme' ),
					'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
			<?php
				printf(
					esc_html(
						/* translators: %d: The number of search results. */
						_n(
							'We found %d result for your search.',
							'We found %d results for your search.',
							(int) $wp_query->found_posts,
							'wp-lift-theme'
						)
					),
					(int) $wp_query->found_posts
				);
			?>

		</div>
	</header><!-- .page-header -->


	<div class="entry-content archive-entry-content search-result-count">
		<div class="content-wrapper">
			<div class="container<?= isset($layout_style) && $layout_style === '1' ? '-fluid': ''?>">
				<div class="row">
					<div class="blog-content <?=isset($archive_sidebar) && $archive_sidebar ==='1' ? 'col-12' : $archive_sidebar_content_columns ?><?= isset($archive_sidebar_position) && $archive_sidebar_position === '1' ? ' order-xl-2': ' order-xl-1'?>">
						<?php while ( have_posts() ) : ?>
							<?php the_post(); ?>
							<?php get_template_part( 'template-parts/content/content',  'excerpt' ); ?>
						<?php endwhile; ?>

						<?php lift_the_posts_navigation(); ?>	

					</div>
					<?php if(!isset($archive_sidebar) || $archive_sidebar === '0' || $archive_sidebar == 0){?>
						<div class="sidebar-content <?=$archive_sidebar_columns?><?= isset($archive_sidebar_position) && $archive_sidebar_position === '1' ? ' order-xl-1': ' order-xl-2'?>">
							<?php get_template_part( 'sidebar' );?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->

	<?php

	// If no content, include the "No posts found" template.
} else {
	get_template_part( 'template-parts/content/content-none' );
}

get_footer();
