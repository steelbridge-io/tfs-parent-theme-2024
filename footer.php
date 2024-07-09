<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer id="footer" class="footer">
	<div class="footer-container container-flex">
		<div class="footer-grid">
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
		</div>
	</div>
	<div id="footer-sel-refresh" class="footer-cred" style="width:100%;">
		<div class="footer-social"></div>
		<?php
		$social_icon_one 		= get_theme_mod('facebook_icon_bawx');
		$social_icon_two 		= get_theme_mod('twitter_icon_bawx');
		$social_icon_three	= get_theme_mod('instagram_icon_bawx');
		$social_icon_four		= get_theme_mod('youtube_icon_bawx');
		$social_icon_five		= get_theme_mod('email_icon_bawx');
		$social_link_one		= get_theme_mod('facebook_icon_bawx_link');
		$social_link_two		= get_theme_mod('twitter_icon_bawx_link');
		$social_link_three	= get_theme_mod('instagram_icon_bawx_link');
		$social_link_four		= get_theme_mod('youtube_icon_bawx_link');
		$social_link_five		= get_theme_mod('email_icon_bawx_link');

		echo  '<div id="footer-credentials" class="social-icons-footer">' .
					'<a class="soc-1" href="'.$social_link_one.'" title="Social Media Link #1"><i class="'. $social_icon_one .'"></i></a>'.
					'<a class="soc-2" href="'.$social_link_two.'" title="Social Media Link #2"><i class="'. $social_icon_two .'"></i></a>'.
					'<a class="soc-3" href="'.$social_link_three.'" title="Social Media Link #3"><i class="'. $social_icon_three .'"></i></a>'.
					'<a class="soc-4" href="'.$social_link_four.'" title="Social Media Link #4"><i class="'. $social_icon_four .'"></i></a>'.
					'<a href="'.$social_link_five.'" class="soc-5" title="Social Media Link #5"><i class="'.
			$social_icon_five	.'"></i></a>'.
					'</div>'; ?>

		<p><span class="tfs-copyright">&copy;&nbsp;THE FLY SHOP, INC.&nbsp;&reg;</span>&nbsp;|&nbsp;<span
				class="tfs-footer-date">1978&nbsp;-&nbsp;<?php echo date('Y'); ?></span></p>
	</div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
