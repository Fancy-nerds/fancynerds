/**
 * Open video modal
 * @param {{ type: "yt" | "native", ref: String, ratio: Number, autoplay: Boolean }} opts
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

    innerEl.style.paddingBottom = aspectRatioToPadding();

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
        vidEl = createNativeVideo(opts);
        break;

      case "yt":
        vidEl = createYtVideo(opts);
        break;
    }

    return vidEl;
  }

  function createYtVideo({ ref, autoplay = false }) {
    const iframe = document.createElement("iframe");
    iframe.src = `https://www.youtube.com/embed/${ref}${
      autoplay ? "?autoplay=1&mute=1" : ""
    }`;
    iframe.allowFullscreen = true;
    iframe.allow =
      "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
    iframe.setAttribute("frameborder", "");
    return iframe;
  }

  function createNativeVideo({ ref, autoplay = false }) {
    const video = document.createElement("video");
    video.controls = true;
    video.src = ref;
    video.muted = autoplay;
    video.autoplay = autoplay;
    return video;
  }

  function aspectRatioToPadding() {
    return (
      (opts.ratio
        ? opts.ratio
            .split(":")
            .map((val) => parseFloat(val))
            .reverse()
            .reduce((acc, val) => (acc ? acc / val : val)) * 100
        : 56.25) + "%"
    );
  }
}

openVideoModal.createTriggerVideoModalBtn = (btnEl) => {
  btnEl && btnEl.addEventListener("click", openVideoModal.onVideoModalBtnClick);
};

openVideoModal.onVideoModalBtnClick = (e) => {
  e.preventDefault();
  const type = e.currentTarget.dataset.type;
  const ref = e.currentTarget.dataset.ref;
  const ratio = e.currentTarget.dataset.ratio;
  const autoplay = typeof e.currentTarget.dataset.autoplay === "string";

  if (!ref) return;

  openVideoModal({
    type,
    ref,
    ratio,
    autoplay,
  });
};
