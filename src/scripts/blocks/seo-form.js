function initSeoForm() {
  document.querySelectorAll(".seo-form__form").forEach((form) => {
    const validate = initValidation(form);
    form.addEventListener("submit", (e) => submit(e, validate));
  });

  async function submit(e, validate) {
    e.preventDefault();
    const form = e.target.closest("form");

    const validateRes = await validate.trigger();
    if (validateRes.length) return;

    hideFormMsg(form);

    const submitBtn = getSubmitBtn(form);
    const formData = new FormData(form);

    submitBtn.classList.add("button--loading");

    try {
      let res = await fetch(k8All.ajaxurl, {
        method: "post",
        body: formData,
      });
      let rawData = await res.json();

      if (rawData.success) {
        form.reset();
        showFormSuccess(rawData.data.message, form);
      } else throw new Error(rawData.data.message);
    } catch (error) {
      showFormError(error.message, form);
    }

    submitBtn.classList.remove("button--loading");
  }

  function initValidation(form) {
    return new ValidateForm(form, {
      SITE_URL: {
        validators: ["required", "url"],
      },
      EMAIL: {
        validators: ["required", "email"],
      },
    });
  }
}

initSeoForm();
