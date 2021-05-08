jQuery(function ($) {
  $(document).on("click", ".header__burger", function (e) {
    e.preventDefault();
    $(this).find(".header__overlay").addClass("active");
    $(document).find(".header-mobile__menu").addClass("active");
  });

  $(document).on("click", ".header__close", function (e) {
    e.preventDefault();
    $(document).find(".header__overlay").removeClass("active");
    $(document).find(".header-mobile__menu").removeClass("active");
  });

  const elements = [...document.querySelectorAll(".header-mobile__menu .menu-item-has-children")];
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
});
	
jQuery(function($) {
	// Submiting lead form to bitrix 24 crm
	$('body').on('submit', '.form-ajx', function(e) {
		e.preventDefault();
		// alert('grerg');
		let $form = $(this),
				$ajxres = $form.find('.form-ajx__result');
		$.ajax({
			type: "POST",
			dataType: "json",
			url: k8All.ajaxurl,
			data: {
				action: "m4ajx_lead",
				dataSubm: $form.serializeArray(),
			},
			success: function success(data) {
				if(data.success){
					$form[0].reset();
					$ajxres.html('We received your message, and we will contact you soon!');
					setTimeout(function(){ $ajxres.html(''); }, 6000);
				}
			},
		});
	});
});

jQuery(function($) {
    $(document).on('click', '.switcher .button', function(e) {
        e.preventDefault();
        let $curr= $(this);
        if( $curr.hasClass('active') ){
            return false;
        }
        let target = $curr.attr('data-target');
        $('.switcher .button.active').removeClass('active');
        $curr.addClass('active');
        $('.switcher__tab.active').removeClass('active');
        $('.switcher__tab[data-name="'+target+'"]').addClass('active');
    })
})