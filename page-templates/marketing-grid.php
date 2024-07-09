<?php
/*
Template Name: Marketing Grid
*/
	get_header();
	include( get_stylesheet_directory() . '/library/meta-fields/post-meta/marketing-post-meta.php' );
	get_template_part( 'template-parts/featured-image-page' ); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'marketing' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<div class="marketing-site-content-section">
	<div class="marketing-site-content-section-img">
		<?php $get_image_url = get_post_meta(get_the_ID(), 'marketing-image-left', true);
			$get_image_id = attachment_url_to_postid($get_image_url);
			$altl = get_post_meta ( $get_image_id, '_wp_attachment_image_alt', true ); ?>
		<img src="<?php echo $marketing_image_left; ?>" alt="<?php echo $altl; ?>" />
	</div>
	<div class="marketing-site-content-section-block">
		<span class="mk-grid-bg-color"></span>
		<h3 class="marketing-site-content-section-block-header"><?php echo
			$marketing_comment_title_right; ?></h3>
		<p class="marketing-site-content-section-block-subheader subheader"><?php echo
			$marketing_comment_right; ?></p>
		<a href="<?php echo $marketing_left_readmore; ?>" class="mk-grid round button small">read more</a>
	</div>
	<div class="marketing-site-content-section-block small-order-2 medium-order-1">
		<h3 class="marketing-site-content-section-block-header"><?php echo
		$marketing_comment_title_left; ?></h3>
		<p class="marketing-site-content-section-block-subheader subheader"><?php echo
		$marketing_comment_left; ?></p>
		<a href="<?php echo $marketing_left_readmore; ?>" class="mk-grid round button small">read more</a>
	</div>
	<div class="marketing-site-content-section-img small-order-1 medium-order-2">
		<?php $get_image_url = get_post_meta(get_the_ID(), 'marketing-image-right', true);
		$get_image_id = attachment_url_to_postid($get_image_url);
		$altr = get_post_meta ( $get_image_id, '_wp_attachment_image_alt', true ); ?>
		<img src="<?php echo $marketing_image_right; ?>" alt="<?php echo $altr ?>" />
	</div>
</div>
<?php get_footer();
