jQuery(function($) {
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.testimonials-slider__button-next',
            prevEl: '.testimonials-slider__button-prev',
        },
    });
});