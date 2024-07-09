<?php
/*
Template Name: Front
*/
get_header();
$default = '';
$get_image_one = get_theme_mod('fp-topslider-one');
?>

<!-- ====== ORBIT ======  -->
<?php if (!empty($get_image_one)) : ?>
<section class="ten-twentyfour-plus">
	<div class="orbit mb-2618" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
		<div class="orbit-wrapper">
			<div class="orbit-controls">
				<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><!--&#9664;
				&#xFE0E;--><i class=" fa-3x fas fa-chevron-left"></i></button>
				<button class="orbit-next"><span class="show-for-sr">Next Slide</span><i class="fa-3x fas
      fa-chevron-right"></i><!-- &#9654;&#xFE0E; -->
				</button>
			</div>
			<ul class="orbit-container">
				<li class="is-active orbit-slide">
					<figure class="orbit-figure">
						<div class="slider-overlay"></div>
						<?php
						$get_image_one = get_theme_mod('fp-topslider-one');
						$get_image_one_id = attachment_url_to_postid($get_image_one);
						$alt_slider_one = get_post_meta ( $get_image_one_id, '_wp_attachment_image_alt', true ); ?>
						<img class="orbit-image orbit-image-one" src="<?php echo $get_image_one; ?>" alt="<?php echo $alt_slider_one; ?>">
						<figcaption class="orbit-caption orbit-caption-one"><?php echo get_theme_mod('fp-topslider-one-caption'); ?></figcaption>
					</figure>
				</li>
				<li class="orbit-slide">
					<figure class="orbit-figure">
						<div class="slider-overlay"></div>
						<?php
						$get_image_two = get_theme_mod('fp-topslider-two');
						$get_image_two_id = attachment_url_to_postid($get_image_two);
						$alt_slider_two = get_post_meta ( $get_image_two_id, '_wp_attachment_image_alt', true ); ?>
						<img class="orbit-image orbit-image-two" src="<?php echo get_theme_mod('fp-topslider-two'); ?>" alt="<?php echo $alt_slider_two; ?>">
						<figcaption class="orbit-caption orbit-caption-two"><?php echo get_theme_mod('fp-topslider-two-caption'); ?></figcaption>
					</figure>
				</li>
				<li class="orbit-slide">
					<figure class="orbit-figure">
						<div class="slider-overlay"></div>
						<?php
						$get_image_three = get_theme_mod('fp-topslider-three');
						$get_image_three_id = attachment_url_to_postid($get_image_three);
						$alt_slider_three = get_post_meta ( $get_image_three_id, '_wp_attachment_image_alt', true ); ?>
						<img class="orbit-image orbit-image-three" src="<?php echo get_theme_mod('fp-topslider-three'); ?>" alt="<?php echo $alt_slider_three; ?>">
						<figcaption class="orbit-caption orbit-caption-three"><?php echo get_theme_mod('fp-topslider-three-caption'); ?></figcaption>
					</figure>
				</li>
				<li class="orbit-slide">
					<figure class="orbit-figure">
						<div class="slider-overlay"></div>
						<?php
						$get_image_four = get_theme_mod('fp-topslider-four');
						$get_image_four_id = attachment_url_to_postid($get_image_four);
						$alt_slider_four = get_post_meta ( $get_image_four_id, '_wp_attachment_image_alt', true ); ?>
						<img class="orbit-image orbit-image-four" src="<?php echo get_theme_mod('fp-topslider-four'); ?>" alt="<?php echo $alt_slider_four; ?>">
						<figcaption class="orbit-caption orbit-caption-four"><?php echo get_theme_mod('fp-topslider-four-caption'); ?></figcaption>
					</figure>
				</li>

			</ul>
		</div>
		<nav class="orbit-bullets orbit-bullets-container">
			<button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
			<button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
			<button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
			<button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
		</nav>
	</div>
