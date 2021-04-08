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