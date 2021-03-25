jQuery(function($) {
    $(document).on('click', '.faq__item', function(e) {
        e.preventDefault();

        $(this).toggleClass('active');
    })
})