</section>
<?php endif; ?>
<!-- ====== ORBIT MOBILE ====== -->
<section class="ten-twentyfour-less">
	<div class="orbit mb-2618" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
		<div class="orbit-wrapper">
			<div class="orbit-controls">
				<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><i class="
      fa-2x fas fa-chevron-left"></i></button>
				<button class="orbit-next"><span class="show-for-sr">Next Slide</span><i class=" fa-2x fas
      fa-chevron-right"></i></button>
			</div>
			<ul class="orbit-container">
				<li class="is-active orbit-slide">
					<figure class="orbit-figure">
						<?php
						$get_image_one = get_theme_mod('fp-topslider-one');
						$get_image_one_id = attachment_url_to_postid($get_image_one);
						$alt_slider_one = get_post_meta ( $get_image_one_id, '_wp_attachment_image_alt', true ); ?>
						<img class="orbit-image orbit-image-one" src="<?php echo get_theme_mod('fp-topslider-one'); ?>" alt="<?php echo $alt_slider_one; ?>">
						<figcaption class="orbit-caption orbit-caption-one"><?php echo get_theme_mod('fp-topslider-one-caption'); ?></figcaption>
					</figure>
				</li>
				<li class="orbit-slide">
					<figure class="orbit-figure">
						<?php
						$get_image_two = get_theme_mod('fp-topslider-two');
						$get_image_two_id = attachment_url_to_postid($get_image_two);
						$alt_slider_two = get_post_meta ( $get_image_two_id, '_wp_attachment_image_alt', true ); ?>
						<img class="orbit-image orbit-image-two" src="<?php echo get_theme_mod('fp-topslider-two'); ?>" alt="<?php echo $alt_slider_two; ?>">
						<figcaption class="orbit-caption orbit-caption-two"><?php echo get_theme_mod('fp-topslider-two-caption'); ?></figcaption>
					</figure>
				</li>
				<li class="orbit-slide">
					<figure class="orbit-figure">
						<?php
						$get_image_three = get_theme_mod('fp-topslider-three');
						$get_image_three_id = attachment_url_to_postid($get_image_three);
						$alt_slider_three = get_post_meta ( $get_image_three_id, '_wp_attachment_image_alt', true ); ?>
						<img class="orbit-image orbit-image-three" src="<?php echo get_theme_mod('fp-topslider-three'); ?>" alt="<?php echo $alt_slider_three; ?>">
						<figcaption class="orbit-caption orbit-caption-three"><?php echo get_theme_mod('fp-topslider-three-caption'); ?></figcaption>
					</figure>
				</li>
				<li class="orbit-slide">
					<figure class="orbit-figure">
						<?php
						$get_image_four = get_theme_mod('fp-topslider-four');
						$get_image_four_id = attachment_url_to_postid($get_image_four);
						$alt_slider_four = get_post_meta ( $get_image_four_id, '_wp_attachment_image_alt', true ); ?>
						<img class="orbit-image orbit-image-four" src="<?php echo get_theme_mod('fp-topslider-four'); ?>" alt="<?php echo $alt_slider_four; ?>">
						<figcaption class="orbit-caption orbit-caption-four"><?php echo get_theme_mod('fp-topslider-four-caption'); ?></figcaption>
					</figure>
				</li>
			</ul>
		</div>
		<nav class="orbit-bullets">
			<button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
			<button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
			<button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
			<button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
		</nav>
	</div>
</section>
<section>
	<!-- TOP WIDGET -->
	<div id="top-cta" class="row align-middle">
		<span class="topcta-selector topcta-text-color"></span>
		<div class="left-top-widget columns large-8 small-12"><?php dynamic_sidebar('front-top-widget-left'); ?></div>
		<div class="right-top-widget columns"><?php dynamic_sidebar('front-top-widget-right'); ?></div>
	</div>
</section>

