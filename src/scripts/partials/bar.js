jQuery(function($) {
    $(document).ready(function() {
        var bars = $(document).find('.bar');

        console.log(bars);
        console.log(typeof bars);

        $.each(bars, function(index,value) {
            var percent = $(this).data('percent');
            $(this).find('.bar__progress').css('width', percent);
        });

    })
})