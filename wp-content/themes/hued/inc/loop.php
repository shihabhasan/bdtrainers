<section id="post-<?php the_ID(); ?>" <?php post_class( 'entry box lmargin300' ); ?>>
	<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
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
                <div class="entry-author">
                    <?php echo __( 'By ', 'hued' ); the_author(); ?>
                </div>
            </div>
            <?php if ( get_the_excerpt() ) { ?>
            	<div class="entry-excerpt"><?php the_excerpt(); ?></div><?php // adding white-space may break layout ?>
			<?php } ?>
        </div><?php // .entry-content ?>
	</a>
</section>