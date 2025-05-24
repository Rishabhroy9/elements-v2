jQuery(document).ready(function( $ ) {
	
	//text slider
    $(document).on('facetwp-loaded', function() {
	if($('.text-slider').length > 0){
		var splide = new Splide( '.text-slider', {
				perPage: 1,
				rewind: false,
				type: 'loop',
				pagination: true,
				autoplay: true,
				speed: 1000,
			} ).mount();

		splide.on( 'moved', function () {
		  $('.text-slider .splide__track').css('height', $('.textslider-entry.is-visible').height());
		} );
	}
   });
   	
});