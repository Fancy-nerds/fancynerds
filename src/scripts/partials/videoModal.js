function openVideoModal(opts) {
  const template = document.querySelector("#video-modal");
  const modalRoot = template.content.cloneNode(true);
  const modalContainerEl = modalRoot.querySelector(".video-modal");
  const closeBtn = modalContainerEl.querySelector(".video-modal__close");
  document.body.append(modalRoot);

  setTimeout(() => {
    modalContainerEl.classList.add("video-modal--showed");
  }, 0);

  closeBtn.addEventListener("click", () => {
    modalContainerEl.classList.remove("video-modal--showed");
    modalContainerEl.addEventListener("transitionend", () => {
      modalContainerEl.remove();
    });
  });
}
