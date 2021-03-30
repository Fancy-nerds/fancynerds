jQuery(function($) {
    function initBars() {
        var bars = $(document).find('.bar');

        $.each(bars, function() {
            var percent = $(this).data('percent');
            $(this).find('.bar__progress').css('width', percent);
        });
    }
    $(document).ready(function() {
        initBars();
    })
})

$(document).on('scroll', function() {
    var heightWindow = $(window).innerHeight();
    var offsetBars = $('.progress-bars').offset().top;
    var scrollTop = $(document).scrollTop();

    if (scrollTop > (offsetBars - heightWindow + 100)) {
        initBars();
    }
})