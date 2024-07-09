<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


// Check to see if rev-manifest exists for CSS and JS static asset revisioning
//https://github.com/sindresorhus/gulp-rev/blob/master/integration.md

if ( ! function_exists( 'foundationpress_asset_path' ) ) :
	function foundationpress_asset_path( $filename ) {
		$filename_split = explode( '.', $filename );
		$dir            = end( $filename_split );
		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/rev-manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}
		return $filename;
	}
endif;


if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts()
	{

		// Enqueue the main Stylesheet.
		wp_enqueue_style('main-stylesheet', get_stylesheet_directory_uri() . '/dist/assets/css/' . foundationpress_asset_path('app.css'), array(), '2.10.4', 'all');

		wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css',
			array(), '5.8.1', 'all');

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script('jquery');

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', true);

		wp_enqueue_script('parallax-js', get_stylesheet_directory_uri() . '/library/js/parallax.min.js', array(), '', true);

		// Deregister the jquery-migrate version bundled with WordPress.
		wp_deregister_script('jquery-migrate');

		// CDN hosted jQuery migrate for compatibility with jQuery 3.x
		wp_register_script('jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array
		('jquery'), '3.0.1', true);

		// Enqueue jQuery migrate. Uncomment the line below to enable.
		wp_enqueue_script('jquery-migrate');

		//Enqueue FontAwesome from CDN. Uncomment the line below if you need FontAwesome.
		//wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true);

		// Enqueue Foundation scripts
		wp_enqueue_script('foundation', get_stylesheet_directory_uri() . '/dist/assets/js/' .
			foundationpress_asset_path('app.js'), array('jquery'), '2.10.4', true);

		// Add the comment-reply library on pages where it is necessary
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}

		$slider2img1 = 'main-stylesheet'; // Swap in your CSS Stylesheet ID

		$css1 = '';

		$slider_2_image1 = get_theme_mod('fp-slidertwo-one'); // Assigning it to a variable to keep the markup clean.

		$css1 .= (!empty($slider_2_image1)) ? sprintf('
    li.orbit-item-1 {
    background: url(%s) no-repeat center;
    background-size: cover;
    }
    ', $slider_2_image1) : '';

		if ($css1) {
			wp_add_inline_style($slider2img1, $css1);
		}

		$slider2img2 = 'main-stylesheet';  // Swap in your CSS Stylesheet ID

		$css2 = '';

		$slider_2_image2 = get_theme_mod('fp-slidertwo-two'); // Assigning it to a variable to keep the markup clean.

		$css2 .= (!empty($slider_2_image2)) ? sprintf('
    li.orbit-item-2 {
    background: url(%s) no-repeat center;
    background-size: cover;
    }
    ', $slider_2_image2) : '';

		if ($css2) {
			wp_add_inline_style($slider2img2, $css2);
		}

		$slider2img3 = 'main-stylesheet';  // Swap in your CSS Stylesheet ID

		$css3 = '';

		$slider_2_image3 = get_theme_mod('fp-slidertwo-three'); // Assigning it to a variable to keep the markup clean.

		$css3 .= (!empty($slider_2_image3)) ? sprintf('
    li.orbit-item-3 {
    background: url(%s) no-repeat center;
    background-size: cover;
    }
    ', $slider_2_image3) : '';

		if ($css3) {
			wp_add_inline_style($slider2img3, $css3);
		}

		$slider2img4 = 'main-stylesheet';  // Swap in your CSS Stylesheet ID

		$css4 = '';

		$slider_2_image4 = get_theme_mod('fp-slidertwo-four'); // Assigning it to a variable to keep the markup clean.

		$css4 .= (!empty($slider_2_image4)) ? sprintf('
    li.orbit-item-4 {
    background: url(%s) no-repeat center;
    background-size: cover;
    }
    ', $slider_2_image4) : '';

		if ($css4) {
			wp_add_inline_style($slider2img4, $css4);
		}

		$movie_text_color = 'main-stylesheet';

		$commentcolor = '';

		$movie_comment_color = get_theme_mod('movie-comment-color');

		$commentcolor .= (!empty($movie_comment_color)) ? sprintf('
    #message span.fp-movie-comment {
    	color:' . $movie_comment_color . ';
    } ') : '';

		if ($commentcolor) {
			wp_add_inline_style($movie_text_color, $commentcolor);
		}

		$topcardimage = 'main-stylesheet';  // Swap in your CSS Stylesheet ID

		$css_topcardimage = '';

		$top_cardimage = get_theme_mod('fp-topcard-img'); // Assigning it to a variable to keep the markup clean.

		$css_topcardimage .= (!empty($top_cardimage)) ? sprintf('
    .topcard.card .card-divider::after {
    background: url(%s) no-repeat center;
    background-size: cover;
    content: "";
    opacity: 0.5;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    position: absolute;
    z-index: 1;
    }
    ', $top_cardimage) : '';

		if ($css_topcardimage) {
			wp_add_inline_style($topcardimage, $css_topcardimage);
		}

		$bottomcardimage = 'main-stylesheet';  // Swap in your CSS Stylesheet ID

		$css_bottomcardimage = '';

		$bottom_cardimage = get_theme_mod('fp-bottomcard-img'); // Assigning it to a variable to keep the markup clean.

		$css_bottomcardimage .= (!empty($bottom_cardimage)) ? sprintf('
    .bottomcard.card .card-divider::after {
    background: url(%s) no-repeat center;
    background-size: cover;
    content: "";
    opacity: 0.5;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    position: absolute;
    z-index: 1;
    }
    ', $bottom_cardimage) : '';

		if ($css_bottomcardimage) {
			wp_add_inline_style($bottomcardimage, $css_bottomcardimage);
		}

		$topgradientcolor = 'main-stylesheet';  // Swap in your CSS Stylesheet ID

		$css_topgradientcolor = '';

		$topgradient_color = esc_attr(get_theme_mod('fp-top-gradient-bg'));
		$middlegradient_color = get_theme_mod('fp-middle-gradient-bg');
		$bottomgradient_color = get_theme_mod('fp-bottom-gradient-bg');

		$css_topgradientcolor .= (!empty($topgradient_color)) ? sprintf('
    body.home.page-template-front {
      background: ' . $topgradient_color . ';
    }') : '';

		if ($css_topgradientcolor) {
			wp_add_inline_style($topgradientcolor, $css_topgradientcolor);
		}

		$fptopbgcolor = 'main-stylesheet';  // Swap in your CSS Stylesheet ID

		$css_fptopbgcolor = '';

		$fptopbgcolor_color = get_theme_mod('fp-top-widget-bg-color');
		$fptoptxtcolor_color = get_theme_mod('fp-top-widget-txt-color');

		$css_fptopbgcolor .= (!empty($fptopbgcolor_color)) ? sprintf('
    #top-cta {
      background-color: ' . $fptopbgcolor_color . ';
    }
    #top-cta, #top-cta h2, #top-cta p {
    	color: ' . $fptoptxtcolor_color . ';
		}
    ') : '';

		if ( $css_fptopbgcolor ) {
			wp_add_inline_style( $fptopbgcolor  , $css_fptopbgcolor );
		}

    // Parallax Stuff
		$parallax_label_colors = 'main-stylesheet';

    $css_parallax_label_colors = '';

		$fp_toppara_color			= get_theme_mod ( 'fp-toppara-color' );
		$fp_divider_color					= get_theme_mod ( 'fp-divider-color' );
		$fp_bottomparallax_color	= get_theme_mod ( 'fp-bottomparallax-color' );

		$css_parallax_label_colors .= ( !empty($fp_toppara_color ) ) ? sprintf(
			'
				#parallaxone .parallax-text {
				color: ' . $fp_toppara_color . ';
				}
				#parallax-divider .parallax-text-divider {
				color: ' . $fp_divider_color .';
				}
				#parallaxtwo .parallax-text {
				color: ' . $fp_bottomparallax_color . ';
				}
				' ) : '';

		if ( $css_parallax_label_colors ) {
			wp_add_inline_style( $parallax_label_colors, $css_parallax_label_colors );
		}

		// General Customizer CSS
		$load_general_customizer_css = 'main-stylesheet';
		$general_customizer_css = '';

		$fp_topcard_label_color = get_theme_mod ( 'fp-topcard-label-color' );
		$fp_bottomcard_label_color = get_theme_mod ( 'fp-bottomcard-label-color' );
		$fp_topcard_bg_color = get_theme_mod ( 'fp-topcard-bg-color' );
		$fp_topcard_txt_color = get_theme_mod ( 'fp-topcard-txt-color' );
		$fp_bottomcard_bg_color = get_theme_mod ( 'fp-bottomcard-bg-color' );
		$fp_bottomcard_txt_color = get_theme_mod ('fp-bottomcard-txt-color' );
		$mk_grid_font_color	= get_theme_mod ('mk-grid-font-color');

		$general_customizer_css .= '
			
			#topcardid.card-section {
				background-color: ' . $fp_topcard_bg_color . ';
			}
			#top-card, #top-card h4 {
				color: ' . $fp_topcard_label_color . ';
			}
			#topcardid, #topcardid h2, #topcardid p {
				color: ' . $fp_topcard_txt_color . ';
			}
			#bottomcardid {
				background-color: ' . $fp_bottomcard_bg_color . ';
			}
			#bottomcardid, #bottomcardid h2, #bottomcardid p {
				color:' . $fp_bottomcard_txt_color . ';
			}
			.bottomcard .card-divider {
				color: ' . $fp_bottomcard_label_color .  ';
			}
		';

		if ( $general_customizer_css ) {
			wp_add_inline_style( $load_general_customizer_css, $general_customizer_css );
		}

		// Sidebar template background color
		$load_sidebar_temp_css = 'main-stylesheet';
		$sidebar_temp_css = '';

		$sidebar_bg_color = get_theme_mod ('sidebar-bg-color');

			$sidebar_temp_css .= '
			
			#sidebar-right-sidebar {
				background-color: ' . $sidebar_bg_color . ';
			}
		';

		if ( $sidebar_temp_css ) {
			wp_add_inline_style( $load_sidebar_temp_css, $sidebar_temp_css );
		}

		// Sidebar template CTA background color
		$load_sidebar_cta_temp_css = 'main-stylesheet';
		$sidebar_cta_temp_css = '';

		$sidebar_cta_bg_color = get_theme_mod ('sidebar-cta-bg-color');

		$sidebar_cta_temp_css .= '
			
			#after-default-template-content {
				background-color: ' . $sidebar_cta_bg_color . ';
			}
		';

		if ( $sidebar_cta_temp_css ) {
			wp_add_inline_style( $load_sidebar_cta_temp_css, $sidebar_cta_temp_css );
		}

		$css_cutomizer_style = 'main-stylesheet';
		$css_customizer = '';

		$fptopbgcolor_color = get_theme_mod('fp-top-widget-bg-color');


		$css_customizer .= ' 
		
		#top-cta {background-color: ' . $fptopbgcolor_color . ';}
		
		';

		if( $css_customizer ) {
		//	wp_add_inline_style( $css_cutomizer_style, $css_customizer );
		}

		$marketing_grid_bg_color = 'main-stylesheet';
		$marketing_grid_customizer = '';

		$mk_grid_bg_color = get_theme_mod('mk-grid-bg-color');


		$marketing_grid_customizer .= ' 
		
		.marketing-site-content-section .marketing-site-content-section-block {
		 background-color: ' . $mk_grid_bg_color . ';
		 }';

		if( $marketing_grid_customizer ) {
				wp_add_inline_style( $marketing_grid_bg_color, $marketing_grid_customizer );
		}

		$marketing_grid_font_color = 'main-stylesheet';
		$marketing_grid_customizer_font_color = '';

		$mk_grid_font_color = get_theme_mod('mk-grid-font-color');


		$marketing_grid_customizer_font_color .= '

			.marketing-site-content-section-block-header,
		 	.marketing-site-content-section-block-subheader.subheader{
			color:'. $mk_grid_font_color .';
			}' ;

		if( $marketing_grid_customizer_font_color ) {
			wp_add_inline_style( $marketing_grid_font_color, $marketing_grid_customizer_font_color );
		}

		$marketing_grid_button_color = 'main-stylesheet';
		$marketing_grid_customizer_button_color = '';

		$mk_grid_button_color = get_theme_mod('mk-grid-button-color');


		$marketing_grid_customizer_button_color .= '

			.mk-grid.round.button.small {
			background-color:' . $mk_grid_button_color . ';
			}';

		if( $marketing_grid_customizer_button_color ) {
			wp_add_inline_style( $marketing_grid_button_color, $marketing_grid_customizer_button_color );
		}

		$marketing_grid_button_font_color = 'main-stylesheet';
		$marketing_grid_customizer_button_font_color = '';

		$mk_grid_button_font_color = get_theme_mod('mk-grid-button-font-color');


		$marketing_grid_customizer_button_font_color .= '

			.mk-grid.round.button.small {
			color:' . $mk_grid_button_font_color . ';
			}';

		if( $marketing_grid_customizer_button_font_color ) {
			wp_add_inline_style( $marketing_grid_button_font_color, $marketing_grid_customizer_button_font_color );
		}

		$frontpage_blog = 'main-stylesheet';
		$frontpage_blog_css = '';

		$fp_blog_bg_color = get_theme_mod('fp-blog-bg-color');
		$fp_blog_text_color	= get_theme_mod('fp-blog-text-color');

		$frontpage_blog_css = '

		#front-page-blog-section {
			background-color:' . $fp_blog_bg_color . ';
		}
		#front-page-blog .media-object-section h3, 
			.media-object-section p {
						color:' . $fp_blog_text_color .';
		}';

		if( $frontpage_blog_css ) {
			wp_add_inline_style( $frontpage_blog, $frontpage_blog_css );
		}

		$frontpage_blog_h3 = 'main-stylesheet';
		$frontpage_blog_css_h3 = '';

		$fp_blog_h3_color = get_theme_mod('fp-blog-h3-color');

		$frontpage_blog_css_h3 = '

		 #front-page-blog h3 a {
			color:' . $fp_blog_h3_color . ';
		}';

		if( $frontpage_blog_css_h3 ) {
			wp_add_inline_style( $frontpage_blog_h3, $frontpage_blog_css_h3 );
		}

		$frontpage_blog_link = 'main-stylesheet';
		$frontpage_blog_link_color = '';

		$fp_blog_link_color = get_theme_mod('fp-blog-link-color');

		$frontpage_blog_link_color = '

		 #front-page-blog a {
			color:' . $fp_blog_link_color . ';
		}';

		if( $frontpage_blog_link_color ) {
			wp_add_inline_style( $frontpage_blog_link, $frontpage_blog_link_color );
		}

		$frontpage_title_link = 'main-stylesheet';
		$frontpage_title_link_color = '';

		$fp_blog_title_color = get_theme_mod('fp-blog-title-color');

		$frontpage_title_link_color = '

		 h2.blog-news {
			color:' . $fp_blog_title_color . ';
		}';

		if( $frontpage_title_link_color ) {
			wp_add_inline_style( $frontpage_title_link, $frontpage_title_link_color );
		}

		$socialmedia_title_link = 'main-stylesheet';
		$socialmedia_title_link_color = '';

		$socialmedia_icon_color = get_theme_mod('socialmedia_icon_color');
		$socialmedia_iconhover_color = get_theme_mod('socialmedia_iconhover_color');

		$socialmedia_title_link_color = '

		 #footer-credentials.social-icons-footer a {
			color:' . $socialmedia_icon_color . ';
		}
		#footer-credentials.social-icons-footer a:hover {
			color:' . $socialmedia_iconhover_color . ';
		}
		';

		if( $socialmedia_title_link_color ) {
			wp_add_inline_style( $socialmedia_title_link, $socialmedia_title_link_color );
		}
	} 
  endif; 
	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
