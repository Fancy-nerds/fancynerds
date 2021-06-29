function initPlansBlock() {
  document.querySelectorAll(".plans__item").forEach((el) => {
    const planType = getplanType(el);
    const modalEl = document.querySelector("#contactUsModal");
    const contactUsForm = modalEl.querySelector("#global-contact-form");
    const triggerBtn = el.querySelector(".button");

    initModal(modalEl, triggerBtn, {
      onOpen() {
        setFormPlanType(planType, contactUsForm);
      },
      onClose() {
        resetFormPlanType(planType, contactUsForm);
      },
    });
  });

  function getplanType(el) {
    if (el.classList.contains(".plans__item--standard")) return "standart";
    if (el.classList.contains(".plans__item--economy")) return "economy";
    if (el.classList.contains(".plans__item--executive")) return "executive";
  }

  function setFormPlanType(planType, contactUsForm) {
    console.log('setFormPlanType')
  }

  function resetFormPlanType(planType, contactUsForm) {
    console.log('resetFormPlanType')
  }
}

initPlansBlock();
