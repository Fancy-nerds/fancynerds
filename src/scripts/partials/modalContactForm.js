class ModalContactForm {
  gwidget = null;
  form = null;
  triggerEl = null;
  validate = null;
  iti = null;
  phoneValidation = null;
  constructor(form, triggerEl, phoneValidation = new PhoneValidation()) {
    this.form = typeof form === "string" ? document.querySelector(form) : form;

    if (!this.form) throw new Error("invalid form selector or element");

    this.triggerEl =
      triggerEl === "string" ? document.querySelector(triggerEl) : triggerEl;

    this.phoneValidation = phoneValidation
    
    this.init();
  }

  init() {
    initModal(this.form.closest(".contact-modal"), this.triggerEl);

    this.phoneValidation.init(this.form["PHONE"]);

    this.validate = this.initValidation();

    this.initLazlyCaptcha();

    this.form.addEventListener("submit", (e) => this.submit(e));
  }

  initValidation() {
    return new ValidateForm(this.form, {
      NAME: {
        validators: ["required"],
      },
      LAST_NAME: {
        validators: ["required"],
      },
      EMAIL: {
        validators: ["email"],
      },
      PHONE: {
        validators: ["phone"],
      },
    });
  }

  initLazlyCaptcha() {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) this.initGrecaptcha();
        });
      },
      {
        threshold: 0,
      }
    );

    observer.observe(this.form);
  }

  async initGrecaptcha() {
    if (this.gwidget) return;
    this.gwidget = await initCaptcha(
      this.form.querySelector(".contact-modal__recaptcha"),
      {
        sitekey: grePublicKey,
        size: window.innerWidth < 360 ? "compact" : "normal",
      }
    );
  }

  async submit(e) {
    e.preventDefault();
    const validateRes = await this.validate.trigger();
    if (validateRes.length) return;

    hideFormMsg(this.form);

    const submitBtn = getSubmitBtn(this.form);
    const formData = new FormData();

    formData.append("action", "m4ajx_lead");
    serializeArray(this.form).forEach((el, ind) => {
      formData.append(`dataSubm[${ind}][name]`, el.name);
      formData.append(`dataSubm[${ind}][value]`, el.value);
    });

    submitBtn.classList.add("button--loading");

    try {
      let res = await fetch(k8All.ajaxurl, {
        method: "post",
        body: formData,
      });
      let rawData = await res.json();

      if (rawData.success) {
        this.form.reset();
        showFormSuccess(rawData.data.message, this.form);
      } else throw new Error(rawData.data.message);
    } catch (error) {
      showFormError(error.message, this.form);
    }
    grecaptcha.reset(this.gwidget);
    submitBtn.classList.remove("button--loading");
  }
}
