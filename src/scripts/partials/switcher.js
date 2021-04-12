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