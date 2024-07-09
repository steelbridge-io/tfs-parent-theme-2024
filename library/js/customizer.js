( function( $ ) {
"use strict";

  // Front Page Slider Image #4
	wp.customize( 'fp-topslider-four', function(value) {
		value.bind(function(to){
			var fpsliderone = $( '.orbit-image.orbit-image-four' );
			fpsliderone.attr( 'src', to );
		});
	});

  wp.customize( 'fp-topslider-four-caption', function( value ) {
    value.bind( function( to ) {
      $( 'videobg-hide-controls iframe' ).text( to );
    } );
  } );

  wp.customize( 'fp-movie-comment', function( value ) {
    value.bind( function( to ) {
      $( '#message span.fp-movie-comment').text( to );
    });
  });

  wp.customize( 'movie-comment-color', function( value ) {
    value.bind( function( newval ) {
      $( '#message span.fp-movie-comment' ).css( 'color', newval );
    });
  });

  wp.customize( 'fp-slidertwo-one', function(value) {
    value.bind(function(to){
      $('li.orbit-item-1').css('background-image', 'url(' + to + ')');
    });
  });
  
  wp.customize( 'fp-slidertwo-two', function(value) {
    value.bind(function(to){
      $('li.orbit-item-2').css('background-image', 'url(' + to + ')');
    });
  });
  
  wp.customize( 'fp-slidertwo-three', function(value) {
    value.bind(function(to){
      $('li.orbit-item-3').css('background-image', 'url(' + to + ')');
    });
  });
  
  wp.customize( 'fp-slidertwo-four', function(value) {
    value.bind(function(to){
      $('li.orbit-item-4').css('background-image', 'url(' + to + ')');
    });
  });

  wp.customize( 'fp-topcard-cap', function( value ) {
    value.bind( function( to ) {
      $( '#topcardid' ).text( to );
    } );
  } );

  wp.customize( 'fp-bottomcard-cap', function( value ) {
    value.bind( function( to ) {
      $( '#bottomcardid' ).text( to );
    } );
  } );
  
  wp.customize( 'fp-topparallax-img', function( value ) {
    value.bind( function( to ) {
     	var fpparallaxtop = $( '#parallaxone.parallax-window' );
			fpparallaxtop.attr( 'data-image-src', to );
    });
  });

  wp.customize( 'fp-toppara-color', function( value ) {
    value.bind( function( newval ) {
      $( '#parallaxone .parallax-text' ).css('color', newval );
    } );
  } );

  wp.customize( 'fp-divider-color', function( value ) {
    value.bind( function( newval ) {
      $('#parallax-divider .parallax-text-divider').css('color', newval );
    } );
  } );
  
   wp.customize( 'fp-bottomparallax-img', function( value ) {
    value.bind( function( to ) {
     	var fpparallaxtop = $( '.parallaxtwo.parallax-window' );
			fpparallaxtop.attr( 'data-image-src', to );
    });
  });

  wp.customize( 'fp-bottomparallax-color', function( value ) {
    value.bind( function( newval ) {
      $('#parallaxtwo .parallax-text').css('color', newval );
    } );
  } );

  wp.customize( 'sidebar-bg-color', function( value ) {
    value.bind( function( newval ) {
      $( '#sidebar-right-sidebar' ).css( 'background-color', newval );
    });
  });

  wp.customize( 'sidebar-cta-bg-color', function( value ) {
    value.bind( function( newval ) {
      $( '#after-default-template-content' ).css( 'background-color', newval );
    });
  });

  wp.customizer( 'facebook_icon_bawx_link', function( value ) {
    value.bind( function( newval ) {
      $( '#footer-credentials a.soc-1').url( newval );
    });
  });

  wp.customize( 'twitter_icon_bawx_link', function( value ) {
    value.bind( function( newval ) {
      $( '#footer-credentials a.soc-2' ).url( newval );
    });
  });

  wp.customize( 'instagram_icon_bawx_link', function( value ) {
    value.bind( function( newval ) {
      $( '#footer-credentials a.soc-3' ).url( newval );
    });
  });

  wp.customize( 'youtube_icon_bawx_link', function( value ) {
    value.bind( function( newval ) {
      $( '#footer-credentials a.soc-4' ).url( newval );
    });
  });

  wp.customize( 'email_icon_bawx_link', function( value ) {
    value.bind( function( newval ) {
      $( '#footer-credentials a.soc-5' ).url( newval );
    });
  });


})(jQuery);






