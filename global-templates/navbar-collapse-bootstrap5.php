<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-lg navbar-light" aria-labelledby="main-nav-label">

    <h2 id="main-nav-label" class="screen-reader-text">
        <?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
    </h2>


    <div class="<?php echo esc_attr( $container ); ?>">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- The WordPress Menu goes here -->
        <?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse order-lg-2',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ms-auto',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>


        <!-- Your site title as branding in the menu -->
        <?php if ( ! has_custom_logo() ) { ?>

        <?php if ( is_front_page() && is_home() ) : ?>

        <h1 class="navbar-brand lg-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

        <?php else : ?>

        <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
            itemprop="url"><?php bloginfo( 'name' ); ?></a>

        <?php endif; ?>

        <?php
		} else {
			the_custom_logo();
		}
		?>
        <!-- end custom logo -->

        <div class="navbar-custom-icons order-lg-3">
            <i id="search-icon-nav" class="fa fa-search"></i>
            <a class="position-relative cart-customlocation" href=<?php echo wc_get_cart_url(); ?>>
                <i class="fa fa-shopping-basket"><span
                        class="position-absolute top-10 start-80 translate-middle bg-dark text-light p-1 rounded-circle small-text"><?php echo WC()->cart->get_cart_contents_count()?></span></i>
            </a>

        </div>
        <div id="search-box" class="search-box hide"><?php get_search_form( true ) ?></div>

    </div><!-- .container(-fluid) -->
</nav><!-- .site-navigation -->


<!-- <div class="badge p-1"><?php echo WC()->cart->get_cart_total(); ?></div> -->
<!-- <span class="badge"><?php echo WC()->cart->get_cart_contents_count() ?></span> -->