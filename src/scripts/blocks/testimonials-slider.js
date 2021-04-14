jQuery(function($) {
    var swiper = new Swiper('.swiper-container', {
    		autoHeight: true, //enable auto height
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.testimonials-slider__button-next',
            prevEl: '.testimonials-slider__button-prev',
        },
    });
});