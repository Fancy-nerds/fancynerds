jQuery(function($) {
	// Submiting lead form to bitrix 24 crm
	$('body').on('submit', '.form-ajx', function(e) {
		e.preventDefault();
		// alert('grerg');
		let $form = $(this),
				$ajxres = $form.find('.form-ajx__result');
		$.ajax({
			type: "POST",
			dataType: "json",
			url: k8All.ajaxurl,
			data: {
				action: "m4ajx_lead",
				dataSubm: $form.serializeArray(),
			},
			success: function success(data) {
				if(data.success){
					$form[0].reset();
					$ajxres.html('We received your message, and we will contact you soon!');
					setTimeout(function(){ $ajxres.html(''); }, 6000);
				}
			},
		});
	});
});