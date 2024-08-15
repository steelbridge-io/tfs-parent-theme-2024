<?php
/*
Template Name: Landing Page
*/
$landing_page_logo	= get_post_meta(get_the_ID(), 'landing-page-logo', true);
$landing_page_image = get_post_meta(get_the_ID(), 'landing-page-image', true);
$landing_page_desc  = get_post_meta(get_the_ID(), 'landing-page-desc', true);
$landing_page_logo_id   = attachment_url_to_postid($landing_page_logo);
$landing_page_image_id  = attachment_url_to_postid($landing_page_image);
$landing_page_logo_alt   = get_post_meta($landing_page_logo_id, '_wp_attachment_image_alt', true);
$landing_page_image_alt  = get_post_meta($landing_page_image_id, '_wp_attachment_image_alt', true);
$landing_page_cta     = get_post_meta(get_the_ID(), 'landing-page-cta', true);
$landing_page_title     = get_post_meta(get_the_ID(), 'landing-page-title', true);

global $post;

get_header(); ?>

    <?php if (!empty($landing_page_image)) : ?>
	<div id="landing-hero-cont" class="landing-hero grid-container full">
        <div class="overlay"></div>
		<img class="landing-hero" src="<?php echo $landing_page_image ?>" alt="<?php echo $landing_page_image_alt ?>">
		<div class="landing-content">

            <img class="hero-image" src="<?php echo $landing_page_logo ?>" alt="<?php echo $landing_page_logo_alt ?>">

			<?php
				$title = get_the_title($post->ID);
				    echo '<h1>' . $title . '</h1>';

                if(!empty($landing_page_desc)) {
                    echo '<h2>' . $landing_page_desc . '</h2>';
                }
				?>

		</div>
	</div>
    <?php endif; ?>

    <div class="landing-cta grid-container full black-background">
        <div class="row">
            <?php if (!empty($landing_page_cta)) : ?>
            <div class="landing-cta-left large-6 large-centered columns">
                <div class="cta-content">
                    <?php echo $landing_page_cta; ?>
                </div>
                <button class="button" type="button" data-hover-delay="100" data-tooltip tabindex="1" title="By submitting this form, you are consenting to receive marketing emails from: The Fly Shop, 4140 Churn Creek Road, Redding, CA, 96002, US, https://www.theflyshop.com/. You can revoke your consent to receive emails at any time by using the SafeUnsubscribe® link, found at the bottom of every email. <a href='https://www.constantcontact.com/legal/about-constant-contact' title='GDPR'>Emails are serviced by Constant Contact</a>" data-position="top" data-alignment="center">
                    <i class="fas fa-question-circle fa-2x"></i>
                </button>
            </div>
            <div class="landing-cta-right large-6 large-centered columns">
                <!-- Begin Constant Contact Inline Form Code -->
                <div class="ctct-inline-form" data-form-id="0ad001fb-1027-4de2-9265-5dede2414e0d"></div>
                <!-- End Constant Contact Inline Form Code -->
            </div>

            <?php else : ?>

            <div class="landing-cta-cont large-8 large-centered columns">
                <h2>Please Subscribe To <?php echo the_title(); ?> News <button class="button" type="button" data-hover-delay="100" data-tooltip tabindex="1" title="By submitting this form, you are consenting to receive marketing emails from: The Fly Shop, 4140 Churn Creek Road, Redding, CA, 96002, US, https://www.theflyshop.com/. You can revoke your consent to receive emails at any time by using the SafeUnsubscribe® link, found at the bottom of every email. Emails are serviced by Constant Contact." data-position="top" data-alignment="center">
                        <i class="fas fa-question-circle fa-2x"></i>
                    </button> </h2>
                <!-- Begin Constant Contact Inline Form Code -->
                <div class="ctct-inline-form" data-form-id="0ad001fb-1027-4de2-9265-5dede2414e0d"></div>
                <!-- End Constant Contact Inline Form Code -->
            </div>
            <?php endif; ?>
        </div>
    </div>


	<div id="landing-content" class="grid-container margin-top-3">

		<main class="main-content-full-width">
		 <?php while ( have_posts() ) : the_post(); ?>
		  <?php get_template_part( 'template-parts/content', 'page' ); ?>
		 <?php endwhile; ?>
		</main>

	</div>

