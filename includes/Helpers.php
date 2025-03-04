<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Dynamic_Price_Helpers {

	public static function get_template_part( $slug, $name = null ) {
		// Build the template path
		$template = PLUGIN_DIR . 'templates/' . $slug;
		if ( $name ) {
			$template .= "-{$name}.php";
		} else {
			$template .= '.php';
		}

		// Check if the template exists and include it
		if ( file_exists( $template ) ) {
			include $template;
		} else {
			// Optionally log or handle missing template errors
			error_log( "Template not found: {$template}" );
		}
	}
}
