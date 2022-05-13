<?php
/**
 * Partial template for front-page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">
        <?php
        get_template_part("global-templates/catogorie-carousel")
        ?>

        <!-- <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> -->

    </header> <!-- .entry-header -->

    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

    <?php
        get_template_part("global-templates/new-arrival")
        ?>

    <div class="entry-content">



        <?php
        the_content();
        ?>
        <?php
        get_template_part("global-templates/card-section")
        ?>



        <!-- contact form section -->
        <div class="contact-form-section text-center">
            <h3 class="">
                Neem contact met ons op!
            </h3>
            <?php 
                echo do_shortcode('[contact-form-7 id="2575" title="Contactformulier 1"]'); 
            ?>
            <i class="fa fa-comments comments-icon comments-icon__one " aria-hidden="true"></i>
            <i class="fa fa-comments comments-icon comments-icon__two" aria-hidden="true"></i>
            <i class="fa fa-comments comments-icon comments-icon__three" aria-hidden="true"></i>

        </div> <!-- /.contact-form-section -->

        <?php
		understrap_link_pages();
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">

        <?php understrap_edit_post_link(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-## -->