jQuery(document).ready( function($){ "use strict";

  // Instantiates the variable that holds the media library frame.
  var marketing_image_right_frame;

  // Runs when the image button is clicked.
  $('#marketing-image-right-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( marketing_image_right_frame ) {
      marketing_image_right_frame.open();
      return;
    }

    // Sets up the media library frame
    marketing_image_right_frame = wp.media.frames.marketing_image_right_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    marketing_image_right_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = marketing_image_right_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#marketing-image-right').val(media_attachment.url);
    });

    // Opens the media library frame.
    marketing_image_right_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var marketing_image_left_frame;

  // Runs when the image button is clicked.
  $('#marketing-image-left-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( marketing_image_left_frame ) {
      marketing_image_left_frame.open();
      return;
    }

    // Sets up the media library frame
    marketing_image_left_frame = wp.media.frames.marketing_image_left_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    marketing_image_left_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = marketing_image_left_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#marketing-image-left').val(media_attachment.url);
    });

    // Opens the media library frame.
    marketing_image_left_frame.open();
  });
});
