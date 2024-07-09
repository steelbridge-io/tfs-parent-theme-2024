<?php
  /**
   * Created by PhpStorm.
   * User: chrisparsons
   * Date: 2019-03-08
   * Time: 17:01
   */
	$marketing_image_right				= get_post_meta(get_the_ID(), 'marketing-image-right',true);
	$marketing_comment_left				= get_post_meta(get_the_ID(), 'marketing-comment-left',true );
	$marketing_comment_title_left	= get_post_meta(get_the_ID(), 'marketing-comment-title-left',true );
	$marketing_left_readmore			= get_post_meta(get_the_ID(), 'marketing-left-readmore', true );

	$marketing_image_left						= get_post_meta(get_the_ID(), 'marketing-image-left',true);
	$marketing_comment_right				= get_post_meta(get_the_ID(), 'marketing-comment-right',true );
	$marketing_comment_title_right	= get_post_meta(get_the_ID(), 'marketing-comment-title-right',true );
	$marketing_right_readmore				= get_post_meta(get_the_ID(), 'marketing-right-readmore', true );
