
/* -------------------------------------------------------------------
   All Functions
   ------------------------ /
 * 01.Owl Carousel
------------------------------------------------------------------- */

$( document ).ready( function() {
    Filaous_Carousell();
});


/* -------------------------------------------------------------------
 * 01.Owl Carousel
------------------------------------------------------------------- */
function Filaous_Carousell(){
    "use-strict";

    // Variables
    let blogCarousel            = $( '#blogCarousel');
    let testimonialCarousel     = $( '#testimonialCarousel');
    let portfolioCarousel       = $( '#portfolioCarousel');

    testimonialCarousel.owlCarousel({
        loop:true,
        margin:30,
        dots:false,
        rtl:true,
        nav:true,
        smartSpeed:1000,
        navText: [ "<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>" ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            900:{
                items:2
            },
            1000:{
                items:2
            }
        }
    });
    blogCarousel.owlCarousel({
        loop:true,
        margin:30,
        dots:false,
        rtl:true,
        nav:true,
        smartSpeed:1000,
        navText: [ "<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>" ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    portfolioCarousel.owlCarousel({
        loop:true,
        margin:20,
        dots:false,
        nav:true,
        rtl:true,
        smartSpeed:1000,
        navText: [ "<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>" ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
}
