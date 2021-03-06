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
