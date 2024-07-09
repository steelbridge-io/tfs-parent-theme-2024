<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if ( has_post_thumbnail( $post->ID ) ) : ?>

	<?php
	$get_fplogo = get_theme_mod('fp-logo');
	$get_fplogo_id = attachment_url_to_postid($get_fplogo);
	$alt_fplogo = get_post_meta ( $get_fplogo_id, '_wp_attachment_image_alt', true );
	?>

	<header id="page-hero" class="featured-hero row" role="banner" data-interchange="
	[<?php the_post_thumbnail_url( 'featured-small' ); ?>, small],
	[<?php the_post_thumbnail_url( 'featured-medium' ); ?>, medium],
	[<?php the_post_thumbnail_url( 'featured-large' ); ?>, large],
	[<?php the_post_thumbnail_url( 'featured-xlarge' ); ?>, xlarge]">

	<?php if(get_theme_mod('fp-logo')) { ?>
		<div id="page-img" class="page-image column medium-6 large-12">
			<img class="fplogo"  src="<?php echo get_theme_mod('fp-logo'); ?>" alt="<?php echo
			$alt_fplogo; ?>">
		</div>
	<?php  } endif;
		echo '<div class="page-image-text column medium-6 large-12">';
		the_title('<h1>', '</h1>');
		echo '</div>';
	?>

	</header>



