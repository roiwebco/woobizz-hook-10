<?php
/*
Plugin Name: Woobizz Hook 10 
Plugin URI: http://woobizz.com
Description: Add custom link to return to shop button
Author: WOOBIZZ.COM
Author URI: http://woobizz.com
Version: 1.0.1
Text Domain: woobizzhook10
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook10_load_textdomain' );
function woobizzhook10_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook10', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Add Hook 10 
//Function Empty cart redirect
function woobizzhook10_empty_cart_redirect_url() {
	
	//Change you link here-------------------------------
	  $woobizzhook10_button_link="/";
	//---------------------------------------------------
	
	$location = get_site_url() .$woobizzhook10_button_link; 
	return $location;
}
add_filter( 'woocommerce_return_to_shop_redirect', 'woobizzhook10_empty_cart_redirect_url' );