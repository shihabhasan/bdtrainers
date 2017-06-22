<?php global $hued_fcount; ?>
<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'featured-entry e' . $hued_fcount . ( ( $hued_fcount % 2 == 0 ) ? ' even' : ' odd' ) ); ?>>
            <?php
				if ( has_post_thumbnail() ) {
					echo '<span class="entry-image">';
					the_post_thumbnail( 'hued-entry-thumb' );
					echo '</span>';
				}
			?>
        <div class="entry-content">
            <div class="entry-top">
                <h3 class="entry-title">
					<?php echo hued_get_the_title(); ?>
                </h3>
            </div>
        </div><?php // .entry-content ?>
	</section>
</a>