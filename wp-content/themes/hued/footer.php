			<div class="clear"></div>
            <div id="footer">
                <?php
					$foobar_toggle = esc_html( get_theme_mod( 'hued_footer_widgets_toggle', 'enabled' ) );
                    if( !wp_attachment_is_image() && $foobar_toggle == 'enabled' ) {
                        get_sidebar('foobar');
                    }
                ?>
            </div><?php #footer ?>
        </div><?php #wrapper ?>
        <?php hued_footer_info(); ?>
        <?php wp_footer(); ?>
	</body>
</html>