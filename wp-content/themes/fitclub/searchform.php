<?php
/**
 * The template for displaying search forms in FitClub.
 *
 * @package ThemeGrill
 * @subpackage FitClub
 * @since FitClub 1.0
 */
?>
<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'fitclub' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<button type="submit" class="searchsubmit" name="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'fitclub' ); ?>"><i class="fa fa-search"></i></button>
</form>