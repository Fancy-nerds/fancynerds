jQuery(function($) {
    if ($(window).innerWidth() <= 768) {
        $('.partners .row').slick({
            dots: true,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            swipeToSlide: 1,
            infinite: true,
            speed: 500,
            swipeToSlide: false,
            touchMove: false,
        
            responsive: [
                {
                    breakpoint: 568,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
});