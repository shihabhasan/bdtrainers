<?php
/**
 * The sidebar containing the main home columns widget areas
 *
 * @subpackage fgymm
 * @author tishonator
 * @since fgymm 1.6.1
 *
 */
?>

<div id="home-cols">

	<div id="home-cols-inner">

		<?php 
			/**
			 * Display widgets dragged in 'Homepage Columns 1' widget areas
			 */
		?>
		<div class="col3a">

			<?php if ( !dynamic_sidebar( 'homepage-column-1-widget-area' ) ) : ?>

						<h2 class="sidebar-title">
							<?php esc_html_e('Home Col Widget 1', 'fgymm'); ?>
						</h2><!-- .sidebar-title -->
						
						<div class="sidebar-after-title">
						</div><!-- .sidebar-after-title -->
						
						<div class="textwidget">
							<?php esc_html_e('This is first homepage widget area. To customize it, please navigate to Admin Panel -> Appearance -> Widgets and add widgets to Homepage Column #1.', 'fgymm'); ?>
						</div><!-- .textwidget -->
			
			<?php endif; // end of ! dynamic_sidebar( 'homepage-column-1-widget-area' )
				  ?>

		</div><!-- .col3a -->
		
		<?php 
			/**
			 * Display widgets dragged in 'Homepage Columns 2' widget areas
			 */
		?>
		<div class="col3b">
			<?php if ( !dynamic_sidebar( 'homepage-column-2-widget-area' ) ) : ?>
			
					<h2 class="sidebar-title">
						<?php esc_html_e('Home Col Widget 2', 'fgymm'); ?>
					</h2><!-- .sidebar-title -->
					
					<div class="sidebar-after-title">
					</div><!-- .sidebar-after-title -->
					
					<div class="textwidget">
						<?php esc_html_e('This is second homepage widget area. To customize it, please navigate to Admin Panel -> Appearance -> Widgets and add widgets to Homepage Column #2.', 'fgymm'); ?>
					</div><!-- .textwidget -->
						
			<?php endif; // end of ! dynamic_sidebar( 'homepage-column-2-widget-area' )
				  ?>
			
		</div><!-- .col3b -->

		<?php 
			/**
			 * Display widgets dragged in 'Homepage Columns 3' widget areas
			 */
		?>
		<div class="col3c">
			<?php if ( !dynamic_sidebar( 'homepage-column-3-widget-area' ) ) : ?>
			
					<h2 class="sidebar-title">
						<?php esc_html_e('Home Col Widget 3', 'fgymm'); ?>
					</h2><!-- .sidebar-title -->
					
					<div class="sidebar-after-title">
					</div><!-- .sidebar-after-title -->
					
					<div class="textwidget">
						<?php esc_html_e('This is third homepage widget area. To customize it, please navigate to Admin Panel -> Appearance -> Widgets and add widgets to Homepage Column #3.', 'fgymm'); ?>
					</div><!-- .textwidget -->
						
			<?php endif; // end of ! dynamic_sidebar( 'homepage-column-3-widget-area' )
				  ?>
			
		</div><!-- .col3c -->
		
		<div class="clear">
		</div><!-- .clear -->

	</div><!-- #home-cols-inner -->

</div><!-- #home-cols -->