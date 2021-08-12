<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

global $lift_theme;
$layout_style = $lift_theme['lift-theme-layout-style'];
?>
<!-- TODO: need improve  -->
<section class="no-results not-found">
    <header class="page-header alignwide">
        <div class="container<?= isset($layout_style) && $layout_style === '1' ? '-fluid': ''?>">
            <?php if ( is_search() ) : ?>

            <h1 class="page-title">
                <?php
					printf(
						/* translators: %s: Search term. */
						esc_html__( 'Results for "%s"', 'wp-lift-theme' ),
						'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
					);
					?>
            </h1>

            <?php else : ?>

            <h1 class="page-title"><?php esc_html_e( 'Nothing here', 'wp-lift-theme' ); ?></h1>

            <?php endif; ?>
        </div>
    </header><!-- .page-header -->

    <div class="page-content default-max-width">
        <div class="content-wrapper">
            <div class="container<?= isset($layout_style) && $layout_style === '1' ? '-fluid': ''?>">

                <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                <?php
				printf(
					'<p>' . wp_kses(
						/* translators: %s: Link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'wp-lift-theme' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>

                <?php elseif ( is_search() ) : ?>

                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wp-lift-theme' ); ?>
                </p>
                <?php get_template_part( 'template-parts/content/content-search' ); ?>

                <?php else : ?>

                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-lift-theme' ); ?>
                </p>
                <?php get_template_part( 'template-parts/content/content-search' ); ?>

                <?php endif; ?>
            </div>
        </div>
    </div><!-- .page-content -->
</section><!-- .no-results -->