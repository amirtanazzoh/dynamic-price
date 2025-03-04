<?php
/*
 * Plugin Name:       Dynamic Price
 * Plugin URI:        https://github.com/amirtanazzoh/dynamic-price
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Amir Tanazzoh
 * Author URI:        https://github.com/amirtanazzoh
 * License:           GPL v2 or later
 * Text Domain:       dynamic-price
 * Domain Path:       /languages
 * Requires Plugins:  woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// includes classes
require_once PLUGIN_DIR . 'includes/Helpers.php';
require_once PLUGIN_DIR . 'includes/assets.php';
require_once PLUGIN_DIR . 'includes/api.php';
require_once PLUGIN_DIR . 'includes/show-price.php';
require_once PLUGIN_DIR . 'includes/shortcode.php';
require_once PLUGIN_DIR . 'includes/dynamic-price-menu.php';
require_once PLUGIN_DIR . 'includes/rest-api.php';

// initialize classes
$dynamic_price_api = new Dynamic_Price_API();
$dynamic_price_show_price = new Dynamic_Price_Show_Price();
$dynamic_price_shortcode = new Dynamic_Price_Shortcode();
$dynamic_price_menu = new Dynamic_Price_Menu();
$dynamic_price_assets = new Dynamic_Price_Assets();
$dynamic_price_rest_api = new Dynamic_Price_Rest_API();


