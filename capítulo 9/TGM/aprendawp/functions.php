<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';

/**
 * Enqueue WP Bootstrap Navwalker library (responsive menu).
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/customizer.php';

if( class_exists( 'WooCommerce' )){
	require get_template_directory() . '/inc/wc-modifications.php';
}

/**
* Enqueue scripts and styles.
*/
function aprendawp_load_scripts(){
	//Bootstrap javascript and CSS files
 	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
 	wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.3.1', 'all' );

 	// Theme's main stylesheet
 	wp_enqueue_style( 'aprendawp-style', get_stylesheet_uri(), array(),'1.0', 'all' );

 	// Google Fonts
 	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script' );

 	// Flexslider Javascript and CSS files
	wp_enqueue_script( 'flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '', 'all' );
	wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array( 'jquery' ), '', true ); 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	
 }
 add_action( 'wp_enqueue_scripts', 'aprendawp_load_scripts' );

function aprendawp_config(){
	register_nav_menus(
		array(
			'aprendawp_main_menu' 	=> esc_html__( 'Aprenda WP Main Menu', 'aprendawp' ),
			'aprendawp_footer_menu' => esc_html__( 'Aprenda WP Footer Menu', 'aprendawp' ),
		)
	);

	load_theme_textdomain( 'aprendawp', get_template_directory() . '/languages/' );

	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 255,
		'single_image_width'	=> 255,
		'product_grid' 			=> array(
	        'default_rows'    => 10,
	        'min_rows'        => 5,
	        'max_rows'        => 10,
	        'default_columns' => 1,
	        'min_columns'     => 1,
	        'max_columns'     => 1,				
		)
	) );		
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_theme_support( 'automatic-feed-links' );

	$args = array(
		'height' => 225,
		'width'	=> 1920
	);
	add_theme_support( 'custom-header', $args );

	add_theme_support( 'custom-logo', array(
		'height' 		=> 85,
		'width'			=> 160,
		'flex-height'	=> true,
		'flex-width'	=> true,
	) );

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'aprendawp-blog', 960, 640, array( 'center', 'center' ) );
	add_image_size( 'aprendawp-slider', 1920, 800, array( 'center', 'center' ) );
	
	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}

	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'aprendawp_config', 0 );

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'aprendawp_woocommerce_header_add_to_cart_fragment' );

function aprendawp_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}

add_action( 'widgets_init', 'aprendawp_sidebars' );
function aprendawp_sidebars(){
	register_sidebar( array(
		'name'			=> esc_html__( 'Aprenda WP Main Sidebar', 'aprendawp' ),
		'id'			=> 'aprenda-wp-sidebar-1',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'aprendawp' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 1', 'aprendawp' ),
		'id'			=> 'aprenda-wp-sidebar-footer1',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'aprendawp' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 2', 'aprendawp' ),
		'id'			=> 'aprenda-wp-sidebar-footer2',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'aprendawp' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 3', 'aprendawp' ),
		'id'			=> 'aprenda-wp-sidebar-footer3',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'aprendawp' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar Shop', 'aprendawp' ),
		'id'			=> 'aprenda-wp-sidebar-shop',
		'description'	=> esc_html__( 'Drag and drop your WooCommerce widgets here', 'aprendawp' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );					
}

function aprenda_wp_body_classes( $classes ) {

   if ( ! is_active_sidebar( 'aprenda-wp-sidebar-1' ) ) {
      $classes[] = 'no-sidebar';
   }

   if ( ! is_active_sidebar( 'aprenda-wp-sidebar-shop' ) ) {
      $classes[] = 'no-sidebar-shop';
   }

   if ( ! is_active_sidebar( 'aprenda-wp-sidebar-footer1' ) && ! is_active_sidebar( 'aprenda-wp-sidebar-footer2' ) && ! is_active_sidebar( 'aprenda-wp-sidebar-footer3' ) ) {
      $classes[] = 'no-sidebar-footer';
   }

   return $classes;
}
add_filter( 'body_class', 'aprenda_wp_body_classes' );