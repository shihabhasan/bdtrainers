<?php
	get_header();
	get_template_part( 'inc/classes/entries' );
	$hued_entries = new Hued_Entries();
	$hued_entries->display( 'tag_template' );
	get_footer();
?>