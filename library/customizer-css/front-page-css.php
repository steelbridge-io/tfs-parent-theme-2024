<?php
/**
 * Created by PhpStorm.
 * User: chrisparsons
 * Date: 2019-02-27
 * Time: 10:55
 */

function load_front_page_css() {
	$css_front_page = '';

	$fp_toparallax_color		= get_theme_mod ('fp-topparallax-color');
	$fp_divider_color				= get_theme_mod ( 'fp-divider-color' );

	if ( is_front_page() || is_home() ) {
		$css_front_page .= ' 
		
		#parallaxone .parallax-text {
				color: ' . $fp_toparallax_color . ';
			}
		#parallax-divider .parallax-text-divider {
				color: ' . $fp_divider_color .';
		}
		';
		return $css_front_page;
	}
}
