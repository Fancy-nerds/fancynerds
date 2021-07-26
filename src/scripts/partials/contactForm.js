function initContactForm(form, triggerEl) {
  form =
    typeof form === "string"
      ? document.querySelector("#global-contact-form")
      : form;

  initModal(form.closest('.contact-modal'), triggerEl);

  if (!form) return;

  let gwidget;

  if (form["PHONE"]) initPhoneValidation();

  const validate = initValidation();

   //lazy init captcha
   initLazlyCaptcha();

  form.addEventListener("submit", submit);

 

  function initPhoneValidation() {
    const iti = intlTelInput(form["PHONE"], {
      initialCountry: "auto",
      nationalMode: false,
      formatOnDisplay: true,
      async geoIpLookup(success, failure) {
        try {
          if (sessionStorage.getItem("locale"))
            return success(sessionStorage.getItem("locale"));
          const res = await fetch("https://ipinfo.io?token=e6e9834a6240d1");
          const data = await res.json();
          const countryCode = data && data.country ? data.country : "de";
          sessionStorage.setItem("locale", countryCode);
          success(countryCode);
        } catch (error) {
          failure(error);
        }
      },
      //separateDialCode: true,
      utilsScript: templateUrl + "/vendor/intl-tel-input/utils.js",
    });

    form["PHONE"].addEventListener("keyup", formatIntlTelInput);
    form["PHONE"].addEventListener("change", formatIntlTelInput);

    function formatIntlTelInput() {
      if (typeof intlTelInputUtils !== "undefined") {
        var currentText = iti.getNumber(intlTelInputUtils.numberFormat.E164);
        if (typeof currentText === "string") {
          iti.setNumber(currentText);
        }
      }
    }
  }

  function initValidation() {
    return new ValidateForm(form, {
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

  function initLazlyCaptcha() {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) initGrecaptcha();
        });
      },
      {
        threshold: 0,
      }
    );

    observer.observe(form);
  }

  async function submit(e) {
    e.preventDefault();
    const validateRes = await validate.trigger();
    if (validateRes.length) return;

    hideFormMsg(form);

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
      let rawData = await res.json();

      if (rawData.success) {
        form.reset();
        showFormSuccess(rawData.data.message, form);
      } else throw new Error(rawData.data.message);
    } catch (error) {
      showFormError(error.message, form);
    }
    grecaptcha.reset(gwidget);
    submitBtn.classList.remove("button--loading");
  }

  async function initGrecaptcha() {
    if (gwidget) return;
    gwidget = await initCaptcha(
      form.querySelector(".contact-modal__recaptcha"),
      {
        sitekey: grePublicKey,
        size: window.innerWidth < 360 ? "compact" : "normal",
      }
    );
  }
}
