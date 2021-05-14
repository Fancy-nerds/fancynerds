function initTestimonialsSlider() {
  document
    .querySelectorAll(".testimonials-slider__slider .swiper-container")
    .forEach((sliderEl) => {
      let container = sliderEl.closest('.testimonials-slider')
      new Swiper(sliderEl, {
        autoHeight: true, //enable auto height
        spaceBetween: 30,
        autoplay: {
          delay: 3000,
        },
        loop: true,
        navigation: {
          nextEl: container.querySelector(".testimonials-slider__button-next"),
          prevEl: container.querySelector(".testimonials-slider__button-prev"),
        },
      });
    });
}
initTestimonialsSlider()