function initContactForm() {
  const form = document.querySelector("#global-contact-form");

  if (!form) return;
  
  const validate = new ValidateForm(form, {
    NAME: {
      validators: ["required"],
    },
    LAST_NAME: {
      validators: ["required"],
    },
    EMAIL: {
      validators: ["email"],
    },
  });
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const validateRes = await validate.trigger();
    if (validateRes.length) return;
    const ajxresEl = form.querySelector(".form-ajx__result");
    const submitBtn = getSubmitBtn(form);
    const formData = new FormData();

    formData.append("action", "m4ajx_lead");
    serializeArray(form).forEach((el, ind) => {
      formData.append(`dataSubm[${ind}][name]`, el.name);
      formData.append(`dataSubm[${ind}][value]`, el.value);
    });

    submitBtn.classList.add("button--loading");

    try {
      let res = await fetch(k8All.ajaxurl, {
        method: "post",
        body: formData,
      });
      let data = await res.json();
      if (data.success) {
        form.reset();
        if (ajxresEl) {
          ajxresEl.innerHTML =
            "We received your message, and we will contact you soon!";
          setTimeout(() => {
            ajxresEl.innerHTML = "";
          }, 6000);
        }
      }
    } catch (error) {}

    submitBtn.classList.remove("button--loading");
  });
}
window.addEventListener("load", () => initContactForm());
