<?php
	get_header();

	// featured content
	$featured_toggle = esc_html( get_theme_mod( 'hued_featured_toggle', 'enabled' ) );
	if ( is_front_page() && !is_paged() && $featured_toggle == 'enabled' ) {
		echo '<div id="featured-content">';
		global $post;
		$featured_cat = esc_html( get_theme_mod( 'hued_featured_category', '0' ) );
		$fposts = get_posts( array(
								   'posts_per_page' => 7,
								   'category' => $featured_cat
								   )
							);
		if ( count( $fposts ) < 7 ) {
			$fposts = array_merge( $fposts, get_posts( array(
															 'posts_per_page' => 7 - count( $fposts ),
															 'category__not_in' => array( $featured_cat )
															 )
													  )
								  );
		}
		global $hued_fcount;
		$hued_fcount = 0;
		foreach( $fposts as $post ) {
			setup_postdata( $post );
			$hued_fcount++;
			get_template_part('inc/featured-loop');
		}
		wp_reset_postdata();
		echo '</div>';
		echo '<div class="clear"></div>';
	} // featured content: end

	get_template_part( 'inc/classes/entries' );
	$hued_entries = new Hued_Entries();
	$hued_entries->display( '' );
	get_footer();
?>