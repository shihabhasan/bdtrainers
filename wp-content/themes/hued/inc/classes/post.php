<?php
	require_once( 'single.php' );
	class Hued_Post extends Hued_Single {
		function display( $format ) {
			$format = ( empty( $format ) ? 'post_standard' : 'post_'.$format );
			echo '<main role="main" id="content-area">';
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							$this->$format();
							$this->posts_nav();
							$this->author_box();
							get_sidebar( 'postbar' );
							comments_template();
							echo '</div>'; // .lmargin300
						endwhile;
					else:
						$this->nopost_error();
					endif;
			echo '</main>';
		}
		
		// post formats: begin
		private function post_standard() {
			$this->post_header();
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->article();
		}
		
		private function post_gallery() {
			$this->article();
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->post_header( false, false );
		}
		
		private function post_image() {
			$this->article();
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->post_header( false, false );
		}
		
		private function post_audio() {
			$this->post_header();
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->article();
		}
		
		private function post_video() {
			$this->article();
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->post_header( false, false );
		}
		
		private function post_aside() {
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->article();
		}
		
		private function post_status() {
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->article();
		}
		
		private function post_link() {
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->article();
		}
		
		private function post_quote() {
			$this->article();
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->post_header( true, false );
		}
		
		private function post_chat() {
			$this->post_header();
			get_sidebar();
			echo '<div class="lmargin300">';
			$this->article();
		}
		// post formats: end
		
		private function article() {
			echo '<article id="post-', get_the_ID(), '" ', post_class( 'article box' ), '>';
			$this->post_meta_top();
			echo '<section id="the-content">';
				the_content();
			echo '</section>';
			$this->post_pagination();
			$this->post_meta_bottom();
            echo '</article>';
		}
		
		protected function post_meta_top() {
			echo '<section id="post-meta-top" class="post-meta">';
				$pubtime = get_the_time( 'c' );
				$modtime = get_the_modified_time( 'c' );
				if ( $pubtime != $modtime ) {
					echo __( 'Last modified on ', 'hued' ), '<time datetime="', $modtime, '" class="date-modified" title="', date( "l (F d, Y) \a\\t h:i a", strtotime( $modtime ) ), '">', date( "M d, Y ", strtotime( $modtime ) ), '</time>';
				} else {
					echo __( 'Published on ', 'hued' ), '<time datetime="', $pubtime, '" class="date-published" title="', date( "l (F d, Y) \a\\t h:i a", strtotime( $pubtime ) ), '">', date( "M d, Y ", strtotime( $pubtime ) ), '</time>';
				}
				edit_post_link( __( 'Edit', 'hued' ), '(', ')' );
				comments_popup_link( __( 'No Comments', 'hued' ), __( 'One Comment', 'hued' ), __( '&darr;% Comments', 'hued' ), 'comments-link', '' );
			echo '</section>';
		}
		
		private function post_meta_bottom() {
			echo '<section id="post-meta-bottom" class="post-meta">';
				echo '<div class="category">';
					$categories = get_the_category();
					if ( !empty( $categories ) ) {
						echo __( 'Filed under: ', 'hued' );
						foreach( $categories as $category ) {
							echo '<a rel="category tag" href="', get_category_link( $category->cat_ID ), '" title="', __( 'View all posts in ', 'hued' ), $category->name, '" class="category-link">', $category->name, '</a>';
							echo '<a href="', get_category_feed_link( $category->cat_ID ), '" title="', $category->name, ' feed" class="category-feed-link" target="_blank"><img src="', get_template_directory_uri(), '/inc/img/feed-icon.jpg" nopin="nopin" /></a> ';
						}
					}
				echo '</div>';
				echo '<div class="post-tags">';
					the_tags( __( 'Tags: ', 'hued' ), ', ', '' );
				echo '</div>';
			echo '</section>';
		}
		
		private function posts_nav() {
			echo '<div class="posts-nav box-i">';
			next_post_link( '%link', '&laquo; %title' );
			previous_post_link( '%link', '%title &raquo;' );
			echo '</div>';
		}
		
		private function author_box() {
			$authorbox_toggle = esc_html( get_theme_mod( 'hued_author_info_toggle', 'enabled' ) );
			if ( $authorbox_toggle == 'disabled' ) return false;
			echo '<div class="author-box box">';
				echo '<div class="basic-info">';
					echo get_avatar( get_the_author_meta( 'ID' ), 100, '', get_the_author().'\'s avatar" nopin="nopin' );
					echo '<span class="author-name-site">';
						echo '<span class="author-name">', get_the_author(), '</span>';
					echo '</span>';
				echo '</div>';
				echo '<div class="author-bio">';
					the_author_meta('description');
					echo ' <a href="', get_author_posts_url( get_the_author_meta( 'ID' ) ), '" title="' , __( 'All posts by ', 'hued' ), get_the_author(), ' on ', bloginfo('name'), '">', __( 'View all posts by ', 'hued' ), get_the_author(), ' &raquo;</a>';
					// latest posts by author
				echo '</div>';
			echo '</div>';
		}
	}
?>