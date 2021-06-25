/**
 *
 * @param {{ type: "yt" | "native", ref: String, ratio: Number }} opts
 */
function openVideoModal(opts) {
  const { closeBtn, modalContainerEl, modalRoot } = createModal();

  appendModal();

  closeBtn.addEventListener("click", closeModal);

  function createModal() {
    const template = document.querySelector("#video-modal");
    const modalRoot = template.content.cloneNode(true);
    const modalContainerEl = modalRoot.querySelector(".video-modal");
    const closeBtn = modalContainerEl.querySelector(".video-modal__close");
    const innerEl = modalRoot.querySelector(".video-modal__inner");
    const vidEl = createVideo();

    innerEl.style.paddingBottom = opts.ratio ? `${1 / opts.ratio * 100}%` : ''

    innerEl.append(vidEl);
    return { closeBtn, modalContainerEl, modalRoot };
  }

  function appendModal() {
    document.body.append(modalRoot);

    setTimeout(() => {
      modalContainerEl.classList.add("video-modal--showed");
    }, 0);
  }

  function closeModal() {
    modalContainerEl.classList.remove("video-modal--showed");
    modalContainerEl.addEventListener("transitionend", () => {
      modalContainerEl.remove();
    });
  }

  function createVideo() {
    let vidEl = null;
    switch (opts.type) {
      case "native":
        vidEl = createNativeVideo(opts.ref);
        break;

      case "yt":
        vidEl = createYtVideo(opts.ref);
        break;
    }

    return vidEl;
  }

  function createYtVideo(id) {
    const iframe = document.createElement("iframe");
    iframe.src = `https://www.youtube.com/embed/${id}`;
    iframe.allowFullscreen = true;
    iframe.allow =
      "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
    iframe.setAttribute("frameborder", "");
    return iframe;
  }

  function createNativeVideo(src) {
    const video = document.createElement("video");
    video.controls = true;
    video.src = src;
    return video;
  }
}
