<?php
/*
Template Name: Landing Page
*/
$landing_page_logo	= get_post_meta(get_the_ID(), 'landing-page-logo', true);
$landing_page_image = get_post_meta(get_the_ID(), 'landing-page-image', true);
$landing_page_desc  = get_post_meta(get_the_ID(), 'landing-page-desc', true);

$landing_page_logo_id   = attachment_url_to_postid($landing_page_logo);
$landing_page_image_id  = attachment_url_to_postid($landing_page_image);

$landing_page_logo_alt   = get_post_meta($landing_page_logo_id, '_wp_attachment_image_alt', TRUE);
$landing_page_image_alt  = get_post_meta($landing_page_image_id, '_wp_attachment_image_alt', TRUE);

$landing_page_title     = get_post_meta(get_the_ID(), 'landing-page-title', true);

global $post;

get_header(); ?>

    <?php if (!empty($landing_page_image)) : ?>
	<div id="landing-hero-cont" class="landing-hero grid-container full">
        <div class="overlay"></div>
		<img class="landing-hero" src="<?php echo $landing_page_image ?>" alt="<?php echo $landing_page_image_alt ?>">
		<div class="landing-content">
            
            <img class="hero-image" src="<?php echo $landing_page_logo ?>" alt="<?php echo $landing_page_logo_alt ?>">
         
			<?php
				$title = get_the_title($post->ID);
				    echo '<h1>' . $title . '</h1>';
                
                if(!empty($landing_page_desc)) {
                    echo '<h2>' . $landing_page_desc . '</h2>';
                }
				?>
    
		</div>
	</div>
    <?php endif; ?>

	<div id="landing-content" class="grid-container margin-top-3">
		
		<main class="main-content-full-width">
		 <?php while ( have_posts() ) : the_post(); ?>
		  <?php get_template_part( 'template-parts/content', 'page' ); ?>
		 <?php endwhile; ?>
		</main>
	
	</div>

<?php
$grid_item_1_img = get_post_meta( $post->ID, 'grid-item-1-img', true );
$get_image_1_id = attachment_url_to_postid($grid_item_1_img);
$alt1 = get_post_meta ( $get_image_1_id, '_wp_attachment_image_alt', true );

$grid_item_2_img = get_post_meta( $post->ID, 'grid-item-2-img', true );
$get_image_2_id = attachment_url_to_postid($grid_item_2_img);
$alt2 = get_post_meta ( $get_image_2_id, '_wp_attachment_image_alt', true );

$grid_item_3_img = get_post_meta( $post->ID, 'grid-item-3-img', true );
$get_image_3_id = attachment_url_to_postid($grid_item_3_img);
$alt3 = get_post_meta ( $get_image_3_id, '_wp_attachment_image_alt', true );

$grid_item_4_img = get_post_meta( $post->ID, 'grid-item-4-img', true );
$get_image_4_id = attachment_url_to_postid($grid_item_4_img);
$alt4 = get_post_meta ( $get_image_4_id, '_wp_attachment_image_alt', true );
?>

<?php if (!empty($grid_item_1_img)) : ?>

    <div id="landing-grid" class="row small-up-1 medium-up-3 large-up-4 align-center">
        <div class="column column1">
            <img class="thumbnail" src="<?php echo $grid_item_1_img ?>" alt="<?php echo $alt1 ?>">
        </div>
        <?php if (!empty($grid_item_2_img)) : ?>
        <div class="column column2">
            <img class="thumbnail" src="<?php echo $grid_item_2_img ?>" alt="<?php echo $alt2 ?>">
        </div>
        <?php endif;
        if (!empty($grid_item_3_img)) : ?>
        <div class="column column3">
            <img class="thumbnail" src="<?php echo $grid_item_3_img ?>" alt="<?php echo $alt3 ?>">
        </div>
        <?php endif;
        if (!empty($grid_item_4_img)) : ?>
        <div class="column column4">
            <img class="thumbnail" src="<?php echo $grid_item_4_img ?>" alt="<?php echo $alt4 ?>">
        </div>
        <?php endif; ?>
    </div>

<?php endif;
get_footer(); ?>
