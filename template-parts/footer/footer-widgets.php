<?php
/**
 * Displays the footer widget area.
 *
 * @package LIFT Creations 
 * @subpackage Theme by Nguyen Pham
 * @since 2021
 */

global $lift_theme;
$footer_value['footer_col'] = $lift_theme['lift-theme-footer-columns'];
$footer_value['footer_set_col'] = '12';
$footer_value['footer_style'] = $lift_theme['lift-theme-layout-style'];
$footer_value['footer_size'] = $lift_theme['lift-theme-layout-size'];
var_dump($lift_theme);
?>

<?php if(is_active_sidebar('sidebar-1')) {?>
<footer id="footer" class="footer">
	<div class="container<?= isset($footer_value['footer_style']) && $footer_value['footer_style'] === '1' ? '-fluid': ''?>">
		<div class="row">
			<?php
				for ($i=1; $i <= $footer_value['footer_col'] ; $i++) { 
			?>
				<?php if(is_active_sidebar( 'sidebar-'.$i )) {?>
					<div class="col-<?=$footer_value['footer_set_col']?>"><?php dynamic_sidebar( 'sidebar-'.$i ); ?></div>
				<?php } ?>
			<?php
				}
			?>
		</div>
	</div>
</footer>
<?php } ?>
