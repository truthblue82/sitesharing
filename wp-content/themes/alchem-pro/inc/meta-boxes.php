<?php


 function magee_sliders_meta(){
	 $magee_sliders[] = array(
            'label'       => __( 'Select a slider', 'alchem-pro' ),
            'value'       => ''
          );
	$alchem_custom_slider = new WP_Query( array( 'post_type' => 'magee_slider', 'post_status'=>'publish', 'posts_per_page' => -1 ) );
	while ( $alchem_custom_slider->have_posts() ) {
		$alchem_custom_slider->the_post();

		$magee_sliders[] = array(
            'label'       => get_the_title(),
            'value'       => get_the_ID()
          );
	}
	wp_reset_postdata();
	return $magee_sliders;
	 }
	 
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'alchem_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function alchem_meta_boxes() {
	
	global $wpdb, $wp_registered_sidebars;
/************ layerslider *************/
$layer_slides_array[] = array(
            'label'       => __( 'Select a slider', 'alchem-pro' ),
            'value'       => ''
          );
if(defined('LS_PLUGIN_VERSION') || isset($GLOBALS['lsPluginPath'])) {
$table_name = $wpdb->prefix . "layerslider";
// Get sliders
$layer_sliders = $wpdb->get_results( "SELECT * FROM $table_name
									WHERE flag_hidden = '0' AND flag_deleted = '0'
									ORDER BY date_c ASC" );


if(isset($layer_sliders) && $layer_sliders){
foreach($layer_sliders as $key => $val){
	$layer_slides_array[] = array(
            'label'       => $val->name,
            'value'       => $val->id
          );
    }
  }
}


/************ revslider *************/
$revsliders[] = array(
            'label'       => __( 'Select a slider', 'alchem-pro' ),
            'value'       => ''
          );
if(function_exists('rev_slider_shortcode')) {
	$get_sliders = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'revslider_sliders');
	if($get_sliders) {
		foreach($get_sliders as $slider) {
			$revsliders[] = array(
            'label'       => $slider->title,
            'value'       => $slider->alias
          );
			
		}
	}
}
/************ Magee Sliders*************/

$magee_sliders = magee_sliders_meta();

/************ get nav menus*************/
 
$nav_menus[] = array(
            'label'       => __( 'Default', 'alchem-pro' ),
            'value'       => ''
          );
$menus = get_registered_nav_menus();

foreach ( $menus as $location => $description ) {
$nav_menus[] = array(
            'label'       => $description,
            'value'       => $location
          );
	
}
/* sidebars */

$alchem_sidebars[] = array(
            'label'       => __( 'Default', 'alchem-pro' ),
            'value'       => ''
          );

