<?php
/**
 * Created by PhpStorm.
 * User: chrisparsons
 * Date: 2019-02-14
 * Time: 05:03
 */

function tfs_custom_default_meta() {
	global $post;
	//if(!empty($post)){
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
		if($pageTemplate == 'page.php' || 'page-templates/front.php' || 'page-templates/kitchen-sink.php' ) {
			$types = array( 'page', 'post' );
			foreach($types as $type) {
				add_meta_box( 'default_meta', __( '<h3>' . 'Default Template Options &amp; Content'
						. '</h3>',
				'tfs-default-textdomain' ), 'tfs_default_meta_callback', $type, 'normal', 'high' );
			}
		}
	//}
}
add_action( 'add_meta_boxes', 'tfs_custom_default_meta' );

// Outputs the content of the meta box.
function tfs_default_meta_callback( $post ) {
wp_nonce_field( basename( __FILE__ ), 'default_nonce' );
$sbm_stored_default_meta = get_post_meta( $post->ID );
?>
	<!-- CTA content -->
	<strong><label for="default-cta-content" class="default-row-title"><?php _e( 'CTA Content - After ',
				'tfs-default-textdomain' )?></label></strong>
	<textarea style="width: 100%;" rows="4" name="default-cta-content" id="default-cta-content"><?php if ( isset ( $sbm_stored_default_meta['default-cta-content'] ) ) echo $sbm_stored_default_meta['default-cta-content'][0]; ?></textarea>

<?php }
