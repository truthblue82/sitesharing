<?php
  function alchem_customize_importer_js() {
	// Import old version 
	global $pagenow;
	
	if( $pagenow == "customize.php" && !isset( $alchem_options['is_theme_mods']) ){
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	if( is_child_theme() ){	
		$themename = str_replace("_child","",$themename ) ;
		}
	if( defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE != 'en' )
	$themename = $themename.ICL_LANGUAGE_CODE;
	
	$theme_options_version = 0;
	$alchem_upgrade_from_options  = get_theme_mod( 'alchem_upgrade_from_options','0');
	if( get_option($themename) && $alchem_upgrade_from_options == '0' )
	$theme_options_version = 1;
    wp_enqueue_script( 'alchem-customize-importer', get_template_directory_uri() . '/admin/customizer-library/js/customize-importer.js', '', '' );
	wp_localize_script( 'alchem-customize-importer', 'alchem_params', array(
			'ajaxurl'        => admin_url('admin-ajax.php'),
			'themeurl' => get_template_directory_uri(),
			'theme_options_version' => $theme_options_version,
		)  );
	}
	//////
}
add_action( 'admin_enqueue_scripts', 'alchem_customize_importer_js' );

add_action( 'wp_ajax_alchem_otpions_customize', 'alchem_otpions_customize' );
add_action( 'wp_ajax_nopriv_alchem_otpions_customize', 'alchem_otpions_customize' );

 function alchem_otpions_customize(){
	 
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	if( is_child_theme() ){	
		$themename = str_replace("_child","",$themename ) ;
		}
	if( defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE != 'en' )
	$themename = $themename.ICL_LANGUAGE_CODE;
	
	 $alchem_options = get_option($themename);
	 foreach( $alchem_options as $option_name => $option_value ){
		 
		 set_theme_mod ( $option_name, $option_value );
		 
		 }
		 set_theme_mod ( 'alchem_upgrade_from_options', '1' );
	     exit(0);
	 }