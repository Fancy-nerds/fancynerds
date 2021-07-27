class PhoneValidation {
  iti = null;
  init(phoneInp) {
    if (!phoneInp || phoneInp.dataset.intlTelInputId) return;

    this.iti = intlTelInput(phoneInp, {
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

    phoneInp.addEventListener("keyup", () => this.formatIntlTelInput());
    phoneInp.addEventListener("change", () => this.formatIntlTelInput());
  }

  formatIntlTelInput() {
    if (typeof intlTelInputUtils !== "undefined") {
      var currentText = this.iti.getNumber(intlTelInputUtils.numberFormat.E164);
      if (typeof currentText === "string") {
        this.iti.setNumber(currentText);
      }
    }
  }
}