<?php if(!empty($default)) : ?>
<section>

	<div class="grid-x grid-padding-x">

		<div id="fp-video-container" class="cell small-12 large-6 device-margins">
			<?php
			$default = '';
			$fp_youtube 			= get_theme_mod( 'fp-youtube', $default );
			$fp_movie_mp4			= get_theme_mod( 'fp-movie-mp4', $default );
			$fp_movie_webm		= get_theme_mod( 'fp-movie-webm', $default );
			$fp_movie_comment	= get_theme_mod( 'fp-movie-comment', $default );
			if( !empty($fp_youtube) ) : ?>
				<div class="videobg">
					<div class="videobg-width">
						<div class="videobg-aspect">
							<div class="videobg-make-height">
								<div class="videobg-hide-controls">
								<?php
								function fp_youtube() {
									echo '<iframe width="100%" height="100%" class="youtube-vid" src="https://www.youtube.com/embed/'.get_theme_mod('fp-youtube').'?rel=0&autoplay=1&loop=1&mute=1&controls=0" frameborder="0"
									allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
								}
								fp_youtube();
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php elseif(!empty( $fp_movie_mp4 || $fp_movie_webm )) : ?>
				<div class="promo">
					<video autoplay loop muted id="video_bg">
						<source src="<?php echo $fp_movie_webm; ?>" type="video/webm">
						<source src="<?php echo $fp_movie_mp4; ?>" type="video/mp4">
					</video>
					<div class="row align-center align-middle">
						<div class="small-8 column text-center" id="message">
						<span class="fp-movie-comment">
							<?php echo $fp_movie_comment; ?>
						</span>
						</div>
					</div>
				</div>
			<?php elseif(empty( $fp_youtube && $fp_movie_mp4 && $fp_movie_mp4 )) : ?>
				<!-- <div class="portfolio-orbit orbit" role="region" aria-label="Favorite Space Pictures"
						 data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
					<div class="orbit-wrapper">
						<div class="orbit-controls">
							<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><i
									class=" fa-2x fas fa-chevron-left"></i></button>
							<button class="orbit-next"><span class="show-for-sr">Next Slide</span><i class="
						fa-2x fas fa-chevron-right"></i></button>
						</div>
						<ul class="sidebar orbit-container orbit-ul">
							<li class="orbit-slide orbit-item orbit-item-1 is-active">

							</li>

							<li class="orbit-slide orbit-item orbit-item-2 orbit-item">

							</li>

							<li class="orbit-slide orbit-item orbit-item-3 orbit-item">

							</li>

							<li class="orbit-slide orbit-item orbit-item-4 orbit-item">

							</li>
						</ul>
					</div>
					<nav class="orbit-bullets">
						<button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
						<button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
						<button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
						<button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
					</nav>
				</div> -->
			<?php endif; ?>

		</div>

		<div id="sidecards" class="cell small-12 large-6">
			<div id="topcard" class="topcard card">
				<span class="topcard-label-refresh topcard-image-refresh topcard-label-refresh-color"></span>
				<div class="card-divider-before">
					<?php $top_card_lable = get_theme_mod('fp-topcard-label'); ?>
					<div id="top-card" class="card-divider card-divider-top">
						<?php echo $top_card_lable; ?>
					</div>
				</div>
				<?php $top_text = get_theme_mod('fp-topcard-cap'); ?>
				<span class="top-card-text-refresh"></span>
				<div id="topcardid" class="card-section">
					<?php echo $top_text; ?>
				</div>
			</div>

			<div id="bottom-card" class="bottomcard card">
				<span class="bottom-card-text-refresh bottom-card-img-refresh"></span>
				<div class="card-divider-before">
					<?php $fp_bottomcard_label = get_theme_mod( 'fp-bottomcard-label' ); ?>
					<div class="card-divider card-divider-bottom">
						<?php echo $fp_bottomcard_label; ?>
					</div>
				</div>
				<?php $bottom_text = get_theme_mod('fp-bottomcard-cap'); ?>
				<span class="bottom-card-textarea-refresh"></span>
				<div id="bottomcardid" class="card-section">
					<?php echo $bottom_text; ?>
				</div>
			</div>

		</div>
	</div>
</section>
<?php endif; ?>

