function serializeArray(form) {
  var field,
    l,
    s = [];
  if (typeof form == "object" && form.nodeName == "FORM") {
    var len = form.elements.length;
    for (var i = 0; i < len; i++) {
      field = form.elements[i];
      if (
        field.name &&
        !field.disabled &&
        field.type != "file" &&
        field.type != "reset" &&
        field.type != "submit" &&
        field.type != "button"
      ) {
        if (field.type == "select-multiple") {
          l = form.elements[i].options.length;
          for (j = 0; j < l; j++) {
            if (field.options[j].selected)
              s[s.length] = { name: field.name, value: field.options[j].value };
          }
        } else if (
          (field.type != "checkbox" && field.type != "radio") ||
          field.checked
        ) {
          s[s.length] = { name: field.name, value: field.value };
        }
      }
    }
  }
  return s;
}

function getSubmitBtn(form) {
  return [...form].find((el) => el.type === "submit");
}

function showFormSuccess(msg, form) {
  const resEl = form.querySelector(".form-ajx__result");
  resEl.innerHTML = msg;
}

function showFormError(msg, form) {
  const resEl = form.querySelector(".form-ajx__result");
  resEl.classList.add("form-ajx__result--error");
  resEl.innerHTML = msg;
}

function hideFormMsg(form) {
  const resEl = form.querySelector(".form-ajx__result");
  resEl.classList.remove("form-ajx__result--error");
  resEl.classList.remove("form-ajx__result--success");
  resEl.innerHTML = "";
}

class ValidateForm {
  form = null;
  scheme = null;
  result = [];
  constructor(form, scheme) {
    if (!form || !scheme) throw new Error("please pass two arguments");
    this.form = form;
    this.scheme = scheme;
  }

  async trigger(bind = true) {
    bind && this.bind();
    return await this.validateForm();
  }
  async validateForm() {
    this.result = [];
    [...this.form].forEach((inp) => {
      if (!this.scheme[inp.name]) return;
      const res = Iodine.is(inp.value, this.scheme[inp.name].validators);
      if (res !== true) this.handleError(inp, res);
      else this.handleValid(inp);
    });
    return this.result;
  }
  bind() {
    [...this.form].forEach((inp) => {
      if (!this.scheme[inp.name]) return;
      inp.addEventListener("input", this.handleChange);
      inp.addEventListener("change", this.handleChange);
    });
  }
  handleChange = function () {
    this.trigger(false);
  }.bind(this);
  handleError(inp, errorType) {
    this.result.push(Iodine.getErrorMessage(errorType));
    this.showError(inp);
  }
  showError(inp) {
    inp.classList.add("form__control--error");
  }
  handleValid(inp) {
    this.hideError(inp);
  }
  hideError(inp) {
    inp.classList.remove("form__control--error");
  }
}

///
Iodine.addRule("phone", (val) => {
  return val ? intlTelInputUtils.isValidNumber(val) : true;
});
Iodine.setErrorMessages({ phone: `Isn't valid phone number` });

(function () {
  const burger = document.querySelector(".header__burger");
  const closeBtn = document.querySelector(".header__close");
  const overlay = document.querySelector(".header__overlay");

  burger &&
    burger.addEventListener("click", (e) => {
      e.preventDefault();
      document.querySelector(".header__overlay").classList.add("active");
      document.querySelector(".header-mobile__menu").classList.add("active");
    });
  closeBtn &&
    closeBtn.addEventListener("click", (e) => {
      e.preventDefault();
      document.querySelector(".header__overlay").classList.remove("active");
      document.querySelector(".header-mobile__menu").classList.remove("active");
    });

  overlay &&
    overlay.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      document.querySelector(".header__overlay").classList.remove("active");
      document.querySelector(".header-mobile__menu").classList.remove("active");
    });

  const elements = [
    ...document.querySelectorAll(
      ".header-mobile__menu .menu-item-has-children"
    ),
  ];
  elements.forEach(accordion);

  function findElements(object, element) {
    const instance = object;

    instance.element = element;
    instance.target = element.querySelector(".sub-menu");
  }

  function measureHeight(object) {
    const instance = object;

    let items = object.target.querySelectorAll(".menu-item");
    let sumHeight = 0;

    items.forEach((el) => {
      let style = window.getComputedStyle(el, null);
      let height = el.offsetHeight;
      let margin = parseFloat(style.marginBottom);
      sumHeight += height + margin;
    });
    instance.height = sumHeight;
  }

  function subscribe(instance) {
    instance.element.addEventListener("click", (event) => {
      if (event.target.href) return;
      changeElementStatus(instance);
      return false;
    });

    window.addEventListener("resize", () => measureHeight(instance));
  }

  function changeElementStatus(instance) {
    if (instance.isActive) {
      hideElement(instance);
    } else {
      showElement(instance);
    }
  }

  function hideElement(object) {
    const instance = object;
    const { target } = instance;

    target.style.height = null;
    instance.isActive = false;
  }

  function showElement(object) {
    const instance = object;
    const { target, height } = instance;

    target.style.height = `${height}px`;
    instance.isActive = true;
  }

  function accordion(element) {
    const instance = {};

    function init() {
      findElements(instance, element);
      measureHeight(instance);
      subscribe(instance);
    }
    init();
  }
})();
	
function initContactForm() {
  const form = document.querySelector("#global-contact-form");

  if (!form) return;

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

  const gwidget = grecaptcha.render(
    form.querySelector(".contact-modal__recaptcha"),
    {
      sitekey: "6Lcgqf8aAAAAAM5Y4qG1EtZqkLksQCLMM5HCxI8S",
    }
  );

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
    PHONE: {
      validators: ["phone"],
    },
  });
  form.addEventListener("submit", async (e) => {
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
  });
}
window.addEventListener("load", () => initContactForm());

function switcherInit() {
  document.querySelectorAll(".switcher").forEach((switcherEl) => {
    if (switcherEl.classList.contains("switcher--initiated")) return;
    switcherEl.classList.add("switcher--initiated");
    const btns = switcherEl.querySelectorAll("button");
    btns.forEach((btn) => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        let curr = e.target;
        if (curr.classList.contains("active")) {
          return false;
        }
        let target = curr.dataset.target;
        switcherEl.querySelector(".button.active").classList.remove("active");

        curr.classList.add("active");
        switcherEl.parentElement
          .querySelector(".switcher__tab.active")
          .classList.remove("active");
        switcherEl.parentElement
          .querySelector('.switcher__tab[data-name="' + target + '"]')
          .classList.add("active");
      });
    });
  });
}

switcherInit()