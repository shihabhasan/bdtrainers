<?php
	class Hued_Entries {
		function display( $header = 'common' ) {
			echo '<main role="main" id="content-area">';
				if ( method_exists( $this, $header ) ) {
					$this->$header();
				}
				get_sidebar();
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'inc/loop' );
					endwhile;
					$this->entries_pagination();
				else:
						echo '<p>' . __( 'Sorry, no posts found!', 'hued' ) . '</p>';
				endif;
			echo '</main>';
		}

		private function common() {
			echo '<div id="page-header" class="box-i"><h2>' . wp_title( '&raquo;', false ) . '</h2></div>';
		}
		private function author_template() {
			echo '<div id="page-header" class="box-i"><h2>', __( 'Posts by ', 'hued' ), wp_title( '&raquo;', false ) . '</h2></div>';
		}
		private function category_template() {
			echo '<div id="page-header" class="box-i"><h2>', __( 'Category Archive: ', 'hued' ), '<em>' . single_cat_title( '', false ) . '</em></h2></div>';
		}
		private function search_template() {
			echo '<div id="page-header" class="box-i"><h2>', __( 'Search Results for ', 'hued' ), '&quot;<em>' . get_search_query() . '</em>&quot;</h2></div>';
		}
		private function tag_template() {
			echo '<div id="page-header" class="box-i"><h2>', __( 'Tag Archive: ', 'hued' ), '<em>' . single_tag_title( '', false ) . '</em></h2></div>';
		}
		
		private function entries_pagination() {
			if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
				global $wp_query;
				echo '<div class="entry-pagination box-i lmargin300">';
				the_posts_pagination( array(
					'mid_size' => 2,
					'prev_text' => __('&laquo; Newer Posts', 'hued'),
					'next_text' => __( 'Older Posts &raquo;', 'hued' ),
					'screen_reader_text' => ' '
					)
				);
				echo '</div>';
			}
		}
	}
?>