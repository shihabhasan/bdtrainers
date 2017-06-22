<?php
	class Hued_Single {
		protected function post_header( $thumb = true, $author = true ) {
			if ( has_post_thumbnail() && $thumb ) {
				echo '<div id="post-header" class="box-s has-thumb">';
				the_post_thumbnail( 'hued-entry-thumb' );
			} else {
				echo '<div id="post-header" class="box-i">';
			}
			echo '<div id="post-header-content">';
				echo '<h1 id="post-title">';
				echo hued_get_the_title();
				echo '</h1>';
				if ( $author ) {
                	echo '<span class="author">', __( 'By ', 'hued' ), '<strong>', get_the_author(), '</strong></span>';
                }
			echo '</div></div>';
		}
		
		protected function post_pagination() {
			$prevargs = array(
							  'before' => '<span class="previous">',
							  'after' => '</span>',
							  'next_or_number' => 'next',
							  'separator' => '',
							  'nextpagelink' => '',
							  'previouspagelink' => __( '&laquo; Previous', 'hued' ),
							  'pagelink' => '',
							  'echo' => 0
							  );
			$nextargs = array(
							  'before' => '<span class="next">',
							  'after' => '</span>',
							  'next_or_number' => 'next',
							  'separator' => '',
							  'nextpagelink' => __( 'Next &raquo;', 'hued' ),
							  'previouspagelink' => '',
							  'pagelink' => '',
							  'echo' => 0
							  );
			wp_link_pages( array(
								 'before' => '<section id="post-pagination">' . wp_link_pages( $prevargs ) . ' ',
								 'after' => ' ' . wp_link_pages( $nextargs ) . '</section>',
								 'next_or_number' => 'number'
								 )
						  );
		}

		protected function nopost_error() {
			echo '<p>' . __( 'Error! Please try reloading the page, contact us if the problem persists.', 'hued' ) . '</p>';
		}
	}
?>