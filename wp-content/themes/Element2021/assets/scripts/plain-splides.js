jQuery(document).ready(function( $ ) {
	
	$(document).ready(function() {
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
	   
  	// SPLIDE FOR OFFSET CAROUSEL
  	 $(document).ready(function(){
  		if($('.offset-gallery').length > 0){
  			new Splide( '.offset-gallery', {
  				type: 'loop',
  				padding: '20%',
  				trimSpace: true,
  				gap: 20,
  				perPage: 1,
  				pagination: false,
  				autoplay: false,
  			} ).mount();
  		}
  	});
	
	// FACET-FREE LIGHTWEIGHT VIMEO PLAYER
	$(document).ready(function() {
		$('.frameLink').on('click',function(event){
		    event.preventDefault();
			$('.frameContent').empty();
			var frameSource = $(this).data('framesource');
			var frameSelected = $(this).data('framecode');
			var content = $(this).data('framecontent');
			var frame;
			frame = 'https://player.vimeo.com/video/' + frameSelected + '?autoplay=1';
			$('.frameHolder iframe').attr('src',frame);
			$('.frameContent').append( content );
			$('.frameContent').parent().addClass('selected');
		  });
	});
	
	// CLOSE THE LIGHTWEIGHT VIMEO PLAYER on X or outside video
	$(document).ready(function() {
		$('.close-video, .reveal-overlay').on('click',function(event){
			$('.videoPlayer').removeClass('selected');
			$('.videoContent').empty();
			$('.frameContent').empty();
			$('.videoHolder iframe').attr('src','');
			$('.frameHolder iframe').attr('src','');
		});
	});

});


