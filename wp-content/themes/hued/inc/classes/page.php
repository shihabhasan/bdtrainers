<?php
	require_once( 'single.php' ); 
	class Hued_Page extends Hued_Single {
		function display( $template = 'template_default' ) {
            echo '<main role="main" id="content-area">';
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        $this->post_header( true, false );
                        get_sidebar();
                        $this->$template();
                        comments_template();
                    endwhile;
                else:
                    $this->nopost_error();
                endif;
            echo '</main>';
		}
		
		private function template_default() {
			echo '<article id="post-', get_the_ID(), '" ', post_class( 'article box' ), '>';
			echo '<section id="the-content">';
				the_content();
			echo '</section>';
			$this->post_pagination();
            echo '</article>';
		}
		
		private function template_sitemap() {
			echo '<article id="post-', get_the_ID(), '" ', post_class( 'article box' ), '>';
			echo '<section id="the-content">';
				the_content();
			?>
            	<div class="clear"></div>
                <div class="left" style="width:50%">  
                    <h3><?php echo __( 'Pages:', 'hued' ); ?></h3>
                    <ul><?php wp_list_pages(array('title_li' => '')); ?></ul>
                </div>
                <div class="left" style="width:50%">  
                    <h3><?php echo __( 'Categories:', 'hued' ); ?></h3>
                    <ul><?php wp_list_categories(array('title_li' => '', 'show_count' => 1, 'hide_empty' => 0)); ?></ul>
                </div>
                <div class="clear"></div>
                <h3><?php echo __( 'Site Archives by Month:', 'hued' ); ?></h3>
                    <ul id="archives"><?php wp_get_archives(array('show_post_count' => true)); ?></ul>
				<div class="clear"></div>
        <?php
			echo '</section>';
			$this->post_pagination();
            echo '</article>';
		}
	}
?>