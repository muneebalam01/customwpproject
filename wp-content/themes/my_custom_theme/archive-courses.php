<?php get_header();?>

 <div class = "all_projects">
 <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

 $project_args = array(
     'post_type' => 'courses',
     'posts_per_page' => 4,
     'paged' => $paged,
     'page' => $paged
   );




 $project_query = new WP_Query( $project_args ); ?>
 <?php if ( $project_query->have_posts() ) : ?>
  <div class = "all_new_projects_row">
   <?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
   <div class = "inner_prjoect">
   <?php $metabox_value = get_post_meta( get_the_ID(), '_meta_fields_book_title', true ); ?>

     <article class="loop">
       <h3><a href = "<?php the_permalink();?>"><?php the_title(); ?></a></h3>
       <p class = "course_price_custom"> Price :  <?php echo $metabox_value; ?> </p>
        <p><a href = "<?php the_permalink();?> "> <?php the_post_thumbnail('medium'); ?></a> </p>
       <div class="content">
         <?php the_excerpt(); ?>
       </div>
     </article>
    </div>
   <?php endwhile; ?>
   </div>
   <?php
      if (function_exists( 'custom_pagination' )) :
         custom_pagination( $project_query->max_num_pages,"",$paged );
     endif;
    ?>
 <?php wp_reset_postdata(); ?>
 <?php else:  ?>
   <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>
  </div>

<?php get_footer();?>