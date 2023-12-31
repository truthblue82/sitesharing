<?php
  function alchem_customize_importer_js() {
	// Import old version 
	global $pagenow,$alchem_upgrade_from_options;
	
	if( $pagenow == "customize.php" ){
	$themename = alchem_get_textdomain();
	$theme_options_version = 0;
	
	if( get_option($themename) && $alchem_upgrade_from_options == '0' ){
	$theme_options_version = 1;
	}
	$btn_documentation = __('View Documentation', 'alchem-pro');
	$btn_forum         = __('Support Forum', 'alchem-pro');
	$loading           = __('Loading', 'alchem-pro');
	$complete           = __('Complete', 'alchem-pro');
	$error           = __('Error', 'alchem-pro');
	$import_options  = __('Import Theme Options', 'alchem-pro');
	$transfer  = __('Click to transfer data from theme options to customizer.', 'alchem-pro');
	
    wp_enqueue_script( 'alchem-customize-importer', get_template_directory_uri() . '/admin/customizer-library/js/alchem-customizer.js', '', '' );
	wp_localize_script( 'alchem-customize-importer', 'alchem_params', array(
			'ajaxurl'        => admin_url('admin-ajax.php'),
			'themeurl' => get_template_directory_uri(),
			'theme_options_version' => $theme_options_version,
			'btn_documentation' => $btn_documentation,
			'btn_forum' => $btn_forum,
			'loading' => $loading,
			'complete' => $complete,
			'error' => $error,
			'import_options' =>$import_options,
			'transfer' =>$transfer,
		)  );
   }
  }
add_action( 'admin_enqueue_scripts', 'alchem_customize_importer_js' );

add_action( 'wp_ajax_alchem_otpions_customize', 'alchem_otpions_customize' );
add_action( 'wp_ajax_nopriv_alchem_otpions_customize', 'alchem_otpions_customize' );

 function alchem_otpions_customize(){
	 
	 $themename = alchem_get_textdomain();
	 $alchem_options = get_option($themename);
	 foreach( $alchem_options as $option_name => $option_value ){
		 
		 set_theme_mod ( 'alchem_'.$option_name, $option_value );
		 
		 }
		 set_theme_mod ( 'alchem_upgrade_from_options', '1' );
	 
	 }