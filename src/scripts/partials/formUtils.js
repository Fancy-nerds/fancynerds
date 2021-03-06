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
