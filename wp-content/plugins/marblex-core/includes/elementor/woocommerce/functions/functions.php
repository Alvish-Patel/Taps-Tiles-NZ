<?php 
function pt_woo_get_category()
{
    $taxonomy = 'product_cat';
    $orderby = 'name';
    $show_count = 0; // 1 for yes, 0 for no
    $pad_counts = 0; // 1 for yes, 0 for no
    $hierarchical = 1; // 1 for yes, 0 for no
    $title = '';
    $empty = 0;

    $args = array(
        'taxonomy' => $taxonomy,
        'orderby' => $orderby,
        'show_count' => $show_count,
        'pad_counts' => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li' => $title,
        'hide_empty' => $empty,
        'parent' => 0
    );
    $array = get_categories($args);
  	return $array;
}

function pt_woo_product_tags($type = null)
{
    $terms = get_terms( 'product_tag' );
    $term_array = array();
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
        $term_array[$term->slug] = $term->name;
        }
        return $term_array;
    }

    
}