foreach( $wp_registered_sidebars as $key => $value){
	
	$alchem_sidebars[] = array(
            'label'       => $value['name'],
            'value'       => $value['id'],
          );
	}
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */


   $portfolio_meta_box = array(
    'id'          => 'portfolio_meta_box',
    'title'       => __( 'Portfolio Meta Box', 'alchem-pro' ),
    'desc'        => '',
    'pages'       => array( 'alchem_portfolio' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
						   
	  array(
        'label'       => __( 'General Options', 'alchem-pro' ),
        'id'          => 'general_options',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	  
	  array(
        'id'          => 'page_layout',
        'label'       => __( 'Page Layout', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'none',
        'type'        => 'radio-image',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	   array(
        'id'          => 'show_related_portfolios',
        'label'       => __( 'Display Related Portfolios', 'alchem-pro' ),
        'std'         => 'on',
        'type'        => 'on-off',
		'section'     => 'general_options'
      ),
	  array(
        'id'          => 'custom_text',
        'label'       => __( 'Custom Text', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_tab_section',
        'rows'        => '6',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id' => 'project_date',
        'label' => __( 'Project Date', 'alchem-pro' ),
        'desc' => '',
        'std' => '',
        'type' => 'date-picker',
        'section' => '',
        'rows' => '',
        'post_type' => '',
        'taxonomy' => '',
        'min_max_step'=> '',
        'class' => 'mini',
        'condition' => '',
        'operator' => 'and'
      ),
	  array(
        'id'          => 'display_categories',
        'label'       => __( 'Display Categories', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'alchem_meta_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => __( 'yes', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => __( 'no', 'alchem-pro' ),
            'src'         => ''
          )
        )
      ),
	  
	   array(
        'id'          => 'portfolio_type',
        'label'       => __( 'Portfolio Type', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'image',
        'type'        => 'select',
        'section'     => 'alchem_meta_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
          array(
            'value'       => 'image',
            'label'       => __( 'image', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'gallery',
            'label'       => __( 'gallery', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'video',
            'label'       => __( 'video', 'alchem-pro' ),
            'src'         => ''
          )
        )
      ),

      array(
        'label'       => __( 'Gallery', 'alchem-pro' ),
        'id'          => 'gallery',
        'type'        => 'tab'
      ),
	  
      array(
        'id'          => 'portfolio_gallery',
        'label'       => __( 'Gallery', 'alchem-pro' ),
        'std'         => '',
        'type'        => 'gallery',
        'section'     => 'gallery',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	
	array(
        'label'       => __( 'Video', 'alchem-pro' ),
        'id'          => 'video',
        'type'        => 'tab'
      ),
	  
	   array(
        'id'          => 'embed_video',
        'label'       => __( 'Video Embed Code', 'alchem-pro' ),
        'std'         => '',
		'desc'        => __('Insert Youtube or Vimeo embed code.', 'alchem-pro' ),
        'type'        => 'textarea-simple',
		'section'     => ''
      ),
	  /* array(
        'id'          => 'video_link',
        'label'       => __( 'Youtube/Vimeo Video URL for Lightbox', 'alchem-pro' ),
        'std'         => '',
		'desc'        => __('Insert the video URL that will show in the lightbox.', 'alchem-pro' ),
        'type'        => 'text',
		'section'     => ''
      ),*/
	   
    )
  );

 $alchem_page_meta_box = array(
    'id'          => 'page_meta_box',
    'title'       => __( 'Page Meta Box', 'alchem-pro' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	  array(
        'label'       => __( 'General Options', 'alchem-pro' ),
        'id'          => 'general_options',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	
	 
	  array(
        'id'          => 'header_position',
        'label'       => __( 'Header Position', 'alchem-pro' ),
        'desc'        => __( 'Select the position of header. Left/Right position will not display the header content options 1-3 on mobile devices, only on desktop.', 'alchem-pro' ),
        'std'         => 'top',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'top',
            'label'       => __( 'Top', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => __( 'Left', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'right',
            'label'       => __( 'Right', 'alchem-pro' ),
            'src'         => ''
          )
         
        )
      ),
	  array(
        'id'          => 'full_width',
        'label'       => __( 'Content Full Width', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'no',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => 'no',
            'label'       => __( 'No', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => __( 'Yes', 'alchem-pro' ),
            'src'         => ''
          )
          
        )
      ),
	  array(
        'id'          => 'padding_top',
        'label'       => __( 'Padding Top', 'alchem-pro' ),
        'std'         => '',
		'desc'        => __('Page content top padding.', 'alchem-pro' ),
        'type'        => 'text',
		'section'     => 'general_options'
      ),
	    array(
        'id'          => 'padding_bottom',
        'label'       => __( 'Padding Bottom', 'alchem-pro' ),
        'std'         => '',
		'desc'        => __('Page content bottom padding.', 'alchem-pro' ),
        'type'        => 'text',
		'section'     => 'general_options'
      ),
	  
	  
	  array(
        'id'          => 'display_title_bar',
        'label'       => __( 'Display Title Bar', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '',
            'label'       => __( 'Default', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => __( 'Yes', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => __( 'No', 'alchem-pro' ),
            'src'         => ''
          )
        )
      ),
	  
	  array(
        'id'          => 'nav_menu',
        'label'       => __( 'Select Nav Menu', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     =>  $nav_menus
      ),
	  
	  	  
	   array(
        'id'          => 'page_layout',
        'label'       => __( 'Page Layout', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'none',
        'type'        => 'radio-image',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
 array(
        'id'          => 'left_sidebar',
        'label'       => __( 'Select Left Sidebar', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     =>  $alchem_sidebars
      ),
  array(
        'id'          => 'right_sidebar',
        'label'       => __( 'Select Right Sidebar', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     =>  $alchem_sidebars
      ),

	  array(
        'id'          => 'slider_banner',
        'label'       => __( 'Slider Banner', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '0',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Disable', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'magee_slider',
            'label'       => __( 'Magee Slider', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'rev',
            'label'       => __( 'Revolution Slider', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'layer',
            'label'       => __( 'LayerSlider WP', 'alchem-pro' ),
            'src'         => ''
          )
        )
      ),
	  array(
        'id'          => 'banner_position',
        'label'       => __( 'Banner Position', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '1',
            'label'       => __( 'Below Header', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Above Header', 'alchem-pro' ),
            'src'         => ''
          )
          
        )
      ),

	   array(
        'label'       => __( 'Select LayerSlider', 'alchem-pro' ),
        'id'          => 'layer_slider',
        'type'        => 'select',
        'desc'        =>'',
        'choices'     => $layer_slides_array,
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general_options'
      )
	   ,
	   array(
        'label'       => __( 'Select Revolution Slider', 'alchem-pro' ),
        'id'          => 'rev_slider',
        'type'        => 'select',
        'desc'        =>'',
        'choices'     => $revsliders,
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general_options'
      )
	   ,
	   array(
        'label'       => __( 'Select Magee Slider', 'alchem-pro' ),
        'id'          => 'magee_slider',
        'type'        => 'select',
        'desc'        =>'',
        'choices'     => $magee_sliders,
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general_options'
      ), 
	   
	   
   array(
        'label'       => __( 'Page Background', 'alchem-pro' ),
        'id'          => 'page_background',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	  
	 array(
        'id'          => 'background_color',
        'label'       => __( 'Background Color', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'page_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	 
	   
	 array(
        'id'          => 'background_image',
        'label'       => __( 'Background Image', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'page_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	 
	  array(
        'id'          => 'background_repeat',
        'label'       => __( 'Background Repeat', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'no',
        'type'        => 'select',
        'section'     => 'page_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => 'no-repeat',
            'label'       => __( 'No Repeat', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat',
            'label'       => __( 'Repeat', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __( 'Repeat X', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __( 'Repeat Y', 'alchem-pro' ),
            'src'         => ''
          )
          
        )
      ),
	  
 array(
        'label'       => __( 'Title Bar Background', 'alchem-pro' ),
        'id'          => 'title_bar_background',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	  

	   
	 array(
        'id'          => 'title_bar_background_image',
        'label'       => __( 'Title Bar Background Image', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'title_bar_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	 
	  array(
        'id'          => 'title_bar_background_repeat',
        'label'       => __( 'Title Bar Background Repeat', 'alchem-pro' ),
        'desc'        => '',
        'std'         => 'no',
        'type'        => 'select',
        'section'     => 'title_bar_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => 'no-repeat',
            'label'       => __( 'No Repeat', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat',
            'label'       => __( 'Repeat', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __( 'Repeat X', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __( 'Repeat Y', 'alchem-pro' ),
            'src'         => ''
          )
          
        )
      ),
	 
	 
	 
	  )
	  );
 
  $faq_meta_box = array(
    'id'          => 'faq_meta_box',
    'title'       => __( 'Faq Meta Box', 'alchem-pro' ),
    'desc'        => '',
    'pages'       => array( 'alchem_faq' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
						   
	  array(
        'label'       => __( 'General Options', 'alchem-pro' ),
        'id'          => 'general_options',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	  array(
        'id'          => 'icon',
        'label'       => __( 'Font Awesome Icon', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_tab_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	   
    )
  );
  
   $alchem_post_meta_box = array(
    'id'          => 'post_meta_box',
    'title'       => __( 'Post Meta Box', 'alchem-pro' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	  array(
        'label'       => __( 'General Options', 'alchem-pro' ),
        'id'          => 'general_options',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	 array(
        'id'          => 'display_title',
        'label'       => __( 'Display Title', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem-pro' ),
            'src'         => ''
          )
          
        )
      ),
	  array(
        'id'          => 'display_meta_data',
        'label'       => __( 'Display Meta Data', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem-pro' ),
            'src'         => ''
          )
          
        )
      ),
	   array(
        'id'          => 'display_share_icons',
        'label'       => __( 'Display Share Icons', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem-pro' ),
            'src'         => ''
          )
          
        )
      ),
	   array(
        'id'          => 'display_author_info',
        'label'       => __( 'Display Author Info', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem-pro' ),
            'src'         => ''
          )
          
        )
      ),
	   
	   
	    array(
        'id'          => 'display_related',
        'label'       => __( 'Display Related Posts', 'alchem-pro' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem-pro' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem-pro' ),
            'src'         => ''
          )
          
        )
      ),
	 
	 
	  )
	  );
  /**
   * Register our meta boxes using the 
   * of_register_meta_box() function.
   */
  if ( function_exists( 'alchem_register_meta_box' ) ){

	alchem_register_meta_box( $portfolio_meta_box );
    alchem_register_meta_box( $alchem_page_meta_box );
	alchem_register_meta_box( $faq_meta_box );
	alchem_register_meta_box( $alchem_post_meta_box );
  }
}