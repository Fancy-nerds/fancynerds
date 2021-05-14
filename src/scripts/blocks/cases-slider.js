function initCasesSlider() {
  document.querySelectorAll(".cases-slider__swiper").forEach((el) => {
    new Swiper(el, {
      autoHeight: true,
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: el.querySelector(".cases-slider__swiper .swiper-pagination"),
        type: "bullets",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        560: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1200: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      },
    });
  });
}
initCasesSlider();
