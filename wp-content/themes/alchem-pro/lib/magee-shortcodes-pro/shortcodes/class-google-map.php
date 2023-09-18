<?php
if( !class_exists('Magee_GoogleMap') ):
class Magee_GoogleMap {

	private $map_id;

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

		add_filter( 'magee_attr_google-map-shortcode', array( $this, 'attr' ) );
		add_shortcode( 'ms_google_map', array( $this, 'render' ) );
       
	}

	/**
	 * Render the shortcode
	 * @param  array $args	 Shortcode paramters
	 * @param  string $content Content between shortcode
	 * @return string		  HTML output
	 */
	function render( $args, $content = '' ) {
		global $magee_options;

		$defaults = Magee_Core::set_shortcode_defaults(
			array(
				'class'						=> '',
				'id'						=> '',
				'animation'					=> 'no',
				'address'					=> '',
				'height'					=> '300px',				
				'icon'						=> '',
				'infobox'					=> 'custom',
				'infobox_background_color'	=> '',
				'infobox_content'			=> '',
				'infobox_text_color'		=> '',
				'map_style'					=> 'custom',
				'overlay_color'				=> '',
				'popup'						=> 'yes',
				'scale'						=> 'yes',				
				'scrollwheel'				=> 'yes',				
				'type'						=> 'roadmap',
				'width'						=> '100%',
				'zoom'						=> '14',
				'zoom_pancontrol'			=> 'yes',
				'api_key'			=> '',
			), $args
		);
		

		extract( $defaults );
		
		if( $api_key == '' )
		$api_key = isset($magee_options['magee_gmap_api'])?$magee_options['magee_gmap_api']:'';

		self::$args = $defaults;
        $map_api = 'http' . ( ( is_ssl() ) ? 's' : '' ) . '://maps.googleapis.com/maps/api/js?key='.trim($api_key).'&amp;sensor=false&amp;language=' . substr(get_locale(), 0, 2);
		wp_enqueue_script( 'google-maps-api', $map_api, array(), '', false );
		wp_enqueue_script( 'google-maps-infobox', MAGEE_URL.'assets/js/infobox.js', array(), '', false);
		wp_enqueue_script( 'magee-map',MAGEE_URL.'assets/js/jquery.magee_maps.js', array(), '', false); 
		$html = '';
		if( $address ) {
			$addresses = explode( '|', $address );
			
			if( $addresses ) {
				self::$args['address'] = $addresses;
			}
			
			$num_of_addresses = count( $addresses );			

			if( $infobox_content ) {
				$infobox_content_array = explode( '|', $infobox_content );
			} else {
				$infobox_content_array = '';
			}
			
			if( $icon ) {
				$icon_array = explode( '|', $icon );
			} else {
				$icon_array = '';
			}		
		
			if( $map_style == 'theme' ) {
				$map_style = 'custom';
				$icon = 'theme';
				$animation = 'yes';
				$infobox = 'custom';
				$infobox_background_color = Magee_Core::hex2rgb( $magee_options['scheme'] );
				$infobox_background_color = 'rgba(' . $infobox_background_color[0] . ', ' . $infobox_background_color[1] . ', ' . $infobox_background_color[2] . ', 0.8)';
				$overlay_color = $magee_options['scheme'];
				$brightness_level = Magee_Core::calc_color_brightness( $magee_options['scheme'] );

				if( $brightness_level > 140 ) {
					$infobox_text_color = '#fff';
				} else {
					$infobox_text_color = '#747474';
				}				
			}
			
			// If only one custom icon is set, use it for all markers
			if ( $map_style == 'custom' && $icon && $icon != 'theme' && $icon_array && count( $icon_array ) == 1 ) {
				$icon_url = $icon_array[0];
				for ( $i = 0; $i < $num_of_addresses; $i++ ) {
					$icon_array[$i] = $icon_url;				
				}
			}				
			
			if( $icon == 'theme' && $map_style == 'custom' ) {
				for( $i = 0; $i < $num_of_addresses; $i++ ) {
					$icon_array[$i] = MAGEE_THEME_URI. 'images/avada_map_marker.png';				
				}
			}			

			wp_print_scripts( 'google-maps-api' );
			wp_print_scripts( 'google-maps-infobox' );
			wp_print_scripts( 'magee-map' );
			

			foreach( self::$args['address'] as $add ) {

				$add = trim( $add );
				$add_arr = explode( "\n", $add );
				$add_arr = array_filter( $add_arr, 'trim' );
				$add = implode( '<br/>', $add_arr );
				$add = str_replace( "\r", '', $add );
				$add = str_replace( "\n", '', $add );

				$coordinates[]['address'] = $add;
			}

			if( ! is_array( $coordinates ) ) {
				return;
			}
			
			for( $i = 0; $i < $num_of_addresses; $i++ ) {
				if( strpos( self::$args['address'][$i], 'latlng=' ) === 0 ) {
					self::$args['address'][$i] = $coordinates[$i]['address'];
				}
			}
			
			if( is_array( $infobox_content_array ) && 
				! empty( $infobox_content_array ) 
			) {
				for( $i = 0; $i < $num_of_addresses; $i++ ) {
					if( ! array_key_exists( $i, $infobox_content_array ) ) {
						$infobox_content_array[$i] = self::$args['address'][$i];
					}
				}
				self::$args['infobox_content'] = $infobox_content_array;
			} else {
				self::$args['infobox_content'] = self::$args['address'];
			}

			$cached_addresses = get_option( 'magee_map_addresses' );

			foreach( self::$args['address'] as $key => $address ) {
				$json_addresses[] = array(
					'address' => $address,
					'infobox_content' => self::$args['infobox_content'][$key]
				);

				if( isset( $icon_array ) && is_array( $icon_array ) ) {
					$json_addresses[$key]['marker'] = $icon_array[$key];
				}

				if( strpos( $address, strtolower( 'latlng=' ) ) !== false ) {
					$json_addresses[$key]['address'] = str_replace( 'latlng=', '', $address );
					$latLng = explode(',', $json_addresses[$key]['address']);
					$json_addresses[$key]['coordinates'] = true;
					$json_addresses[$key]['latitude'] = $latLng[0];
					$json_addresses[$key]['longitude'] = $latLng[1];
					$json_addresses[$key]['cache'] = false;

					if( strpos( self::$args['infobox_content'][$key], strtolower( 'latlng=' ) ) !== false ) {
						$json_addresses[$key]['infobox_content'] = '';
					}

					if( isset( $cached_addresses[ trim( $json_addresses[$key]['latitude'] . ',' . $json_addresses[$key]['longitude'] ) ] ) ) {
						$json_addresses[$key]['geocoded_address'] = $cached_addresses[ trim( $json_addresses[$key]['latitude'] . ',' . $json_addresses[$key]['longitude'] ) ]['address'];
						$json_addresses[$key]['cache'] = true;
					}
				} else {
					$json_addresses[$key]['coordinates'] = false;
					$json_addresses[$key]['cache'] = false;

					if( isset( $cached_addresses[ trim( $json_addresses[$key]['address'] ) ] ) ) {
						$json_addresses[$key]['latitude'] = $cached_addresses[ trim( $json_addresses[$key]['address'] ) ]['latitude'];
						$json_addresses[$key]['longitude'] = $cached_addresses[ trim( $json_addresses[$key]['address'] ) ]['longitude'];
						$json_addresses[$key]['cache'] = true;					
					}
				}
			}

			$json_addresses = json_encode( $json_addresses );

			$map_id = uniqid( 'magee_map_' ); // generate a unique ID for this map
			$this->map_id = $map_id;

			ob_start(); ?>
			<script type="text/javascript">
			   var map_<?php echo $map_id; ?>;
				var markers = [];
				var counter = 0;
				function magee_run_map_<?php echo $map_id ; ?>() {
					jQuery('#<?php echo $map_id ; ?>').magee_maps({
						addresses: <?php echo $json_addresses; ?>,
						animations: <?php echo ($animation == 'yes') ? 'true' : 'false'; ?>,
						infobox_background_color: '<?php echo $infobox_background_color; ?>',
						infobox_styling: '<?php echo $infobox; ?>',
						infobox_text_color: '<?php echo $infobox_text_color; ?>',
						map_style: '<?php echo $map_style; ?>',
						map_type: '<?php echo $type; ?>',
						marker_icon: '<?php echo $icon; ?>',
						overlay_color: '<?php echo $overlay_color; ?>',
						overlay_color_hsl: <?php echo json_encode( Magee_Core::rgb2hsl( $overlay_color ) ); ?>,
						pan_control: <?php echo ($zoom_pancontrol == 'yes') ? 'true' : 'false'; ?>,
						show_address: <?php echo ($popup == 'yes') ? 'true' : 'false'; ?>,
						scale_control: <?php echo ($scale == 'yes') ? 'true' : 'false'; ?>,
						scrollwheel: <?php echo ($scrollwheel == 'yes') ? 'true' : 'false'; ?>,
						zoom: <?php echo $zoom; ?>,
						zoom_control: <?php echo ($zoom_pancontrol == 'yes') ? 'true' : 'false'; ?>,
					});
				}
				google.maps.event.addDomListener(window, 'load', magee_run_map_<?php echo $map_id ; ?>);	
			</script>
			<?php
			
			if( $defaults['id'] ) {
				$html .= ob_get_clean() . sprintf( '<div id="%s"><div %s></div></div>', $defaults['id'], Magee_Core::attributes( 'google-map-shortcode' ) );
			} else {
				$html .= ob_get_clean() . sprintf( '<div %s></div>', Magee_Core::attributes( 'google-map-shortcode' ) );
				
			}

		}

		return $html;

	}

	function attr() {
	
		$attr['class'] = 'shortcode-map magee-google-map';

		if( self::$args['class'] ) {
			$attr['class'] .= ' ' . self::$args['class'];
		}

		$attr['id'] = $this->map_id;
		
		$attr['style'] = sprintf('height:%s;width:%s;',  self::$args['height'], self::$args['width'] );

		return $attr;

	}

	function get_coordinates( $address, $force_refresh = false ) {
		global $smof_data;

		$key = $smof_data['google_console_api_key'];

		$address_hash = md5( $address );

		$coordinates = get_transient( $address_hash );

		if ( $force_refresh || 
			 $coordinates === false
		) {

			if( strpos( $address, 'latlng=' ) === 0 ) {
				$args = array( 'latlng' => urlencode( substr( $address, 7 ) ), 'sensor' => 'false' );
			}else {
				$args = array( 'address' => urlencode( $address ), 'sensor' => 'false' );
			}

			$url = 'http://maps.googleapis.com/maps/api/geocode/json';
			if( $key ) {
				$args['key'] = $key;
				$url = 'https://maps.googleapis.com/maps/api/geocode/json';
			}
			$url		= add_query_arg( $args, $url );
		 	$response 	= wp_remote_get( $url );

		 	if( is_wp_error( $response ) )
		 		return;

		 	$data = wp_remote_retrieve_body( $response );

		 	if( is_wp_error( $data ) )
		 		return;

			if ( $response['response']['code'] == 200 ) {

				$data = json_decode( $data );

				if ( $data->status === 'OK' ) {

				  	$coordinates = $data->results[0]->geometry->location;

				  	$cache_value['lat'] 	= $coordinates->lat;
				  	$cache_value['lng'] 	= $coordinates->lng;
				  	$cache_value['address'] = (string) $data->results[0]->formatted_address;

				  	// cache coordinates for 3 months
				  	set_transient($address_hash, $cache_value, 3600*24*30*3);
				  	$data = $cache_value;

				} elseif ( $data->status === 'ZERO_RESULTS' ) {
				  	return __( 'No location found for the entered address.', 'magee-shortcodes-pro');
				} elseif( $data->status === 'INVALID_REQUEST' ) {
				   	return __( 'Invalid request. Did you enter an address?', 'magee-shortcodes-pro');
				} else {
					return __( 'Something went wrong while retrieving your map, please ensure you have entered the short code correctly.', 'magee-shortcodes-pro');
				}

			} else {
			 	return __( 'Unable to contact Google API service.', 'magee-shortcodes-pro');
			}

		} else {
		   // return cached results
		   $data = $coordinates;
		}

		return $data;

	}

}

new Magee_GoogleMap();
endif;