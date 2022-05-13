<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;




/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
<a class="position-relative cart-customlocation" href=<?php echo wc_get_cart_url(); ?>>
    <i class="fa fa-shopping-basket"><span
            class="position-absolute top-10 start-80 translate-middle bg-dark text-light p-1 rounded-circle small-text"><?php echo WC()->cart->get_cart_contents_count()?></span></i>
</a>
<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}

// Use in conjunction with https://gist.github.com/woogists/c0a86397015b88f4ca722782a724ff6c

// add wrapper for archive page woocomerce

add_action('woocommerce_before_shop_loop', 'add_opening_wrapper_archive_page' , 35);

function add_opening_wrapper_archive_page() {
	echo '<div class="wrapper-archive-page">';
}

add_action('woocommerce_after_shop_loop', 'add_closing_wrapper_archive_page' , 5);

function add_closing_wrapper_archive_page() {
	echo '</div>';
}




// change arrows for pagination woocomerce
add_filter( 'woocommerce_pagination_args', 	'rocket_woo_pagination' );
function rocket_woo_pagination( $args ) {

	$args['prev_text'] = '<i class="fa fa-arrow-left"></i>';
	$args['next_text'] = '<i class="fa fa-arrow-right"></i>';

	return $args;
}

// move breadcrumbs after title and

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_action( 'woocommerce_archive_description','woocommerce_breadcrumb', 5 );

// Change add to cart text on product archives page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' );  
function woocommerce_add_to_cart_button_text_archives() {
return __( 'In winkelwagen', 'woocommerce' );
}

// Change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' ); 
function woocommerce_add_to_cart_button_text_single() {
    return __( 'In winkelwagen', 'woocommerce' ); 
}

require_once get_theme_file_path("hooks.php");


require_once get_theme_file_path("customize.php");
new sjiekenschattig_Customizer();