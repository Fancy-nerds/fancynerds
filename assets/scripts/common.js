class e{constructor(){this.locale=void 0,this.messages=this._defaultMessages()}_dateCompare(e,t,r,s=!1){return!!this.isDate(e)&&!(!this.isDate(t)&&!this.isInteger(t))&&(t="number"==typeof t?t:t.getTime(),"less"===r&&s?e.getTime()<=t:"less"!==r||s?"more"===r&&s?e.getTime()>=t:"more"!==r||s?void 0:e.getTime()>t:e.getTime()<t)}_defaultMessages(){return{after:"The date must be after: '[PARAM]'",afterOrEqual:"The date must be after or equal to: '[PARAM]'",array:"Value must be an array",before:"The date must be before: '[PARAM]'",beforeOrEqual:"The date must be before or equal to: '[PARAM]'",boolean:"Value must be true or false",date:"Value must be a date",different:"Value must be different to '[PARAM]'",endingWith:"Value must end with '[PARAM]'",email:"Value must be a valid email address",falsy:"Value must be a falsy value (false, 'false', 0 or '0')",in:"Value must be one of the following options: [PARAM]",integer:"Value must be an integer",json:"Value must be a parsable JSON object string",maximum:"Value must not be greater than '[PARAM]' in size or character length",minimum:"Value must not be less than '[PARAM]' in size or character length",notIn:"Value must not be one of the following options: [PARAM]",numeric:"Value must be numeric",optional:"Value is optional",regexMatch:"Value must satisify the regular expression: [PARAM]",required:"Value must be present",same:"Value must be '[PARAM]'",startingWith:"Value must start with '[PARAM]'",string:"Value must be a string",truthy:"Value must be a truthy value (true, 'true', 1 or '1')",url:"Value must be a valid url",uuid:"Value must be a valid UUID"}}addRule(t,r){e.prototype[`is${t[0].toUpperCase()}${t.slice(1)}`]=r}getErrorMessage(e,t){let r=e.split(":")[0],s=t||e.split(":")[1];return["after","afterOrEqual","before","beforeOrEqual"].includes(r)&&(s=new Date(parseInt(s)).toLocaleTimeString(this.locale,{year:"numeric",month:"short",day:"numeric",hour:"2-digit",minute:"numeric"})),[null,void 0].includes(s)?this.messages[r]:this.messages[r].replace("[PARAM]",s)}isAfter(e,t){return this._dateCompare(e,t,"more",!1)}isAfterOrEqual(e,t){return this._dateCompare(e,t,"more",!0)}isArray(e){return Array.isArray(e)}isBefore(e,t){return this._dateCompare(e,t,"less",!1)}isBeforeOrEqual(e,t){return this._dateCompare(e,t,"less",!0)}isBoolean(e){return[!0,!1].includes(e)}isDate(e){return e&&"[object Date]"===Object.prototype.toString.call(e)&&!isNaN(e)}isDifferent(e,t){return e!=t}isEndingWith(e,t){return this.isString(e)&&e.endsWith(t)}isEmail(e){return new RegExp("^\\S+@\\S+[\\.][0-9a-z]+$").test(String(e).toLowerCase())}isFalsy(e){return[0,"0",!1,"false"].includes(e)}isIn(e,t){return(t="string"==typeof t?t.split(","):t).includes(e)}isInteger(e){return Number.isInteger(e)&&parseInt(e).toString()===e.toString()}isJson(e){try{return"object"==typeof JSON.parse(e)}catch(e){return!1}}isMaximum(e,t){return e="string"==typeof e?e.length:e,parseFloat(e)<=t}isMinimum(e,t){return e="string"==typeof e?e.length:e,parseFloat(e)>=t}isNotIn(e,t){return!this.isIn(e,t)}isNumeric(e){return!isNaN(parseFloat(e))&&isFinite(e)}isOptional(e){return[null,void 0,""].includes(e)}isRegexMatch(e,t){return new RegExp(t).test(String(e))}isRequired(e){return!this.isOptional(e)}isSame(e,t){return e==t}isStartingWith(e,t){return this.isString(e)&&e.startsWith(t)}isString(e){return"string"==typeof e}isTruthy(e){return[1,"1",!0,"true"].includes(e)}isUrl(e){return new RegExp("^(https?:\\/\\/)?((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|((\\d{1,3}\\.){3}\\d{1,3}))(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*(\\?[;&a-z\\d%_.~+=-]*)?(\\#[-a-z\\d_]*)?$").test(String(e).toLowerCase())}isUuid(e){return new RegExp("^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$").test(String(e).toLowerCase())}is(e,t=[]){if(!t.length)return!0;if("optional"===t[0]&&this.isOptional(e))return!0;for(let r in t)if("optional"!==t[r]&&!this["is"+(t[r].split(":")[0][0].toUpperCase()+t[r].split(":")[0].slice(1))].apply(this,[e,t[r].split(":")[1]]))return t[r];return!0}setErrorMessages(e){this.messages=e}setLocale(e){this.locale=e}}window.Iodine=new e;

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
      const res = Iodine.is(
        inp.value,
        this.scheme[inp.name].validators
      );
      if (res !== true) this.handleError(inp, res)
      else this.handleValid(inp)
    });
    return this.result
  }
  bind() {
    [...this.form].forEach((inp) => {
      if (!this.scheme[inp.name]) return;
      inp.addEventListener("input", this.handleChange);
      inp.addEventListener("change", this.handleChange);
    });
  }
  handleChange = (function () {
    this.trigger(false);
  }).bind(this)
  handleError(inp, errorType) {
    this.result.push(Iodine.getErrorMessage(errorType))
    this.showError(inp)
  }
  showError(inp) {
    inp.classList.add('form__control--error')
  }
  handleValid(inp) {
    this.hideError(inp)
  }
  hideError(inp) {
    inp.classList.remove('form__control--error')
  }
}

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