jQuery(document).ready(function($){

    var rtl;
    
    if( blossom_recipe_data.rtl == '1' ){
        rtl = true;
    }else{
        rtl = false;
    }
    
    //banner slider js
    $(".slider-five .banner-slider").owlCarousel({
        items: 5,
        margin: 15,
        loop: true,
        dots: false,
        nav: true,
        autoplay: true,
        smartSpeed: 500,
        rtl: rtl,
        lazyLoad: true,
        autoplayTimeout: 2000,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1025: {
                items: 3,
            }
        }
    });
});
