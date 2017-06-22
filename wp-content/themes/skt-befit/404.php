<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package SKT BeFit
 */

get_header(); ?>

<div id="content">
    <div class="site-aligner">
        <section class="site-main" id="sitemain">
                <h1 class="entry-title"><?php esc_attr_e( '404 Not Found', 'skt-befit' ); ?></h1>
            <div class="page-content">
                <p class="text-404"><?php esc_attr_e( 'Looks like you have taken a wrong turn..... Dont worry... it happens to the best of us.', 'skt-befit' ); ?></p>
            </div><!-- .page-content -->
        </section>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>