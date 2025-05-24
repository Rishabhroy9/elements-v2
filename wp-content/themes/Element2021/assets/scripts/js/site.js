jQuery(document).ready(function( $ ) {
	
	// CHANGE THE HEADER ON SCROLL
		$(document).on("scroll", function(){
			if
	      ($(document).scrollTop() > 106){
			  $(".header").addClass("stuck");
			}
			else
			{
			  $(".header").removeClass("stuck");
			}
		});
	
	//TRIGGER EFFECT CLASS 
    
	    /* Every time the window is scrolled ... */
	    $(window).scroll( function(){
    
	        /* Check the location of each desired element */
	        $('.cause').each( function(i){
            
	            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
	            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
	            /* If the object is completely visible in the window */
	            if( bottom_of_window > bottom_of_object ){
                
	                $(this).parents('div').animate({'opacity':'1'},1000);
                    $(this).parents('div').addClass('effect');
	            }
            
	        }); 
    
	    });
	
	//hide or show the home filters depending on if the toggle is activated
	var alterClass = function() {
	var ww = document.body.clientWidth;
	if (ww < 800) {
		$('#work-filters').addClass('hide');
	} else if (ww >= 801) {
		$('#work-filters').removeClass('hide');
	}
	};
	$(window).resize(function(){
	alterClass();
	});
	//Fire it when the page first loads:
	alterClass();
	
	//Toggle Facets on Mobile
	$('.mobile-filters').on('click', function(){
		$(this).toggleClass('active');
		$('#work-filters').toggleClass('hide');
	});
	
	// REMOVE LAST NAME FROM BIO EMAIL LINK
	$(".last-word").html(function(){
		var text= $(this).text().trim().split(" ");
		var last = text.pop();
		return text.join(" ") + (text.length > 0 ? " <span class='hide'>" + last + "</span>" : last);
	});
	
	// ANIMATE Happening
	$(".happening-item").mouseenter(function(){
	$(this).addClass('hover-in');
	});
	$(".happening-item").mouseleave(function(){
	$(this).removeClass('hover-in');
	});
	
	// ANIMATE Happening
	$(".haps-item").mouseenter(function(){
	$(this).addClass('hover-in');
	});
	$(".haps-item").mouseleave(function(){
	$(this).removeClass('hover-in');
	});
	
	// ANIMATE CREATOR ON HOVER
	$(".creator").mouseenter(function(){
	$(this).addClass('is-active');
	});
	$(".creator").mouseleave(function(){
	$(this).removeClass('is-active');
	});
	
	$('.splide__track').css('height', $('.textslider-entry.is-visible').height());
	
	// SPLIDE FOR LOGO CAROUSEL
	try{
	 new Splide( '.logo-ticker', {
	 	type: 'loop',
	 	perMove: 1,
	 	autoWidth: false,
	 	pagination: false,
	 	focus: 'center',
	 	trimSpace: false,
	 	gap: 50,
	 	perPage: 5,
	 	start: 1,
	 	breakpoints: {
	 			1000: {
	 				perPage: 4
	 			},
	 			800: {
	 				perPage: 3
	 			},
	 			640: {
	 				perPage: 2,
	 			},
	 		}
	 	} ).mount();
	}catch(e){
		//Do Nothing, Fail Silently.
	}
	
	// SPLIDE FOR LOGO CAROUSEL
	try{
		new Splide( '.dark-ticker', {
			type: 'loop',
			perMove: 1,
			autoWidth: false,
			pagination: false,
			focus: 'center',
			trimSpace: false,
			gap: 50,
			perPage: 5,
			start: 1,
			breakpoints: {
					1000: {
						perPage: 4
					},
					800: {
						perPage: 3
					},
					640: {
						perPage: 2,
					},
			}
		} ).mount();
	}catch(e){
		//Do Nothing, Fail Silently.
	}

	// FACET-FREE LIGHTWEIGHT VIMEO PLAYER
	$(document).on('facetwp-loaded', function() {
 		$('#menu-message span').each(function(){
 			var checked = $(".facetwp-facet-video_type .facetwp-radio.checked").data('value');
 			var desc = $(this).data('id');
 				if (checked == desc){
 				$('#menu-message span').removeClass('show');
 				$(this).addClass('show');
 				}
 		});
		openVimeoModal();
		closeVimeoModal();
 	});

	function openVimeoModal(){
		$('.frameLink').on('click',function(event){
		    event.preventDefault();
			$('.frameContent').empty();
			var frameSource = $(this).data('framesource');
			var frameSelected = $(this).data('framecode');
			var content = $(this).data('framecontent');
			var frameAnchor = $(this).data('anchor');
			var frame;
			frame = 'https://player.vimeo.com/video/' + frameSelected + '?autoplay=1';
			$('.frameHolder iframe').attr('src',frame);
			$('.frameContent').append( content );
			$('.frameContent').parent().addClass('selected');
			$('.close-video').attr('data-anchor', frameAnchor);	
		});
	}

	// CLOSE THE LIGHTWEIGHT VIMEO PLAYER on X or outside video
	function closeVimeoModal(){
		$(".close-video").on("click",function(event){
			event.preventDefault();
			var closeAnchor = $(this).data("anchor");
			$(".videoPlayer").removeClass("selected");
			$(".frameContent").empty();
			$(".frameHolder iframe").attr("src","");
			$(".entry-content").animate({ scrollTop: $(closeAnchor).scrollTop() }, 1000);
		});
	}

});