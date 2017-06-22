<?php
// admin options
require_once('inc/admin/wp_customizer.php');

// register scripts and css
function hued_register_scripts_css() {
	wp_register_script( 'hued-noconflict', get_template_directory_uri() . '/inc/js/noconflict.js', array( 'jquery' ) );
	wp_register_script( 'hued-theme-scripts', get_template_directory_uri() . '/inc/js/theme-scripts.js', array( 'hued-noconflict' ), false, true );
	wp_register_script( 'hued-lightbox', get_template_directory_uri() . '/inc/js/lightbox.js', array( 'hued-noconflict' ), false, true );
	wp_register_script( 'hued-image-nav', get_template_directory_uri() . '/inc/js/image-nav.js', array( 'hued-noconflict' ), false, true );
	wp_register_script( 'hued-responsive-nav-js', get_template_directory_uri() . '/inc/nav/responsive-nav.min.js', array( 'hued-noconflict' ), false, true );
	wp_register_style( 'hued-css-default', get_stylesheet_uri() );
	wp_register_style( 'hued-sidebar-left', get_template_directory_uri() . '/inc/css/sidebar-left.css', array( 'hued-css-default' ) );
	wp_register_style( 'hued-sidebar-right', get_template_directory_uri() . '/inc/css/sidebar-right.css', array( 'hued-css-default' ) );
	wp_register_style( 'hued-sidebar-hidden', get_template_directory_uri() . '/inc/css/sidebar-hidden.css', array( 'hued-css-default' ) );
	wp_register_style( 'hued-font-awesome', get_template_directory_uri() . '/inc/third-party/font-awesome/css/font-awesome.min.css' );
	wp_register_style( 'hued-responsive-nav-css', get_template_directory_uri() . '/inc/nav/responsive-nav.css' );
}
add_action( 'wp_enqueue_scripts', 'hued_register_scripts_css' );

// enqueue scripts and css
function hued_enqueue_scripts_css() {
	wp_enqueue_script( 'hued-theme-scripts' );
	wp_enqueue_script( 'hued-lightbox' );
	wp_enqueue_script( 'hued-responsive-nav-js' );
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_style( 'hued-css-default' );
	$sidebar_location = esc_html( get_theme_mod( 'hued_sidebar_location', 'left' ) );
	wp_enqueue_style( 'hued-sidebar-' . $sidebar_location );
	wp_enqueue_style( 'hued-responsive-nav-css' );
	$font_awesome_toggle = esc_html( get_theme_mod( 'hued_font_awesome_toggle', 'disabled' ) );
	if ( $font_awesome_toggle == 'enabled' ) wp_enqueue_style( 'hued-font-awesome' );
}
add_action( 'wp_enqueue_scripts', 'hued_enqueue_scripts_css' );

function hued_footer_stuff() {
	require_once( 'inc/css.php' );
}
add_action('wp_footer', 'hued_footer_stuff');

function hued_setup() {
	// post formats support
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

	// post thumbnails (featured image) support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'hued-entry-thumb', 700, 400, array( 'center', 'center' ) );

	// feed links' support
	add_theme_support( 'automatic-feed-links' );
	// nav menu support
	add_theme_support( 'menus' );
	// html5 support
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
	// title tag
	add_theme_support( 'title-tag' );
	// custom background
	add_theme_support( 'custom-background', array(
												  'default-color' => 'FFFFFF',
												  'default-repeat' => 'no-repeat',
												  'default-attachment' => 'fixed'
												  )
					  );
	load_theme_textdomain( 'hued', get_template_directory_uri() . '/inc/lang' );

	// register nav menu
	register_nav_menu( 'primary_nav', __( 'Primary Navigation Menu', 'hued' ) );

	// content width
	if ( !isset( $content_width ) ) {
		$content_width = 500;
	}

}
add_action( 'after_setup_theme', 'hued_setup' );

