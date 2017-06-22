<?php

	// if password protected
	if ( post_password_required() || !( comments_open() || have_comments() ) ) {
		return;
	}
	?>
	<div id="comments" class="comments-area box">
    <?php
		// comment form
		function hued_move_textarea( $input = array () ) {
			static $textarea = '';
			if ( 'comment_form_defaults' === current_filter() ) {
				$textarea = $input['comment_field'];
				$input['comment_field'] = '';
				return $input;
			}
			print apply_filters( 'comment_form_field_comment', $textarea );
		}
		if ( comments_open() ) {
			// move comment textarea above fields
			add_filter( 'comment_form_defaults', 'hued_move_textarea', 100 );
			add_action( 'comment_form_top', 'hued_move_textarea' );
			comment_form( array(
								'comment_notes_before' => '',
								'comment_notes_after' => '',
								'title_reply' => __( 'Post a Comment', 'hued' ),
								'title_reply_to' => __( 'Reply to %s', 'hued' ),
								'cancel_reply_link' => __( '(Cancel Reply)', 'hued' ),
								'label_submit' => __( 'Post Comment', 'hued' )
								)
						 );
		}
		// comments list
		$comments_feed_toggle = esc_html( get_theme_mod( 'hued_comments_feed_toggle', 'enabled' ) );
		if ( $comments_feed_toggle == 'enabled' ) {
			echo '<a href="' . get_post_comments_feed_link() . '" title="' . __( 'Comments Feed', 'hued' ) . '" target="_blank" class="comments-feeds-link"></a><div class="clear"></div>';
		}
		if ( have_comments() ) :
			$comments = wp_list_comments( array(
												'type' => 'comment',
												'style' => 'div',
												'avatar_size' => 40,
												'format' => 'html5',
												'callback' => 'hued_list_comments',
												'echo' => false
												)
										 );
			if ( $comments != '' ) echo '<div id="comments-list">', $comments, '</div>';
			$comments_pagination = paginate_comments_links( array(
																  'prev_text' => __( '&laquo; Older', 'hued' ),
																  'next_text' => __( 'Newer &raquo;', 'hued' ),
																  'mid_size' => 1,
																  'echo' => false
																  )
														   );
			$pings = wp_list_comments( array(
											 'type' => 'pings',
											 'short_ping' => true,
											 'style' => 'div',
											 'format' => 'html5',
											 'per_page' => 0,
											 'echo' => false
											 )
									  );
			if ( $pings != '' ) echo '<div id="pings-list">', $pings, '</div>';
			if ( $comments_pagination != '' ) echo '<div class="comments-pagination">', $comments_pagination, '</div>';
		endif;
	?>
	</div> <?php #comments ?>
	<?php // comments list callback
		function hued_list_comments( $comment, $args, $depth ) {
			$GLOBALS['comment'] = $comment;
			extract( $args, EXTR_SKIP );
	?>
	
			<?php echo '<div ', comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>"> <?php // do not close this <div> tag, will be handled by end-callback ?>
			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<?php // moderation text
					if ( $comment->comment_approved == '0' ) {
						echo '<div class="comment-awaiting-moderation"><em>', __( 'Your comment is awaiting moderation.', 'hued' ), '</em></div>';
					}
				?>
	
				<div class="comment-author vcard">
					<?php
						if ( $args['avatar_size'] != 0 ) {
							echo get_avatar( $comment, $args['avatar_size'] );
						}
						echo '<span class="fn">', get_comment_author_link(), '</span>';
						if ( $comment->user_id != 0 ) {
							$authorcomment = ( get_the_author_meta( 'ID' ) == $comment->user_id ) ? true : false;
							$role = get_userdata( $comment->user_id )->roles[0];
							if ( $role == 'contributor' ) {
								$role = __( 'Contributor', 'hued' );
							} elseif ( $role == 'administrator' ) {
								$role = __( 'Admin', 'hued' );
							} else {
								unset( $role );
							}
	
							if ( isset( $role ) ) {
								echo '<em class="author-role">(', ( $authorcomment ) ? __( 'Author/', 'hued' ) : '', $role, ')</em>';
							} elseif ( $authorcomment ) {
								echo '<em class="author-role">', __( '(Author)', 'hued' ), '</em>';
							}
						}
					?>
				</div>
	
				<div class="comment-text">
					<?php comment_text(); ?>
				</div>
	
				<div class="comment-meta commentmetadata">
					<span class="date-time">
					<?php
						echo '<a href="', htmlspecialchars( get_comment_link( $comment->comment_ID ) ), '" rel="nofollow"><time datetime="', comment_date( 'c' ), '">', comment_date( "M d, Y \a\\t h:i a" ), '</time></a>';
						edit_comment_link( __( 'Edit', 'hued' ), ' (', ')' );
					?>
					</span>
					<span class="reply">
						<?php comment_reply_link( array(
														'add_below' => 'div-comment',
														'depth' => $depth,
														'max_depth' => $args['max_depth'],
														'login_text' => __( ' Login to reply. ', 'hued' )
														)
												 );
						?>
					</span>
				</div>
	
			</div> <?php // .comment-body
		}
	?>