<?php
$grid_item_1_img = get_post_meta( $post->ID, 'grid-item-1-img', true );
$get_image_1_id = attachment_url_to_postid($grid_item_1_img);
$alt1 = get_post_meta ( $get_image_1_id, '_wp_attachment_image_alt', true );

$grid_item_2_img = get_post_meta( $post->ID, 'grid-item-2-img', true );
$get_image_2_id = attachment_url_to_postid($grid_item_2_img);
$alt2 = get_post_meta ( $get_image_2_id, '_wp_attachment_image_alt', true );

$grid_item_3_img = get_post_meta( $post->ID, 'grid-item-3-img', true );
$get_image_3_id = attachment_url_to_postid($grid_item_3_img);
$alt3 = get_post_meta ( $get_image_3_id, '_wp_attachment_image_alt', true );

$grid_item_4_img = get_post_meta( $post->ID, 'grid-item-4-img', true );
$get_image_4_id = attachment_url_to_postid($grid_item_4_img);
$alt4 = get_post_meta ( $get_image_4_id, '_wp_attachment_image_alt', true );
?>

<?php if (!empty($grid_item_1_img)) : ?>

    <div id="landing-grid" class="row small-up-1 medium-up-3 large-up-4 align-center" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
        <div class="column column1">
            <div class="flip-card" tabIndex="0">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img class="thumbnail" src="<?php echo $grid_item_1_img ?>" alt="<?php echo $alt1 ?>">
                    </div>
                    <div class="flip-card-back">
                        <?php $grid_item_1_cta = get_post_meta( $post->ID, 'grid-item-1-cta', TRUE ); ?>
                        <p><?php echo $grid_item_1_cta; ?></p>
                    </div>
                </div>
            </div>
        </div>
	    <?php if (!empty($grid_item_2_img)) : ?>
        <div class="column column2">
            <div class="flip-card" tabIndex="0">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img class="thumbnail" src="<?php echo $grid_item_2_img ?>" alt="<?php echo $alt2 ?>">
                    </div>
                    <div class="flip-card-back">
	                    <?php $grid_item_2_cta = get_post_meta( $post->ID, 'grid-item-2-cta', TRUE ); ?>
                        <p><?php echo $grid_item_2_cta; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
	    <?php if (!empty($grid_item_3_img)) : ?>
         <div class="column column3">
             <div class="flip-card" tabIndex="0">
                 <div class="flip-card-inner">
                     <div class="flip-card-front">
                         <img class="thumbnail" src="<?php echo $grid_item_3_img ?>" alt="<?php echo $alt3 ?>">
                     </div>
                     <div class="flip-card-back">
	                     <?php $grid_item_3_cta = get_post_meta( $post->ID, 'grid-item-3-cta', TRUE ); ?>
                         <p><?php echo $grid_item_3_cta; ?></p>
                     </div>
                 </div>
             </div>
         </div>
	    <?php endif; ?>
	    <?php if (!empty($grid_item_4_img)) : ?>
         <div class="column column4">
             <div class="flip-card" tabIndex="0">
                 <div class="flip-card-inner">
                     <div class="flip-card-front">
                         <img class="thumbnail" src="<?php echo $grid_item_4_img ?>" alt="<?php echo $alt4 ?>">
                     </div>
                     <div class="flip-card-back">
	                     <?php $grid_item_4_cta = get_post_meta( $post->ID, 'grid-item-4-cta', TRUE ); ?>
                         <p><?php echo $grid_item_4_cta; ?></p>
                     </div>
                 </div>
             </div>
         </div>
	    <?php endif; ?>
    </div>

<?php endif;
get_footer(); ?>
