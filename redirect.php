<?php	
/*
Plugin Name: WooCommerce Login Redirect
Plugin URI: https://github.com/nayemDevs/woocommerce-login-redirect
Description: This is a plugin for WooCommerce
Version: 1.0
Author: Nayem
Author URI: nayemdevs.com
License: GPL2
*/



// redirect to specific page after login
add_filter('woocommerce_login_redirect', 'wcs_login_redirect');
function wcs_login_redirect( $redirect ) {
     $redirect = 'http://google.com/';
     return $redirect;
}

// Custom redirect for users after registration 
add_filter('woocommerce_registration_redirect', 'wcs_register_redirect');
function wcs_register_redirect( $redirect ) {
     $redirect = 'http://google.com/';
     return $redirect;
}


?>
