<?php
  /**
   * Created by PhpStorm.
   * User: chrisparsons
   * Date: 2019-03-08
   * Time: 14:44
   */

	include( 'sanitize/marketing-sanitize.php' );

	function tfs_custom_marketing_meta() {
		global $post;
		//if(!empty($post)){
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
		if($pageTemplate == 'page-templates/marketing-grid.php' ) {
			$types = array( 'page', 'post' );
			foreach($types as $type) {
				add_meta_box( 'marketing_meta', __( '<h3>' . 'Marketing Template Options &amp; Content'
					. '</h3>',
					'tfs-marketing-textdomain' ), 'tfs_marketing_meta_callback', $type, 'normal', 'high' );
			}
		}
		//}
	}
	add_action( 'add_meta_boxes', 'tfs_custom_marketing_meta' );

	// Outputs the content of the meta box.
	function tfs_marketing_meta_callback( $post ) {
		wp_nonce_field( basename( __FILE__ ), 'marketing_nonce' );
		$sbm_stored_marketing_meta = get_post_meta( $post->ID );
		?>

		<!-- MARKETING COMMENT TITLE LEFT -->
		<div class="1618">
			<strong><label for="marketing-comment-title-left" class="marketing-row"><?php _e( ' Marketing Comment Title Left','tfs-marketing-textdomain' )?></label></strong>
			<input style="width:50%;" type="text" name="marketing-comment-title-left"
						 id="marketing-comment-title-left" value="<?php if (isset($sbm_stored_marketing_meta['marketing-comment-title-left'])) echo $sbm_stored_marketing_meta['marketing-comment-title-left'][0]; ?>" />
		</div>

		<!-- MARKETING COMMENT LEFT -->
		<div class="mb-1618">
			<strong><label for="marketing-comment-left" class="marketing-row"><?php _e( ' Marketing Comment Bottom Left ','tfs-marketing-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="marketing-comment-left"
								id="marketing-comment-left"><?php if ( isset ( $sbm_stored_marketing_meta['marketing-comment-left'] ) ) echo $sbm_stored_marketing_meta['marketing-comment-left'][0]; ?></textarea>
		</div>
		<!-- MARKETING LEFT READ MORE LINK -->
		<div class="mb-1618">

			<label for="marketing-left-readmore" class="marketing-row"><?php _e( '<h3>Marketing Left Read More Link</h3>' ); ?></label>
			<input type="url" style="width:50%;" name="marketing-left-readmore"
						 id="marketing-left-readmore" value="<?php if(isset( $sbm_stored_marketing_meta['marketing-left-readmore'])) echo $sbm_stored_marketing_meta['marketing-left-readmore'][0]; ?>" />

		</div>

		<!-- MARKETING IMAGE RIGHT -->
		<div class="mb-1618">

			<label for="marketing-image-right" class="marketing-row"><?php _e( '<h3>Marketing Image Right</h3>',	'tfs-marketing-textdomain' );?></label>
			<input type="text" style="width:50%;" name="marketing-image-right" id="marketing-image-right"
						 value="<?php if ( isset ( $sbm_stored_marketing_meta['marketing-image-right'] ) ) echo
						 $sbm_stored_marketing_meta['marketing-image-right'][0];?>" />
			<input type="button" id="marketing-image-right-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'tfs-marketing-textdomain' );?>" />

		</div>

		<!-- MARKETING COMMENT TITLE RIGHT -->
		<div class="1618">
			<strong><label for="marketing-comment-title-right" class="marketing-row"><?php _e( ' Marketing Comment Title Right','tfs-marketing-textdomain' )?></label></strong>
			<input style="width:50%;" type="text" name="marketing-comment-title-right"
						 id="marketing-comment-title-right" value="<?php if (isset
			($sbm_stored_marketing_meta['marketing-comment-title-right'])) echo
			$sbm_stored_marketing_meta['marketing-comment-title-right'][0]; ?>" />
		</div>

		<!-- MARKETING COMMENT RIGHT -->
		<div class="mb-1618">
			<strong><label for="marketing-comment-right" class="marketing-row"><?php _e( ' Marketing Comment Bottom right ','tfs-marketing-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="marketing-comment-right"
								id="marketing-comment-right"><?php if ( isset ( $sbm_stored_marketing_meta['marketing-comment-right'] ) ) echo $sbm_stored_marketing_meta['marketing-comment-right'][0]; ?></textarea>
		</div>

		<div class="mb-1618">

			<label for="marketing-right-readmore" class="marketing-row"><?php _e( '<h3>Marketing right Read More Link</h3>' ); ?></label>
			<input type="url" style="width:50%;" name="marketing-right-readmore"
						 id="marketing-right-readmore" value="<?php if(isset( $sbm_stored_marketing_meta['marketing-right-readmore'])) echo $sbm_stored_marketing_meta['marketing-right-readmore'][0]; ?>" />

		</div>

		<div class="mb-1618"> <!-- ==== MARKETING IMAGE LEFT ==== -->

			<label for="marketing-image-left" class="marketing-row"><?php _e( '<h3>Marketing Image Left</h3>',	'tfs-marketing-textdomain' );?></label>
			<input type="text" style="width:50%;" name="marketing-image-left" id="marketing-image-left"
						 value="<?php if ( isset ( $sbm_stored_marketing_meta['marketing-image-left'] ) ) echo
						 $sbm_stored_marketing_meta['marketing-image-left'][0];?>" />
			<input type="button" id="marketing-image-left-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'tfs-marketing-textdomain' );?>" />

		</div>

	<?php }
