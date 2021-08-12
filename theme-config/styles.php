<?php
/**
 * Enqueue styles.
 *
 * @since LIFT 2021
 *
 * @return void
 */
function lift_styles() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts, $lift_theme;

	$header_css = '';
	$footer_css = '';
	$layout_css = '';
	$global_css = '';
	$content_css = '';
	$blog_css = '';
	$archive_css = '';

	// LAYOUT 
	$layout_style = $lift_theme['lift-theme-layout-style'];
	$layout_size = $lift_theme['lift-theme-layout-size'];
	$layout_size_value = $lift_theme['lift-theme-layout-size-value'];
	$layout_scrollbar = $lift_theme['lift-theme-global-style-theme-scrollbar'];

	if(isset($layout_style) && ($layout_style === '1' || $layout_style == 1) && $layout_size) {
		$layout_css .= "#content.lift-content .wpb_wrapper{max-width: ".$layout_size_value."px; margin: 0 auto; width: 100%}";
		$layout_css .= "#content.lift-content .container-fluid{max-width: ".$layout_size_value."px; margin: 0 auto; width: 100%}";
		// TODO: layout post detail and archive page 
	}
	if(isset($layout_scrollbar) && ($layout_scrollbar === '1' || $layout_scrollbar == 1)) {
		$layout_css .= "::-webkit-scrollbar{-webkit-appearance:none;height:10px;width:10px}::-webkit-scrollbar-track{background:var(--lift-theme-texthover)}::-webkit-scrollbar-thumb{background:var(--lift-theme-gray);height:100px;border-radius:5px}::-webkit-scrollbar-thumb:hover{background:var(--lift-theme-main)}::-webkit-scrollbar-thumb:focus{background:var(--lift-theme-main)}::-webkit-scrollbar-thumb:active{background:var(--lift-theme-main)}";
		// TODO: Add more option scrollbar here
	}
	// HEADER  
	$header_style = $lift_theme['lift-theme-header-layout-style'];
	$header_size = $lift_theme['lift-theme-header-layout-size'];
	$header_size_value = $lift_theme['lift-theme-header-layout-size-value'];
	$header_style_animation = $lift_theme['lift-theme-header-style-bg-animation'];
	if($header_style && $header_size){
		$header_css .= "#header.lift-header .header-wrapper{max-width: ".$header_size_value."px; margin: 0 auto; width: 100%}";
	}
	if($header_style_animation){
		$header_css .= "#header.lift-header {transition: ease-in-out ".$header_style_animation."ms}";
	}
	// CONTENT 
	$content_row = $lift_theme['lift-theme-layout-row-option'];
	$content_row_value = $lift_theme['lift-theme-layout-row-spacing'];
	$content_content = $lift_theme['lift-theme-layout-content-option'];
	$content_content_value = $lift_theme['lift-theme-layout-content-spacing'];
	if($content_row && $content_row_value) {
		if($content_row_value['padding-top']) {
			$content_css .= '#content.lift-content .lift_section{padding-top: '.$content_row_value['padding-top'].';}';
		}
		if($content_row_value['padding-bottom']) {
			$content_css .= '#content.lift-content .lift_section{padding-bottom: '.$content_row_value['padding-bottom'].';}';
		}
		if($content_row_value['padding-left']) {
			$content_css .= '#content.lift-content .lift_section{padding-left: '.$content_row_value['padding-left'].';}';
		}
		if($content_row_value['padding-right']) {
			$content_css .= '#content.lift-content .lift_section{padding-right: '.$content_row_value['padding-right'].';}';
		}
	}
	if($content_content && $content_content_value) {
		if($content_content_value['padding-top']) {
			$content_css .= '#content.lift-content .content-wrapper{padding-top: '.$content_content_value['padding-top'].';}';
		}
		if($content_content_value['padding-bottom']) {
			$content_css .= '#content.lift-content .content-wrapper{padding-bottom: '.$content_content_value['padding-bottom'].';}';
		}
		if($content_content_value['padding-left']) {
			$content_css .= '#content.lift-content .content-wrapper{padding-left: '.$content_content_value['padding-left'].';}';
		}
		if($content_content_value['padding-right']) {
			$content_css .= '#content.lift-content .content-wrapper{padding-right: '.$content_content_value['padding-right'].';}';
		}
	}
	// BLOG
	$blog_columns_padding = $lift_theme['lift-theme-blog-style-content-columns-padding'];
	$blog_sidebar_columns_padding = $lift_theme['lift-theme-blog-style-sidebar-columns-padding'];
	if($blog_columns_padding) {
		$blog_css .= '#content.lift-content article.post .entry-content .blog-content{padding-top:'.$blog_columns_padding['padding-top'].';padding-bottom:'.$blog_columns_padding['padding-bottom'].';}';
	}
	if($blog_sidebar_columns_padding) {
		$blog_css .= '#content.lift-content article.post .entry-content .sidebar-content{padding-top:'.$blog_sidebar_columns_padding['padding-top'].';padding-bottom:'.$blog_sidebar_columns_padding['padding-bottom'].';}';
	}
	// ARCHIVE
	$archive_columns_padding = $lift_theme['lift-theme-blog-style-archive-content-columns-padding'];
	$archive_sidebar_columns_padding = $lift_theme['lift-theme-blog-style-archive-sidebar-columns-padding'];
	if($archive_columns_padding) {
		$archive_css .= '#content.lift-content .archive-entry-content .blog-content{padding-top:'.$archive_columns_padding['padding-top'].';padding-bottom:'.$archive_columns_padding['padding-bottom'].';}';
	}
	if($archive_sidebar_columns_padding) {
		$archive_css .= '#content.lift-content .archive-entry-content .sidebar-content{padding-top:'.$archive_sidebar_columns_padding['padding-top'].';padding-bottom:'.$archive_sidebar_columns_padding['padding-bottom'].';}';
	}
	// FOOTER 
	$footer_style = $lift_theme['lift-theme-footer-layout-style'];
	$footer_size = $lift_theme['lift-theme-footer-layout-size'];
	$footer_size_value = $lift_theme['lift-theme-footer-layout-size-value'];
	$footer_fixed = $lift_theme['lift-theme-footer-layout-fixed'];
	if((isset($footer_style) && ($footer_style === '1' || $footer_style == 1)) && $footer_size) {
		$footer_css .= "#footer.lift-footer .footer-wrapper{max-width: ".$footer_size_value."px; margin: 0 auto; width: 100%}";
	}
	if(isset($footer_fixed) && ($footer_fixed === '1' || $footer_fixed == 1)) {
		$footer_css .= "html,body {height: 100%;}.lift-wrapper{flex-direction: column;height: 100%;display:flex}#content.lift-content{flex-shrink: 0}#footer.lift-footer {margin-top: auto}";
	}
	// BACKTOTOP
	$global_backtotop = $lift_theme['lift-theme-global-function-backtotop-spacing'];
	if($global_backtotop) {
		$global_css .= '#backtotop{right:'.$global_backtotop['right'].';bottom:'.$global_backtotop['bottom'].'}';
	}

	/////////////////////////////////////////////////////////

	// LAYOUT 
	$theme_style = $lift_theme['lift-theme-global-style-theme'];

	// RTL styles.
	wp_style_add_data( 'lift-assets-style', 'rtl', 'replace' );

	// Styles.
	wp_enqueue_style(
		'lift-assets-core-style', 
		get_template_directory_uri() . '/dist/css/lift.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	wp_enqueue_style(
		'lift-assets-main-style', 
		get_template_directory_uri() . '/dist/css/main.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	// THEME SKIN
	if ( $theme_style === '' || $theme_style === 'default' ) {
		wp_enqueue_style(
			'lift-assets-theme-custom', 
			get_template_directory_uri() . '/dist/css/theme-default.css', 
			array(), 
			wp_get_theme()->get( 'Version' ), 'all' 
		);
	} else if ( $theme_style === 'modern' ) {
		wp_enqueue_style(
			'lift-assets-theme-custom', 
			get_template_directory_uri() . '/dist/css/theme-modern.css', 
			array(), 
			wp_get_theme()->get( 'Version' ), 'all' 
		);
	} else if ( $theme_style === 'material' ) {
		wp_enqueue_style(
			'lift-assets-theme-custom', 
			get_template_directory_uri() . '/dist/css/theme-material.css', 
			array(), 
			wp_get_theme()->get( 'Version' ), 'all' 
		);
	} else if ( $theme_style === 'monokai' ) {
		wp_enqueue_style(
			'lift-assets-theme-custom', 
			get_template_directory_uri() . '/dist/css/theme-monokai.css', 
			array(), 
			wp_get_theme()->get( 'Version' ), 'all' 
		);
	}
	// FOR COMPILER ONLY 
	// wp_enqueue_style(
	// 	'lift-assets-export-style', 
	// 	get_template_directory_uri() . '/dist/css/export.css', 
	// 	array(), 
	// 	wp_get_theme()->get( 'Version' ), 'all' 
	// );
	wp_add_inline_style( 'lift-assets-theme-custom', 
		$global_css . 
		$layout_css . 
		$header_css . 
		$content_css .
		$blog_css .
		$archive_css .
		$footer_css 
	);

	wp_enqueue_style(
		'lift-assets-theme-style', 
		get_template_directory_uri() . '/dist/css/theme.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	wp_enqueue_style(
		'lift-assets-style-style', 
		get_template_directory_uri() . '/dist/css/style.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);

	// Print.
	wp_enqueue_style(
		'lift-assets-print-style', 
		get_template_directory_uri() . '/dist/css/print.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'print' 
	);

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if (!is_admin() && current_user_can('administrator') && intval($lift_theme['lift-theme-global-dev-toogle-tag']) == 1) {
		wp_enqueue_style(
			'lift-assets-style-admin-tool', 
			get_template_directory_uri() . '/dist/css/admin-tool.css', 
			array(), 
			wp_get_theme()->get( 'Version' ), 'all' 
		);
	}
}
add_action( 'wp_enqueue_scripts', 'lift_styles' , 999999 );

function lift_admin_styles() {
	// Styles.
	wp_enqueue_style(
		'lift-assets-icon-style', 
		get_template_directory_uri() . '/admin/vendor/bootstrap-icons.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	wp_enqueue_style(
		'lift-assets-main-style', 
		get_template_directory_uri() . '/admin/dist/css/admin.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
	wp_enqueue_style(
		'lift-assets-prism-style', 
		get_template_directory_uri() . '/admin/vendor/prism.css', 
		array(), 
		wp_get_theme()->get( 'Version' ), 'all' 
	);
}

add_action( 'admin_enqueue_scripts', 'lift_admin_styles' );
