(function () {
  function initBars() {
    document.querySelectorAll(".progress-bars").forEach((pBars) => {
      let isIntersecting = false;
      const observer = new IntersectionObserver(
        ([entry]) => {
          if (entry.isIntersecting && !isIntersecting) {
            isIntersecting = true;
            pBars.querySelectorAll(".bar").forEach((bar, ind) => {
              setTimeout(() => {
                bar.querySelector(".bar__progress").style.width =
                  bar.dataset.percent;
              }, ind * 300);
            });
          }
        },
        {
          root: null,
          threshold: 0.65,
        }
      );
      observer.observe(pBars);
    });
  }

  initBars();
})();
