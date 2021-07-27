function initModal(el, trigger, targetOpts = {}) {
  const opts = {
    overlayClose: false,
    ...targetOpts,
  };
  // Get the modal
  const modal = typeof el === "string" ? document.querySelector(el) : el;

  // Get the button that opens the modal
  const triggerBtn =
    typeof trigger === "string" ? document.querySelector(trigger) : trigger;

  // Get the <span> element that closes the modal
  const closeBtn = modal.querySelector(".close");

  // When the user clicks the button, open the modal
  triggerBtn.onclick = function (e) {
    e.preventDefault();
    modal.style.display = "block";
    opts.onOpen && opts.onOpen();
  };

  // When the user clicks on <span> (x), close the modal
  if (!closeBtn.onclick)
    closeBtn.onclick = function (e) {
      e.preventDefault();
      modal.style.display = "none";
      opts.onClose && opts.onClose();
    };

  // When the user clicks anywhere outside of the modal, close it
  if (opts.overlayClose)
    modal.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
        opts.onClose && opts.onClose();
      }
    };
}
