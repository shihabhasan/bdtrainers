<?php 
/**
 * The template for displaying Search Results pages.
 */
get_header(); ?>

<div class="main-wrapper-item">

	<div class="bread-title-holder">
		<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
					<h1 class="title">
						<?php printf( __( 'Search Results for: %s', 'invert-lite' ), '<span>' . get_search_query() . '</span>' ); ?> 	
					</h1>
					<?php
						if( get_theme_mod('breadcrumb_sec', 'on') == 'on' ) {
							if ((class_exists('invert_lite_breadcrumb_class'))) {$invert_breadcumb->invert_lite_custom_breadcrumb();}
					    }
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="container post-wrap"> 
		<div class="row-fluid">
			<div id="container" class="span8">
				<div id="content" role="main">
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
					<div class="navigation">	
						<?php if( function_exists("invert_lite_paginate") && get_theme_mod('blogpage_custom_pagination', 'on') == 'on' ) { invert_lite_paginate(); } else { ?>			
						<div class="alignleft"><?php previous_posts_link(__('&larr;Previous','invert-lite'),0) ?></div>		
						<div class="alignright"><?php next_posts_link(__('Next&rarr;','invert-lite'),0) ?></div>    		
						<?php } ?>					
					</div>
					<?php else :  ?>
					<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
				</div>
				<!-- content --> 
			</div>
			<!-- container --> 
			
			<!-- Sidebar -->
			<div id="sidebar" class="span3">
				<?php get_sidebar(); ?>
			</div>
			<!-- Sidebar -->
		</div>
	</div>

</div>
<?php get_footer(); ?>