<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package ThemeGrill
 * @subpackage FitClub
 * @since Fitclub 1.0
 */

/**
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if( !is_active_sidebar( 'fitclub_footer_sidebar1' ) &&
   !is_active_sidebar( 'fitclub_footer_sidebar2' ) &&
   !is_active_sidebar( 'fitclub_footer_sidebar3' ) &&
   !is_active_sidebar( 'fitclub_footer_sidebar4' ) ) {
   return;
}
?>
<div id="top-footer">
	<div class="tg-container">
		<div class="top-footer-wrapper clearfix">
			<div class="tg-column-wrapper">
				<?php

				$footer_sidebar_count = absint(get_theme_mod('fitclub_footer_widgets', '4'));
				$footer_sidebar_class = 'tg-column-'. $footer_sidebar_count;

				for ($i = 1; $i <= $footer_sidebar_count; $i++ ) {
					?>
					<div class="<?php echo esc_attr($footer_sidebar_class); ?> footer-block">

					<?php
					if ( is_active_sidebar( 'fitclub_footer_sidebar'.$i) ) {

						dynamic_sidebar( 'fitclub_footer_sidebar'.$i);
					}
					?>
					</div>

				<?php }
				?>
			</div>
		</div>
	</div>
</div>