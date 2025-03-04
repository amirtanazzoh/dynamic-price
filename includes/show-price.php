<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Dynamic_Price_Show_Price {

	private $currency_code = 'CNY';

	public function __construct() {
		add_filter( 'woocommerce_get_price_html', array( $this, 'show_price' ), 10, 2 );
	}

	public function show_price( $price, $product ) {
		$api = new Dynamic_Price_API();

		$price_number = $product->get_price();

		$conversion_rate = $api->get_price_conversion_rate( $this->currency_code );
		$converted_price = $price_number * $conversion_rate;

		$price .= '<br />' . wc_price( $converted_price, array( 'currency' => $this->currency_code ) );

		return $price;
	}
}
