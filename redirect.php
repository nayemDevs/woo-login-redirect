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

   //general settings of woocommerce
add_filter( 'woocommerce_general_settings', 'redirect_menu' );

function redirect_menu( $settings ) {

			 $updated_settings = array();



  foreach ( $settings as $section ) {



    // at the bottom of the General Options section

    if ( isset( $section['id'] ) && 'general_options' == $section['id'] &&

       isset( $section['type'] ) && 'sectionend' == $section['type'] ) {



      $updated_settings[] = array(

                    'title'    => __( 'Login Redirect', 'woocommerce' ),
                    'desc'     => __( 'Redirect user after login', 'woocommerce' ),
                    'id'       => 'login_redirect_page_id',
                    'type'     => 'single_select_page',
                    'default'  => '',
                    'class'    => 'wc-enhanced-select',
                    'css'      => 'min-width:300px;',
                    'desc_tip' => true
        );               
            
       $updated_settings[] = array(

                    'title'    => __( 'Registration Redirect', 'woocommerce' ),
                    'desc'     => __( 'Redirect user after registration', 'woocommerce' ),
                    'id'       => 'reg_redirect_page_id',
                    'type'     => 'single_select_page',
                    'default'  => '',
                    'class'    => 'wc-enhanced-select',
                    'css'      => 'min-width:300px;',
                    'desc_tip' => true
        );

    }
    
    $updated_settings[] = $section;

  }

  return $updated_settings;

}

// redirect to specific page after login

add_filter('woocommerce_login_redirect', 'wcs_login_redirect');
function wcs_login_redirect( $redirect ) {
     $redirect = get_permalink( get_option( 'login_redirect_page_id') );
     return $redirect;
}

// Custom redirect for users after registration 

add_filter('woocommerce_registration_redirect', 'wcs_register_redirect');
function wcs_register_redirect( $redirect ) {
     $redirect = get_permalink( get_option( 'reg_redirect_page_id') );
     return $redirect;
}


?>
