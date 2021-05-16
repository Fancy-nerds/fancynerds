function initToggle() {
  document.querySelectorAll(".toggle").forEach((toggleEl) => {
    if (toggleEl.classList.contains("toggle--active")) return;
    toggleEl.classList.add("toggle--active");
    toggleEl.querySelector("input").addEventListener("change", (e) => {
      let inp = e.target;
      let activeClass = "toggle__text--active";
      toggleEl.parentElement
        .querySelector("." + activeClass)
        .classList.remove(activeClass);

      if (inp.checked) {
        toggleEl.parentElement
          .querySelector(".toggle__text--after")
          .classList.add(activeClass);
      } else {
        toggleEl.parentElement
          .querySelector(".toggle__text--before")
          .classList.add(activeClass);
      }
    });
  });
}

initToggle();
