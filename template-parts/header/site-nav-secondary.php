<?php
/**
 * Displays the site navigation.
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

?>

<?php 

global $lift_theme;
$header_second_menu = $lift_theme['lift-theme-header-second'];


?>
<?php if(isset($header_second_menu) && $header_second_menu === '1') { ?>
<?php if ( has_nav_menu( 'secondary' ) ) : ?>
	  <?php
		wp_nav_menu(
			array(
				'theme_location'  => 'secondary',
				'menu_class'      => 'secondary-navigation menu-wrapper navbar-nav',
				'items_wrap'      => '<ul id="secondary-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'     => false,
			)
		);
		?>
<?php endif; ?>
<?php  } ?>
