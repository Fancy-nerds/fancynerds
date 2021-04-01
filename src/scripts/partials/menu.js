jQuery(function($) {
    $('.menu-item-has-children').on('mouseenter', function() {
        $(this).find('.sub-menu').addClass('active');
    });

    $('.menu-item-has-children').on('mouseout', function(e) {
        console.log(e.target);
        console.log(e.currentTarget);

        if (!e.target.classList.contains('sub-menu') && !e.currentTarget.classList.contains('menu-item-has-children')) {
            $(this).find('.sub-menu').removeClass('active'); 
        }
    });

    $('.sub-menu').on('mouseleave', function(e) {
        $(this).removeClass('active'); 

        
        
    })

    
    // $('.menu-item-has-children').on('mouseleave', function(e) {
    //     console.log(e.target);
    //     console.log(e.currentTarget);

        
        
    // })
})