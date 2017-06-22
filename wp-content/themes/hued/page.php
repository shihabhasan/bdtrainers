<?php
	get_header();
	get_template_part( 'inc/classes/page' );
	$hued_page = new Hued_Page();
	$hued_page->display();
	get_footer();
?>