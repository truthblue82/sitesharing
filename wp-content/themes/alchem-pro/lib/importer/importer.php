<?php
defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );
// Don't resize images
function alchem_filter_image_sizes( $sizes ) {
	return array();
}
// Hook importer into admin init
add_action( 'wp_ajax_magee_import_demo_data', 'magee_importer' );
function magee_importer() {
	global $wpdb;
    set_time_limit(0);
	if ( current_user_can( 'manage_options' ) ) {
		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true); // we are loading importers

		if ( ! class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
			$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			include $wp_importer;
		}

		if ( ! class_exists('WP_Import') ) { // if WP importer doesn't exist
			$wp_import = get_template_directory() . '/lib/importer/wordpress-importer.php';
			include $wp_import;
		}

		if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) { // check for main import class and wp import class
			if( ! isset($_POST['demo_type']) || trim($_POST['demo_type']) == '' ) {
				$demo_type = 'classic';
			} else {
				$demo_type = $_POST['demo_type'];
			}

			switch($demo_type) {
				case 'classic':
				default:
				
					$shop_demo = true;
					$woo_xml   = get_template_directory() . '/lib/importer/demos/classic/alchem-pro.xml';
					$theme_xml_file = get_template_directory() . '/lib/importer/demos/classic/alchem-pro.xml';
					$theme_options_file = get_template_directory() . '/lib/importer/demos/classic/theme_options.txt';


					// Sidebar Widgets File
					$widgets_file = get_template_directory() . '/lib/importer/demos/classic/widget_data.json';

					$layerslider_exists = true;
					$layer_directory = get_template_directory() . '/lib/importer/demos/classic/layersliders/';

					$revslider_exists = true;
					$rev_directory = get_template_directory() . '/lib/importer/demos/classic/revsliders/';

					// reading settings
					$homepage_title = 'Homepage';
					$posts_page_title='Blog';

			}

			add_filter('intermediate_image_sizes_advanced', 'alchem_filter_image_sizes');
			/* Import Woocommerce if WooCommerce Exists */
			if( class_exists('WooCommerce') && $shop_demo == true ) {
				$importer = new WP_Import();
				$theme_xml = $woo_xml;
				
				$importer->fetch_attachments = false;
				ob_start();
				$importer->import($theme_xml);
				ob_end_clean();

				// Set pages
				$woopages = array(
					'woocommerce_shop_page_id' => 'Shop',
					'woocommerce_cart_page_id' => 'Cart',
					'woocommerce_checkout_page_id' => 'Checkout',
					'woocommerce_pay_page_id' => 'Checkout &#8594; Pay',
					'woocommerce_thanks_page_id' => 'Order Received',
					'woocommerce_myaccount_page_id' => 'My Account',
					'woocommerce_edit_address_page_id' => 'Edit My Address',
					'woocommerce_view_order_page_id' => 'View Order',
					'woocommerce_change_password_page_id' => 'Change Password',
					'woocommerce_logout_page_id' => 'Logout',
					'woocommerce_lost_password_page_id' => 'Lost Password'
				);
				foreach($woopages as $woo_page_name => $woo_page_title) {
					$woopage = get_page_by_title( $woo_page_title );
					if(isset( $woopage ) && $woopage->ID) {
						update_option($woo_page_name, $woopage->ID); // Front Page
					}
				}

				// We no longer need to install pages
				delete_option( '_wc_needs_pages' );
				delete_transient( '_wc_activation_redirect' );

				// Flush rules after install
				flush_rewrite_rules();
			} else {
				$importer = new WP_Import();
				/* Import Posts, Pages, Portfolio Content, FAQ, Images, Menus */
				$theme_xml = $theme_xml_file;
				$importer->fetch_attachments = false;
				ob_start();
				$importer->import($theme_xml);
				ob_end_clean();

				flush_rewrite_rules();
			}

			// Set imported menus to registered theme locations
			$locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
			$menus = wp_get_nav_menus(); // registered menus

			if($menus) {
				if( $demo_type == 'classic' ) {
					$opmenu = get_page_by_title( 'Homepage - One page' );
				}
				foreach($menus as $menu) { // assign menus to theme locations
					if( $demo_type == 'classic' ) {
						if( $menu->name == 'All Pages' ) {
							$locations['primary'] = $menu->term_id;
						} else if( $menu->name == 'one-page-menu' ) {
							$locations['custom_menu_1'] = $menu->term_id;
						} 

						// Assign One Page Menu
						if(isset( $opmenu ) && $opmenu->ID && $menu->name == 'one-page-menu') {
							update_post_meta($opmenu->ID, 'nav_menu', $menu->term_id);
						}
					} 
					}
				}
			}

			set_theme_mod( 'nav_menu_locations', $locations ); // set menus to locations

			// Import Theme Options
			$theme_options_txt = $theme_options_file; // theme options data file
			//if( file_exists( $theme_options_txt ) ){
			$theme_options_txt = file_get_contents( $theme_options_txt );
			$options_data      = unserialize( base64_decode( $theme_options_txt )  );
			update_option( 'alchem_pro', $options_data ); // update theme options
			 foreach( $alchem_options as $option_name => $option_value ){
				 set_theme_mod ( $option_name, $option_value );
				 }
				 set_theme_mod ( 'alchem_upgrade_from_options', '1' );
			//}
			

			// Add data to widgets
			if( isset( $widgets_file ) && $widgets_file ) {
				$widgets_json = $widgets_file; // widgets data file
				$widgets_json = file_get_contents( $widgets_json );
				$widget_data = $widgets_json;
				$import_widgets = magee_import_widget_data( $widget_data );
			}

			// Import Layerslider
			if( function_exists( 'layerslider_import_sample_slider' ) && $layerslider_exists == true ) { // if layerslider is activated
				// Get importUtil
				include WP_PLUGIN_DIR . '/LayerSlider/classes/class.ls.importutil.php';

				$layer_files = magee_get_import_files( $layer_directory, 'zip' );

				foreach( $layer_files as $layer_file ) { // finally import layer slider
					$import = new LS_ImportUtil($layer_file);
				}

				// Get all sliders
				// Table name
				$table_name = $wpdb->prefix . "layerslider";

				// Get sliders
				$sliders = $wpdb->get_results( "SELECT * FROM $table_name
													WHERE flag_hidden = '0' AND flag_deleted = '0'
													ORDER BY date_c ASC" );

				if(!empty($sliders)):
				foreach($sliders as $key => $item):
					$slides[$item->id] = $item->name;
				endforeach;
				endif;

				if($slides){
					foreach($slides as $key => $val){
						$slides_array[$val] = $key;
					}
				}

				// Assign LayerSlider
				/*if( $demo_type == 'classic' ) {
					
					$lspage = get_page_by_title( 'Layer Slider' );
					if(isset( $lspage ) && $lspage->ID && $slides_array['Avada Full Width']) {
						update_post_meta($lspage->ID, 'pyre_slider', $slides_array['Avada Full Width']);
					}
				}*/
			}

			// Import Revslider
			if( class_exists('UniteFunctionsRev') && $revslider_exists == true ) { // if revslider is activated
				$rev_files = magee_get_import_files( $rev_directory, 'zip' );

				$slider = new RevSlider();
				foreach( $rev_files as $rev_file ) { // finally import rev slider data files

					$filepath = $rev_file;
					
					$_FILES["import_file"]["tmp_name"] = $filepath;

					ob_start();
					$slider->importSliderFromPost(true, false, $filepath);
					ob_clean();
					ob_end_clean();
				}
			}

			

			// Set reading options
			$homepage = get_page_by_title( $homepage_title );
			$posts_page = get_page_by_title( $posts_page_title );
			
			if(isset( $homepage ) && $homepage->ID && isset( $posts_page ) && $posts_page->ID ) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
				update_option('page_for_posts', $posts_page->ID); // Blog Page
			}


			echo 'imported';

			exit;
		
	}
}

