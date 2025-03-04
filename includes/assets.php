<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Dynamic_Price_Assets {

	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
	}

	public function enqueue_admin_scripts() {
		wp_enqueue_style( 'dynamic-price-admin-style', PLUGIN_URL . 'assets/css/admin.css' );

		wp_enqueue_script( 'dynamic-price-admin-script', PLUGIN_URL . 'assets/js/admin.js', array( 'jquery' ), '1.0.0', true );
		wp_localize_script( 'dynamic-price-admin-script', 'dynamic_price_obj_from_php', array(
			'rest_url' => rest_url( 'dynamic-price/v1' ),
			'nonce' => wp_create_nonce( 'wp_rest' ),
		) );
	}

	public function enqueue_frontend_scripts() {
		wp_enqueue_script( 'dynamic-price-frontend-script', PLUGIN_URL . 'assets/js/frontend.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_style( 'dynamic-price-frontend-style', PLUGIN_URL . 'assets/css/frontend.css' );
	}
}

