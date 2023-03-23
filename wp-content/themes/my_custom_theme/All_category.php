<?php get_header (); ?>

<?php /* Template Name: All Category */ ?>


<?php
$args = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'show_count' => 0,
    'pad_counts' => 0,
    'hierarchical' => 1,
    'title_li' => '',
    'hide_empty' => 0
);
$categories = get_categories( $args );
if ( $categories ) {
    echo '<div class = "all_category">';
    foreach ( $categories as $cat ) {
        $category_link = sprintf( 
            '<a href="%1$s" alt="%2$s">%3$s</a>',
            esc_url( get_term_link( $cat->slug, 'product_cat' ) ),
            esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $cat->name ) ),
            esc_html( $cat->name )
        );

        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        echo '<p class = "category_name"><a href="' . esc_url( get_term_link( $cat ) ) . '">
        <img src="' . esc_url( $image ) . '" alt="' . esc_attr( $cat->name ) . '" />' 
        . esc_html( $cat->name ) . '</a></p>';
    }
    echo '</div>';
}
?>



<?php get_footer(); ?>