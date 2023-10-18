<?php
/**
 * Plugin Name: Elementor Test
 * Description: Lorem ipsum dolor sit amet consectetur adipisicing elit.
 * Plugin URI:  https://promasudbd.com/
 * Version:     1.0.0
 * Author:      masud rana
 * Author URI:  https://promasudbd.com/
 * Text Domain: elementor-test
 */
use \Elementor_Test\Elementor_Test as Elementor_Test;

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function elementor_test_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	Elementor_Test::instance();

}
add_action( 'plugins_loaded', 'elementor_test_addon' );

