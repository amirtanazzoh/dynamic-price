jQuery(document).ready(function ($) {
	$('#dynamic-price-form').on('submit', function (e) {
		e.preventDefault();
		const currency = $('#currency').val();
		const restUrl = dynamic_price_obj_from_php.rest_url + '/update-currency';
		const nonce = dynamic_price_obj_from_php.nonce;

		$.ajax({
			url: restUrl,
			type: 'POST',
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-WP-Nonce', nonce);
			},
			data: {
				currency: currency,
			},
			success: function (response) {
				alert(response);
			},
			error: function (error) {
				alert(error);
			},
		});
	});
});