// post password protection form
function hued_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="post-password-form">';
	$o .= '<p>' . __( 'Authentication Required! Please enter the password to gain access.', 'hued' ) . '</p>';
	$o .= '<label for="' . $label . '"><strong>' . __( "Password:", 'hued' ) . '</strong></label>';
	$o .= '<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" />';
	$o .= '<input type="submit" name="Submit" value="' . __( "Submit", 'hued' ) . '" />';
	$o .= '</form>';
	return $o;
}
add_filter( 'the_password_form', 'hued_password_form' );

// register sidebars
function hued_register_sidebars() {
	register_sidebar( array(
							'name' => __( 'Primary Sidebar', 'hued' ),
							'id' => 'sidebar',
							'description' => __( 'Widgets area located at the side.', 'hued' ),
							'before_widget' => '<div id="%1$s" class="widget box %2$s">',
							'after_widget'  => '</div>',
							'before_title' => '<div class="widgettitle box-title">',
							'after_title' => '</div>'
							)
					 );
	register_sidebar( array(
							'name' => __( 'Footer Widgets', 'hued' ),
							'id' => 'foobar',
							'description' => __( 'Widgets area (full width) located at the bottom.', 'hued' ),
							'before_widget' => '<div id="%1$s" class="widget box %2$s">',
							'after_widget'  => '</div>',
							'before_title' => '<div class="widgettitle box-title">',
							'after_title' => '</div>'
							)
					 );
	register_sidebar( array(
							'name' => __( 'Post Widgets', 'hued' ),
							'id' => 'postbar',
							'description' => __( 'Widgets area below post content.', 'hued' ),
							'before_widget' => '<div id="%1$s" class="widget box %2$s">',
							'after_widget'  => '</div>',
							'before_title' => '<div class="widgettitle box-title">',
							'after_title' => '</div>'
							)
					 );
}
add_action( 'widgets_init', 'hued_register_sidebars' );

// excerpt read-more text
function hued_readmore( $more ) {
	global $post;
	return '&hellip;';
}
add_filter( 'excerpt_more', 'hued_readmore' );

// footer info
function hued_footer_info() {
	?>
	<div id="footer-info">
		<span class="left">
			<?php hued_copyright_info(); ?>
		</span>
		<span class="right">
			<?php echo __( 'Handcrafted by ', 'hued' ), '<a href="http://www.creotix.com/themes/hued/" title="Creotix Themes" target="_blank">', __( 'Creotix Themes', 'hued' ), '</a>'; ?>
		</span>
	</div>
	<?php
}

// copyright info
function hued_copyright_info() {
	global $wpdb;
	$firstyear = wp_get_recent_posts( array(
		'numberposts' => 1,
		'orderby' => 'post_date',
		'order' => 'ASC',
		'post_type' => 'post',
		'post_status' => 'publish, private'
		), ARRAY_A );
	$firstyear = date( 'Y', strtotime( $firstyear[0]['post_date'] ) );
	if ( $firstyear ) {
		$copyright = '&copy; ' . $firstyear;
		if ( $firstyear < date('Y') ) {
			$copyright .= ' - ' . date('Y');
		}
	}
	echo $copyright, ' ', bloginfo( 'name' );
}

