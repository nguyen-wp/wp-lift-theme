<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

get_header();

$description = get_the_archive_description();
global $lift_theme;
$layout_style = $lift_theme['lift-theme-layout-style'];
$archive_sidebar = $lift_theme['lift-theme-blog-style-archive-sidebar'];
$archive_sidebar_position = $lift_theme['lift-theme-blog-style-archive-sidebar-position'];
$archive_sidebar_content_columns = isset($lift_theme['lift-theme-blog-style-archive-content-columns']) ? $lift_theme['lift-theme-blog-style-archive-content-columns'] : 'col-xl-8 col-xxl-9';
$archive_sidebar_columns = isset($lift_theme['lift-theme-blog-style-archive-sidebar-columns']) ? $lift_theme['lift-theme-blog-style-archive-sidebar-columns'] : 'col-xl-4 col-xxl-3';
$archive_breadcrumb = $lift_theme['lift-theme-blog-style-archive-breadcrumb'];
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<div class="content-wrapper">
			<div class="container<?= isset($layout_style) && $layout_style === '1' ? '-fluid': ''?>">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php if ( $description ) : ?>
					<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
				<?php endif; ?>
				<?php 
				if(!isset($archive_breadcrumb) || $archive_breadcrumb === '0'|| $archive_breadcrumb == 0){
					lift_get_breadcrumb(); 
				}?>
			</div>
		</div>
	</header><!-- .page-header -->

	<div class="entry-content archive-entry-content">
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

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
