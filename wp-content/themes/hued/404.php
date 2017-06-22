<?php
	get_header();
?>
<main role="main" id="content-area">
	<div id="page-header" class="box-i">
        <h1><?php echo __( '404: Page Not Found!', 'hued' ); ?></h1>
    </div>
    <?php get_sidebar(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'article box lmargin300' ); ?>>
        <section class="box">
            <img src="<?php echo get_template_directory_uri() ?>/inc/img/404.png" style="display: block; margin: 15px auto;" />
        </section>
    </article><?php #post-ID ?>
</main>
<?php get_footer(); ?>