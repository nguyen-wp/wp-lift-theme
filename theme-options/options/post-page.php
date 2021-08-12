<?php

function lift_page_options() {

	add_meta_box(
		'lift_page_options_metabox', // metabox ID
		'Page Options', // title
		'lift_metabox_callback', // callback function
		'page', // post type or post types in array
		'normal', // position (normal, side, advanced)
		'high' // priority (default, low, high, core)
	);

}

function lift_metabox_callback( $post ) {

	$seo_title = get_post_meta( $post->ID, 'seo_title', true );
	$seo_robots = get_post_meta( $post->ID, 'seo_robots', true );

	// nonce, actually I think it is not necessary here
	wp_nonce_field( 'lift_randomstr', '_liftonce' );

	echo '<table class="form-table">
		<tbody>
			<tr>
				<th><label for="seo_title">SEO title</label></th>
				<td><input type="text" id="seo_title" name="seo_title" value="' . esc_attr( $seo_title ) . '" class="regular-text"></td>
			</tr>
			<tr>
				<th><label for="seo_tobots">SEO robots</label></th>
				<td>
					<select id="seo_robots" name="seo_robots">
						<option value="">Select...</option>
						<option value="index,follow"' . selected( 'index,follow', $seo_robots, false ) . '>Show for search engines</option>
						<option value="noindex,nofollow"' . selected( 'noindex,nofollow', $seo_robots, false ) . '>Hide for search engines</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>';
	
}

function lift_page_save_meta( $post_id, $post ) {

	// nonce check
	if ( ! isset( $_POST[ '_liftonce' ] ) || ! wp_verify_nonce( $_POST[ '_liftonce' ], 'lift_randomstr' ) ) {
		return $post_id;
	}

	// check current use permissions
	$post_type = get_post_type_object( $post->post_type );

	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return $post_id;
	}

	// Do not save the data if autosave
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

	// define your own post type here
	if( $post->post_type != 'page' ) {
		return $post_id;
	}

	if( isset( $_POST[ 'seo_title' ] ) ) {
		update_post_meta( $post_id, 'seo_title', sanitize_text_field( $_POST[ 'seo_title' ] ) );
	} else {
		delete_post_meta( $post_id, 'seo_title' );
	}
	if( isset( $_POST[ 'seo_robots' ] ) ) {
		update_post_meta( $post_id, 'seo_robots', sanitize_text_field( $_POST[ 'seo_robots' ] ) );
	} else {
		delete_post_meta( $post_id, 'seo_robots' );
	}

	return $post_id;

}


// add_action( 'admin_menu', 'lift_page_options' );
// add_action( 'save_post', 'lift_page_save_meta', 10, 2 );
