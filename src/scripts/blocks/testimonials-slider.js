(function () {
  document
    .querySelectorAll(".testimonials-slider__slider .swiper-container")
    .forEach((sliderEl) => {
      new Swiper(
        sliderEl,
        {
          autoHeight: true, //enable auto height
          spaceBetween: 30,
          autoplay: {
            delay: 3000,
          },
          loop: true,
          navigation: {
            nextEl: sliderEl.querySelector(".testimonials-slider__button-next"),
            prevEl: sliderEl.querySelector(".testimonials-slider__button-prev"),
          },
        }
      );
    });
})();
