jQuery(function($) {
    $(document).on('click', '.header__mobile-menu', function(e) {
        e.preventDefault();
        $(this).find('.header__overlay').addClass('active');
        $(document).find('.header__menu').addClass('active');
    });

    $(document).on('click', '.header__close', function(e) {
        e.preventDefault();
        $(document).find('.header__overlay').removeClass('active');
        $(document).find('.header__menu').removeClass('active');
    });

    // $(document).on('click', '.menu-item-has-children', function(){
    //     $(this).find('.sub-menu').stop(true, true).slideToggle( { 
    //         duration: 800,
    //         easing: "linear",
    //         complete: function(){
    //           console.log("slideToggle completed");
    //         },
    //         queue: false // не ставим в очередь
    //     });
    // });

    const elements = [...document.querySelectorAll('.menu-item-has-children')];
    elements.forEach(accordion);

    function findElements(object, element) {
        const instance = object;
        
        instance.element = element;
        instance.target = element.querySelector('.sub-menu');
    }

    function measureHeight(object) {
        const instance = object;

        let items = object.target.querySelectorAll('.menu-item');
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
        instance.element.addEventListener('click', (event) => {
          event.preventDefault();
          changeElementStatus(instance);
        });

        window.addEventListener('resize', () => measureHeight(instance));
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


})

jQuery(function($) {
    $(document).on('click', '.switcher .button', function(e) {
        e.preventDefault();

        $(this).toggleClass('active button--blue');
        $(this).siblings(".button").toggleClass('active button--blue');

        var $target = $(this).data('target');
        console.log($target);
        var $tab = $(this).parent().siblings(".switcher__tabs").data('tab');
        console.log($(document).find('[data-name="' + $target + '"]'));

        $(this).parent().siblings(".switcher__tabs").find(".switcher__tab.active").hide();
        $(this).parent().siblings(".switcher__tabs").find('[data-name="' + $target + '"]').show();


    })
})