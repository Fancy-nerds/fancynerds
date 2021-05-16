function initNumbersBlock() {
  document.querySelectorAll(".numbers").forEach((numbersContainer) => {
    if (numbersContainer.classList.contains("numbers--active")) return;
    numbersContainer.classList.add("numbers--active");

    let switchInp = numbersContainer.querySelector(".toggle input");
    switchInp &&
      switchInp.addEventListener("change", (e) => {
        numbersContainer
          .querySelectorAll(".numbers__count")
          .forEach((numberCountEl) => {
            if (e.target.checked) {
              numberCountEl.innerText = numberCountEl.dataset.after;
            } else {
              numberCountEl.innerText = numberCountEl.dataset.before;
            }
          });
      });
  });
}

initNumbersBlock()

//= ../partials/toggle.js

//= counters.js
