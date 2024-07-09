<?php
  /**
   * Created by PhpStorm.
   * User: chrisparsons
   * Date: 2019-03-25
   * Time: 16:32
	 * @package FoundationPress
	 * @since FoundationPress 1.0.0
	 * Template Name: Sidebar Right
	 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image-page' ); ?>
	<div id="sidebar-right-template" class="main-container sb-right-temp">
		<div class="side-bar-right row">
			<main class="maincont column small-12 medium-8">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
					<?php comments_template(); ?>
				<?php endwhile; ?>
			</main>
			<?php get_sidebar('page'); ?>
		</div>
	</div>
<?php
get_footer();

