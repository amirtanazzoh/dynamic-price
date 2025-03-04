<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Dynamic_Price_Menu {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
	}

	public function add_admin_menu() {
		add_menu_page( 'Dynamic Price', 'Dynamic Price', 'manage_options', 'dynamic-price', array( $this, 'render_admin_page' ), 'dashicons-admin-tools', 2 );
	}

	public function render_admin_page() {
		return Dynamic_Price_Helpers::get_template_part( 'admin-page' );
	}
}

