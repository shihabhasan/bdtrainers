<?php
	$contentfont = esc_html( get_theme_mod( 'hued_content_font', 'sans-serif' ) );
	if ( $contentfont != 'sans-serif' ) {
		$file_url = get_template_directory() . '/inc/fonts/' . $contentfont . '/font.otf';
		if ( file_exists( $file_url ) ) {
	        $contentfonturl = get_template_directory_uri() . '/inc/fonts/' . $contentfont . '/font.otf';
	    } else {
	        $contentfonturl = get_template_directory_uri() . '/inc/fonts/' . $contentfont . '/font.ttf';
	    }
	}
	
	$content_font_size = absint( get_theme_mod( 'hued_content_font_size', '16' ) );

	$logofont = esc_html( get_theme_mod( 'hued_logo_font', 'sans-serif' ) );
	if ( $logofont != 'sans-serif' ) {
		$file_url = get_template_directory() . '/inc/fonts/' . $logofont . '/font.otf';
		if ( file_exists( $file_url ) ) {
	        $logofonturl = get_template_directory_uri() . '/inc/fonts/' . $logofont . '/font.otf';
	    } else {
	        $logofonturl = get_template_directory_uri() . '/inc/fonts/' . $logofont . '/font.ttf';
	    }
	}
	
	$logo_font_size = absint( get_theme_mod( 'hued_logo_font_size', '42' ) );
	
	$cs_font_color = esc_html( get_theme_mod( 'hued_font_color', '#222222' ) );
	
	$cs_link_color = esc_html( get_theme_mod( 'hued_link_color', '#336699' ) );
	
	$cs_featured_background1 = esc_html( get_theme_mod( 'hued_featured_gradient1', '#336699' ) );
	
	$cs_featured_background2 = esc_html( get_theme_mod( 'hued_featured_gradient2', '#339999' ) );
?>
<style type="text/css">
	@font-face {
		<?php if ( $contentfont != 'sans-serif') { ?>
			font-family: "<?php echo $contentfont; ?>";
			src: url('<?php echo $contentfonturl ?>');
		<?php } ?>
	}
	@font-face {
		<?php if ( $logofont != 'sans-serif') { ?>
			font-family: "<?php echo $logofont; ?>";
			src: url('<?php echo $logofonturl ?>');
		<?php } ?>
	}
	html {
		font-family: "<?php echo $contentfont; ?>", sans-serif;
		font-size: <?php echo $content_font_size; ?>px;
	}
	body,
	.entry a,
	.entry a:visited,
	.entry a:hover {
		color: <?php echo $cs_font_color; ?>;
	}
	#logo {
		font-family: "<?php echo $logofont; ?>", sans-serif;
		font-size: <?php echo $logo_font_size; ?>px;
	}
	a,
	a:visited,
	a:hover,
	#nav-container,
	.author-box .author-name,
	span.link-like {
		color: <?php echo $cs_link_color; ?>;
	}
	a:active {
		color: #999999;
	}
	#featured-content .featured-entry {
		background-color: #369;
	}
	#featured-content .even {
		background: radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) -130px -170px,
		radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) 130px 370px,
		radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.1) 11%, rgba(255,255,255,.2) 13%, rgba(255,255,255,0) 14%) 0 0,
		linear-gradient(<?php echo '135deg, ', $cs_featured_background1, ' 0%, ', $cs_featured_background2, ' 100%'; ?>);
		background-size: 610px 610px, 530px 530px, 730px 730px, 100% 100%;
	}
	#featured-content .odd {
		background: radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) -130px -170px,
		radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) 130px 370px,
		radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.1) 11%, rgba(255,255,255,.2) 13%, rgba(255,255,255,0) 14%) 0 0,
		linear-gradient(<?php echo '135deg, ', $cs_featured_background2, ' 0%, ', $cs_featured_background1, ' 100%'; ?>);
		background-size: 610px 610px, 530px 530px, 730px 730px, 100% 100%;
	}
</style>