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
        // element - это "вопрос", по которому происходит нажатие
        instance.element = element;
        // target - это "ответ", который должен "раскрываться"
        instance.target = element.querySelector('.sub-menu');
        console.log(instance.target);
    }

    function measureHeight(object) {
        const instance = object;
        // вычисляем высоту ответа
        // instance.height = object.target.firstElementChild.clientHeight;

        console.log(object.target);
        console.log(object.target.querySelectorAll('.menu-item'));
        let items = object.target.querySelectorAll('.menu-item');
        items.forEach(el => console.log(el.clientHeight));
    }

    // function subscribe(instance) {
    //     instance.element.addEventListener('click', (event) => {
    //       // отменяем "действие по умолчанию"
    //       event.preventDefault();
    //       // меняем состояние аккордеона
    //       changeElementStatus(instance);
    //     });
    //     // если размер окна поменяется - измерим высоту ответа заново
    //     window.addEventListener('resize', () => measureHeight(instance));
    // }

    // function changeElementStatus(instance) {
    //     if (instance.isActive) {
    //       hideElement(instance);
    //     } else {
    //       showElement(instance);
    //     }
    // }

    // function hideElement(object) {
    //     const instance = object;
    //     const { target } = instance;
    //     // обнуляем высоту ответа
    //     target.style.height = null;
    //     // делаем статус неактивным
    //     instance.isActive = false;
    // }

    // function showElement(object) {
    //     const instance = object;
    //     const { target, height } = instance;
    //     // задаем ответу сохраненную в measureHeight высоту
    //     target.style.height = `${height}px`;
    //     // делаем статус активным
    //     instance.isActive = true;
    // }

    function accordion(element) {
        const instance = {};
              
        function init() {
          // найдем вопрос и ответ
          findElements(instance, element);
          // измерим высоту ответа
          measureHeight(instance);
        //   // добавим логику нажатия на кнопку
        //   subscribe(instance);
        }
        init();
    }


})