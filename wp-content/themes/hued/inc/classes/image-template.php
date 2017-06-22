<?php
	require_once( 'post.php' );
	class Hued_Image_Template extends Hued_Post {
		function display( $format = false ) {
			echo '<main role="main" id="content-area">';
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						previous_post_link( '%link', '<div class="box-i" style="padding: 5px 15px;">&laquo; ' . __( 'Go back to ', 'hued' ) . '"%title" </div>' );
?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'box' ); ?> style="padding: 0 10px;">
							<?php $this->post_meta_top(); ?>
							<section id="the-content" style="margin: 0 -10px;">
								<div class="image-nav">
									<?php
										global $post;
										the_attachment_link( $post->ID, true );
										previous_image_link( false, '<div class="prev"><div></div></div>' );
										next_image_link( false, '<div class="next"><div></div></div>' );
									?>
								</div>
								<?php if ( has_excerpt() ) { ?>
									<div class="wp-caption">
										<?php the_excerpt();?>
									</div>
								<?php } ?>
								<?php if ( get_the_content() != '' ) { ?>
									<div class="wp-desc">
										<?php the_content(); ?>
									</div>
								<?php } ?>
							</section><?php #the-content ?>
						</article><?php #post-id ?>
<?php
							$this->post_header( false, false );
					endwhile;
				else:
					$this->nopost_error();
				endif;
				wp_enqueue_script( 'hued-image-nav' );
			echo '</main>';
		} // display()
	}
?>