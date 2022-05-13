<?php
/**
 * Hero setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>


<div class="new-arrival-section text-center">
    <h3 class="h1">New arrival</h3>

    <ul class="products <?php echo $container ?> ">
        <?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 8,
            'order_by' => 'date',
            'order' => "DESC",
			'meta_query' => array(
				array(
					'key' => '_stock_status',
					'value' => 'instock'
				),
			)
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
    </ul>
    <!– /.products–>

</div>