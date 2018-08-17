<?php
global $text_domain,$assets_dir;
$text_domain = 'text_domain';
$assets_dir = '/assets/';


if ( ! function_exists( $text_domain . '_setup' ) ) :

function text_domain_setup() {
	global $text_domain;
	// Set  Text Domain
	load_theme_textdomain( $text_domain );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	//Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'text_domain' ),
		'social'  => __( 'Social Links Menu', 'text_domain' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	//Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	
	//This theme styles the visual editor to resemble the theme style,
	//add_editor_style( array( $assets_dir . 'css/editor-style.css', text_domain_fonts_url() ) );

}
endif; // theme_setup
add_action( 'after_setup_theme', $text_domain . '_setup' );


/*
 * Enqueues scripts and styles.
 */
function text_domain_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( $text_domain . '-sanitize', get_stylesheet_directory_uri() . $assets_dir . 'css/sanitize.min.css');
	wp_enqueue_style( $text_domain . '-bootstrap', get_stylesheet_directory_uri() . $assets_dir . 'css/bootstrap.min.css');
	wp_enqueue_style( $text_domain . '-slicknav', get_stylesheet_directory_uri() . $assets_dir . 'css/slicknav.css');
	wp_enqueue_style( $text_domain . '-slick', get_stylesheet_directory_uri() . $assets_dir . 'css/slick.css');
	wp_enqueue_style( $text_domain . '-slick-theme', get_stylesheet_directory_uri() . $assets_dir . 'css/slick-theme.css');
    wp_enqueue_style( $text_domain . '-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( $text_domain . '-ie', get_stylesheet_directory_uri() . $assets_dir . 'css/ie.css', array( 'twentysixteen-style' ), '20160412' );
	wp_style_add_data( $text_domain . '-ie', 'conditional', 'lt IE 10' );

	// Load the html5 shiv.
	wp_enqueue_script( $text_domain . '-html5', get_stylesheet_directory_uri() . $assets_dir . 'js/html5.js', array(), '3.7.3' );
	wp_script_add_data( $text_domain . '-html5', 'conditional', 'lt IE 9' );



	wp_enqueue_script( $text_domain . 'jquery_easing', get_stylesheet_directory_uri() . $assets_dir . 'js/jquery.easing.compatibility.js');
	wp_enqueue_script( $text_domain . 'bootstrap', get_stylesheet_directory_uri() . $assets_dir . 'js/bootstrap.min.js');
	wp_enqueue_script( $text_domain . 'flexibility', get_stylesheet_directory_uri() . $assets_dir . 'js/flexibility.js');
	wp_enqueue_script( $text_domain . 'slicknav', get_stylesheet_directory_uri() . $assets_dir . 'js/jquery.slicknav.min.js');
	wp_enqueue_script( $text_domain . 'flexslider', get_stylesheet_directory_uri() . $assets_dir . 'js/slick.min.js');
	wp_enqueue_script( $text_domain . 'functions', get_stylesheet_directory_uri() . $assets_dir . 'js/functions.js');

	if(is_home()){
		wp_enqueue_script( $text_domain . 'top', get_stylesheet_directory_uri() . $assets_dir . 'js/top.js');
	}

}
add_action( 'wp_enqueue_scripts', $text_domain . '_scripts' );



/**
 * 管理画面のロゴ変更
 */
function text_domain_login_logo_image() {
    echo '<style type="text/css">
            #login h1 a {
                background: url(' . get_stylesheet_directory_uri() . '/assets/img/admin/login_logo.svg) no-repeat !important;
				width: 128px;
				height: 128px;
            }
    </style>';
}
add_action('login_head', $text_domain . '_login_logo_image');

/**
 * SVGをアップロード可能にする
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/**
 * Excerpt Length
 */
function text_domain_custom_excerpt_length( $length ) {
 	return 100;
}
add_filter( 'excerpt_length', 'text_domain_custom_excerpt_length', 999 );

/**
 * Custom template tags for this theme.
 */
//require get_stylesheet_directory_uri() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
//require get_stylesheet_directory_uri() . '/inc/customizer.php';



remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/**
 * カスタムフィールドの値を取得
 */

function text_domain_get_field_params($prefix, $arg){
	$arr = array();
	foreach($arg as $field){
		
		$field_name = $prefix . $field['name'];
		$options = array();
		if(isset($field['type'])){
			if($field['type'] == 'img'){
				$options['url'] = 'true';
			}
			if($field['type'] == 'url'){
				$options['output'] = 'raw';
			}
		}

		
		$shortcode = '[types field="' . $field_name .'"';
		if(isset($field['type'])){
			if($field['type'] == 'img'){
				$shortcode .= ' url=true';
			}elseif($field['type'] == 'url'){
				$shortcode .= ' output=raw';
			}
		}
		
		if(isset($field['multiple'])){
			if($field['multiple']){
				$shortcode .= ' separator=","';
				$shortcode .= ' output="html"';
			}
		}
		
		$shortcode .= '][/types]';
		$param = do_shortcode($shortcode);
		
		if(isset($field['multiple'])){
			if($field['multiple']){
				$param = explode(',' , strip_tags($param));
			}
		}

		$arr[$field['name']] = $param;
	}

	return $arr;
}


