(function () {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (
          entry.isIntersecting &&
          !entry.target.classList.contains("counters--intersected")
        ) {
          entry.target.classList.add("counters--intersected");
          entry.target.querySelectorAll("[data-counter]").forEach((el) => {
            animateValue(el, 0, +el.dataset.counter, 2000);
          });
        }
      });
    },
    {
      root: null,
      threshold: 0.65,
    }
  );
  document.querySelectorAll(".counters").forEach((countersEl) => {
    if (countersEl.classList.contains("counters--initiated")) return;
    countersEl.classList.add("counters--initiated")
    observer.observe(countersEl);
  });

  const intl = new Intl.NumberFormat("en-US", { style: "decimal" });
  function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp;
      const progress = Math.min((timestamp - startTimestamp) / duration, 1);
      obj.innerHTML = intl.format(Math.floor(progress * (end - start) + start));
      if (progress < 1) {
        window.requestAnimationFrame(step);
      }
    };
    window.requestAnimationFrame(step);
  }
})();