<section id="item-row-fp">
	<div class="grid-x grid-padding-x mt-1618 mb-1618 align-center">
		<?php if ( is_active_sidebar( 'front-page-1' ) ) : ?>
			<div id="primary-sidebar" class="the-cell cell large-3 medium-5 primary-sidebar
    widget-area"
					 role="complementary">
				<?php dynamic_sidebar( 'front-page-1' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'front-page-2' ) ) : ?>
			<div id="primary-sidebar" class="the-cell cell large-3 medium-5 primary-sidebar
    widget-area"
					 role="complementary">
				<?php dynamic_sidebar( 'front-page-2' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'front-page-3' ) ) : ?>
			<div id="primary-sidebar" class="the-cell cell large-3 medium-5 primary-sidebar
    widget-area"
					 role="complementary">
				<?php dynamic_sidebar( 'front-page-3' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'front-page-4' ) ) : ?>
			<div id="primary-sidebar" class="the-cell cell large-3 medium-5 primary-sidebar
    widget-area"
					 role="complementary">
				<?php dynamic_sidebar( 'front-page-4' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</div>
</section>

<!-- ====== GRID ====== -->

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<section class="intro mt-2618" role="main">
		<div class="fp-intro">

			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			<!--	<footer>
					<?php
				/*	wp_link_pages(
						array(
							'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
							'after'  => '</p></nav>',
						)
					); */
					?>
					<p><?php //the_tags(); ?></p>
				</footer> -->
				<?php //do_action( 'foundationpress_page_before_comments' ); ?>
				<?php //comments_template(); ?>
				<?php //do_action( 'foundationpress_page_after_comments' ); ?>
			</div>

		</div>
	</section>
<?php endwhile; ?>

<!-- BLOG -->
<?php
$numberofposts = array( 'numberposts'	=> 1 );
$myposts = get_posts($numberofposts);
foreach($myposts as $post) : setup_postdata($post);
?>
<div id="front-page-blog-section">
	<h2 class="blog-news">News From The River</h2>
	<span class="blog-news-refresh"></span>
<div id="front-page-blog" class="blog">
<div class="media-object stack-for-small">
	<span class="blog-selective-refresh"></span>
	<div class="top media-object-section">
		<div class="thumbnail">
			<?php
			the_post_thumbnail('single-post-thumbnail');
			?>
		</div>
	</div>
	<div class="media-object-section blog-text-section">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
	</div>
	<?php endforeach; ?>
</div>
</div>
</div>






















<!-- END POSTS -->
<?php do_action( 'foundationpress_after_content' ); ?>

<div id="parallax-container">
	<?php $parallax_1 = get_theme_mod('fp-topparallax-img'); ?>
	<div id="parallaxone" class="parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?php echo $parallax_1; ?>">

		<span class="parallax-text">
			<?php $parallax_1_cta = get_theme_mod('fp-topparallax-cta');
			echo $parallax_1_cta; ?>
		</span>

	</div>
	<div id="parallax-divider" class="gid-x">
		<div class="cell large-12 mt-2618 mb-2618 text-center parallax-text-divider">
		<span class="fp-divider-content">
		<?php
		$parallax_divider = get_theme_mod('fp-divider-content');
		echo $parallax_divider;
		?>
		</span>
		</div>
	</div>


	<?php $parallax_2 = get_theme_mod('fp-bottomparallax-img'); ?>
	<div id="parallaxtwo" class="parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?php echo $parallax_2; ?>">

		<div class="parallax-text">
			<?php $parallax_2_cta = get_theme_mod('fp-bottomparallax-cta');
			echo $parallax_2_cta; ?>
		</div>

	</div>
</div>


<?php get_footer(); ?>

<script>
	// Loads youtube background video
	( function( $ ) {

		var timeoutId;
		var $videoBgAspect = $(".videobg-aspect");
		var $videoBgWidth = $(".videobg-width");
		var videoAspect = $videoBgAspect.outerHeight() / $videoBgAspect.outerWidth();

		function videobgEnlarge() {
			console.log('resize');
			windowAspect = ($(window).height() / $(window).width());
			if (windowAspect > videoAspect) {
				//$videoBgWidth.width((windowAspect / videoAspect) * 200 + '%');
			} else {
				$videoBgWidth.width(200 + "%")
			}
		}

		$(window).resize(function() {
			clearTimeout(timeoutId);
			timeoutId = setTimeout(videobgEnlarge, 100);
		});

		$(function() {
			videobgEnlarge();
		});

	} )( jQuery );

</script>