// Parsing Widgets Function
// Thanks to http://wordpress.org/plugins/widget-settings-importexport/
function magee_import_widget_data( $widget_data ) {
	$json_data = $widget_data;
	$json_data = json_decode( $json_data, true );

	$sidebar_data = $json_data[0];
	$widget_data  = $json_data[1];

	foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
		$widgets[ $widget_data_title ] = '';
		foreach( $widget_data_value as $widget_data_key => $widget_data_array ) {
			if( is_int( $widget_data_key ) ) {
				$widgets[$widget_data_title][$widget_data_key] = 'on';
			}
		}
	}
	unset($widgets[""]);

	foreach ( $sidebar_data as $title => $sidebar ) {
		$count = count( $sidebar );
		for ( $i = 0; $i < $count; $i++ ) {
			$widget = array( );
			$widget['type']       = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
			$widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
			if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
				unset( $sidebar_data[$title][$i] );
			}
		}
		$sidebar_data[$title] = array_values( $sidebar_data[$title] );
	}

	foreach ( $widgets as $widget_title => $widget_value ) {
		foreach ( $widget_value as $widget_key => $widget_value ) {
			$widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
		}
	}

	$sidebar_data = array( array_filter( $sidebar_data ), $widgets );

	magee_parse_import_data( $sidebar_data );
}

