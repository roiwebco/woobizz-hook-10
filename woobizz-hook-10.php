<?php
/*
Plugin Name: Woobizz Hook 10 
Plugin URI: http://woobizz.com
Description: Add Custom link and text on return to shop button
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.0
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
//Check if WooCommerce is active
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	//echo "woocommerce is active";
	add_filter( 'woocommerce_return_to_shop_redirect', 'woobizzhook10_empty_cart_redirect_url' );
}else{
	//Show message on admin
	//echo "woocommerce is not active";
	add_action( 'admin_notices', 'woobizzhook10_admin_notice' );
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
//Function translate button txt
add_filter(  'gettext',  'woobizzhook10_translate_words_array'  );
add_filter(  'ngettext',  'woobizzhook10_translate_words_array'  );
function woobizzhook10_translate_words_array( $translated ) {
	
	//Change you text here-------------------------------
	  $woobizzhook10_button_text="";
	//---------------------------------------------------
	
	if(empty($woobizzhook10_button_text)){
		//Show default text
	}else{
		$words = array(
                        // 'word to translate' = > 'translation'
							'Return To Shop' => $woobizzhook10_button_text,
                   );
     $translated = str_ireplace(  array_keys($words),  $words,  $translated );
     
	}     return $translated;
}
//Hook10 Notice
function woobizzhook10_admin_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e( 'Woobizz Hook 10 needs WooCommerce to work properly, If you do not use this plugin you can disable it!', 'woobizzhook10' ); ?></p>
    </div>
    <?php
}