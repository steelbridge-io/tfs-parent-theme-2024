<?php
  /**
   * Created by PhpStorm.
   * User: chrisparsons
   * Date: 2019-03-08
   * Time: 17:25
   */
	function marketing_meta_save( $post_id ) {

		// Checks save status
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ 'marketing_nonce' ] ) && wp_verify_nonce( $_POST[ 'marketing_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

		// Exits script depending on save status
		if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
			return;
		}

		// Checks for input and saves if needed
		if( isset( $_POST[ 'marketing-image-right' ] ) ) {
			update_post_meta( $post_id, 'marketing-image-right', $_POST[ 'marketing-image-right' ] );
		}
		// Checks for input and saves if needed
		if( isset( $_POST[ 'marketing-comment-title-left' ] ) ) {
			update_post_meta( $post_id, 'marketing-comment-title-left', wp_kses_post($_POST[ 'marketing-comment-title-left' ]) );
		}
		// Checks for input and saves if needed
		if( isset( $_POST[ 'marketing-comment-left' ] ) ) {
			update_post_meta( $post_id, 'marketing-comment-left', wp_kses_post($_POST[ 'marketing-comment-left'
			]) );
		}
		// Checks for input and saves if needed
		if( isset( $_POST[ 'marketing-left-readmore' ] ) ) {
			update_post_meta( $post_id, 'marketing-left-readmore', esc_url($_POST[ 'marketing-left-readmore' ]) );
		}
		// Checks for input and saves if needed
		if( isset( $_POST[ 'marketing-image-left' ] ) ) {
			update_post_meta( $post_id, 'marketing-image-left', $_POST[ 'marketing-image-left' ] );
		}
		// Checks for input and saves if needed
		if( isset( $_POST[ 'marketing-comment-title-right' ] ) ) {
			update_post_meta( $post_id, 'marketing-comment-title-right', wp_kses_post($_POST[ 'marketing-comment-title-right' ]) );
		}
		// Checks for input and saves if needed
		if( isset( $_POST[ 'marketing-comment-right' ] ) ) {
			update_post_meta( $post_id, 'marketing-comment-right', wp_kses_post($_POST[ 'marketing-comment-right'
			]) );
		}
		// Checks for input and saves if needed
		if( isset( $_POST[ 'marketing-right-readmore' ] ) ) {
			update_post_meta( $post_id, 'marketing-right-readmore', esc_url($_POST[ 'marketing-right-readmore' ]) );
		}
	}
	add_action( 'save_post', 'marketing_meta_save' );
