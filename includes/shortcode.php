<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Dynamic_Price_Shortcode {

	public function __construct() {
		add_shortcode( 'dynamic_price', array( $this, 'shortcode' ) );
	}

	public function shortcode( $atts ) {
		$api = new Dynamic_Price_API();
		$atts = shortcode_atts( array(
			'currency' => 'CNY',
			'product_id' => get_the_ID(),
		), $atts );

		$product = wc_get_product( $atts['product_id'] );

		if ( ! $product ) {
			return 'Product not found';
		}

		$price = $product->get_price();

		$conversion_rate = $api->get_price_conversion_rate( $atts['currency'] );
		$converted_price = $price * $conversion_rate;

		return wc_price( $converted_price, array( 'currency' => $atts['currency'] ) );
	}
}

