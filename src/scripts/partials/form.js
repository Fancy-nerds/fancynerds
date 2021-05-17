function initAjaxForm() {
  document.querySelectorAll(".form-ajx").forEach((form) => {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
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
  });
}
window.addEventListener("load", () => initAjaxForm());

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
