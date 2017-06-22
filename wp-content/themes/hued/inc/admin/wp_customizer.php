<?php
add_action( 'customize_register', 'hued_theme_customize' );
function hued_theme_customize( $wp_customize ) {

	$args = array(
		'title' => __( 'Hued Theme Options', 'hued' ),
		'description' => __( '(Edit theme options and customize layout.)', 'hued' ),
		'priority' => 160
		);
	$wp_customize->add_panel( 'hued_options_panel', $args );

	// Appearance options
	$args = array(
		'title' => __( 'Appearance', 'hued' ),
		'priority' => 10,
		'description' => __( '(Change theme appearance options.)', 'hued' ),
		'panel' => 'hued_options_panel'
		);
	$wp_customize->add_section( 'hued_appearance_options', $args );

	$wp_customize->add_setting( 'hued_content_font', array(
		'default' => 'sans-serif',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Content Font:', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_content_font',
		'priority' => 10,
		'type' => 'select',
		'choices' => hued_fonts_array()
		);
	$wp_customize->add_control( 'hued_content_font', $args );

	$wp_customize->add_setting( 'hued_content_font_size', array(
		'default' => '16',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		) );
	$args = array(
		'label' => __( 'Content Font Base Size (px):', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_content_font_size',
		'priority' => 20,
		'type' => 'range',
		'input_attrs' => array(
			'min' => 8,
			'max' => 72,
			'step' => 1
			)
		);
	$wp_customize->add_control( 'hued_content_font_size_c', $args );

	$wp_customize->add_setting( 'hued_featured_toggle', array(
		'default' => 'enabled',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Featured Content on Home Page:', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_featured_toggle',
		'priority' => 30,
		'type' => 'radio',
		'choices' => array(
			'enabled' => __( 'Enable', 'hued' ),
			'disabled' => __( 'Disable', 'hued' )
			)
		);
	$wp_customize->add_control( 'hued_featured_toggle_c', $args );

	$wp_customize->add_setting( 'hued_featured_category', array(
		'default' => '0',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Featured content category:', 'hued' ),
		'description' => __( '(Posts assigned to selected category will be shown in featured content on home page, if enabled.)', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_featured_category',
		'priority' => 40,
		'type' => 'select',
		'choices' => hued_categories_array()
		);
	$wp_customize->add_control( 'hued_featured_category_c', $args );

	$wp_customize->add_setting( 'hued_sidebar_location', array(
		'default' => 'left',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Sidebar location:', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_sidebar_location',
		'priority' => 50,
		'type' => 'radio',
		'choices' => array(
			'left' => __( 'Left', 'hued' ),
			'hidden' => __( 'Hidden', 'hued' ),
			'right' => __( 'Right', 'hued' )
			)
		);
	$wp_customize->add_control( 'hued_sidebar_location_c', $args );

	$wp_customize->add_setting( 'hued_footer_widgets_toggle', array(
		'default' => 'enabled',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Footer widgets area:', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_footer_widgets_toggle',
		'priority' => 60,
		'type' => 'radio',
		'choices' => array(
			'enabled' => __( 'Enabled', 'hued' ),
			'disabled' => __( 'Disabled', 'hued' )
			)
		);
	$wp_customize->add_control( 'hued_footer_widgets_toggle_c', $args );

	$wp_customize->add_setting( 'hued_author_info_toggle', array(
		'default' => 'enabled',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Author info:', 'hued' ),
		'description' => __( '(author information below posts)', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_author_info_toggle',
		'priority' => 70,
		'type' => 'radio',
		'choices' => array(
			'enabled' => __( 'Enabled', 'hued' ),
			'disabled' => __( 'Disabled', 'hued' )
			)
		);
	$wp_customize->add_control( 'hued_author_info_toggle_c', $args );

	$wp_customize->add_setting( 'hued_comments_feed_toggle', array(
		'default' => 'enabled',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Comments feed link:', 'hued' ),
		'description' => __( '(link to comments feed)', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_comments_feed_toggle',
		'priority' => 80,
		'type' => 'radio',
		'choices' => array(
			'enabled' => __( 'Enabled', 'hued' ),
			'disabled' => __( 'Disabled', 'hued' )
			)
		);
	$wp_customize->add_control( 'hued_comments_feed_toggle_c', $args );

	$wp_customize->add_setting( 'hued_font_awesome_toggle', array(
		'default' => 'disabled',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Font Awesome:', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_font_awesome_toggle',
		'priority' => 90,
		'type' => 'radio',
		'choices' => array(
			'enabled' => __( 'Enabled', 'hued' ),
			'disabled' => __( 'Disabled', 'hued' )
			)
		);
	$wp_customize->add_control( 'hued_font_awesome_toggle_c', $args );

	$wp_customize->add_setting( 'hued_font_color', array(
		'default' => '#222222',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
		) );
	$args = array(
		'label' => __( 'Font Color:', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_font_color',
		'priority' => 100
		);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hued_font_color_c', $args ) );

	$wp_customize->add_setting( 'hued_link_color', array(
		'default' => '#336699',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
		) );
	$args = array(
		'label' => __( 'Link Color:', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_link_color',
		'priority' => 110
		);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hued_link_color_c', $args ) );

	$wp_customize->add_setting( 'hued_featured_gradient1', array(
		'default' => '#336699',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
		) );
	$args = array(
		'label' => __( 'Featured Content Background:', 'hued' ),
		'description' => __( 'Gradient Color 1', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_featured_gradient1',
		'priority' => 120
		);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hued_featured_gradient1_c', $args ) );

	$wp_customize->add_setting( 'hued_featured_gradient2', array(
		'default' => '#339999',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
		) );
	$args = array(
		'description' => __( 'Gradient Color 2', 'hued' ),
		'section' => 'hued_appearance_options',
		'settings' => 'hued_featured_gradient2',
		'priority' => 130
		);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hued_featured_gradient2_c', $args ) );
	// END Appearance options

	// Logo options
	$args = array(
		'title' => __( 'Logo Options', 'hued' ),
		'priority' => 40,
		'description' => __( '(Select custom logo image to display. If not selected, site name (in settings -> general) will be used as logo text.)', 'hued' ),
		'panel' => 'hued_options_panel'
		);
	$wp_customize->add_section( 'hued_logo_section', $args );

	$wp_customize->add_setting( 'hued_logo_url', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Logo', 'hued' ),
		'description' => __( '(max recommended height: 45px)', 'hued' ),
		'section' => 'hued_logo_section',
		'settings' => 'hued_logo_url',
		'mime_type' => 'image',
		'priority' => 10
		);
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hued_logo_url_c', $args ) );

	$wp_customize->add_setting( 'hued_logo_font', array(
		'default' => 'sans-serif',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'label' => __( 'Logo Font:', 'hued' ),
		'description' => __( '(Applicable only on text logo.)', 'hued' ),
		'section' => 'hued_logo_section',
		'settings' => 'hued_logo_font',
		'priority' => 20,
		'type' => 'select',
		'choices' => hued_fonts_array()
		);
	$wp_customize->add_control( 'hued_logo_font_c', $args );

	$wp_customize->add_setting( 'hued_logo_font_size', array(
		'default' => '42',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		) );
	$args = array(
		'label' => __( 'Logo Font Size (px):', 'hued' ),
		'description' => __( '(Applicable only on text logo.)', 'hued' ),
		'section' => 'hued_logo_section',
		'settings' => 'hued_logo_font_size',
		'priority' => 30,
		'type' => 'range',
		'input_attrs' => array(
			'min' => 12,
			'max' => 72,
			'step' => 1
			)
		);
	$wp_customize->add_control( 'hued_logo_font_size_c', $args );
	// END Logo options

	// Social profiles options
	$args = array(
		'title' => __( 'Social Links', 'hued' ),
		'priority' => 80,
		'description' => __( '(Links to social networking profiles.)', 'hued' ),
		'panel' => 'hued_options_panel'
		);
	$wp_customize->add_section( 'hued_social_profiles', $args );

	$wp_customize->add_setting( 'hued_sp_toggle', array(
		'default' => 'disabled',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
	$args = array(
		'section' => 'hued_social_profiles',
		'settings' => 'hued_sp_toggle',
		'priority' => 10,
		'type' => 'radio',
		'choices' => array(
			'enabled' => __( 'Enable', 'hued' ),
			'disabled' => __( 'Disable', 'hued' )
			)
		);
	$wp_customize->add_control( 'hued_sp_toggle_c', $args );

	$profiles = hued_social_profiles_array();
	foreach ( $profiles as $value => $name ) {
		$wp_customize->add_setting( 'hued_sp_' . $value, array(
			'default' => '',
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => ( ( $value == 'skype' ) ? 'sanitize_text_field' : 'esc_url_raw' )
			) );
		$args = array(
			'label' => $name,
			'section' => 'hued_social_profiles',
			'settings' => 'hued_sp_' . $value,
			'priority' => 20,
			'type' => 'url'
			);
		$wp_customize->add_control( 'hued_sp_' . $value, $args );
	}
}
?>