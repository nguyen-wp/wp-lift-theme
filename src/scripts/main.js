var LIFT_APP = {
	// Break points
	xs: 0,
	sm: 576,
	md: 768,
	lg: 992,
	xl: 1200,
	xxl: 1400,
	lift_admin_toolbar: function lift_admin_toolbar() {
		if ($('body.admin-control').length) {
			$('#page').append('<div id="admin-space"></div>')
		}
	},
	lift_clear_canvas_menu: function lift_clear_canvas_menu(e) {
		$('header.site-header .menu-offcanvas-'+e).removeAttr('style')
	},
	lift_gen_canvas_menu: function lift_gen_canvas_menu(e) {
		// Off canvas menu toggle
		var getHeaderNormal = $('header#header').outerHeight(true)
		if($('header#header .navbar').hasClass('navbar-expand-'+e)){
			$('header.site-header .menu-offcanvas-'+e).css({
				'top': getHeaderNormal+'px'
			})
		} else {
			$('header.site-header .menu-offcanvas-'+e).removeAttr('style')
		}
	},
	lift_hover_menu: function lift_hover_menu(e) {
		// Menu hover with breakpoint
		$('header.site-header .navbar-expand-'+e+' #site-navigation li.menu-item-has-children').hover(function(){
			$(this).addClass('menu-hover')
		}, function(){
			$(this).removeClass('menu-hover')
		})
	},
	lift_fixed_header: function lift_fixed_header() {
		// Fixed header will be add padding to the html element
		var getHeader = $('header#header.fixed-top').outerHeight(true)
		if (getHeader) {
			$('html').css({
				'padding-top': getHeader + 'px'
			})
		}
	},
	lift_toggle_ofcanvas: function lift_toggle_ofcanvas() {
		// When toggle menu scrolled
		if($('header#header:not(.fixed-top)')) {
			$('header#header .navbar-toggler.navbar-offcanvas').addClass('collapsed')
			$('header#header .primary-menu-container').removeClass('open')
		}
	},
	lift_active_header: function lift_active_header() {
		// When window is scrolled
		var st = $(window).scrollTop();
		if (st > 0) {
			$('header#header.fixed-top').addClass('active')
			LIFT_APP.lift_toggle_ofcanvas()
		} else {
			$('header#header.fixed-top').removeClass('active')
		}
	},
	lift_canvas_header: function lift_canvas_header() {
		LIFT_APP.lift_gen_canvas_menu('all')
		if($(window).width() < LIFT_APP.sm){
			LIFT_APP.lift_gen_canvas_menu('sm')
		} else {
			LIFT_APP.lift_clear_canvas_menu('sm')
		}
		if($(window).width() <= LIFT_APP.md){
			LIFT_APP.lift_gen_canvas_menu('md')
		} else {
			LIFT_APP.lift_clear_canvas_menu('md')
		}
		if($(window).width() <= LIFT_APP.lg){
			LIFT_APP.lift_gen_canvas_menu('lg')
		} else {
			LIFT_APP.lift_clear_canvas_menu('lg')
		}
		if($(window).width() <= LIFT_APP.xl){
			LIFT_APP.lift_gen_canvas_menu('xl')
		} else {
			LIFT_APP.lift_clear_canvas_menu('xl')
		}
		if($(window).width() <= LIFT_APP.xxl){
			LIFT_APP.lift_gen_canvas_menu('xxl')
		} else {
			LIFT_APP.lift_clear_canvas_menu('xxl')
		}
	},
	lift_get_header_hover: function lift_get_header_hover() {
		// TODO: read this one again 
		if($(window).width() > 0){
			LIFT_APP.lift_hover_menu('keep')
		}
		if($(window).width() >= LIFT_APP.sm){
			LIFT_APP.lift_hover_menu('sm')
		}
		if($(window).width() >= LIFT_APP.md){
			LIFT_APP.lift_hover_menu('md')
		}
		if($(window).width() >= LIFT_APP.lg){
			LIFT_APP.lift_hover_menu('lg')
		}
		if($(window).width() >= LIFT_APP.xl){
			LIFT_APP.lift_hover_menu('xl')
		}
		if($(window).width() >= LIFT_APP.xxl){
			LIFT_APP.lift_hover_menu('xxl')
		}
	}
}

///////////////////////////////////////////////////
// INIT APP 
///////////////////////////////////////////////////
liftDOMChange(() => {
});

$(function() {
	LIFT_APP.lift_fixed_header()
});

$( document ).ready(function() {
	LIFT_APP.lift_fixed_header()
	LIFT_APP.lift_canvas_header()
	LIFT_APP.lift_get_header_hover()
	LIFT_APP.lift_admin_toolbar()
});

$(window).scroll(function () {
	LIFT_APP.lift_active_header()
});

$(window).resize(function () {
	LIFT_APP.lift_fixed_header()
	LIFT_APP.lift_canvas_header()
	LIFT_APP.lift_get_header_hover()
});