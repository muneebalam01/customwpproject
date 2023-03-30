<?php
// register meta box
function meta_fields_add_meta_box(){
	add_meta_box(
		'meta_fields_meta_box', 
		__( 'Book details' ), 
		'meta_fields_build_meta_box_callback', 
		'courses',
		'side',
		'default'
	 );
}

// build meta box
function meta_fields_build_meta_box_callback( $post ){
	  wp_nonce_field( 'meta_fields_save_meta_box_data', 'meta_fields_meta_box_nonce' );
	  $title = get_post_meta( $post->ID, '_meta_fields_book_title', true ); ?>
	  <div class="inside">
	  	  <p><strong>Course Price</strong></p>
		  <p><input type="number" id="meta_fields_book_title" name="meta_fields_book_title" value="<?php echo esc_attr( $title ); ?>" /></p>	
	  </div>
	  <?php
}
add_action( 'add_meta_boxes', 'meta_fields_add_meta_box' );


// save metadata
function meta_fields_save_meta_box_data( $post_id ) {
	if ( ! isset( $_POST['meta_fields_meta_box_nonce'] ) )
		return;
	if ( ! wp_verify_nonce( $_POST['meta_fields_meta_box_nonce'], 'meta_fields_save_meta_box_data' ) )
		return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;
	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if ( ! isset( $_POST['meta_fields_book_title'] ) )
		return;
	

	$title = sanitize_text_field( $_POST['meta_fields_book_title'] );
	

	update_post_meta( $post_id, '_meta_fields_book_title', $title );

}
add_action( 'save_post', 'meta_fields_save_meta_box_data' );