function magee_parse_import_data( $import_array ) {
	global $wp_registered_sidebars;
	$alchem_sidebars_data    = $import_array[0];
	$widget_data      = $import_array[1];
	$current_sidebars = get_option( 'sidebars_widgets' );
	$new_widgets      = array( );

	foreach ( $alchem_sidebars_data as $import_sidebar => $import_widgets ) :

		foreach ( $import_widgets as $import_widget ) :
			//if the sidebar exists
			if ( isset( $wp_registered_sidebars[$import_sidebar] ) ) :
				$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
				$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
				$current_widget_data = get_option( 'widget_' . $title );
				$new_widget_name     = magee_get_new_widget_name( $title, $index );
				$new_index           = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

				if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
					while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
						$new_index++;
					}
				}
				$current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
				if ( array_key_exists( $title, $new_widgets ) ) {
					$new_widgets[$title][$new_index] = $widget_data[$title][$index];
					$multiwidget = $new_widgets[$title]['_multiwidget'];
					unset( $new_widgets[$title]['_multiwidget'] );
					$new_widgets[$title]['_multiwidget'] = $multiwidget;
				} else {
					$current_widget_data[$new_index] = $widget_data[$title][$index];
					$current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
					$new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
					$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
					unset( $current_widget_data['_multiwidget'] );
					$current_widget_data['_multiwidget'] = $multiwidget;
					$new_widgets[$title] = $current_widget_data;
				}

			endif;
		endforeach;
	endforeach;

	if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
		update_option( 'sidebars_widgets', $current_sidebars );

		foreach ( $new_widgets as $title => $content )
			update_option( 'widget_' . $title, $content );

		return true;
	}

	return false;
}

function magee_get_new_widget_name( $widget_name, $widget_index ) {
	$current_sidebars = get_option( 'sidebars_widgets' );
	$all_widget_array = array( );
	foreach ( $current_sidebars as $sidebar => $widgets ) {
		if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
			foreach ( $widgets as $widget ) {
				$all_widget_array[] = $widget;
			}
		}
	}
	while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
		$widget_index++;
	}
	$new_widget_name = $widget_name . '-' . $widget_index;
	return $new_widget_name;
}

if( function_exists( 'layerslider_import_sample_slider' ) ) {
	function alchem_import_sample_slider( $layerslider_data ) {
		// Base64 encoded, serialized slider export code
		$sample_slider = $layerslider_data;

		// Iterate over the sliders
		foreach($sample_slider as $sliderkey => $slider) {

			// Iterate over the layers
			foreach($sample_slider[$sliderkey]['layers'] as $layerkey => $layer) {

				// Change background images if any
				if(!empty($sample_slider[$sliderkey]['layers'][$layerkey]['properties']['background'])) {
					$sample_slider[$sliderkey]['layers'][$layerkey]['properties']['background'] = LS_ROOT_URL.'sampleslider/'.basename($layer['properties']['background']);
				}

				// Change thumbnail images if any
				if(!empty($sample_slider[$sliderkey]['layers'][$layerkey]['properties']['thumbnail'])) {
					$sample_slider[$sliderkey]['layers'][$layerkey]['properties']['thumbnail'] = LS_ROOT_URL.'sampleslider/'.basename($layer['properties']['thumbnail']);
				}

				// Iterate over the sublayers
				if(isset($layer['sublayers']) && !empty($layer['sublayers'])) {
					foreach($layer['sublayers'] as $sublayerkey => $sublayer) {

						// Only IMG sublayers
						if($sublayer['type'] == 'img') {
							$sample_slider[$sliderkey]['layers'][$layerkey]['sublayers'][$sublayerkey]['image'] = LS_ROOT_URL.'sampleslider/'.basename($sublayer['image']);
						}
					}
				}
			}
		}

		// Get WPDB Object
		global $wpdb;

		// Table name
		$table_name = $wpdb->prefix . "layerslider";

		// Append duplicate
		foreach($sample_slider as $key => $val) {

			// Insert the duplicate
			$wpdb->query(
				$wpdb->prepare("INSERT INTO $table_name
									(name, data, date_c, date_m)
								VALUES (%s, %s, %d, %d)",
								$val['properties']['title'],
								json_encode($val),
								time(),
								time()
				)
			);
		}
	}
}

// Rename sidebar
function alchem_name_to_class($name){
	$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
	return $class;
}



/*
* Returns all files in directory with the given filetype. Uses glob() for older
* php versions and recursive directory iterator otherwise.
*
* @param string $directory Directory that should be parsed
* @param string $filetype The file type
*
* @return array $files File names that match the $filetype
*/
function magee_get_import_files( $directory, $filetype ) {
	$phpversion = phpversion();
	$files = array();

	// Check if the php version allows for recursive iterators
	if ( version_compare( $phpversion, '5.2.11', '>' ) ) {
		if ( $filetype != '*' )  {
			$filetype = '/^.*\.' . $filetype . '$/';
		} else {
			$filetype = '/.+\.[^.]+$/';
		}
		$directory_iterator = new RecursiveDirectoryIterator( $directory );
		$recusive_iterator = new RecursiveIteratorIterator( $directory_iterator );
		$regex_iterator = new RegexIterator( $recusive_iterator, $filetype );

		foreach( $regex_iterator as $file ) {
			$files[] = $file->getPathname();
		}
	// Fallback to glob() for older php versions
	} else {
		if ( $filetype != '*' )  {
			$filetype = '*.' . $filetype;
		}

		foreach( glob( $directory . $filetype ) as $filename ) {
			$filename = basename( $filename );
			$files[] = $directory . $filename;
		}
	}

	return $files;
}

// Omit closing PHP tag to avoid "Headers already sent" issues.
