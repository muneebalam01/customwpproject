<?php get_header(); ?>
<?php /* Template Name: All Featured */ ?>
<?php

$args = array(
	'posts_per_page' => -1,
	'post_type'      => 'product',
	'post_status'    => 'publish',
	'tax_query'      => array(
		array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'featured',
			'operator' => 'IN',
			),
		)  
);
$featured_product = new WP_Query( $args );

if ( $featured_product->have_posts() ) : 

echo '<div class="woocommerce columns-4"><ul class="products">';

while ( $featured_product->have_posts() ) : $featured_product->the_post();

$post_thumbnail_id     = get_post_thumbnail_id();
$product_thumbnail     = wp_get_attachment_image_src($post_thumbnail_id, $size = 'shop-feature');
$product_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
?>

	<li class="product">
		<a href="<?php the_permalink();?>">
			<img src="<?php echo $product_thumbnail[0];?>" alt="<?php echo $product_thumbnail_alt;?>">
			<h3 class="woocommerce-loop-product__title"><?php the_title();?></h3>
			<button class="yellow-but">VIEW PRODUCT</button>
		</a>    
	</li>
<?php 
endwhile; 

echo '</ul></div>';

endif; 
		
 wp_reset_query();
 ?>          
<!-- Featured products loop -->  


<?php get_footer();?>