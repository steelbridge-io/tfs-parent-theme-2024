<?php
/**
 * Created by PhpStorm.
 * User: chrisparsons
 * Date: 2019-02-27
 * Time: 10:55
 */

// CSS output for cutomizer CSS modifications
if( is_customize_preview() ) {

	function output()
	{
		echo '<style>';

		$fptopbgcolor_color 					= get_theme_mod('fp-top-widget-bg-color' );
		$fptoptxtcolor								= get_theme_mod('fp-top-widget-txt-color' );
		$fp_topcard_label_color				= get_theme_mod('fp-topcard-label-color' );
		$fp_topcard_bg_color					= get_theme_mod('fp-topcard-bg-color' );
		$fp_topcard_txt_color 				= get_theme_mod('fp-topcard-txt-color' );
		$fp_bottomcard_img						= get_theme_mod('fp-bottomcard-img' );
		$fp_bottomcard_label_color 		= get_theme_mod('fp-bottomcard-label-color' );
		$fp_bottomcard_bg_color 			= get_theme_mod('fp-bottomcard-bg-color' );
		$fp_bottomcard_txt_color 			= get_theme_mod('fp-bottomcard-txt-color' );
		$mk_grid_bg_color 						= get_theme_mod('mk-grid-bg-color');
		$mk_grid_font_color						= get_theme_mod('mk-grid-font-color');
		$mk_grid_button_color					= get_theme_mod('mk-grid-button-color');
		$mk_grid_button_font_color		= get_theme_mod('mk-grid-button-font-color');
		$fp_blog_bg_color							= get_theme_mod('fp-blog-bg-color');
		$fp_blog_text_color						= get_theme_mod('fp-blog-text-color');
		$fp_blog_h3_color							= get_theme_mod('fp-blog-h3-color' );
		$fp_blog_link_color 					= get_theme_mod('fp-blog-link-color');
		$fp_blog_title_color					= get_theme_mod('fp-blog-title-color');
		$socialmedia_icon_color				= get_theme_mod('socialmedia_icon_color');
		$socialmedia_iconhover_color	= get_theme_mod('socialmedia_iconhover_color');

		echo '#top-cta {
						background-color: ' . $fptopbgcolor_color . ';
					}' .
					'#top-cta, #top-cta h2, #top-cta p {
						color: ' . $fptoptxtcolor . ';
						}' .
					 '#top-card, #top-card h4 {
						color: ' . $fp_topcard_label_color . ';
					}' .
					'#topcardid.card-section {
						background-color: ' . $fp_topcard_bg_color . ';
					}' .
					'#topcardid, #topcardid h2, #topcardid p {
						color: ' . $fp_topcard_txt_color . ';
					}' .
					' .bottomcard.card .card-divider-before .card-divider::after {
						background: url('. $fp_bottomcard_img .') no-repeat center;
						background-size: cover;
						content: "";
						opacity: 0.5;
						top: 0;
						left: 0;
						bottom: 0;
						right: 0;
						position: absolute;
						z-index: 1;
    			}' .
					'.bottomcard .card-divider {
						color: ' . $fp_bottomcard_label_color .  ';
					}' .
					'#bottomcardid {
						background-color: ' . $fp_bottomcard_bg_color . ';
					}' .
					'#bottomcardid, #bottomcardid h2, #bottomcardid p {
						color:' . $fp_bottomcard_txt_color . ';
					}' .
					'#topcard .customize-partial-edit-shortcut-button {
						margin-left: 1.5em;
					}' .
					'#topcard .card-divider-top .customize-partial-edit-shortcut-button {
						margin-left: .2em;
						margin-top: 1em;
					}' .
					'#topcardid .customize-partial-edit-shortcut-button {
						margin-top: 2em;
					}' .
					'.topcard-label-refresh-color .customize-partial-edit-shortcut-button{
						margin-left: 3em;
					}' .
					'#bottom-card .customize-partial-edit-shortcut-button {
						margin-left: 1.5em;
					}' .
					'#bottom-card .card-divider-bottom .customize-partial-edit-shortcut-button {
						margin-left: .2em;
						margin-top: 1em;
					}' .
					'#bottomcardid.card-section .customize-partial-edit-shortcut-button {
						margin-top: 1em;
					}' .
					'.marketing-site-content-section .marketing-site-content-section-block {
		 				background-color:' . $mk_grid_bg_color . ';
		 			}' .
					'.marketing-site-content-section-block-header,
					 .marketing-site-content-section-block-subheader.subheader{
					 	color:'. $mk_grid_font_color .';
					 }' .
					'.mk-grid.round.button.small {
						background-color:' . $mk_grid_button_color . ';
					}' .
					'.mk-grid.round.button.small {
						color:' . $mk_grid_button_font_color .';
					}' .
					'#front-page-blog-section {
						background-color:' . $fp_blog_bg_color . ';
					}' .
					'#front-page-blog .media-object-section h3, 
					.media-object-section p {
						color:' . $fp_blog_text_color .';
					}' .
					' #front-page-blog h3 a {
						color:' . $fp_blog_h3_color . ';
					}' .
					'#front-page-blog a {
						color:' . $fp_blog_link_color  . ';
					}' .
					'h2.blog-news {
						color:' . $fp_blog_title_color .';
					}' .
					'#footer-credentials.social-icons-footer a {
						color:' . $socialmedia_icon_color . ';
					}' .
					'#footer-credentials.social-icons-footer a:hover {
						color:'. $socialmedia_iconhover_color .';
					}'
		;

		echo '</style>';
	}

	function top_card_img() {

		echo '<style>';

		$top_cardimage 	= get_theme_mod('fp-topcard-img');

		echo '.topcard.card .card-divider-before .card-divider::after {
						background: url('. $top_cardimage .') no-repeat center;
						background-size: cover;
						content: "";
						opacity: 0.5;
						top: 0;
						left: 0;
						bottom: 0;
						right: 0;
						position: absolute;
						z-index: 1;
					}';
		echo '</style>';
	}

	add_action('wp_head', 'output');
}
