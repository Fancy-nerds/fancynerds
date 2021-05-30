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
