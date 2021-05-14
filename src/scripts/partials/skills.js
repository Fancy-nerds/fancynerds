function initSkills() {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (
          entry.isIntersecting &&
          !entry.target.classList.contains("skills--intersected")
        ) {
          entry.target.classList.add("skills--intersected");
          entry.target.querySelectorAll(".skills__item").forEach((skillEl) => {
            const percent = skillEl.dataset.percent;
            const segmentEl = skillEl.querySelector(".donut .donut-segment");
            const spanEl = skillEl.querySelector(".skills__round span");
            segmentEl.setAttribute(
              "stroke-dasharray",
              percent + " " + (100 - percent)
            );
            segmentEl.setAttribute("stroke-linecap", "round");
            animateValue(spanEl, 0, percent, 600);
          });
        }
      });
    },
    {
      root: null,
      threshold: 0.65,
    }
  );
  document.querySelectorAll(".skills").forEach((skillsEl) => {
    if (skillsEl.classList.contains("skills--initiated")) return;
    skillsEl.classList.add("skills--initiated");
    observer.observe(skillsEl);
  });

  function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp;
      const progress = Math.min((timestamp - startTimestamp) / duration, 1);
      obj.innerHTML = Math.floor(progress * (end - start) + start);
      if (progress < 1) {
        window.requestAnimationFrame(step);
      }
    };
    window.requestAnimationFrame(step);
  }
}

initSkills();
