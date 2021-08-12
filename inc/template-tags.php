<?php
/**
 * Custom template tags for this theme
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

if ( ! function_exists( 'lift_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @since LIFT Theme 1.0
	 *
	 * @return void
	 */
	function lift_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
		echo '<div class="posted-on">';
		printf(
			/* translators: %s: Publish date. */
			esc_html__( 'Published %s', 'wp-lift-theme' ),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput
		);
		echo '</div>';
	}
}

if ( ! function_exists( 'lift_posted_by' ) ) {
	/**
	 * Prints HTML with meta information about theme author.
	 *
	 * @since LIFT Theme 1.0
	 *
	 * @return void
	 */
	function lift_posted_by() {
		if ( ! get_the_author_meta( 'description' ) && post_type_supports( get_post_type(), 'author' ) ) {
			echo '<div class="byline">';
			printf(
				/* translators: %s: Author name. */
				esc_html__( 'By %s', 'wp-lift-theme' ),
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a>'
			);
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'lift_entry_meta_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * Footer entry meta is displayed differently in archives and single posts.
	 *
	 * @since LIFT Theme 1.0
	 *
	 * @return void
	 */
	function lift_entry_meta_footer() {

		global $lift_theme;
		$content_tag = $lift_theme['lift-theme-blog-style-content-tag'];
		$content_category = $lift_theme['lift-theme-blog-style-content-category'];
		$content_date = $lift_theme['lift-theme-blog-style-content-date'];
		$content_author = $lift_theme['lift-theme-blog-style-content-author'];

		$archive_tag = $lift_theme['lift-theme-blog-style-archive-tag'];
		$archive_category = $lift_theme['lift-theme-blog-style-archive-category'];
		$archive_date = $lift_theme['lift-theme-blog-style-archive-date'];
		$archive_author = $lift_theme['lift-theme-blog-style-archive-author'];
		// Early exit if not a post.
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// Hide meta information on pages.
		if ( ! is_single() ) {

			if ( is_sticky() ) {
				echo '<div class="featured-post">' . esc_html_x( 'Featured post', 'Label for sticky posts', 'wp-lift-theme' ) . '</div>';
			}

			$post_format = get_post_format();
			if ( 'aside' === $post_format || 'status' === $post_format ) {
				echo '<div class="featured-post"><a href="' . esc_url( get_permalink() ) . '">' . lift_continue_reading_text() . '</a></div>'; // phpcs:ignore WordPress.Security.EscapeOutput
			}

			// Posted on.
			if(!isset($archive_date) || $archive_date === '0' || $archive_date == 0) {
				lift_posted_on();
			}

			if ( has_category() || has_tag() ) {

				echo '<div class="post-taxonomies">';

				/* translators: Used between list items, there is a space after the comma. */
				if(!isset($archive_category) || $archive_category === '0' || $archive_category == 0) {
					$categories_list = get_the_category_list( __( ', ', 'wp-lift-theme' ) );
					if ( $categories_list ) {
						printf(
							/* translators: %s: List of categories. */
							'<div class="cat-links">' . esc_html__( 'Categorized as %s', 'wp-lift-theme' ) . ' </div>',
							$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
						);
					}
				}

				/* translators: Used between list items, there is a space after the comma. */
				if(!isset($archive_tag) || $archive_tag === '0' || $archive_tag == 0) {
					$tags_list = get_the_tag_list( '', __( ', ', 'wp-lift-theme' ) );
					if ( $tags_list ) {
						printf(
							/* translators: %s: List of tags. */
							'<div class="tags-links">' . esc_html__( 'Tagged %s', 'wp-lift-theme' ) . '</div>',
							$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
						);
					}
				}
				echo '</div>';
			}

			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'wp-lift-theme' ),
					'<div class="screen-reader-text">' . get_the_title() . '</div>'
				),
				'<div class="edit-link admintoolbar">',
				'</div>'
			);

		} else {

			echo '<div class="posted-by">';
			// Posted on.
			if(!isset($content_date) || $content_date === '0' || $content_date == 0) {
				lift_posted_on();
			}
			// Posted by.
			if(!isset($content_author) || $content_author === '0' || $content_author == 0) {
				lift_posted_by();
			}
			

			if ( has_category() || has_tag() ) {

				echo '<div class="post-taxonomies">';

				/* translators: Used between list items, there is a space after the comma. */
				if(!isset($content_category) || $content_category === '0' || $content_category == 0) {
					$categories_list = get_the_category_list( __( ', ', 'wp-lift-theme' ) );
					if ( $categories_list ) {
						printf(
							/* translators: %s: List of categories. */
							'<div class="cat-links">' . esc_html__( 'Categorized as %s', 'wp-lift-theme' ) . ' </div>',
							$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
						);
					}
				}

				/* translators: Used between list items, there is a space after the comma. */
				if(!isset($content_tag) || $content_tag === '0' || $content_tag == 0) {
					$tags_list = get_the_tag_list( '', __( ', ', 'wp-lift-theme' ) );
					if ( $tags_list ) {
						printf(
							/* translators: %s: List of tags. */
							'<div class="tags-links">' . esc_html__( 'Tagged %s', 'wp-lift-theme' ) . '</div>',
							$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
						);
					}
				}
				echo '</div>';
			}



			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'wp-lift-theme' ),
					'<div class="screen-reader-text">' . get_the_title() . '</div>'
				),
				'<div class="edit-link admintoolbar">',
				'</div>'
			);
			echo '</div>';


		}
	}
}

if ( ! function_exists( 'lift_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @since LIFT Theme 1.0
	 *
	 * @return void
	 */
	function lift_post_thumbnail() {
				
		if ( ! lift_can_show_post_thumbnail() ) {
			return;
		}
		?>

		<?php if ( is_singular() ) : ?>

			<figure class="post-thumbnail">
				<?php
				// Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
				the_post_thumbnail( 'post-thumbnail', array( 'loading' => false ) );
				?>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

			<figure class="post-thumbnail">
				<a class="post-thumbnail-inner alignwide" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
				</a>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure>

		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'lift_the_posts_navigation' ) ) {
	/**
	 * Print the next and previous posts navigation.
	 *
	 * @since LIFT Theme 1.0
	 *
	 * @return void
	 */
	function lift_the_posts_navigation() {
		the_posts_pagination(
			array(
				// 'before_page_number' => esc_html__( 'Page', 'wp-lift-theme' ) . ' ',
				'mid_size'           => 0,
				'type'				 => 'list',
				'class'				 => 'lift-pagination',
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? lift_get_icon_svg( 'ui', 'arrow_right' ) : lift_get_icon_svg( 'ui', 'arrow_left' ),
					wp_kses(
						__( '<span class="text">Previous</span><span class="nav-short"></span>', 'wp-lift-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					)
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					wp_kses(
						__( '<span class="text">Next</span><span class="nav-short"></span>', 'wp-lift-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					is_rtl() ? lift_get_icon_svg( 'ui', 'arrow_left' ) : lift_get_icon_svg( 'ui', 'arrow_right' )
				),
			)
		);
	}
}
