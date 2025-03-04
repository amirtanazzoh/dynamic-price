<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Dynamic_Price_API {

	private $base_url = 'https://v6.exchangerate-api.com/v6/';
	private $api_key = '07335b99ef50f6a8120749d1';
	private $currency_code = 'USD';
	private $version = 'latest';

	private $full_url;

	private $transient_expiration = 60 * 60 * 24; // 24 hours

	public function __construct() {
		$this->full_url = $this->base_url . $this->api_key . '/' . $this->version . '/' . $this->currency_code;
	}

	public function get_price_conversion_rate( $currency_code = 'USD' ) {
		$transient_name = 'dynamic_price_conversion_rate_' . $currency_code;

		if ( false === ( $conversion_rate = get_transient( $transient_name ) ) ) {
			$conversion_rate = $this->get_price_conversion_rate_live( $currency_code );
			set_transient( $transient_name, $conversion_rate, $this->transient_expiration );
		}

		return $conversion_rate;
	}

	public function get_price_conversion_rate_live( $currency_code = 'USD' ) {
		$response = wp_remote_get( $this->full_url );
		$response_body = json_decode( $response['body'], true );

		return $response_body['conversion_rates'][ $currency_code ];
	}

	public function update_transient_conversion_rate( $currency_code = 'USD' ) {
		$transient_name = 'dynamic_price_conversion_rate_' . $currency_code;

		$conversion_rate = $this->get_price_conversion_rate_live( $currency_code );
		set_transient( $transient_name, $conversion_rate, $this->transient_expiration );
	}
}


