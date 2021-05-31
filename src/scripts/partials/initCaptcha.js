const initCaptcha = (function () {
  let captchaIsLoading = false;

  async function init(container, options) {
    if (container.classList.contains("captcha--initiated")) return;
    container.classList.add("captcha--initiated");
    if (typeof grecaptcha === "undefined") await loadCaptcha();

    return grecaptcha.render(container, options);
  }

  function loadCaptcha() {
    if (!captchaIsLoading) {
      captchaIsLoading = true;
      const script = document.createElement("script");
      script.src =
        "https://www.google.com/recaptcha/api.js?onload=onCaptchaInit&render=explicit";
      script.defer = true;
      document.head.append(script);
    }

    return new Promise((res) => {
      document.body.addEventListener("captchainit", res, {
        once: true,
      });
    });
  }
  return init;
})();

function onCaptchaInit() {
  document.body.dispatchEvent(
    new CustomEvent("captchainit", {
      detail: grecaptcha,
    })
  );
}
