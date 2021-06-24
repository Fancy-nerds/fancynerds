function initWhoWeAreBlock() {
  document.querySelectorAll(".who-we-are").forEach((el) => {
    const vidBtn = el.querySelector(".who-we-are__video");
    vidBtn.addEventListener("click", onVidClick);
  });

  function onVidClick(e) {
    e.preventDefault();
    const type = e.target.dataset.type;
    const ref = e.target.dataset.ref;
    openVideoModal({
      type,
      ref,
    });
  }
}

initWhoWeAreBlock()