<?php
	get_header();
	get_template_part( 'inc/classes/post' );
	$hued_post = new Hued_Post();
	$hued_post->display( get_post_format() );
	get_footer();
?>