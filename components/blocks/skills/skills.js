jQuery(function($) {
	function initSkills() {
		var skills = $(document).find('.skills__item');
        var heightWindow = $(window).innerHeight();
		var offsetSkills = $('.skills').offset().top;
		var scrollTop = $(document).scrollTop();

		if (scrollTop > (offsetSkills - heightWindow + 120)) {
			init();
		}

        function init() {
            $.each(skills, function() {
                var percent = $(this).data('percent');
                $(this).find('.donut .donut-segment').attr('stroke-dasharray', percent + ' ' + (100 - percent));
                $(this).find('.donut .donut-segment').attr('stroke-linecap', 'round');
                $(this).find('.skills__round span').text(percent);
            });
        }
	}

	$(document).ready(function() {
		initSkills();
	});
	
	$(document).on('scroll', function() {
		initSkills();
	})
})