<?php
/*
Template Name: Landing Page
*/
$landing_page_logo	= get_post_meta(get_the_ID(), 'landing-page-logo', true);
$landing_page_image = get_post_meta(get_the_ID(), 'landing-page-image', true);

$landing_page_logo_id   = attachment_url_to_postid($landing_page_logo);
$landing_page_image_id  = attachment_url_to_postid($landing_page_image);

$landing_page_logo_alt   = get_post_meta($landing_page_logo_id, '_wp_attachment_image_alt', TRUE);
$landing_page_image_alt  = get_post_meta($landing_page_image_id, '_wp_attachment_image_alt', TRUE);

$landing_page_title     = get_post_meta(get_the_ID(), 'landing-page-title', true);

global $post;

get_header(); ?>

	<div id="landing-hero-cont" class="landing-hero grid-container full">
		
		<img class="landing-hero" src="<?php echo $landing_page_image ?>" alt="<?php echo $landing_page_image_alt ?>">
		<div class="landing-content">
            <img class="" src="<?php echo $landing_page_logo ?>" alt="<?php echo $landing_page_logo_alt ?>">
			<?php
				$title = get_the_title($post->ID);
				echo '<h1>' . $title . '</h1>';
				?>
            <h2>Call to Action</h2>
		</div>
	</div>

	<div id="landing-content" class="grid-container margin-top-3">
		
		<main class="main-content-full-width">
		 <?php while ( have_posts() ) : the_post(); ?>
		  <?php get_template_part( 'template-parts/content', 'page' ); ?>
		 <?php endwhile; ?>
		</main>
	
	</div>

<?php get_footer(); ?>
