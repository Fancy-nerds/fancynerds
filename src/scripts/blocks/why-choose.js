(function () {
  function initBars() {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && !entry.target.classList.contains('progress-bars--intersected')) {
            entry.target.classList.add('progress-bars--intersected')
            entry.target.querySelectorAll(".bar").forEach((bar, ind) => {
              setTimeout(() => {
                bar.querySelector(".bar__progress").style.width =
                  bar.dataset.percent;
              }, ind * 300);
            });
          }
        });
      },
      {
        root: null,
        threshold: 0.65,
      }
    );
    document.querySelectorAll(".progress-bars").forEach((pBars) => {
      if (pBars.classList.contains('progress-bars--initiated')) return;
      observer.observe(pBars);
    });
  }

  initBars();
})();
