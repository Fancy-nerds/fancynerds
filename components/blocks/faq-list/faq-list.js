document.addEventListener("click", (e) => {
  if (e.target.classList.contains("faq-list__title"))
    e.target.closest(".faq-list__item").classList.toggle("active");
});