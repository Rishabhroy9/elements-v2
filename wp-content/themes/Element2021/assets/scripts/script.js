
// image slider
jQuery(document).ready(function () {
    
    jQuery('.image-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '25%',
        arrows: false,
        dots: false,
        infinite: true,
        autoplaySpeed: 3000,
        autoplay: true,
        speed: 700, // smooth transition speed
        cssEase: 'ease-in-out', // smoother animation
        useTransform: true,
        lazyLoad: "ondemand",
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    centerPadding: '0%',
                }
            }
        ]

    });
});

// Jump to bottom

// document.querySelector('.arrow_down').addEventListener('click', function () {
//     window.scrollTo({
//         top: document.body.scrollHeight,
//         behavior: 'smooth'
//     });
// });



// Add new class in header

let zoomAdded = false;

jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 50 && !zoomAdded) {
        jQuery('header').addClass('scrolled');
        jQuery('.play_btn_wrapper').addClass('zoom');
        zoomAdded = true; // prevent it from being added again
    } else if (jQuery(this).scrollTop() <= 50 && zoomAdded) {
        jQuery('header').removeClass('scrolled');
        jQuery('.play_btn_wrapper').removeClass('zoom');
        zoomAdded = false; // reset if user scrolls back up
    }
});
// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});



//Testimonial slider
jQuery(".testimonial-reel").slick({
    centerMode: true,
    centerPadding: "00px",
    dots: false,
    slidesToShow: 3,
    infinite: true,
    arrows: true,
    lazyLoad: "ondemand",
    prevArrow: '<button type="button" class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="bi bi-chevron-right"></i></button>',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                centerMode: false
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});



// play reel
jQuery(document).ready(function () {
    jQuery('#playBtn').on('click', function () {
        jQuery('.VideoContainer').addClass('active');
    });

    jQuery('#closeVideo').on('click', function () {
        jQuery('.VideoContainer').removeClass('active');
    });

    jQuery('.pause_btn').on('click', function () {
        jQuery('.play_btn_wrapper').removeClass('zoom');
    });

});





// reel ring animated
window.addEventListener("scroll", () => {
    const ring = document.querySelector(".rotating-ring");
    const angle = window.scrollY * 0.5; // Adjust speed
    ring.style.transform = `rotate(${angle}deg)`;
  });
  

// video slider
//   jQuery(document).ready(function () {
//     jQuery('.video-slider').slick({
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         centerMode: true,
//         centerPadding: '25%',
//         arrows: true,
//         dots: false,
//         infinite: true,
//         autoplaySpeed: 3000,
//         autoplay: false,
//         prevArrow: '<button type="button" class="slick-prev"><span><i class="bi bi-arrow-left"></i> Previous</span></button>',
//         nextArrow: '<button type="button" class="slick-next"><span>Next <i class="bi bi-arrow-right"></i></span></button>',
//         speed: 700, // smooth transition speed
//         cssEase: 'ease-in-out', // smoother animation
//         useTransform: true,
//         lazyLoad: "ondemand",
//         responsive: [
//             {
//                 breakpoint: 991,
//                 settings: {
//                     slidesToShow: 1,
//                     centerMode: false,
//                     centerPadding: '0%',
//                 }
//             }
//         ]

//     });
// });


//   // Handle video modal
//   jQuery('.video-slide .play-icon').on('click', function () {
//     const videoUrl = jQuery(this).parent().data('video');
//     jQuery('#modalVideo').attr('src', videoUrl)[0].play();
//     jQuery('#videoModal').modal('show');
//   });

//   jQuery('#videoModal').on('hidden.bs.modal', function () {
//     jQuery('#modalVideo')[0].pause();
//     jQuery('#modalVideo').attr('src', '');
//   });


jQuery(document).ready(function () {

    // Initialize Slick
    jQuery('.video-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '25%',
        arrows: true,
        dots: false,
        infinite: true,
        autoplaySpeed: 3000,
        autoplay: false,
        prevArrow: '<button type="button" class="slick-prev"><span><i class="bi bi-arrow-left"></i> Previous</span></button>',
        nextArrow: '<button type="button" class="slick-next"><span>Next <i class="bi bi-arrow-right"></i></span></button>',
        speed: 700,
        cssEase: 'ease-in-out',
        useTransform: true,
        lazyLoad: "ondemand",
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    centerPadding: '0%',
                }
            }
        ]
    });

    // Handle play icon click
    jQuery(document).on('click', '.video-slide .play-icon', function () {
        const videoUrl = jQuery(this).closest('.video-slide').data('video');
        const modalVideo = document.getElementById('modalVideo');

        if (modalVideo) {
            modalVideo.src = videoUrl;

            // Show modal first
            jQuery('#videoModal').modal('show');

            // Then play video when modal is fully shown
            jQuery('#videoModal').on('shown.bs.modal', function () {
                modalVideo.play();
            });
        }
    });

    // On modal close, stop and clear video
    jQuery('#videoModal').on('hidden.bs.modal', function () {
        const modalVideo = document.getElementById('modalVideo');
        modalVideo.pause();
        modalVideo.currentTime = 0;
        modalVideo.src = '';
    });

});


