<?php
$sidebar_location = esc_html( get_theme_mod( 'hued_sidebar_location', 'left' ) );
if ( $sidebar_location != 'hidden' ) {
	echo '<div id="sidebar">';
		dynamic_sidebar('sidebar');
	echo '</div>';
}
?>