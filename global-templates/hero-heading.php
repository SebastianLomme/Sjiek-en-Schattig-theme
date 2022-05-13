<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="container-fluid rel">
    <div class="circle-hero"></div>
    <div class="<?php echo esc_attr( $container) ?>">
        <div class="hero-section" id="wrapper-hero">
            <div class="row">
                <div class="col-6  p-md-5 p-2  d-flex flex-column rel justify-content-between">
                    <p class="mb-sm-5 mb-3 h1">
                        <?php echo get_theme_mod('hero-settings-text'); ?>
                    </p>
                    <div>
                        <a href="<?php echo get_site_url() . '/winkel'; ?> " class="btn btn-secondary py-1 hero-button">
                            Assortiment<i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-6">
                    <img class="hero-img" src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/IMG_7866.webp"
                        alt="haarstrikjes">
                </div>
            </div>
        </div>
    </div>
</div>