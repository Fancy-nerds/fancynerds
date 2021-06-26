function initWhoWeAreBlock() {
  document.querySelectorAll(".who-we-are").forEach((el) => {
    const vidBtn = el.querySelector(".who-we-are__video .button--play");
    openVideoModal.createTriggerVideoModalBtn(vidBtn)
  })
}

initWhoWeAreBlock()