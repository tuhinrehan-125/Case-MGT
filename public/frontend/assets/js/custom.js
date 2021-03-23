(function($) {
	"use strict";

	// caching selectors
    var mainWindow           = $(window),
    mainHeader           = $('header'),
    mainBody             = $('body'),
    mainSlider           = $('.main-slider'),
    photoGallery1        = $('.photo-gallery-1'),
    owlCarousel1         = $(".owl-carousel"),
    mainStatus           = $('#status'),
    mainPreloader        = $('#preloader');

    mainWindow.on('load', function() {

        // Preloader
        mainStatus.fadeOut(250);
        mainPreloader.fadeOut(250);


        // sub-menu
        $('ul.sub-menu').parent("li").addClass("has-children");

        if ($(window).width() > 767) {
            $("ul.main-menu li").hover(function() {
                $(this).children('ul.sub-menu').stop(true, false, true).slideToggle(300);
            });
        }
        else {
            $('ul.main-menu>li>a').click(function(e) {
                $(this).parent("ul.main-menu li a").parent("ul.main-menu li").children('ul.submenu').stop(true, false, true).slideToggle(300); // toggle element
                return false;
            });
        }

        // DataTable
        if( $('#client-table').length>0 ){
            $('#client-table').DataTable();
        }

        // mainSlider
        mainSlider.bxSlider({
            // mode: 'fade',
            captions: false
        });

        // photoGallery1
        photoGallery1.magnificPopup({
          delegate: 'a',
          type: 'image',
          closeOnContentClick: false,
          closeBtnInside: false,
          mainClass: 'mfp-with-zoom mfp-img-mobile',
          gallery: {
            enabled: true
          }
        });

        owlCarousel1.owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:true
                }
            }
        });

        // scrollTop
        $(".scrolltotop").on('click', function(){
            $("html").animate({'scrollTop' : '0'}, 500);
            return false;
        });
        $(window).scroll( function() {
            var windowpos = $(window).scrollTop();
            if( windowpos >= 150 ) {
                $("a.scrolltotop").fadeIn();
            }
            else {
                $("a.scrolltotop").fadeOut();
            }
        });
    });

})(jQuery);

// preview images showing for image file upload 
function readURL(input, preview) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $(preview+'_preview').attr('src', e.target.result).parent('div').removeClass('d-none');
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}
