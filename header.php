<?php
	/**
	 * The template for displaying the header
	 *
	 * Displays all of the head element and everything up until the "container" div.
	 *
	 * @package FoundationPress
	 * @since FoundationPress 1.0.0
	 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>

<?php
	$topgradient_color    = get_theme_mod( 'fp-top-gradient-bg' );
	$top_gradient         = get_theme_mod( 'fp-top-gradient-spread' );
	$middlegradient_color = get_theme_mod( 'fp-middle-gradient-bg' );
	$middle_gradient      = get_theme_mod( 'fp-middle-gradient-spread' );
	$bottomgradient_color = get_theme_mod( 'fp-bottom-gradient-bg' );
	$bottom_gradient      = get_theme_mod( 'fp-bottom-gradient-spread' );

	if(is_home() || is_front_page()) :
?>

<body <?php body_class(); ?> style="background:linear-gradient(180deg, rgba( <?php echo $topgradient_color; ?> ) <?php echo $top_gradient; ?>%, rgba( <?php echo $middlegradient_color; ?> ) <?php echo $middle_gradient; ?>%, rgba( <?php echo $bottomgradient_color; ?>) <?php echo $bottom_gradient; ?>% );">

<div class="loader"></div>

<?php else: ?>

<body <?php body_class(); ?>>

<?php endif; ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
<?php endif; ?>

<?php if ( is_page_template('page-templates/front.php')) { ?>

	<!-- Front Page Custom Nav. Display:None on small devices. -->
	<header id="front-php-nav" class="sticky-shrinknav-header site-header">

		<?php
			$get_fplogo = get_theme_mod('fp-logo');
			$get_fplogo_id = attachment_url_to_postid($get_fplogo);
			$alt_fplogo = get_post_meta ( $get_fplogo_id, '_wp_attachment_image_alt', true );
		?>

		<?php

			if(get_theme_mod('fp-logo')) { ?>
				<div class="logoimg">
					<img class="fplogo sticky-shrinknav-header-title" src="<?php echo get_theme_mod('fp-logo'); ?>" alt="<?php echo $alt_fplogo; ?>">
				</div>
			<?php } else { ?>
				<h1 class="sticky-shrinknav-header-title"><?php bloginfo( 'name' ); ?></h1>
			<?php } ?>

		<?php foundationpress_top_bar_r(); ?>

	</header>

	<!-- Front Page Nav. Default. Display:Initial on Small Devices. Display:None medium and up. -->
	<header id="front-php-nav-small-header" class="site-header" role="banner">
		<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon"
								type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
			</div>
		</div>

		<nav id="front-php-nav-small-nav" class="site-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<div class="site-desktop-title top-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_basic_nav(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>

	</header>

<?php } else { ?>
	<header class="site-header" role="banner">

		<div class="top-bar-container" data-sticky-container>
			<div class="sticky" data-sticky data-options="anchor: page;
			marginTop: 0; stickyOn: small;
" style="width:100%; z-index:20">

				<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle
				(); ?>>
					<div class="title-bar-left">
						<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
						<span class="site-mobile-title title-bar-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</span>
					</div>
				</div>

				<nav class="site-navigation top-bar" role="navigation">
					<div class="top-bar-left">
						<div class="site-desktop-title top-bar-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</div>
					</div>
					<div class="top-bar-right">
						<?php foundationpress_basic_nav(); ?>

						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
							<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>
					</div>
				</nav>

			</div>
		</div>

	</header>

<?php } ?>
