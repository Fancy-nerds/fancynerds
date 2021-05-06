jQuery(function ($) {
  var swiper = new Swiper(".testimonials-slider__slider .swiper-container", {
    autoHeight: true, //enable auto height
    spaceBetween: 30,
    autoplay: {
      delay: 3000,
    },
    loop: true,
    navigation: {
      nextEl: ".testimonials-slider__button-next",
      prevEl: ".testimonials-slider__button-prev",
    },
  });
});
