<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT BeFit
 */
?>
<footer id="footer">
	<div class="site-aligner">
    		<div class="widget-column">
            <div class="cols">
            <?php if ( '' !== get_theme_mod( 'contact_title' ) ){  ?>
            <h2><?php echo get_theme_mod('contact_title',esc_html('Our Address','skt-befit')); ?></h2>
            <?php } ?>
                <?php if ( '' !== get_theme_mod( 'contact_desc' ) ){  ?>
                    <p><?php echo get_theme_mod('contact_desc',esc_html('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','skt-befit')); ?></p>
                <?php } ?>
                <div class="spacer20"></div>
               <?php if ( '' !== get_theme_mod( 'contact_no' ) ){  ?>
                    <div class="foot-label"><?php esc_attr_e('Call Us : ','skt-befit'); ?></div><div class="add-content"><?php echo get_theme_mod('contact_no',esc_html('+9876543210','skt-befit')); ?></div><div class="clear"></div>
                <?php } ?>
                    <div class="foot-label"><?php esc_attr_e('E-mail : ','skt-befit'); ?></div><div class="mail-content">
                    <?php if( get_theme_mod('contact_mail')){ ?><a href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail')); ?>"><?php echo get_theme_mod('contact_mail'); ?></a><?php } else { ?><a href="mailto:<?php echo sanitize_email('contact@company.com '); ?>"><?php echo 'contact@company.com '; ?></a><?php }?>
                    </div><!-- mail-content --><div class="clear"></div>
                <div class="spacer10"></div>
                <div class="social">
                        <?php if ( '' !== get_theme_mod( 'fb_link' ) ){  ?>
                         <a target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>" title="Facebook" ><div class="fb icon"></div></a>
                         <?php } ?>
                        <?php if ( '' !== get_theme_mod( 'twitt_link' ) ){  ?>
                         <a target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>" title="Twitter" ><div class="twitt icon"></div></a>
                         <?php } ?>
                         <?php if ( '' !== get_theme_mod( 'gplus_link' ) ){  ?>
                         <a target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>" title="Google Plus" ><div class="gplus icon"></div></a>
                         <?php } ?>
                         <?php if ( '' !== get_theme_mod( 'linked_link' ) ){  ?>
                         <a target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>" title="Linkedin" ><div class="linkedin icon"></div></a>
                         <?php } ?>
                         
                </div>
            </div><!-- cols -->
       </div><!-- widget-column -->
       <div class="widget-column">
                <div class="cols"><h2><?php esc_attr_e('Our Menu','skt-befit'); ?></h2>
                   <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                </div><!-- cols -->
        </div><!-- widget-column -->
        <div class="widget-column">
            <div class="cols"><h2><?php esc_attr_e('Latest Posts','skt-befit'); ?></h2>
	<?php $args = array( 'posts_per_page' => 6, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
			query_posts( $args ); ?>
				<ul class="recent-post">
                	<?php query_posts('post_type=post&posts_per_page=3'); ?>
					<?php if ( have_posts() ) : ?>
                    <?php  while( have_posts() ) : the_post(); ?>
                  	<li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(59,51)); ?><?php the_title();?></a><br/><?php echo sktbefit_content(10); ?></li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
                </div><!-- cols -->
        </div><!-- widget-column -->
        <div class="widget-column last">
       		<?php if(!dynamic_sidebar('twitter-wid')) : ?>
                <div class="cols"><h2><?php esc_attr_e('Twitter Feed','skt-befit'); ?></h2>
                   <p><?php esc_attr_e('Use twitter widget for twitter feed.','skt-befit'); ?></p>
                </div><!-- cols -->
            <?php endif; ?>
        </div><!-- widget-column --><div class="clear"></div>
	</div><!-- site-aligner -->
</footer>
<div id="copyright">
	<div class="site-aligner">
    	<div class="right"><?php echo sktbefit_by(); ?></div>
        <div class="clear"></div>
    </div>
</div><!-- copyright -->
</div><!-- wrapper -->
<?php wp_footer(); ?>
</body>
</html>