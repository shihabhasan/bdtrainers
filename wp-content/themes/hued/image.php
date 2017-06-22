<?php
	get_header();
	get_template_part( 'inc/classes/image-template' );
	$hued_imagetemplate = new Hued_Image_Template();
	$hued_imagetemplate->display();
	get_footer();
?>