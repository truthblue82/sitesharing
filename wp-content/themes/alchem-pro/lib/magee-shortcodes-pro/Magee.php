<?php
/*
  Plugin Name: Magee Shortcodes Pro
  Plugin URI: http://www.mageewp.com/magee-shortcode.html
  Description: Magee Shortcodes is WordPress plugin that provides a pack of shortcodes. With Magee Shortcodes, you can easily create accordion, buttons, boxes, columns, social and much more. They allow you to create so many different page layouts. You could quickly and easily built your own custom pages using all the various shortcodes that Magee Shortcodes includes.
  Version: 2.3.2
  Author: MageeWP
  Author URI: http://www.mageewp.com
  Text Domain: magee-shortcodes-pro
  Domain Path: /languages
  License: GPLv2 or later
*/
if ( ! defined( 'ABSPATH' ) ) return;
if(!class_exists('Magee_Core') && !defined( 'MAGEE_SHORTCODE_LIB_DIR') ):
	  $theme_info = wp_get_theme();
	  $text_domain = $theme_info->get('TextDomain');
	  $post_type  = 'magee_portfolio';
	  if( $text_domain == 'onetone' )
	  $post_type   = 'portfolio';
	  if( $text_domain == 'alchem' )
	  $post_type   = 'alchem_portfolio';
	  define( 'MAGEE_THEME_MODE',true);
      define( 'MAGEE_CHILD_THEME_MODE',false);
	  define('MAGEE_PORTFOLIO', $post_type );
	  
	 // define( 'MAGEE_SHORTCODES_PATH', __FILE__ );
	 //define( 'MAGEE_SHORTCODES_DIR_PATH',  plugin_dir_path( __FILE__ ));
	  define( 'MAGEE_SHORTCODES_VER', '2.3.1' );
	  define( 'MAGEE_DATE_FORMAT','');
	  define( 'MAGEE_DISPLAY_IMAGE','yes');
      define( 'MAGEE_PORTFOLIO_SLUG','portfolio');
	  define( 'MAGEE_TEXT_DOMAIN',$text_domain);
	  define( 'MAGEE_EXCERPT_OR_CONTENT','excerpt');
	  define( 'MAGEE_EXCERPT_LENGTH',55);
	  if ( false == MAGEE_THEME_MODE && false == MAGEE_CHILD_THEME_MODE ) {
        define( 'MAGEE_DIR', plugin_dir_path( __FILE__ ) );
        define( 'MAGEE_URL', plugin_dir_url( __FILE__ ) );
      } else {
        if ( true == MAGEE_CHILD_THEME_MODE ) {
          $path = @ltrim( @end( @explode( get_stylesheet(), str_replace( '\\', '/', dirname( __FILE__ ) ) ) ), '/' );
          define( 'MAGEE_DIR', trailingslashit( trailingslashit( get_stylesheet_directory() ) . $path ) );
          define( 'MAGEE_URL', trailingslashit( trailingslashit( get_stylesheet_directory_uri() ) . $path ) );
        } else {
          $path = @ltrim( @end( @explode( get_template(), str_replace( '\\', '/', dirname( __FILE__ ) ) ) ), '/' );
          define( 'MAGEE_DIR', trailingslashit( trailingslashit( get_template_directory() ) . $path ) );
          define( 'MAGEE_URL', trailingslashit( trailingslashit( get_template_directory_uri() ) . $path ) );
        }
      }
      
 require_once 'inc/core.php';
 if( !function_exists('magee_slider_register') )
 require_once 'inc/magee-slider.php';
 //add_action( 'after_setup_theme', array( 'Magee_Core', 'get_instance' ) );
 new Magee_Core;
 add_filter( 'the_content', array('Magee_Core','fix_shortcodes') );
 add_filter( 'the_content', array('Magee_Core','unrecognize_shortcodes') );
 
 function magee_deactivate_plugin_conditional() {
    if ( is_plugin_active('magee-shortcodes/Magee.php') ) {
    deactivate_plugins('magee-shortcodes/Magee.php');    
    }
}
add_action( 'admin_init', 'magee_deactivate_plugin_conditional' );
 endif;