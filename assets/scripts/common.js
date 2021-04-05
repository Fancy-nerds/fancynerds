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

    $(document).on('click', '.menu-item-has-children', function(){
        $(this).find('.sub-menu').slideToggle( { 
            duration: 800,
            easing: "linear",
            complete: function(){
              console.log("slideToggle completed");
            },
            queue: false // не ставим в очередь
        });
    });
})