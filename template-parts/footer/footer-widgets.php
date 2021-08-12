<?php
/**
 * Displays the footer widget area.
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * https://baonguyenyam.github.io/cv
 * @since 2021
 */

global $lift_theme;
$footer_col = $lift_theme['lift-theme-footer-columns'];
$footer_style = $lift_theme['lift-theme-footer-layout-style'];
$footer_row = $lift_theme['lift-theme-footer-row-option'];
$footer_gutters = $lift_theme['lift-theme-footer-columns-gutters'];
$global_backtotop = trim($lift_theme['lift-theme-global-function-backtotop']);
$global_backtotop_mobile = trim($lift_theme['lift-theme-global-function-backtotop-mobile']);
$global_backtotop_phalet = trim($lift_theme['lift-theme-global-function-backtotop-phalet']);
$global_backtotop_tablet = trim($lift_theme['lift-theme-global-function-backtotop-tablet']);
$global_backtotop_smallpc = trim($lift_theme['lift-theme-global-function-backtotop-smallpc']);

$build_footer_spacing = '';
if(isset($lift_theme['lift-theme-footer-row-spacing'])) {
	$build_footer_spacing_value = '';
	$footer_value['footer_row_unit'] = $lift_theme['lift-theme-footer-row-spacing']['unit'];
	if(isset($lift_theme['lift-theme-footer-row-spacing']['padding-top']) && $lift_theme['lift-theme-footer-row-spacing']['padding-top'] != '') {
		$build_footer_spacing_value .= 'padding-top:'.$lift_theme['lift-theme-footer-row-spacing']['padding-top'].';';
	}
	if(isset($lift_theme['lift-theme-footer-row-spacing']['padding-bottom']) && $lift_theme['lift-theme-footer-row-spacing']['padding-bottom'] != '') {
		$build_footer_spacing_value .= 'padding-bottom:'.$lift_theme['lift-theme-footer-row-spacing']['padding-bottom'].';';
	}
	if(isset($lift_theme['lift-theme-footer-row-spacing']['padding-left']) && $lift_theme['lift-theme-footer-row-spacing']['padding-left'] != '') {
		$build_footer_spacing_value .= 'padding-left:'.$lift_theme['lift-theme-footer-row-spacing']['padding-left'].';';
	}
	if(isset($lift_theme['lift-theme-footer-row-spacing']['padding-right']) && $lift_theme['lift-theme-footer-row-spacing']['padding-right'] != '') {
		$build_footer_spacing_value .= 'padding-right:'.$lift_theme['lift-theme-footer-row-spacing']['padding-right'].';';
	}
	if(isset($lift_theme['lift-theme-footer-row-spacing']['padding-top']) && $lift_theme['lift-theme-footer-row-spacing']['padding-top'] != '' || isset($lift_theme['lift-theme-footer-row-spacing']['padding-bottom']) && $lift_theme['lift-theme-footer-row-spacing']['padding-bottom'] != '' || isset($lift_theme['lift-theme-footer-row-spacing']['padding-left']) && $lift_theme['lift-theme-footer-row-spacing']['padding-left'] != '' || isset($lift_theme['lift-theme-footer-row-spacing']['padding-right']) && $lift_theme['lift-theme-footer-row-spacing']['padding-right'] != '') {
		$build_footer_spacing = ' style="'.$build_footer_spacing_value.'"';
	}
}
?>

<!-- LIFT FOOTER  -->
<?php if(is_active_sidebar('footer-sidebar-1')) {?>
<footer id="footer" class="footer lift-footer">
	<div class="footer-wrapper"<?= isset($footer_row) && $footer_row === '1' ? $build_footer_spacing : ''?>>
		<div class="container<?= isset($footer_style) && $footer_style === '1' ? '-fluid': ''?>">
			<div class="row<?= isset($footer_gutters) && $footer_gutters !== '-1' ? ' gx-'.$footer_gutters : ''?>">
				<?php
					for ($i=1; $i <= $footer_col ; $i++) { 
				?>
					<?php if(is_active_sidebar( 'footer-sidebar-'.$i )) {?>
						<div class="col-12 <?=$lift_theme['lift-theme-footer-columns-'.$i]?>"><?php dynamic_sidebar( 'footer-sidebar-'.$i ); ?></div>
					<?php } ?>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</footer>
<?php } ?>

<!-- LIFT BACK TO TOP -->
<?php if($global_backtotop) {?>
	<?php
		$displaybtt = 'position-fixed';
		if($global_backtotop_smallpc) {
			$displaybtt .= ' d-lg-flex';
			if($global_backtotop_tablet) {
				$displaybtt .= ' d-md-flex';
				if($global_backtotop_phalet) {
					$displaybtt .= ' d-sm-flex';
					if($global_backtotop_mobile) {
						$displaybtt .= ' d-flex';
					}
				}
			}
		}
		$displaybtt .= ' d-xl-flex';
	?>
	<a href="#back-to-top" id="backtotop" class="<?=$displaybtt;?>"><i class="fa fa-angle-up"></i></a>
<?php } ?>
