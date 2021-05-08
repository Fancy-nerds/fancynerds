jQuery(function($) {
    $(document).on('click', '.faq-list__item', function(e) {
        e.preventDefault();

        $(this).toggleClass('active');
    })
})