// sticky bar
function hued_sticky_bar() {
	?>
	<div id="sticky-bar">
        <span id="logo">
	        <?php
			echo '<a href="', home_url(), '" title="', get_bloginfo('name') , __( ' - Home">', 'hued' );
				$logo_image_url = get_theme_mod( 'hued_logo_url' );
				if ( $logo_image_url ) {
					$logo_image_url = wp_get_attachment_image_src( esc_html( $logo_image_url ), 'full' )[0];
				}
				if ( empty( $logo_image_url ) ) {
					echo get_bloginfo( 'name' );
				} else {
					echo '<img src="' . $logo_image_url . '" alt="' . get_bloginfo( 'name' ) . '" />';
				}
			echo '</a>';
			?>
        </span>
        <?php
            wp_nav_menu( array(
                               'theme_location' => 'primary_nav',
                               'container' => 'nav',
                               'container_id' => 'nav-container',
							   'container_class' => 'nav-collapse',
                               'fallback_cb' => 'hued_list_cat',
                               'items_wrap' => '<ul id="primary-nav" class="custom-nav menu %2$s">%3$s<li id="nav-more-title" class="nav-more-title">' . __( 'View More', 'hued' ) . '<ul id="nav-more-list" class="nav-more-list"></ul></li></ul>',
                               'depth' => 2
                               )
                        );

            $show_social = esc_html( get_theme_mod( 'hued_sp_toggle', 'disabled' ) );
            if ( $show_social == 'enabled' ) {
	            $hued_profiles = hued_social_profiles_array();
	            $urls = $hued_profiles;
	            $socially_awkward = true;
	            foreach ( $hued_profiles as $value => $name ) {
	            	$urls[$value] = esc_html( get_theme_mod( 'hued_sp_' . $value ) );
	            	if ( !empty( $urls[$value] ) ) {
	            		$socially_awkward = false;
	            	}
	            }
	            if ( $socially_awkward == false ) {
		            echo '<span id="site-social-wrap"><div id="site-social-links">';
					foreach( $urls as $value => $url ) {
						if ( !empty( $url ) ) {
							echo '<a href="' . $url . '" title="' . get_bloginfo( 'name' ) . ' on ' . $hued_profiles[$value] . '" target="_blank" class="' . $value . '"></a>';
						}
					}
					echo '</div><span class="social-btn">', __( 'We\'re Social!', 'hued' ), '</span></span><div class="clear"></div>';
				}
	        }
        ?>
	</div>
	<?php
}

function hued_list_cat() {
	?>
	<nav id="nav-container" class="nav-collapse">
		<ul id="primary-nav" class="category-nav menu">
			<?php
				wp_list_categories( array(
										  'title_li' => '',
										  'show_option_none' => '',
										  'depth' => 2
										  )
								   );
			?>
			<li id="nav-more-title" class="nav-more-title">
				<?php echo __( 'View More', 'hued' ); ?>
				<ul id="nav-more-list" class="nav-more-list">
				</ul>
			</li>
		</ul>
	</nav>
	<?php
}
	
// post/page title aka the_title()
function hued_get_the_title() {
	return ( get_the_title() != '' ) ? get_the_title() : __( '(No Title)', 'hued' );
}

function hued_social_profiles_array() {
	$hued_sl = array(
            'facebook' => __( 'Facebook', 'hued' ),
            'twitter' => __( 'Twitter', 'hued' ),
            'youtube' => __( 'YouTube', 'hued' ),
            'googleplus' => __( 'Google+', 'hued' ),
            'linkedin' => __( 'LinkedIn', 'hued' ),
            'instagram' => __( 'Instagram', 'hued' ),
            'pinterest' => __( 'Pinterest', 'hued' ),
            'skype' => __( 'Skype', 'hued' ),
            'feed' => __( 'Feed', 'hued' )
        );
	return $hued_sl;
}

function hued_fonts_array() {
	$fonts = scandir( get_template_directory() . '/inc/fonts' );
	$fonts = array_diff( $fonts, array( '.', '..' ) );
	$ass_fonts['sans-serif'] = __( 'Sans Serif', 'hued' );
	foreach ( $fonts as $font ) {
		$ass_fonts[$font] = ucwords( str_replace( '_', ' ', $font ) );
	}
	return $ass_fonts;
}

function hued_categories_array() {
	$categories = get_categories( array(
		'type' => 'post',
		'hide_empty' => 0,
		'hierarchical' => true,
		'show_option_all' => __( 'All Categories', 'hued' )
		)
	);
	$ass_cats['0'] = __( 'All Categories', 'hued' );
	foreach ( $categories as $cat ) {
		$ass_cats[$cat->term_id] = $cat->name;
	}
	return $ass_cats;
}
?>