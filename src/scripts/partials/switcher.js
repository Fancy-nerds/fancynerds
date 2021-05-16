function switcherInit() {
  document.querySelectorAll(".switcher").forEach((switcherEl) => {
    if (switcherEl.classList.contains("switcher--initiated")) return;
    switcherEl.classList.add("switcher--initiated");
    const btns = switcherEl.querySelectorAll("button");
    btns.forEach((btn) => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        let curr = e.target;
        if (curr.classList.contains("active")) {
          return false;
        }
        let target = curr.dataset.target;
        switcherEl.querySelector(".button.active").classList.remove("active");

        curr.classList.add("active");
        switcherEl.parentElement
          .querySelector(".switcher__tab.active")
          .classList.remove("active");
        switcherEl.parentElement
          .querySelector('.switcher__tab[data-name="' + target + '"]')
          .classList.add("active");
      });
    });
  });
}

switcherInit()