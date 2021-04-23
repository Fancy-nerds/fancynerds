jQuery(function($) {
    $(document).on('click', '.toggle', function(e) {
        let $current = $(this);
        let $activeClass = 'toggle__text--active';
        $current.siblings('.toggle__text').removeClass($activeClass);

        // checked = 'after'
        if ($current.find('input').prop('checked')) {
            $current.siblings('.toggle__text--after').addClass($activeClass);
        }
        else {
            $current.siblings('.toggle__text--before').addClass($activeClass);
        }
        
        let $numbers = $(document).find('.numbers__count');
        if ($numbers) {
            $.each($numbers, function() {
                let $before = $(this).data('before');
                let $after = $(this).data('after');

                // checked = 'after'
                if ($current.find('input').prop('checked')) {
                    $(this).text($after);
                }
                else {
                    $(this).text($before);
                }
            });
        }
    })
})