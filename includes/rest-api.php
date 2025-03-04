<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Dynamic_Price_Rest_API {

	private $namespace = 'dynamic-price/v1';


	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	public function register_routes() {
		register_rest_route( $this->namespace, '/update-currency', array(
			'methods' => 'POST',
			'callback' => array( $this, 'update_currency' ),
			'permission_callback' => array( $this, 'custom_verify_nonce' ),
		) );
	}

	public function custom_verify_nonce() {
		$nonce = isset( $_SERVER['HTTP_X_WP_NONCE'] ) ? $_SERVER['HTTP_X_WP_NONCE'] : '';

		if ( ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
			return new WP_Error( 'invalid_nonce', 'Invalid nonce.', array( 'status' => 403 ) );
		}

		return true;
	}

	public function update_currency( $request ) {

		$currency = $request->get_param( 'currency' );


		$dynamic_price_api = new Dynamic_Price_API();
		$dynamic_price_api->update_transient_conversion_rate( $currency );

		return new WP_REST_Response( 'Currency updated', 200 );
	}
}
