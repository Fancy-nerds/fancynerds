function initModal(el, trigger, targetOpts) {
  const opts = Object.assign(targetOpts || {}, {
    overlayClose: false,
  });
  // Get the modal
  const modal = typeof el === "string" ? document.querySelector(el) : el;

  // Get the button that opens the modal
  const btn =
    typeof trigger === "string" ? document.querySelector(trigger) : trigger;

  // Get the <span> element that closes the modal
  const span = modal.querySelector(".close");

  // When the user clicks the button, open the modal
  btn.onclick = function () {
    modal.style.display = "block";
  };

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  };

  // When the user clicks anywhere outside of the modal, close it
  opts.overlayClose &&
    (window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    });
}
