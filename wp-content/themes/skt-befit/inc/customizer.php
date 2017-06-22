<?php
/**
 * SKT BeFit Theme Customizer
 *
 * @package SKT BeFit
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function sktbefit_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class sktbefit_Info extends WP_Customize_Control {
	    public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_section(
        'logo_sec',
        array(
            'title' => __('Logo (PRO Version)', 'skt-befit'),
            'priority' => 1,
 			'description' => sprintf( __( 'Logo (PRO Version)<br /> %s.', 'skt-befit' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-befit' )
						)
					),
        )
    );  
    $wp_customize->add_setting('sktbefit_options[logo-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new sktbefit_Info( $wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'sktbefit_options[logo-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#ff7400',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-befit'),
 			'description' => sprintf( __( 'More color options in<br /> %s.', 'skt-befit' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-befit' )
						)
					),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_section('footer_text',array(
			'title'	=> __('Footer Text','skt-befit'),
			'priority'	=> null,
			'description'	=> __('Add footer copyright text','skt-befit')
	));
	
	$wp_customize->add_setting('sktbefit_options[credit-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new sktbefit_Info( $wp_customize, 'cred_section', array(
        'section' => 'footer_text',
		'label'	=> __('To remove credit &amp; copyright text upgrade to PRO version','skt-befit'),
        'settings' => 'sktbefit_options[credit-info]',
        ) )
    );
	
// Slider Section
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','skt-befit'),
		'description' => sprintf( __( 'Slider Image Dimensions ( 1420 X 656 )<br/> Select Featured Image for these pages <br /> How to set featured image <a href="%1$s" target="_blank">Click Here ?</a><br/><br/> More slider settings available in <a href="%2$s" target="_blank">PRO Version</a>', 'skt-befit' ),
			esc_url( '"'.SKT_THEME_FEATURED_SET_VIDEO_URL.'"' ),
			esc_url( '"'.SKT_PRO_THEME_URL.'"' )
		),			   	
		'priority'		=> null
	));

	$wp_customize->add_setting('slide-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',				
			'sanitize_callback'	=> 'sktbefit_sanitize_integer'
	));
	
	$wp_customize->add_control('slide-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','skt-befit'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide-setting2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',		
			'sanitize_callback'	=> 'sktbefit_sanitize_integer'
	));
	
	$wp_customize->add_control('slide-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','skt-befit'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide-setting3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sktbefit_sanitize_integer'
	));
	
	$wp_customize->add_control('slide-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','skt-befit'),
			'section'	=> 'slider_section'
	));	
 
// Slider Section
 
// Home Boxes 	
	$wp_customize->add_section('page_boxes',array(
		'title'	=> __('Home Boxes','skt-befit'),
 			'description' => sprintf( __( 'Featured Image Dimensions : ( 83 X 78 )<br/> Select Featured Image for these pages <br /> How to set featured image %s', 'skt-befit' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_FEATURED_SET_VIDEO_URL.'"' ), __( 'Click Here ?', 'skt-befit' )
						)
					),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sktbefit_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box one:','skt-befit'),
			'section'	=> 'page_boxes',
	));
	
	$wp_customize->add_setting('page-setting2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sktbefit_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box two:','skt-befit'),
			'section'	=> 'page_boxes'
	));
	
	$wp_customize->add_setting('page-setting3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sktbefit_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box three:','skt-befit'),
			'section'	=> 'page_boxes'
	));
	
	$wp_customize->add_setting('page-setting4',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sktbefit_sanitize_integer'
	));	
	
	$wp_customize->add_control('page-setting4',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box four:','skt-befit'),
			'section'	=> 'page_boxes'
	));		
	 
// Home Boxes 	
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','skt-befit'),
	 		'description' => sprintf( __( 'Add social icons link here.<br /> %s.', 'skt-befit' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-befit' )
						)
					),			
			'priority'		=> null
	));
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','skt-befit'),
			'setting'	=> 'fb_link',
			'section'	=> 'social_sec'
	));
	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','skt-befit'),
			'setting'	=> 'twitt_link',
			'section'	=> 'social_sec'
	));
	
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','skt-befit'),
			'setting'	=> 'gplus_link',
			'section'	=> 'social_sec'
	));
	
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','skt-befit'),
			'setting'	=> 'linked_link',
			'section'	=> 'social_sec'
	));
	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Contact Details','skt-befit'),
			'description'	=> __('Add you contact details here','skt-befit'),
			'priority'	=> null
	));
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> __('Our Address','skt-befit'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> __('Add contact title here','skt-befit'),
			'setting'	=> 'contact_title',
			'section'	=> 'contact_sec'
	));
	
	$wp_customize->add_setting('contact_desc',array(
			'default'	=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','skt-befit'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'contact_desc',
			array(
				'label'	=> __('Add contact description here','skt-befit'),
				'setting'	=> 'contact_desc',
				'section'	=> 'contact_sec'
			)
		)
	);
	
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('+9876543210','skt-befit'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','skt-befit'),
			'setting'	=> 'contact_no',
			'section'	=> 'contact_sec'
	));
	
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','skt-befit'),
			'setting'	=> 'contact_mail',
			'section'	=> 'contact_sec'
	));
	
	$wp_customize->add_section(
        'theme_layout_sec',
        array(
            'title' => __('Layout Settings (PRO Version)', 'skt-befit'),
            'priority' => null,
 		    'description' => sprintf( __( 'Layout Settings available in', 'skt-befit' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-befit' ) )
			),
 			
        )
    );  
    $wp_customize->add_setting('sktbefit_options[layout-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new sktbefit_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'sktbefit_options[layout-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section(
        'theme_font_sec',
        array(
            'title' => __('Fonts Settings (PRO Version)', 'skt-befit'),
            'priority' => null,
	 		'description' => sprintf( __( 'Font Settings available in<br /> %s.', 'skt-befit' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-befit' )
						)
					),	
        )
    );  
    $wp_customize->add_setting('sktbefit_options[font-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new sktbefit_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'sktbefit_options[font-info]',
        'priority' => null
        ) )
    );
	
    $wp_customize->add_section(
        'theme_doc_sec',
        array(
            'title' => __('Documentation &amp; Support', 'skt-befit'),
            'priority' => null,
	 		'description' => sprintf( __( 'For documentation and support check this link :<br /> %s.', 'skt-befit' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_DOC.'"' ), __( 'Befit Documentation', 'skt-befit' )
						)
					),
        )
    );  
    $wp_customize->add_setting('sktbefit_options[info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new sktbefit_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'sktbefit_options[info]',
        'priority' => 10
        ) )
    );
	
	
}
add_action( 'customize_register', 'sktbefit_customize_register' );

//Integer
function sktbefit_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function sktbefit_custom_css(){
		?>
        	<style type="text/css">
					.topbarleft a:hover,
					.logo h2 a,
					.section-title,
					#footer .widget-column h2,
					.morebtn:hover,
					#sidebar aside ul li a:hover,
					.recent-post-title a:hover,
					#copyright a,
					.foot-label,
					.theme-default .nivo-caption a:hover,
					.latest-blog span a,
					.postmeta a:hover, 
					a, 
					#footer .widget-column a:hover, 
					#copyright a:hover,
					.blog-post-repeat .entry-summary a, 
					.entry-content a,
					#sidebar aside h3.widget-title,
					.blog-post-repeat .blog-title a{
						color:<?php echo get_theme_mod('color_scheme','#ff7400'); ?>;
					}
					.slide_more a:hover, .morebtn:hover, .social .icon:hover, .feature-box:hover{
						border-color:<?php echo get_theme_mod('color_scheme','#ff7400'); ?>;
					}
					.entry-summary .read-more,
					.morebtn:hover,
					.feature-box:hover .read-more,
					.slide_more,
					.yes,
					.theme-default .nivo-controlNav a.active,
					.site-nav li:hover ul li:hover, 
					.site-nav li:hover ul li.current-page-item,
					.site-nav li:hover ul li,
					p.form-submit input[type="submit"],
					#sidebar aside.widget_search input[type="submit"], 
					.wpcf7 input[type="submit"], 
					.pagination ul li .current, .pagination ul li a:hover{
						background-color:<?php echo get_theme_mod('color_scheme','#60646d'); ?>
					}
					.site-nav li:hover a, 
					.site-nav li.current_page_item a,
 					.site-nav li:hover ul li:hover, 
					.site-nav li:hover ul li.current-page-item,
					.site-nav li:hover ul li{
						color:<?php echo get_theme_mod('color_scheme','#ff7400'); ?>
					}					
			</style>
	<?php }
add_action('wp_head','sktbefit_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
 
function sktbefit_customize_preview_js() {
	wp_enqueue_script( 'sktbefit_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'sktbefit_customize_preview_js' );


function sktbefit_custom_customize_enqueue() {
	wp_enqueue_script( 'sktbefit-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'sktbefit_custom_customize_enqueue' );