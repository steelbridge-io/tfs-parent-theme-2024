( function( $ ) { 

   // Front Page Logo
	wp.customize( 'fp-logo', function(value) {
		value.bind(function(to){
			var fplogo = $( 'img.fplogo' );
			fplogo.attr( 'src', to );
		});
	});


	// Front Page Slider Image #1
	wp.customize( 'fp-topslider-one', function(value) {
		value.bind(function(to){
			var fpsliderone = $( 'img.orbit-image.orbit-image-one' );
			fpsliderone.attr( 'src', to );
		});
	});
  
  // Front Page Slider Image #1 Caption
	wp.customize( 'fp-topslider-one-caption', function(value) {
		value.bind(function(to){
    $('.orbit-caption-one').html(to);
		});
	});
  
});
