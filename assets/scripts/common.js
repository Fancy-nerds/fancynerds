jQuery(function($) {
    $('.menu-item-has-children').on('mouseout', function(e) {
        console.log(e.target);
        console.log(e.currentTarget);
    })

    
    $('.menu-item-has-children').on('mouseleave', function(e) {
        console.log(e.target);
        console.log(e.currentTarget);
    })
})