<?php

// setup theme
if (!function_exists('ssfoundation_setup')):
	function ssfoundation_setup() {
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('custom-logo');
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
  	add_editor_style(get_template_directory_uri() . '/assets/css/editor.css');
		register_nav_menus(array(
			'primary' => esc_html__('Primary', 'ss-foundation'),
			'footer' => esc_html__('Footer', 'ss-foundation'),
		));
		if (!isset($content_width)) $content_width = 760;
	}
endif;
add_action('after_setup_theme', 'ssfoundation_setup');

// load css and javascript
function ssfoundation_enqueue() {
    wp_enqueue_style('ss-foundation-style', get_stylesheet_uri());
		wp_enqueue_style('ss-foundation-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700', false);
    wp_enqueue_script('ss-foundation-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script( 'comment-reply' );
		}
}
add_action('wp_enqueue_scripts', 'ssfoundation_enqueue');

// appearance customizer
function ssfoundation_customize_register($wp_customize) {
	// homepage header overview text
	$wp_customize->add_setting('ssfoundation_text_overview', array(
	  'default' => esc_html__('Edit or remove this text in the "Appearance -> Customize" settings.', 'ss-foundation'),
	  'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('ssfoundation_text_overview', array(
		'label' => esc_html__('Overview', 'ss-foundation'),
	  'type' => 'text',
	  'section' => 'title_tagline',
	  'description' => __('Displayed in the header on the homepage.', 'ss-foundation'),
	));
	// custom header colors
	$wp_customize->add_setting('ssfoundation_color_header_bg', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ssfoundation_color_header_bg', array(
		'label' => esc_html__('Header Background', 'ss-foundation'),
		'section' => 'colors',
		'settings' => 'ssfoundation_color_header_bg',
	)));
	$wp_customize->add_setting('ssfoundation_color_header_text', array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ssfoundation_color_header_text', array(
		'label' => esc_html__('Header Text', 'ss-foundation'),
		'section' => 'colors',
		'settings' => 'ssfoundation_color_header_text',
	)));
}
add_action('customize_register', 'ssfoundation_customize_register');

// output customizer settings
function ssfoundation_customize_css() {
	echo '<style type="text/css">';
	echo '#header-main, #header-menu.active, #header-secondary {background-color:' . esc_html(get_theme_mod('ssfoundation_color_header_bg', '#333333')) . '; color:' . esc_html(get_theme_mod('ssfoundation_color_header_text', '#ffffff')) . ';}';
	echo '#header-main a, #header-title-meta a {color:' . esc_html(get_theme_mod('ssfoundation_color_header_text', '#ffffff')) . ';}';
	echo '#header-menu li > a:hover {color:' . esc_html(get_theme_mod('ssfoundation_color_header_text', '#ffffff')) . ';}';
	echo '#header-menu li > a:before {background-color:' . esc_html(get_theme_mod('ssfoundation_color_header_text', '#ffffff')) . ';}';
	echo '#header-menu ul li {border-color:' . esc_html(get_theme_mod('ssfoundation_color_header_text', '#ffffff')) . ';}';
	echo '#hamburger-inner, #hamburger-inner::before, #hamburger-inner::after {background-color:' . esc_html(get_theme_mod('ssfoundation_color_header_text', '#ffffff')) . ';}';
	echo '</style>';
}
add_action('wp_head', 'ssfoundation_customize_css');

// widgets
function ssfoundation_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__('Footer', 'ss-foundation'),
		'id' => 'footer',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
}
add_action('widgets_init', 'ssfoundation_widgets_init');

?>
