<?php
/**
 * Hero setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="categorie-section">
    <h3 class="text-center h1">Categorieën</h3>
    <div class="categorie-wrapper">
        <i class="fa fa-arrow fa-arrow-left prev-button" aria-hidden="true"></i>
        <i class="fa fa-arrow fa-arrow-right next-button" aria-hidden="true"></i>
        <div class="categorie-grid" id="categorie-grid">

            <?php

$taxonomy     = 'product_cat';
$orderby      = 'name';  
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';  
$empty        = 1;
$count        = 0;

$args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
);
$all_categories = get_categories( $args );
foreach ($all_categories as $cat) {
    if ($cat->category_count) {
        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_image($thumbnail_id);
        echo '<div class="categorie-card">';
        echo '<a href="' . get_term_link($cat->term_id);
        echo '">';
        echo $image;
        echo '<div class="overlay"></div>';
        echo '<h3>' . $cat->name . '</h3>';
        echo '</a>';
        echo '</div>';
        $count = $count + 1;    
    }

    // if($cat->category_parent == 0) {
    //     $category_id = $cat->term_id;       

    //     $args2 = array(
    //             'taxonomy'     => $taxonomy,
    //             'child_of'     => 0,
    //             'parent'       => $category_id,
    //             'orderby'      => $orderby,
    //             'show_count'   => $show_count,
    //             'pad_counts'   => $pad_counts,
    //             'hierarchical' => $hierarchical,
    //             'title_li'     => $title,
    //             'hide_empty'   => $empty
    //     );
    //     $sub_cats = get_categories( $args2 );
    //     if($sub_cats) {
    //         foreach($sub_cats as $sub_category) {
    //             if($sub_category->category_count) {
    //                 $thumbnail_id = get_term_meta($sub_category->term_id, 'thumbnail_id', true);
    //                 $image = wp_get_attachment_image($thumbnail_id);
    //                 $count = $count + 1;
    //                 echo '<div class="categorie-card">';
    //                 echo '<a href="' . get_term_link($sub_category->term_id);
    //                 echo '">';
    //                 echo $image;
    //                 echo '<div class="overlay"></div>';
    //                 echo '<h3>' . $sub_category->name . '</h3>';
    //                 echo '</a>';
    //                 echo '</div>';
    //             }
    //         }   
    //     }
    // }       
}
?>
        </div> <!-- categorie-grid -->
        <div class="dots-section text-center">
            <?php
                foreach ( range(1, $count) as $item) {
                    echo '<div class="dot"></div>';
                }
            ?>
        </div>
    </div> <!-- categorie-wrapper -->

</div> <!-- categorie-section -->