<?php
/*
Template Name: HTML Sitemap
*/
	get_header();
	get_template_part( 'inc/classes/page' );
	$hued_page = new Hued_Page();
	$hued_page->display( 'template_sitemap' );
	get_footer();
?>