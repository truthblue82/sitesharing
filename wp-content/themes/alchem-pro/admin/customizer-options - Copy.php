<?php

function alchem_CountTail($number)  
{  
   
    $nstring = (string) $number;  
    $pointer = strlen($nstring) - 1;  
    $digit   = $nstring[$pointer];  
    $suffix  = "th";  


    if ($pointer == 0 || ($pointer > 0 && $nstring[$pointer - 1] != 1))  
    {  
        switch ($nstring[$pointer])  
        {  
            case 1: $suffix = "st"; break;  
            case 2: $suffix = "nd"; break;  
            case 3: $suffix = "rd"; break;  
        }  
    }  
     
    return $number . $suffix;  
}  


/**
 * Defines customizer options
 *
 */
function alchem_customizer_options() {
	
global $alchem_social_icons,$alchem_sidebars ,$alchem_default_options ,$alchem_homepage_sections;

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = __('Select a page:', 'alchem' );
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
	
	
	global $alchem_google_fonts_array,$default_theme_fonts;
	$alchem_google_fonts_array_option[''] =  __( '-- None --', 'alchem' );
	
	if($alchem_google_fonts_array){
        foreach($alchem_google_fonts_array as $index => $value){
            $alchem_google_fonts_array_option[$value['family'] ] = $value['family'];
        }
	}
	
	
	$default_theme_fonts_option[''] =  __( '-- Select Font --', 'alchem' );
	if($default_theme_fonts){
        foreach($default_theme_fonts as $index => $value){
            $default_theme_fonts_option[$index] =  $value;
        }
	}
	
	
    $choices =  array( 
                    'yes'   => __( 'Yes', 'alchem' ),
                    'no'    => __( 'No', 'alchem' )
                );
  
    $choices_reverse =  array( 
          
           'no'=> __( 'No', 'alchem' ),
           'yes' => __( 'Yes', 'alchem' )
         
        );
    $choices2 =  array( 
          
            '1'   => __( 'Yes', 'alchem' ),
            '0' => __( 'No', 'alchem' )
 
        );
    $align =  array( 
          'left' => __( 'left', 'alchem' ),
          'right' => __( 'right', 'alchem' ),
          'center'  => __( 'center', 'alchem' )         
        );
    $repeat = array( 
          
          'repeat' => __( 'repeat', 'alchem' ),
          'repeat-x'  => __( 'repeat-x', 'alchem' ),
          'repeat-y' => __( 'repeat-y', 'alchem' ),
          'no-repeat'  => __( 'no-repeat', 'alchem' )
          
        );
  
    $position =  array( 
          
         'top left' => __( 'top left', 'alchem' ),
          'top center' => __( 'top center', 'alchem' ),
          'top right' => __( 'top right', 'alchem' ),
          'center left' => __( 'center left', 'alchem' ),
          'center center'  => __( 'center center', 'alchem' ),
          'center right' => __( 'center right', 'alchem' ),
          'bottom left'  => __( 'bottom left', 'alchem' ),
          'bottom center'  => __( 'bottom center', 'alchem' ),
          'bottom right' => __( 'bottom right', 'alchem' )
            
        );
  
    $opacity   =  array_combine(range(0.1,1,0.1), range(0.1,1,0.1));
    $font_size =  array_combine(range(1,100,1), range(1,100,1));
  
    $alchem_social_icons = array(
		  array('title'=>'Facebook','icon' => 'facebook', 'link'=>'#'),
		  array ('title'=>'Twitter','icon' => 'twitter', 'link'=>'#'), 
		  array('title'=>'LinkedIn','icon' => 'linkedin', 'link'=>'#'),
		  array  ('title'=>'YouTube','icon' => 'youtube', 'link'=>'#'),
		  array('title'=>'Skype','icon' => 'skype', 'link'=>'#'),
		  array ('title'=>'Pinterest','icon' => 'pinterest', 'link'=>'#'),
		  array('title'=>'Google+','icon' => 'google-plus', 'link'=>'#'),
		  array('title'=>'Email','icon' => 'envelope', 'link'=>'#'),
		  array ('title'=>'RSS','icon' => 'rss', 'link'=>'#')
        );
    $target = array(
				  '_blank' => __( 'Blank', 'alchem' ),
				  '_self' => __( 'Self', 'alchem' )
				  );
  
  
   // Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	
##### Home Page #####

    $alchem_homepage_sections = array(
							  'banner' => __( 'Section - Banner', 'alchem' ),
							  'tagline' => __( 'Section - Tagline', 'alchem' ),
							  'service' => __( 'Section - Service', 'alchem' ),
							  'recent-works' => __( 'Section - Recent Works', 'alchem' ),
							  'features' => __( 'Section - Features', 'alchem' ),
							  'about-us' => __( 'Section - About Us', 'alchem' ),
							  'team' => __( 'Section - Our Team', 'alchem' ),
							  'tape-products' => __( 'Section - Tape Products', 'alchem'),
							  'printing-products' => __( 'Section - Printing Products', 'alchem'),
							  'testimonials' => __( 'Section - Testimonials', 'alchem' ),
							  'news' => __( 'Section - News', 'alchem' ),
							  'partners' => __( 'Section - Partners', 'alchem' ),
							  'slogan' => __( 'Section - Slogan', 'alchem' ),
							  'pricing-table' => __( 'Section - Pricing Table', 'alchem' ),
							  'portfolio' => __( 'Section - Portfolio', 'alchem' ),
							  'contact' => __( 'Section - Contact', 'alchem' ),
							  'products' => __( 'Section - Recent Products', 'alchem' ),
							  );
   
   /************ get nav menus*************/
   
  $nav_menus[''] = __( 'Default', 'alchem' );
  $menus = get_registered_nav_menus();
  
  foreach ( $menus as $location => $description ) {
    $nav_menus[$location] =  $description;
  }
  
  
/*
Default
Simple
Fresh
Elegant
Passionate
Natural
*/
    $home_styles        = array(
								'0'=>__('Default', 'alchem' ),
								'1'=>__( 'Simple', 'alchem' ),
								'2'=>__( 'Fresh', 'alchem' ),
								'3'=>__( 'Elegant', 'alchem' ),
								'4'=>__( 'Passionate', 'alchem' ),
								'5'=>__( 'Natural', 'alchem' )
								);
	$home_style         = absint(alchem_option('home_style',0));
	
	$section_background = array();
	$section_color      = array();
	switch( $home_style ){
		
		case "1":
		$section_background[0] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/banner-1.jpg'), 'color'=>'' );
		$section_color[0]      = '';
		$section_background[1] = array( 'image'=>'', 'color'=>'' );
		$section_color[1]      = '';
		
		$section_background[2] = array( 'image'=>'', 'color'=>'' );
		$section_color[2]      = '';
		
		$section_background[3] = array( 'image'=>'', 'color'=>'#f1f0eb' );
		$section_color[3]      = '';
		
		$section_background[4] = array( 'image'=>'', 'color'=>'#121212' );
		$section_color[4]      = '#ffffff';
		
		$section_background[5] = array( 'image'=> '', 'color'=>'#282828' );
		$section_color[5]      = '';
		
		$section_background[6] = array( 'image'=>'', 'color'=>'' );
		$section_color[6]      = '';
		
		$section_background[7] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/banner_style02_01.jpg'), 'color'=>'' );
		$section_color[7]      = '#ffffff';
		
		$section_background[8] = array( 'image'=>'', 'color'=>'' );
		$section_color[8]      = '';
		
		$section_background[9] = array( 'image'=>'', 'color'=>'#f1f0eb' );
		$section_color[9]      = '';
		
		$section_background[10] = array( 'image'=>'', 'color'=>'#282828' );
		$section_color[10]      = '#ffffff';
		
		
		break;
		
		case "2":
		$section_background[0] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/banner_style3_01.jpg'), 'color'=>'' );
		$section_color[0]      = '';
		$section_background[1] = array( 'image'=>'', 'color'=>'' );
		$section_color[1]      = '';
	
		$section_background[2] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/02/banner_1.jpg'), 'color'=>'' );
		$section_color[2]      = '';
		
		$section_background[3] = array( 'image'=>'', 'color'=>'#f1f0eb' );
		$section_color[3]      = '#ffffff';
		
		$section_background[4] = array( 'image'=> '', 'color'=>'' );
		$section_color[4]      = '';
		
		$section_background[5] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/02/banner_2.jpg'), 'color'=>'' );
		$section_color[5]      = '#ffffff';
		
		$section_background[6] = array( 'image'=> '', 'color'=>'#f1f0eb' );
		$section_color[6]      = '';
		
		$section_background[7] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/banner_style3_03.jpg'), 'color'=>'' );
		$section_color[7]      = '#ffffff';
		
		$section_background[8] = array( 'image'=>'', 'color'=>'#f1f0eb' );
		$section_color[8]      = '';
		
		$section_background[9] = array( 'image'=>'', 'color'=>'' );
		$section_color[9]      = '';
		
		$section_background[10] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/banner_3.jpg'), 'color'=>'#282828' );
		$section_color[10]      = '#ffffff';
		break;
		case "3":
		$section_background[0] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/banner-1.jpg'), 'color'=>'' );
		$section_color[0]      = '';
		
		$section_background[1] = array( 'image'=>'', 'color'=>'#f5f5f5' );
		$section_color[1]      = '';
		
		$section_background[2] = array( 'image'=>'', 'color'=>'' );
		$section_color[2]      = '';
		
		$section_background[3] = array( 'image'=>'', 'color'=>'#f3f3f4' );
		$section_color[3]      = '';
		
		$section_background[4] = array( 'image'=>'', 'color'=>'' );
		$section_color[4]      = '';
		
		$section_background[5] = array( 'image'=>'', 'color'=>'#f1f0eb' );
		$section_color[5]      = '';
		
		$section_background[6] = array( 'image'=>'', 'color'=>'' );
		$section_color[6]      = '';
		
		$section_background[7] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/bg-003-2.jpg'), 'color'=>'#8ed7c4' );
		$section_color[7]      = '';
		
		$section_background[8] = array( 'image'=>'', 'color'=>'' );
		$section_color[8]      = '';
		
		$section_background[9] = array( 'image'=>'', 'color'=>'#fdfdfd' );
		$section_color[9]      = '';
		
		$section_background[10] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/bg-03-1.jpg'), 'color'=>'' );
		$section_color[10]      = '';

		break;
        
		case "4":
		$section_background[0] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/banner-1.jpg'), 'color'=>'' );
		$section_color[0]      = '';
		
		$section_background[1] = array( 'image'=>'', 'color'=>'#1d1d1d' );
		$section_color[1]      = '';
		
		$section_background[2] = array( 'image'=>'', 'color'=>'' );
		$section_color[2]      = '';
		
		$section_background[3] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/banner_style6_04.jpg'), 'color'=>'#f3f3f4' );
		$section_color[3]      = '';
		
		$section_background[4] = array( 'image'=>'', 'color'=>'#1d1d1d' );
		$section_color[4]      = '';
		
		$section_background[5] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/banner_style6_03.1.jpg'), 'color'=>'#1d1d1d' );
		$section_color[5]      = '';
		
		$section_background[6] = array( 'image'=>'', 'color'=>'#1d1d1d' );
		$section_color[6]      = '';
		
		$section_background[7] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/banner_style6_07.jpg'), 'color'=>'#8ed7c4' );
		$section_color[7]      = '';
		
		$section_background[8] = array( 'image'=>'', 'color'=>'' );
		$section_color[8]      = '';
		
		$section_background[9] = array( 'image'=>'', 'color'=>'' );
		$section_color[9]      = '';
		
		$section_background[10] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/bg-03-1.jpg'), 'color'=>'' );
		$section_color[10]      = '';
        
		break;
		
		case "5":
		$section_background[0] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/banner-1.jpg'), 'color'=>'' );
		$section_color[0]      = '';
		
		$section_background[1] = array( 'image'=>'', 'color'=>'#ffffff' );
		$section_color[1]      = '';
		
		$section_background[2] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/banner_style6_03.jpg'), 'color'=>'' );
		$section_color[2]      = '';
		
		$section_background[3] = array( 'image'=>'', 'color'=>'#fbfbfb' );
		$section_color[3]      = '';
		
		$section_background[4] = array( 'image'=>'', 'color'=>'#fff' );
		$section_color[4]      = '';
		
		$section_background[5] = array( 'image'=>esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/banner_style6_08.jpg'), 'color'=>'' );
		$section_color[5]      = '';
		
		$section_background[6] = array( 'image'=>'', 'color'=>'' );
		$section_color[6]      = '';
		
		$section_background[7] = array( 'image'=>'', 'color'=>'#fbfbfb' );
		$section_color[7]      = '';
		
		$section_background[8] = array( 'image'=>'', 'color'=>'' );
		$section_color[8]      = '';
		
		$section_background[9] = array( 'image'=>'', 'color'=>'' );
		$section_color[9]      = '';
		
		$section_background[10] = array( 'image'=>'', 'color'=>'#fbfbfb' );
		$section_color[10]      = '';
        
		break;
		
		case "0":
		default:
		$section_background[0] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/banner-1.jpg'), 'color'=>'' );
		$section_color[0]      = '';
		
		$section_background[1] = array( 'image'=>'', 'color'=>'#f5f5f5' );
		$section_color[1]      = '';
		
		$section_background[2] = array( 'image'=>'', 'color'=>'' );
		$section_color[2]      = '';
		
		$section_background[3] = array( 'image'=>'', 'color'=>'#f3f3f4' );
		$section_color[3]      = '';
		
		$section_background[4] = array( 'image'=>'', 'color'=>'' );
		$section_color[4]      = '';
		
		$section_background[5] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/bg-02-1.jpg'), 'color'=>'' );
		$section_color[5]      = '';
		
		$section_background[6] = array( 'image'=>'', 'color'=>'' );
		$section_color[6]      = '';
		
		$section_background[7] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/bg-003-2.jpg'), 'color'=>'' );
		$section_color[7]      = '';
		
		$section_background[8] = array( 'image'=>'', 'color'=>'' );
		$section_color[8]      = '';
		
		$section_background[9] = array( 'image'=>'', 'color'=>'#eeeeee' );
		$section_color[9]      = '';
		
		$section_background[10] = array( 'image'=>esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/bg-03-1.jpg'), 'color'=>'' );
		$section_color[10]      = '';

		break;
		}
		
	$about_us_content = '<h2 style="text-align: center"><span style="color: #ffffff">About Us</span></h2>
<div class="divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
  <div class="divider-inner divider-border" style="border-bottom-width:3px; border-color:#fff;border-bottom-width: 3px;"></div>
</div>
<div class="row">
  <div class="col-md-6">
  <div class="alchem-animated" data-animationduration="0.9" data-animationtype="fadeInLeft" data-imageanimation="no">
    <div style="font-size:36px;color:#fff;padding-top:80px;padding-bottom:40px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
	</div>
  </div>
  <div class="col-md-6">
  <div class="alchem-animated" data-animationduration="0.9" data-animationtype="fadeInRight" data-imageanimation="no">
    <div class="magee-feature-box style2" data-os-animation="fadeOut" style="padding-left: 85px;">
      <div class="icon-box  icon-circle" data-animation="" style="font-size:28px;color:#fff;border-width:0px;background-color:#88c87b;"> <i class="feature-box-icon fa fa-magic  fa-fw"></i></div>
      <h3 style="font-size:18px;color:#fff;">List</h3>
      <div class="feature-content">
        <p><span style="color: #ffffff">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec.</span></p>
        <a href="" target="_blank" class="feature-link"></a></div>
    </div>

    <div class="magee-feature-box style2" data-os-animation="fadeOut" style="padding-left: 85px;">
      <div class="icon-box  icon-circle" data-animation="" style="font-size:28px;color:#fff;border-width:0px;background-color:#88c87b;"> <i class="feature-box-icon fa fa-desktop  fa-fw" ></i></div>
      <h3 style="font-size:18px;color:#fff;">Communication</h3>
      <div class="feature-content">
        <p><span style="color: #ffffff">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec.</span></p>
        <a href="" target="_blank" class="feature-link"></a></div>
    </div>

    <div class="magee-feature-box style2" data-os-animation="fadeOut" style="padding-left: 85px;">
      <div class="icon-box  icon-circle" data-animation="" style="font-size:28px;color:#fff;border-width:0px;background-color:#88c87b;"> <i class="feature-box-icon fa fa-thumbs-up  fa-fw" ></i></div>
      <h3 style="font-size:18px;color:#fff;">Finished</h3>
      <div class="feature-content">
        <p><span style="color: #ffffff">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec.</span></p>
        <a href="" target="_blank" class="feature-link"></a></div>
		</div>
    </div>
  </div>
</div>';

  if( $home_style == '1')
  $about_us_content = '<div class="row">
  <div class="col-md-3" style="padding: 0; margin-bottom: 0;">
    <div class="magee-alert" role="alert" style="background-color: #282828;">
      <h2 style="text-align: center; font-family: \'Cuprum\'; font-weight: bold; color: #fff;">WHAT DO YOU WANT</h2>
      <div style="text-align: center; color: #fff; font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue.</div>
    </div>
    <p></p>
  </div>
  <div class="col-md-3" style="padding: 0; margin-bottom: 0;">
    <div class="magee-flipbox-wrap horizontal" style="height: 166px;">
      <div class="magee-flipbox">
        <div class="flipbox-front" style="background-color: #00aeef;">
          <div class="flipbox-content"> <img class="alignnone size-full wp-image-4678" src="https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/iconfont-message2.png" alt="iconfont-message2" width="80" height="80"><br>
          </div>
        </div>
        <div class="flipbox-back">
          <div class="flipbox-content"> <br>
            <span style="font-size: 16px; color: #fff;">Want to know more about our work?</span>
            <p></p>
            <div style="height: 10px;"></div>
            <a href="#" target="_self" style="" class="magee-btn-normal btn-full-rounded btn-md">SEE MORE PROJECTS</a> </div>
        </div>
      </div>
    </div>
    <p></p>
  </div>
  <div class="col-md-3" style="padding: 0; margin-bottom: 0;">
    <div class="magee-flipbox-wrap horizontal" style="height: 166px;">
      <div class="magee-flipbox">
        <div class="flipbox-front" style="background-color: #f6a331;">
          <div class="flipbox-content"> <img class="alignnone size-full wp-image-4679" src="https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/iconfont-svgheart2.png" alt="iconfont-svgheart2" width="80" height="80"><br>
          </div>
        </div>
        <div class="flipbox-back">
          <div class="flipbox-content"> <br>
            <span style="font-size: 16px; color: #fff;">Want to know more about our work?</span>
            <p></p>
            <div style="height: 10px;"></div>
            <a href="#" target="_self" style="" class="magee-btn-normal btn-full-rounded btn-md">SEE MORE PROJECTS</a> </div>
        </div>
      </div>
    </div>
    <p></p>
  </div>
  <div class="col-md-3" style="padding: 0; margin-bottom: 0;">
    <div class="magee-flipbox-wrap horizontal" style="height: 166px;">
      <div class="magee-flipbox">
        <div class="flipbox-front" style="background-color: #ed1c24;">
          <div class="flipbox-content"> <img class="alignnone size-full wp-image-4680" src="https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/iconfont-talk2.png" alt="iconfont-talk2" width="80" height="80"><br>
          </div>
        </div>
        <div class="flipbox-back">
          <div class="flipbox-content"> <br>
            <span style="font-size: 16px; color: #fff;">Want to have a talk with us?</span>
            <p></p>
            <div style="height: 10px;"></div>
            <a href="#" target="_self" style="" class="magee-btn-normal btn-full-rounded btn-md">CONTACT US</a> </div>
        </div>
      </div>
    </div>
    <p></p>
  </div>
</div>
';
  
	if( $home_style == '2')
     $about_us_content = '<div class="row">
  <div class="col-md-4"> <span style="font-family: \'Poiret One\'; font-size: 42px;">01</span><br />
    <span style="font-size: 16px;">Want to know more about our work?</span>
    </p>
    <div style="height: 10px;"></div>
    <a href="#" target="_self" style="" class="magee-btn-normal btn-full-rounded btn-sm">SEE MORE PROJECTS</a> </div>
  <div class="col-md-4"> <span style="font-family: \'Poiret One\'; font-size: 42px;">02</span><br />
    <span style="font-size: 16px;">Want to know more about our work?</span>
    </p>
    <div style="height: 10px;"></div>
    <a href="#" target="_self" style="" class="magee-btn-normal btn-full-rounded btn-sm">SEE MORE PROJECTS</a> </div>
  <div class="col-md-4"> <span style="font-family: \'Poiret One\'; font-size: 42px; ">03</span><br />
    <span style="font-size: 16px;">Want to know more about our work?</span>
    </p>
    <div style="height: 10px;"></div>
    <a href="#" target="_self" style="" class="magee-btn-normal btn-full-rounded btn-sm">SEE MORE PROJECTS</a> </div>
</div>';	

$title_5 = '';
$sub_title_5 = '';
if( $home_style == '3')
     $about_us_content = '<div class="row">
  <div class="col-md-4" style="padding: 0; margin-bottom: 0; text-align: center;">
    <div class="magee-animated " data-animationduration="0.9" data-animationtype="fadeInLeft" data-imageanimation="no">
      <div class="magee-alert" role="alert" style="background-color: #fff;border-width: 50px;border-color: #fff;"> <span style="font-size: 16px; color: #666666;">Want to know more about our work?</span>
        </p>
        <div style="height: 10px;"></div>
        <a href="#" target="_self" class="magee-btn-normal btn-rounded btn-sm">SEE MORE PROJECTS</a> </div>
    </div>
    <div class="magee-animated " data-animationduration="0.9" data-animationtype="fadeInUp" data-imageanimation="no">
      <div class="magee-alert" role="alert" style="background-color: #fce9c7;border-width: 50px;border-color: #fce9c7;"> <img class="size-full" src="https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/iconfont-message2.png" alt="iconfont-message2" width="125" height="125" /><br />
      </div>
    </div>
  </div>
  <div class="col-md-4" style="padding: 0; margin-bottom: 0; text-align: center;">
    <div class="magee-animated " data-animationduration="0.9" data-animationtype="fadeInUp" data-imageanimation="no">
      <div class="magee-alert" role="alert" style="background-color: #faca87;border-width: 50px;border-color: #faca87;"> <img class="size-full" src="https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/iconfont-talk2.png" alt="iconfont-message2" width="125" height="125" /><br />
      </div>
    </div>
    <div class="magee-animated " data-animationduration="0.9" data-animationtype="fadeInRight" data-imageanimation="no">
      <div class="magee-alert" role="alert" style="background-color: #fff;border-width: 50px;border-color: #fff;"> <span style="font-size: 16px; color: #666666;">Want to know more about our work?</span>
        </p>
        <div style="height: 10px;"></div>
        <a href="#" target="_self" class="magee-btn-normal btn-rounded btn-sm">SEE MORE PROJECTS</a> </div>
    </div>
    </p>
  </div>
  <div class="col-md-4" style="padding: 0; margin-bottom: 0; text-align: center;">
    <div class="magee-animated " data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no">
      <div class="magee-alert" role="alert" style="background-color: #fff;border-width: 50px;border-color: #fff;"> <span style="font-size: 16px; color: #666666;">Want to know more about our work?</span>
        </p>
        <div style="height: 10px;"></div>
        <a href="#" target="_self" class="magee-btn-normal btn-rounded btn-sm">SEE MORE PROJECTS</a> </div>
    </div>
    <div class="magee-animated " data-animationduration="0.9" data-animationtype="fadeInUp" data-imageanimation="no">
      <div class="magee-alert" role="alert" style="background-color: #8ed7c4;border-width: 50px;border-color: #8ed7c4;"> <img class="size-full" src="https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/iconfont-svgheart2.png" alt="iconfont-message2" width="125" height="125" /><br />
      </div>
    </div>
  </div>
</div>';
  $title_5 = 'What Do You Want';
  $sub_title_5 = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
if( $home_style == '4'):
     $about_us_content = '<div id="" class=" row">
    <div class=" col-md-4" id="">
      <div class="magee-animated fadeInLeft" data-animationduration="0.9" data-animationtype="fadeInLeft" data-imageanimation="no" >
        
        <div class="magee-alert " role="alert" id="" style="background-color: #fb606c;text-align: center;border-color:#fb606c;border-width:50px;border-radius:0px;"> <span style="font-size: 16px;color:#fff;">Want to know more about our work?</span>
          <p></p>
          <div style="height: 10px;"></div>
       
          <a href="#" target="_self" style="" class=" magee-btn-normal btn-rounded btn-sm btn-line" id="">SEE MORE PROJECTS</a> </div>
      </div>
    </div>
    <div class=" col-md-4" id="">
      <div class="magee-animated fadeInRight" data-animationduration="0.9" data-animationtype="fadeInRight" data-imageanimation="no" >
      
        <div class="magee-alert " role="alert" id=""  style="background-color: #fb606c;text-align: center;border-color:#fb606c;border-width:50px;border-radius:0px;"> <span style="font-size: 16px;color:#fff;">Want to know more about our work?</span>
          <p></p>
          <div style="height: 10px;"></div>
          
          <a href="#" target="_self" style="" class=" magee-btn-normal  btn-rounded btn-sm btn-line" id="">SEE MORE PROJECTS</a> </div>
      </div>
    </div>
    <div class=" col-md-4" id="">
      <div class="magee-animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" >
       
        <div class="magee-alert " role="alert" id=""  style="background-color: #fb606c;text-align: center;border-color:#fb606c;border-width:50px;border-radius:0px;"> <span style="font-size: 16px;color:#fff;">Want to know more about our work?</span>
          <p></p>
          <div style="height: 10px;"></div>
    
          <a href="#" target="_self" style="" class=" magee-btn-normal btn-rounded btn-sm btn-line" id="">SEE MORE PROJECTS</a> </div>
      </div>
    </div>
  </div>'  ;
  $title_5 = 'What Do You Want';
  $sub_title_5 = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
  endif;
if( $home_style == '5'):  
  $about_us_content = '<div id="" class=" row">
    <div class=" col-md-4" id="">
      <div class="magee-alert " role="alert" id="" >
        <div style="height:20px;"></div>
        <p style="text-align:center;"><img src="https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/02/iconfont-design-1.png" alt="" width="60" height="60" class="alignnone size-full "></p>
        <div class="magee-feature-box style1 " id="" data-os-animation="fadeOut">
          <h3>Feature Box</h3>
          <div class="feature-content">
            <p>Your Content Goes Here</p>
            <a href="" target="_blank" class="feature-link">SEE MORE PROJECTS</a></div>
        </div>
        <div style="height:20px;"></div>
      </div>
    </div>
    <div class=" col-md-4" id="">
      <div class="magee-alert " role="alert" id="">
        <div style="height:20px;"></div>
        <p style="text-align:center;"><img src="https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/02/iconfont-design-1.png" alt="" width="60" height="60" class="alignnone size-full "></p>
        <div class="magee-feature-box style1 " id="" data-os-animation="fadeOut">
          <h3>Feature Box</h3>
          <div class="feature-content">
            <p>Your Content Goes Here</p>
            <a href="" target="_blank" class="feature-link">SEE MORE PROJECTS</a></div>
        </div>
        <div style="height:20px;"></div>
      </div>
    </div>
    <div class=" col-md-4" id="">
      <div class="magee-alert " role="alert" id="" >
        <div style="height:20px;"></div>
        <p style="text-align:center;"><img src="https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/02/iconfont-design-1.png" alt="" width="60" height="60" class="alignnone size-full "></p>
        <div class="magee-feature-box style1 " id="" data-os-animation="fadeOut">
          <h3>Feature Box</h3>
          <div class="feature-content">
            <p>Your Content Goes Here</p>
            <a href="" target="_blank" class="feature-link">SEE MORE PROJECTS</a></div>
        </div>
        <div style="height:20px;"></div>
      </div>
    </div>
  </div>';
  $title_5 = 'What Do You Want';
  $sub_title_5 = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
  endif;
	
	$panel = 'alchem-home-page';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Home Page', 'alchem' ),
		'priority' => '1'
	);
	
	// Home Page Style
	$section = 'alchem-sections-style';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General', 'alchem' ),
		'priority' => '8',
		'description' => '',
		'panel' => $panel
	);
	
	$options['alchem_home_animation'] = array(
		'id' => 'alchem_home_animation',
		'label' => __( 'Enable Home Page Animation', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'yes',
	);
	
	$options['alchem_home_style'] = array(
		'id' => 'alchem_home_style',
		'label' => __( 'Home Page Style', 'alchem' ),
		'description' =>  __( 'Once style changed, you need to click save&publish button and refresh the page to apply the change.', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $home_styles,
		'default' => '0',
	);
	
	// Sections Order
	$section = 'alchem-sections-order';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Sections Order', 'alchem' ),
		'priority' => '9',
		'description' => '',
		'panel' => $panel
	);
	$i = 0;
	foreach(  $alchem_homepage_sections as $k=>$v ){
		
	$options['alchem_section_order_'.$i] = array(
		'id' => 'alchem_section_order_'.$i,
		'label' => sprintf(__('%s section', 'alchem' ),alchem_CountTail($i+1)),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $alchem_homepage_sections,
		'default' => $k,
	);
	$i++;
	}
	
	
	// Section Banner
	$section = 'alchem-section-banner';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Banner', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_0_model'] = array(
		'id' => 'alchem_section_0_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' ),'2'=>__( 'Slider', 'alchem' ),'3'=>__( 'YouTube Video Background', 'alchem' )),
		'default' => '2',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_0_background_color'] = array(
		'id' => 'alchem_section_0_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[0]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_0_background_image'] = array(
		'id' => 'alchem_section_0_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[0]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_0_parallax'] = array(
		'id' => 'alchem_section_0_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
		$options['alchem_section_0_top_padding'] = array(
		'id' => 'alchem_section_0_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '0',
	);
	
	$options['alchem_section_0_bottom_padding'] = array(
		'id' => 'alchem_section_0_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '0',
	);
	
	
	$options['alchem_section_0_title'] = array(
		'id' => 'alchem_section_0_title',
		'label' => __( 'Big Title', 'alchem' ),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'LIFE IS <br> WHAT YOU MAKE IT',
	);
	
	$options['alchem_section_0_sub_title'] = array(
		'id' => 'alchem_section_0_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'This is a elegant theme for you to build beautiful site.',
	);
	
	$options['alchem_section_0_button_text'] = array(
		'id' => 'alchem_section_0_button_text',
		'label' => __( 'Button Text', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Learn More',
	);
	$options['alchem_section_0_button_link'] = array(
		'id' => 'alchem_section_0_button_link',
		'label' => __( 'Button Link', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
	$options['alchem_section_0_button_target'] = array(
		'id' => 'alchem_section_0_button_target',
		'label' => __( 'Button Link Target', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);
		
	$options['alchem_section_0_content_align'] = array(
		'id' => 'alchem_section_0_content_align',
		'label' => __( 'Content Align', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $align,
		'default' => 'right',
	);
  
    $options['alchem_section_0_id'] = array(
		'id' => 'alchem_section_0_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-1',
	);
	
	$options['alchem_section_0_content'] = array(
		'id' => 'alchem_section_0_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	
	
	
	
	$display_slide = array('1','1','','','');
	$slide_image   = array(
						   $imagepath.'banner_001.jpg',
						   $imagepath.'banner_002.jpg',
						   '',
						   '',
						   '');
	$slide_title    = array('LIFE IS WHAT YOU MAKE IT','LIFE IS WHAT YOU MAKE IT','','','');
	$slide_subtitle = array('This is a elegant theme for you to build beautiful site.','This is a elegant theme for you to build beautiful site.','','','');
	
	for( $i=0;$i<5;$i++ ){
		
		$options['alchem_section_0_display_'.$i] = array(
		'id' => 'alchem_section_0_display_'.$i,
		'label' => sprintf(__( 'Display Slide %d', 'alchem' ),$i+1),
		'description' => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => $display_slide[$i],
	    );
		
		$options['alchem_section_0_image_'.$i] = array(
            'id' => 'alchem_section_0_image_'.$i,
            'label'   => sprintf(__( 'Background Image %d', 'alchem' ),$i+1),
            'section' => $section,
            'type'    => 'upload',
            'default' => $slide_image[$i],
            'description' => __( 'Upload background image for this slide.', 'alchem' )
        );
		
		$options['alchem_section_0_title_'.$i] = array(
		'id' => 'alchem_section_0_title_'.$i,
		'label' => sprintf(__( 'Slide Title %d', 'alchem' ),$i+1),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => $slide_title[$i],
	    );
		
		$options['alchem_section_0_sub_title_'.$i] = array(
		'id' => 'alchem_section_0_sub_title_'.$i,
		'label' => sprintf(__( 'Slide Sub Title %d', 'alchem' ),$i+1),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => $slide_subtitle[$i],
	    );
		
		$options['alchem_section_0_text_'.$i] = array(
            'id' => 'alchem_section_0_btn_text_'.$i,
            'label' => __( 'Left Button Text', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => 'Learn More',
        );
        $options['alchem_section_0_btn_link_'.$i] = array(
            'id' => 'alchem_section_0_btn_link_'.$i,
            'label' => __( 'Button Link', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '#',
        );
		
        $options['alchem_section_0_btn_target_'.$i] = array(
            'id' => 'alchem_section_0_btn_target_'.$i,
            'label' => __( 'Button Link Target', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'select',
            'choices' => $target,
            'default' => '_blank',
        );
    }

	$options['alchem_youtube_id'] = array(
						   'label' => __('YouTube ID for Video Background', 'alchem'),
						   'default' => '9ZfN87gSjvI',
						   'description' => __('Insert the eleven-letter id here, not url.', 'alchem'),
						   'id' => 'alchem_youtube_id',
						   'type' => 'text',
						   'section' => $section,
						   );
		
    $options['alchem_youtube_start'] = array(
                                     'name' => __('Start Time', 'alchem'),
                                     'default' => '28',
                                     'description' => __('Start to play.', 'alchem'),
                                     'id' => 'alchem_youtube_start',
                                     'type' => 'text',
                                     'section' => $section,
                                     );
		
    $options['alchem_video_controls'] = array(
    'label' => __('Display Video Control Buttons.', 'alchem'),
    'description' => __('Choose to display video controls at bottom of the section with video background.', 'alchem'),
    'id' => 'alchem_video_controls',
    'default' => '1',
    'choices' => $choices2,
    'type' => 'checkbox',
    'section' => $section,
    );
		
    $options['alchem_youtube_mute'] = array(
    'label' => __('Mute', 'alchem'),
    'description' => '',
    'id' => 'alchem_youtube_mute',
    'default' => '',
    'choices' => $choices2,
    'type' => 'checkbox',
    'section' => $section,
    );
		
    $options['alchem_youtube_autoplay'] = array(
    'label' => __('AutoPlay', 'alchem'),
    'description' => '',
    'id' => 'alchem_youtube_autoplay',
    'default' => '1',
    'choices' => $choices2,
    'type' => 'checkbox',
    'section' => $section,
    );
		
    $options['alchem_youtube_loop'] = array(
    'label' => __('Loop', 'alchem'),
    'description' => '',
    'id' => 'alchem_youtube_loop',
    'default' => '1',
    'choices' => $choices2,
    'type' => 'checkbox',
    'section' => $section,
    );
		
    $options['alchem_youtube_bg_type'] = array(
    'label' => __('Background Type', 'alchem'),
    'description' => '',
    'id' => 'alchem_youtube_bg_type',
    'default' => '0',
    'choices' => array('1'=>__('Body Background', 'alchem'),'0'=>__('Section Background', 'alchem')),
    'type' => 'select',
    'section' => $section,
    );
		
    $options['alchem_youtube_content'] = array(
		'id' => 'alchem_youtube_content',
		'label' => __( 'YouTube Content', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'textarea',
		'default' => '<h1 class="magee-heading" style="text-align: right;color: #fff"><span class="heading-inner">LIFE IS WHAT YOU MAKE IT</span></h1>
                  <p style="text-align:right;color: #fff">This is a elegant theme for you to build beautiful site.</p>
                  <div style="text-align:right"> 
                                    <a href="#" target="_blank" class=" magee-btn-normal btn-md btn-line btn-light">Learn More</a></div>',
	);
	$options['alchem_section_0_hide'] = array(
		'id' => 'alchem_section_0_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);	
	
	// Section Tagline
	$section = 'alchem-section-tagline';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Tagline', 'alchem' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_1_model'] = array(
		'id' => 'alchem_section_1_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_1_color'] = array(
		'id' => 'alchem_section_1_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[1],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_1_background_color'] = array(
		'id' => 'alchem_section_1_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[1]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_1_background_image'] = array(
		'id' => 'alchem_section_1_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[1]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_1_parallax'] = array(
		'id' => 'alchem_section_1_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	if($home_style == '5'){
        $options['alchem_section_1_top_padding'] = array(
            'id' => 'alchem_section_1_top_padding',
            'label' => __( 'Section Top Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '50px',
        );
        
        $options['alchem_section_1_bottom_padding'] = array(
            'id' => 'alchem_section_1_bottom_padding',
            'label' => __( 'Section Bottom Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '50px',
        );
	}else{
        $options['alchem_section_1_top_padding'] = array(
            'id' => 'alchem_section_1_top_padding',
            'label' => __( 'Section Top Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '20px',
        );
        
        $options['alchem_section_1_bottom_padding'] = array(
            'id' => 'alchem_section_1_bottom_padding',
            'label' => __( 'Section Bottom Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '20px',
        );
	}	
	$options['alchem_section_1_slogan_title'] = array(
		'id' => 'alchem_section_1_slogan_title',
		'label' => __( 'Slogan Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '5 star rating & positive reviews',
	);
	if($home_style == '5'){
        $options['alchem_section_1_slogan_content'] = array(
            'id' => 'alchem_section_1_slogan_content',
            'label' => __( 'Slogan Content', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'textarea',
            'default' => 'Lorem ipsum dolor sit amet, mauris suspendisse viverra eleifend tortor tellus suscipit,<br> tortor aliquet atnullafa ignissim neque, nulla neque. Ultrices proin mi suspendisse viverra eleifend.',
        );
	}else{
        $options['alchem_section_1_slogan_content'] = array(
            'id' => 'alchem_section_1_slogan_content',
            'label' => __( 'Slogan Content', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'textarea',
            'default' => 'Lorem ipsum dolor sit amet, mauris suspendisse viverra eleifend tortor tellus suscipit, tortor aliquet atnullafa ignissim neque, nulla neque. Ultrices proin mi suspendisse viverra eleifend.',
        );
	}
	$options['alchem_section_1_button_text'] = array(
		'id' => 'alchem_section_1_button_text',
		'label' => __( 'Button Text', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Download Now',
	);
	$options['alchem_section_1_button_link'] = array(
		'id' => 'alchem_section_1_button_link',
		'label' => __( 'Button Link', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
	$options['alchem_section_1_button_target'] = array(
		'id' => 'alchem_section_1_button_target',
		'label' => __( 'Button Link Target', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);

	$options['alchem_section_1_id'] = array(
		'id' => 'alchem_section_1_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-2',
	);
	
	$options['alchem_section_1_content'] = array(
		'id' => 'alchem_section_1_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	
	$options['alchem_section_1_hide'] = array(
		'id' => 'alchem_section_1_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description' => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	// Section Service
	$section = 'alchem-section-service';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Service', 'alchem' ),
		'priority' => '12',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_2_model'] = array(
		'id' => 'alchem_section_2_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_2_color'] = array(
		'id' => 'alchem_section_2_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[2],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_2_background_color'] = array(
		'id' => 'alchem_section_2_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[2]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_2_background_image'] = array(
		'id' => 'alchem_section_2_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[2]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_2_parallax'] = array(
		'id' => 'alchem_section_2_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	if( $home_style == '5'){  
        $options['alchem_section_2_top_padding'] = array(
            'id' => 'alchem_section_2_top_padding',
            'label' => __( 'Section Top Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '0',
        );
	}else{
        $options['alchem_section_2_top_padding'] = array(
            'id' => 'alchem_section_2_top_padding',
            'label' => __( 'Section Top Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '50px',
        );
	}
	if( $home_style == '5'){ 
        $options['alchem_section_2_bottom_padding'] = array(
            'id' => 'alchem_section_2_bottom_padding',
            'label' => __( 'Section Bottom Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '0',
        );
	}else{
        $options['alchem_section_2_bottom_padding'] = array(
            'id' => 'alchem_section_2_bottom_padding',
            'label' => __( 'Section Bottom Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '50px',
        );
    } 
	$options['alchem_section_2_title'] = array(
		'id' => 'alchem_section_2_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Services We Offer',
	);
	
	$options['alchem_section_2_sub_title'] = array(
		'id' => 'alchem_section_2_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue.',
	);
	
	$options['alchem_section_2_columns'] = array(
		'id' => 'alchem_section_2_columns',
		'label' => __( 'Columns', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '3',
	);
	
	
	
	$feature_icons  = array('magic','desktop','thumbs-up','flag','leaf','user');
	$feature_titles = array('Impressive Design','Responsive Layout','Bootstrap Framwork','Font Awesome Icons','SEO Friendly','Continuous Support');
	
	for( $i=0;$i < 6;$i++ ){
		$j = $i+1;
		$options['alchem_section_2_feature_icon_'.$i] = array(
            'id' => 'alchem_section_2_feature_icon_'.$i,
            'label' => sprintf(__( 'Font Awesome Icon %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $feature_icons[$i],
        );
		
		$options['alchem_section_2_feature_image_'.$i] = array(
            'id' => 'alchem_section_2_feature_image_'.$i,
            'label' => sprintf(__( 'Upload Icon %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'upload',
            'default' => '',
        );
		
		$options['alchem_section_2_feature_title_'.$i] = array(
            'id' => 'alchem_section_2_feature_title_'.$i,
            'label' => sprintf(__( 'Feature Box Title %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $feature_titles[$i],
        );
		
		$options['alchem_section_2_feature_content_'.$i] = array(
            'id' => 'alchem_section_2_feature_content_'.$i,
            'label' => sprintf(__( 'Feature Box Content %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'textarea',
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.',
        );
		
		$options['alchem_section_2_link_'.$i] = array(
            'id' => 'alchem_section_2_link_'.$i,
            'label' => sprintf(__( 'Title Link %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '',
        );
        $options['alchem_section_2_target_'.$i] = array(
            'id' => 'alchem_section_2_target_'.$i,
            'label' => sprintf(__( 'Link Target %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'select',
            'choices' => $target,
            'default' => '_blank',
        );
    }
		
	$options['alchem_section_2_id'] = array(
		'id' => 'alchem_section_2_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-3',
	);
	
	$options['alchem_section_2_content'] = array(
		'id' => 'alchem_section_2_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_2_hide'] = array(
		'id' => 'alchem_section_2_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	// Section Recent Works
	
	$section = 'alchem-section-recent-works';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Recent Works', 'alchem' ),
		'priority' => '13',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_3_model'] = array(
		'id' => 'alchem_section_3_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' ),
		'priority'    => 1,
	);
	
	$options['alchem_section_3_background_color'] = array(
		'id' => 'alchem_section_3_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' =>  $section_background[3]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' ),
		'priority'    => 2,
	);
	
	$options['alchem_section_3_background_image'] = array(
		'id' => 'alchem_section_3_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[3]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' ),
		'priority'    => 3,
	);
	
	$options['alchem_section_3_parallax'] = array(
		'id' => 'alchem_section_3_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	if($home_style == '4'){
        $options['alchem_section_3_top_padding'] = array(
            'id' => 'alchem_section_3_top_padding',
            'label' => __( 'Section Top Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '100px',
            'priority'    => 4,
        );
	}else{
        $options['alchem_section_3_top_padding'] = array(
            'id' => 'alchem_section_3_top_padding',
            'label' => __( 'Section Top Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '50px',
            'priority'    => 4,
        );
	}
	if($home_style == '4'){
        $options['alchem_section_3_bottom_padding'] = array(
            'id' => 'alchem_section_3_bottom_padding',
            'label' => __( 'Section Bottom Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '100px',
            'priority'    => 5,
        );
	}else{
        $options['alchem_section_3_bottom_padding'] = array(
            'id' => 'alchem_section_3_bottom_padding',
            'label' => __( 'Section Bottom Padding', 'alchem' ),
            'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
            'section' => $section,
            'type'    => 'text',
            'default' => '50px',
            'priority'    => 5,
        );
	}
	
	$options['alchem_section_3_title'] = array(
		'id' => 'alchem_section_3_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Recent Works',
		'priority'    => 6,
	);
	
	$options['alchem_section_3_sub_title'] = array(
		'id' => 'alchem_section_3_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue.',
		'priority'    => 6,
	);
	
	$options['alchem_section_3_columns'] = array(
		'id' => 'alchem_section_3_columns',
		'label' => __( 'Columns', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '3',
		'priority'    => 7,
	);
	
	$works = array(
				   'https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/p1.jpg',
				   'https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/p2.jpg',
				   'https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/p3.jpg',
				   'https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/p4-3.jpg',
				   'https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/p5-1.jpg',
				   'https://demo.mageewp.com/alchem/wp-content/uploads/sites/23/2015/12/p6.jpg',
				   '',
				   ''
				   );
	for( $i=0;$i < 8;$i++ ){
		$j = $i+1;
		
		$options['alchem_section_3_image_'.$i] = array(
            'id' => 'alchem_section_3_image_'.$i,
            'label' => sprintf(__( 'Image %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'upload',
            'default' => esc_url($works[$i]),
            'priority'    => 8,
        );
		
        $options['alchem_section_3_link_'.$i] = array(
            'id' => 'alchem_section_3_link_'.$i,
            'label' => sprintf(__( 'Image Link %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '#',
        );
		
        $options['alchem_section_3_target_'.$i] = array(
            'id' => 'alchem_section_3_target_'.$i,
            'label' => sprintf(__( 'Link Target %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'select',
            'choices' => $target,
            'default' => '_blank',
        );	
		
	}
	if( $home_style !== '4'){
        $options['alchem_section_3_button_text'] = array(
            'id' => 'alchem_section_3_button_text',
            'label' => __( 'Button Text', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => 'Launch More',
        );
        $options['alchem_section_3_button_link'] = array(
            'id' => 'alchem_section_3_button_link',
            'label' => __( 'Button Link', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '#',
        );
        $options['alchem_section_3_button_target'] = array(
            'id' => 'alchem_section_3_button_target',
            'label' => __( 'Button Link Target', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'select',
            'choices' => $target,
            'default' => '_blank',
        );
	}
    $options['alchem_section_3_id'] = array(
		'id' => 'alchem_section_3_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-4',
	);
	
	$options['alchem_section_3_content'] = array(
		'id' => 'alchem_section_3_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_3_hide'] = array(
		'id' => 'alchem_section_3_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	// Section Features
	
	$section = 'alchem-section-features';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Features', 'alchem' ),
		'priority' => '14',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_4_model'] = array(
		'id' => 'alchem_section_4_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' ),
		'priority' => '1',
	);
	
	$options['alchem_section_4_color'] = array(
		'id' => 'alchem_section_4_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[4],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_4_background_color'] = array(
		'id' => 'alchem_section_4_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[4]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' ),
		'priority' => '2',
	);
	
	$options['alchem_section_4_background_image'] = array(
		'id' => 'alchem_section_4_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[4]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' ),
		'priority' => '3',
	);
	
	$options['alchem_section_4_parallax'] = array(
		'id' => 'alchem_section_4_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_4_top_padding'] = array(
		'id' => 'alchem_section_4_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '60px',
		'priority' => '4',
	);
	
	$options['alchem_section_4_bottom_padding'] = array(
		'id' => 'alchem_section_4_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
		'priority' => '5',
	);
	
	
	$options['alchem_section_4_title'] = array(
		'id' => 'alchem_section_4_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Use <strong>Alchem Theme</strong> to build beautiful site.',
		'priority' => '6',
	);
	$options['alchem_section_4_sub_title'] = array(
		'id' => 'alchem_section_4_sub_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>Curabitur rhoncus elit sed magna.',
		'priority' => '6',
	);
	
	$options['alchem_section_4_image'] = array(
		'id' => 'alchem_section_4_image',
		'label' => __( 'Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/09/show-img-1.png'),
		'priority' => '7',
	);
	
	$feature_icons   = array('magic','desktop','thumbs-up','','','');
	if($home_style == '4'){
        $feature_titles  = array('Impressive Design','Responsive Layout','Bootstrap Framwork','Responsive Layout','','');
        $featrue_content = array(
							 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.',
							 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.',
							 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.',
							 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.',
							 '',
							 ''
							 );
	}else{
        $feature_titles  = array('Impressive Design','Responsive Layout','Bootstrap Framwork','','','');
        $featrue_content = array(
							 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.',
							 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.',
							 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.',
							 '',
							 '',
							 ''
							 );
	}
	
	
	for( $i=0;$i < 6;$i++ ){
		$j = $i+1;
		$options['alchem_section_4_feature_icon_'.$i] = array(
            'id' => 'alchem_section_4_feature_icon_'.$i,
            'label' => sprintf(__( 'Font Awesome Icon %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $feature_icons[$i],
        );
		
		$options['alchem_section_4_feature_image_'.$i] = array(
            'id' => 'alchem_section_4_feature_image_'.$i,
            'label' => sprintf(__( 'Upload Icon %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'upload',
            'default' => '',
        );
		
		$options['alchem_section_4_feature_title_'.$i] = array(
            'id' => 'alchem_section_4_feature_title_'.$i,
            'label' => sprintf(__( 'Feature Box Title %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $feature_titles[$i],
        );
		
		$options['alchem_section_4_feature_content_'.$i] = array(
            'id' => 'alchem_section_4_feature_content_'.$i,
            'label' => sprintf(__( 'Feature Box Content %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'textarea',
            'default' => $featrue_content[$i],
        );
		
		$options['alchem_section_4_link_'.$i] = array(
            'id' => 'alchem_section_4_link_'.$i,
            'label' => sprintf(__( 'Title Link %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '',
        );
        $options['alchem_section_4_target_'.$i] = array(
            'id' => 'alchem_section_4_target_'.$i,
            'label' => sprintf(__( 'Link Target %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'select',
            'choices' => $target,
            'default' => '_blank',
        );
    }
		
	$options['alchem_section_4_id'] = array(
		'id' => 'alchem_section_4_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-5',
	);
	
	$options['alchem_section_4_content'] = array(
		'id' => 'alchem_section_4_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_4_hide'] = array(
		'id' => 'alchem_section_4_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	// Section About Us
	
	$section = 'alchem-section-about-us';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - About Us', 'alchem' ),
		'priority' => '15',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_5_model'] = array(
		'id' => 'alchem_section_5_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('1'=>__( 'Custom', 'alchem' )),
		'default' => '1',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_5_color'] = array(
		'id' => 'alchem_section_5_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[5],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	
	$options['alchem_section_5_background_color'] = array(
		'id' => 'alchem_section_5_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[5]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_5_background_image'] = array(
		'id' => 'alchem_section_5_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[5]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_5_parallax'] = array(
		'id' => 'alchem_section_5_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_5_top_padding'] = array(
		'id' => 'alchem_section_5_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '60px',
	);
	
	$options['alchem_section_5_bottom_padding'] = array(
		'id' => 'alchem_section_5_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
    $options['alchem_section_5_title'] = array(
		'id' => 'alchem_section_5_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => $title_5,
	);
	$options['alchem_section_5_sub_title'] = array(
		'id' => 'alchem_section_5_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => $sub_title_5,

	);
		
	$options['alchem_section_5_id'] = array(
		'id' => 'alchem_section_5_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-6',
	);
	
	$options['alchem_section_5_content'] = array(
		'id' => 'alchem_section_5_content',
		'label' => __( 'Section Content', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'textarea',
		'default' => $about_us_content ,
	);
	

	$options['alchem_section_5_hide'] = array(
		'id' => 'alchem_section_5_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	
	// Section Our Team
	$section = 'alchem-section-team';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Our Team', 'alchem' ),
		'priority' => '16',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_6_model'] = array(
		'id' => 'alchem_section_6_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_6_color'] = array(
		'id' => 'alchem_section_6_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[6],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_6_background_color'] = array(
		'id' => 'alchem_section_6_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[6]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_6_background_image'] = array(
		'id' => 'alchem_section_6_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[6]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_6_parallax'] = array(
		'id' => 'alchem_section_6_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_6_top_padding'] = array(
		'id' => 'alchem_section_6_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_6_bottom_padding'] = array(
		'id' => 'alchem_section_6_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_6_title'] = array(
		'id' => 'alchem_section_6_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Our Team',
	);
	
	$options['alchem_section_6_sub_title'] = array(
		'id' => 'alchem_section_6_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue.',
	);
	
	$options['alchem_section_6_columns'] = array(
		'id' => 'alchem_section_6_columns',
		'label' => __( 'Columns', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '4',
	);
	
	
	$avatar = array(
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-3.jpg'),
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-1.jpg'),
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-2.jpg'),
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-4.jpg'),
					'',
					'',
					'',
					'');
	$name        = array('JOHN GREEN','JOHN GREEN','JOHN GREEN','JOHN GREEN','','','','');
	$byline      = array('CEO','CEO','CEO','CEO','','','','');
	$social_icon = array('instagram','facebook','google-plus','envelope');
	
	for( $i=0;$i < 8;$i++ ){
		$j = $i+1;
				
		$options['alchem_section_6_avatar_'.$i] = array(
            'id' => 'alchem_section_6_avatar_'.$i,
            'label' => sprintf(__( 'Upload Avatar %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'upload',
            'default' => $avatar[$i],
        );
		$options['alchem_section_6_link_'.$i] = array(
            'id' => 'alchem_section_6_link_'.$i,
            'label' => sprintf(__( 'Avatar Link %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '#',
        );
		
		$options['alchem_section_6_name_'.$i] = array(
            'id' => 'alchem_section_6_name_'.$i,
            'label' => sprintf(__( 'Name %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $name[$i],
        );
		$options['alchem_section_6_byline_'.$i] = array(
            'id' => 'alchem_section_6_byline_'.$i,
            'label' => sprintf(__( 'Byline %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $byline[$i],
        );
		
		$options['alchem_section_6_desc_'.$i] = array(
            'id' => 'alchem_section_6_desc_'.$i,
            'label' => sprintf(__( 'Description %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'textarea',
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue. Quisque nibh nunc, dapibus id pulvinar id, interdum quis enim.',
        );
		for($k=0;$k<4;$k++):
		
            $options['alchem_section_6_social_icon_'.$i.'_'.$k] = array(
                'id' => 'alchem_section_6_social_icon_'.$i.'_'.$k,
                'label' => sprintf(__( 'Social Icon %d - %d', 'alchem' ),$j,$k+1),
                'description'   => '',
                'section' => $section,
                'type'    => 'text',
                'default' => $social_icon[$k],
            );
            $options['alchem_section_6_social_link_'.$i.'_'.$k] = array(
                'id' => 'alchem_section_6_social_link_'.$i.'_'.$k,
                'label' => sprintf(__( 'Social Icon Link %d - %d', 'alchem' ),$j,$k+1),
                'description'   => '',
                'section' => $section,
                'type'    => 'text',
                'default' => '#',
            );
	
		endfor;
		
    }
		
	$options['alchem_section_6_id'] = array(
		'id' => 'alchem_section_6_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-7',
	);
	
	$options['alchem_section_6_content'] = array(
		'id' => 'alchem_section_6_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_6_hide'] = array(
		'id' => 'alchem_section_6_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
    
    // tape products section
    $section = 'alchem-section-tape-products';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Tape Products', 'alchem' ),
		'priority' => '17',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_7_model'] = array(
		'id' => 'alchem_section_7_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_7_color'] = array(
		'id' => 'alchem_section_7_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[7],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_7_background_color'] = array(
		'id' => 'alchem_section_7_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[7]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_7_background_image'] = array(
		'id' => 'alchem_section_7_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[7]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_7_parallax'] = array(
		'id' => 'alchem_section_7_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_7_top_padding'] = array(
		'id' => 'alchem_section_7_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_7_bottom_padding'] = array(
		'id' => 'alchem_section_7_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_7_title'] = array(
		'id' => 'alchem_section_7_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Tape Products',
	);
	
	$options['alchem_section_7_sub_title'] = array(
		'id' => 'alchem_section_7_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue.',
	);
	
	$options['alchem_section_7_columns'] = array(
		'id' => 'alchem_section_7_columns',
		'label' => __( 'Columns', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '4',
	);
	
	
	$avatar = array(
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-3.jpg'),
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-1.jpg'),
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-2.jpg'),
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-4.jpg'),
					'',
					'',
					'',
					'');
	$name        = array('JOHN GREEN','JOHN GREEN','JOHN GREEN','JOHN GREEN','','','','');
	$byline      = array('CEO','CEO','CEO','CEO','','','','');
	$social_icon = array('instagram','facebook','google-plus','envelope');
	
	for( $i=0;$i < 8;$i++ ){
		$j = $i+1;
				
		$options['alchem_section_7_avatar_'.$i] = array(
            'id' => 'alchem_section_7_avatar_'.$i,
            'label' => sprintf(__( 'Upload Avatar %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'upload',
            'default' => $avatar[$i],
        );
		$options['alchem_section_7_link_'.$i] = array(
            'id' => 'alchem_section_7_link_'.$i,
            'label' => sprintf(__( 'Avatar Link %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '#',
        );
		
		$options['alchem_section_7_name_'.$i] = array(
            'id' => 'alchem_section_7_name_'.$i,
            'label' => sprintf(__( 'Name %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $name[$i],
        );
		$options['alchem_section_7_byline_'.$i] = array(
            'id' => 'alchem_section_7_byline_'.$i,
            'label' => sprintf(__( 'Byline %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $byline[$i],
        );
		
		$options['alchem_section_7_desc_'.$i] = array(
            'id' => 'alchem_section_7_desc_'.$i,
            'label' => sprintf(__( 'Description %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'textarea',
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue. Quisque nibh nunc, dapibus id pulvinar id, interdum quis enim.',
        );
		for($k=0;$k<4;$k++):
		
            $options['alchem_section_7_social_icon_'.$i.'_'.$k] = array(
                'id' => 'alchem_section_7_social_icon_'.$i.'_'.$k,
                'label' => sprintf(__( 'Social Icon %d - %d', 'alchem' ),$j,$k+1),
                'description'   => '',
                'section' => $section,
                'type'    => 'text',
                'default' => $social_icon[$k],
            );
            $options['alchem_section_7_social_link_'.$i.'_'.$k] = array(
                'id' => 'alchem_section_7_social_link_'.$i.'_'.$k,
                'label' => sprintf(__( 'Social Icon Link %d - %d', 'alchem' ),$j,$k+1),
                'description'   => '',
                'section' => $section,
                'type'    => 'text',
                'default' => '#',
            );
	
		endfor;
		
    }
		
	$options['alchem_section_7_id'] = array(
		'id' => 'alchem_section_7_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-8',
	);
	
	$options['alchem_section_7_content'] = array(
		'id' => 'alchem_section_7_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_7_hide'] = array(
		'id' => 'alchem_section_7_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
    
    // printing products
    $section = 'alchem-section-printing-products';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Printing Products', 'alchem' ),
		'priority' => '18',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_8_model'] = array(
		'id' => 'alchem_section_8_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_8_color'] = array(
		'id' => 'alchem_section_8_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[8],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_8_background_color'] = array(
		'id' => 'alchem_section_8_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[8]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_8_background_image'] = array(
		'id' => 'alchem_section_8_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[8]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_8_parallax'] = array(
		'id' => 'alchem_section_8_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_8_top_padding'] = array(
		'id' => 'alchem_section_8_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_8_bottom_padding'] = array(
		'id' => 'alchem_section_8_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_8_title'] = array(
		'id' => 'alchem_section_8_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Printing Products',
	);
	
	$options['alchem_section_8_sub_title'] = array(
		'id' => 'alchem_section_8_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue.',
	);
	
	$options['alchem_section_8_columns'] = array(
		'id' => 'alchem_section_8_columns',
		'label' => __( 'Columns', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '4',
	);
	
	
	$avatar = array(
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-3.jpg'),
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-1.jpg'),
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-2.jpg'),
					esc_url('https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/team-img-4.jpg'),
					'',
					'',
					'',
					'');
	$name        = array('JOHN GREEN','JOHN GREEN','JOHN GREEN','JOHN GREEN','','','','');
	$byline      = array('CEO','CEO','CEO','CEO','','','','');
	$social_icon = array('instagram','facebook','google-plus','envelope');
	
	for( $i=0;$i < 8;$i++ ){
		$j = $i+1;
				
		$options['alchem_section_8_avatar_'.$i] = array(
            'id' => 'alchem_section_8_avatar_'.$i,
            'label' => sprintf(__( 'Upload Avatar %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'upload',
            'default' => $avatar[$i],
        );
        $options['alchem_section_8_link_'.$i] = array(
            'id' => 'alchem_section_8_link_'.$i,
            'label' => sprintf(__( 'Avatar Link %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '#',
        );
		
		$options['alchem_section_8_name_'.$i] = array(
            'id' => 'alchem_section_8_name_'.$i,
            'label' => sprintf(__( 'Name %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $name[$i],
        );
		$options['alchem_section_8_byline_'.$i] = array(
            'id' => 'alchem_section_8_byline_'.$i,
            'label' => sprintf(__( 'Byline %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $byline[$i],
        );
		
		$options['alchem_section_8_desc_'.$i] = array(
            'id' => 'alchem_section_8_desc_'.$i,
            'label' => sprintf(__( 'Description %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'textarea',
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue. Quisque nibh nunc, dapibus id pulvinar id, interdum quis enim.',
        );
		for($k=0;$k<4;$k++):
		
            $options['alchem_section_8_social_icon_'.$i.'_'.$k] = array(
                'id' => 'alchem_section_8_social_icon_'.$i.'_'.$k,
                'label' => sprintf(__( 'Social Icon %d - %d', 'alchem' ),$j,$k+1),
                'description'   => '',
                'section' => $section,
                'type'    => 'text',
                'default' => $social_icon[$k],
            );
            $options['alchem_section_8_social_link_'.$i.'_'.$k] = array(
                'id' => 'alchem_section_8_social_link_'.$i.'_'.$k,
                'label' => sprintf(__( 'Social Icon Link %d - %d', 'alchem' ),$j,$k+1),
                'description'   => '',
                'section' => $section,
                'type'    => 'text',
                'default' => '#',
            );
	
		endfor;
		
    }
		
	$options['alchem_section_8_id'] = array(
		'id' => 'alchem_section_8_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-9',
	);
	
	$options['alchem_section_8_content'] = array(
		'id' => 'alchem_section_8_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_8_hide'] = array(
		'id' => 'alchem_section_8_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	// Section Testimonials
	
	$section = 'alchem-section-testimonials';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Testimonials', 'alchem' ),
		'priority' => '19',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_9_model'] = array(
		'id' => 'alchem_section_9_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_9_color'] = array(
		'id' => 'alchem_section_9_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[9],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_9_background_color'] = array(
		'id' => 'alchem_section_9_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[9]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_9_background_image'] = array(
		'id' => 'alchem_section_9_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[9]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_9_parallax'] = array(
		'id' => 'alchem_section_9_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_9_top_padding'] = array(
		'id' => 'alchem_section_9_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_9_bottom_padding'] = array(
		'id' => 'alchem_section_9_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_9_title'] = array(
		'id' => 'alchem_section_9_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Testimonials',
	);
	
	$options['alchem_section_9_sub_title'] = array(
		'id' => 'alchem_section_9_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	);
	
	$options['alchem_section_9_columns'] = array(
		'id' => 'alchem_section_9_columns',
		'label' => __( 'Columns', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '3',
	);
	
	
	$avatar = array(
					esc_url('https://demo.mageewp.com/onetone/wp-content/uploads/sites/17/2015/11/111.jpg'),
					esc_url('https://demo.mageewp.com/onetone/wp-content/uploads/sites/17/2015/11/222.jpg'),
					esc_url('https://demo.mageewp.com/onetone/wp-content/uploads/sites/17/2015/11/222.jpg'),
					'',
					'',
					'',
					'',
					'');
	$name        = array('JACK GREEN','ANNA CASS','ANNA CASS','','','');
	$byline      = array('Web Developer','Conference','Conference','','','');
	$description = array(
						 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec. Cras a sem mattis, tincidunt urna nec, iaculis nisl. Nam congue ultricies dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec. Cras a sem mattis, tincidunt urna nec, iaculis nisl. Nam congue ultricies dui.',
						 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec. Cras a sem mattis, tincidunt urna nec, iaculis nisl. Nam congue ultricies dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec. Cras a sem mattis, tincidunt urna nec, iaculis nisl. Nam congue ultricies dui.',
						 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec. Cras a sem mattis, tincidunt urna nec, iaculis nisl. Nam congue ultricies dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec. Cras a sem mattis, tincidunt urna nec, iaculis nisl. Nam congue ultricies dui.',
						 '',
						 '',
						 ''
						 );
		
	for( $i=0;$i < 6;$i++ ){
		$j = $i+1;
				
		$options['alchem_section_9_avatar_'.$i] = array(
            'id' => 'alchem_section_9_avatar_'.$i,
            'label' => sprintf(__( 'Upload Avatar %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'upload',
            'default' => $avatar[$i],
        );
	
		
		$options['alchem_section_9_name_'.$i] = array(
            'id' => 'alchem_section_9_name_'.$i,
            'label' => sprintf(__( 'Name %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $name[$i],
        );
		$options['alchem_section_9_byline_'.$i] = array(
            'id' => 'alchem_section_9_byline_'.$i,
            'label' => sprintf(__( 'Byline %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $byline[$i],
        );
		
		$options['alchem_section_9_desc_'.$i] = array(
            'id' => 'alchem_section_9_desc_'.$i,
            'label' => sprintf(__( 'Description %d', 'alchem' ),$j),
            'description'   => '',
            'section' => $section,
            'type'    => 'textarea',
            'default' => $description[$i],
        );
    }
		
	$options['alchem_section_9_id'] = array(
		'id' => 'alchem_section_9_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-10',
	);
	
	$options['alchem_section_9_content'] = array(
		'id' => 'alchem_section_9_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_9_hide'] = array(
		'id' => 'alchem_section_9_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	// Section Latest News
	$section = 'alchem-section-news';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Latest News', 'alchem' ),
		'priority' => '20',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_10_model'] = array(
		'id' => 'alchem_section_10_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_10_color'] = array(
		'id' => 'alchem_section_10_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[10],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_10_background_color'] = array(
		'id' => 'alchem_section_10_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[10]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_10_background_image'] = array(
		'id' => 'alchem_section_10_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[10]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_10_parallax'] = array(
		'id' => 'alchem_section_10_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_10_top_padding'] = array(
		'id' => 'alchem_section_10_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_10_bottom_padding'] = array(
		'id' => 'alchem_section_10_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_10_title'] = array(
		'id' => 'alchem_section_10_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Latest News',
	);
	
	$options['alchem_section_10_sub_title'] = array(
		'id' => 'alchem_section_10_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue gravida ligula eget congue.',
	);
	
	$options['alchem_section_10_columns'] = array(
		'id' => 'alchem_section_10_columns',
		'label' => __( 'Columns', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '3',
	);
	
	$options['alchem_section_10_posts_num'] = array(
		'id' => 'alchem_section_10_posts_num',
		'label' => __( 'Posts Num', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10),
		'default' => '3',
	);
	
	
	$options['alchem_section_10_id'] = array(
		'id' => 'alchem_section_10_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-11',
	);
	
	$options['alchem_section_10_content'] = array(
		'id' => 'alchem_section_10_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_10_hide'] = array(
		'id' => 'alchem_section_10_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	// Section Partners
	$section = 'alchem-section-partners';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Partners', 'alchem' ),
		'priority' => '20',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_11_model'] = array(
		'id' => 'alchem_section_11_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_11_color'] = array(
		'id' => 'alchem_section_11_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[11],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_11_background_color'] = array(
		'id' => 'alchem_section_11_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[11]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_11_background_image'] = array(
		'id' => 'alchem_section_11_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[11]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_11_parallax'] = array(
		'id' => 'alchem_section_11_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_11_top_padding'] = array(
		'id' => 'alchem_section_11_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '20px',
	);
	
	$options['alchem_section_11_bottom_padding'] = array(
		'id' => 'alchem_section_11_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '30px',
	);
	
	$options['alchem_section_11_title'] = array(
		'id' => 'alchem_section_11_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Our Clients',
	);
	
	$options['alchem_section_11_sub_title'] = array(
		'id' => 'alchem_section_11_sub_title',
		'label' => __( 'Subtitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	);
	
	$partners = array(
					  'https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/partners1.png',
					  'https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/partners2.png',
					  'https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/partners3.png',
					  'https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/partners4.png',
					  'https://demo.mageewp.com/alchem/wp-content/uploads/sites/21/2015/08/partners5.png',
					  ''
					  );
	
    for( $i=0;$i<5;$i++){
	   
        $options['alchem_section_11_partner_'.$i] = array(
        'id' => 'alchem_section_11_partner_'.$i,
        'label' => __( 'Upload Image', 'alchem' ),
        'description'   => '',
        'section' => $section,
        'type'    => 'upload',
        'default' => $partners[$i],
        );

        $options['alchem_section_11_link_'.$i] = array(
        'id' => 'alchem_section_11_link_'.$i,
        'label' => __( 'Link', 'alchem' ),
        'description'   => '',
        'section' => $section,
        'type'    => 'text',
        'default' => '#',
        );
		
        $options['alchem_section_11_title_'.$i] = array(
            'id' => 'alchem_section_11_title_'.$i,
            'label' => __( 'Tooltip Title', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '',
        );
	   
    }
	
	$options['alchem_section_11_id'] = array(
		'id' => 'alchem_section_11_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-12',
	);
	
	$options['alchem_section_11_content'] = array(
		'id' => 'alchem_section_11_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_11_hide'] = array(
		'id' => 'alchem_section_11_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);


// Section Slogan
	$section = 'alchem-section-slogan';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Slogan', 'alchem' ),
		'priority' => '21',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_12_model'] = array(
		'id' => 'alchem_section_12_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_12_color'] = array(
		'id' => 'alchem_section_12_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_color[12],
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_12_background_color'] = array(
		'id' => 'alchem_section_12_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $section_background[12]['color'],
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_12_background_image'] = array(
		'id' => 'alchem_section_12_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => $section_background[12]['image'],
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_12_parallax'] = array(
		'id' => 'alchem_section_12_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_12_top_padding'] = array(
		'id' => 'alchem_section_12_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_12_bottom_padding'] = array(
		'id' => 'alchem_section_12_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	if($home_style == '5'){
        $options['alchem_section_12_title'] = array(
            'id' => 'alchem_section_12_title',
            'label' => __( 'Title', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => 'The most elegant theme you\'ve ever seen.Want it? Feel free to contact us.',
        );
	}else{
        $options['alchem_section_12_title'] = array(
            'id' => 'alchem_section_12_title',
            'label' => __( 'Title', 'alchem' ),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => 'The most elegant theme you\'ve ever seen.<br>Want it? Feel free to contact us.',
        );
	}
	
	
	
	$options['alchem_section_12_button_text'] = array(
		'id' => 'alchem_section_12_button_text',
		'label' => __( 'Button Text', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Get The Theme!',
	);
	$options['alchem_section_12_button_link'] = array(
		'id' => 'alchem_section_12_button_link',
		'label' => __( 'Button Link', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
	$options['alchem_section_12_button_target'] = array(
		'id' => 'alchem_section_12_button_target',
		'label' => __( 'Button Link Target', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);
	
	
	$options['alchem_section_12_id'] = array(
		'id' => 'alchem_section_12_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-13',
	);
	
	$options['alchem_section_12_content'] = array(
		'id' => 'alchem_section_12_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_12_hide'] = array(
		'id' => 'alchem_section_12_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	// Pricing Table
	
	$section = 'alchem-section-pricing-table';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Pricing Table', 'alchem' ),
		'priority' => '22',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_13_model'] = array(
		'id' => 'alchem_section_13_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_13_color'] = array(
		'id' => 'alchem_section_13_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_13_background_color'] = array(
		'id' => 'alchem_section_13_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_13_background_image'] = array(
		'id' => 'alchem_section_13_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_13_parallax'] = array(
		'id' => 'alchem_section_13_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_13_top_padding'] = array(
		'id' => 'alchem_section_13_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_13_bottom_padding'] = array(
		'id' => 'alchem_section_13_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_13_title'] = array(
		'id' => 'alchem_section_13_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Pricing Table',
	);
	
	$options['alchem_section_13_sub_title'] = array(
		'id' => 'alchem_section_13_sub_title',
		'label' => __( 'Subitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	
	//
	$featured = array('','1','','');
	$icon     = array('umbrella','tint','diamond','heart-o');
	$price     = array('39.95','49.95','59.95','69.95');
	$title     = array('Standard','Professional','Elite','Deluxe');
	$features = array(
					  "6 GB Bandwidth\r\n2 GB\r\n8 GB Storage\r\nLimited\r\n2 Projects",
					  "8 GB Bandwidth\r\n3 GB\r\n16 GB Storage\r\nLimited\r\n4 Projects",
					  "10 GB Bandwidth\r\n4 GB\r\n32 GB Storage\r\nLimited\r\n6 Projects",
					  "12 GB Bandwidth\r\n5 GB\r\n64 GB Storage\r\nLimited\r\n8 Projects",
					  );
	
	
	for( $i=1; $i<=4; $i++ ){
	
        $options['alchem_section_13_featured_'.$i] = array(
            'id' => 'alchem_section_13_featured_'.$i,
            'label' => __( 'Featured', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'checkbox',
            'default' => $featured[$i-1],
        );
        
        $options['alchem_section_13_icon_'.$i] = array(
            'id' => 'alchem_section_13_icon_'.$i,
            'label' => __( 'Font Awesome Icon', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $icon[$i-1],
        );
        $options['alchem_section_13_image_'.$i] = array(
            'id' => 'alchem_section_13_image_'.$i,
            'label' => __( 'Upload Image Icon', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'upload',
            'default' => '',
        );
	
        $options['alchem_section_13_title_'.$i] = array(
            'id' => 'alchem_section_13_title_'.$i,
            'label' => __( 'Pricing Box Title', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $title[$i-1],
        );
	  
        $options['alchem_section_13_currency_'.$i] = array(
            'id' => 'alchem_section_13_currency_'.$i,
            'label' => __( 'Currency', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '$',
        );
        $options['alchem_section_13_price_'.$i] = array(
            'id' => 'alchem_section_13_price_'.$i,
            'label' => __( 'Price', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => $price[$i-1],
        );
	  
        $options['alchem_section_13_unit_'.$i] = array(
            'id' => 'alchem_section_13_unit_'.$i,
            'label' => __( 'Unit', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => 'year',
        );

        $options['alchem_section_13_features_'.$i] = array(
            'id' => 'alchem_section_13_features_'.$i,
            'label' => __( 'Features', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'textarea',
            'default' => $features[$i-1],
        );
	  
	  
        $options['alchem_section_13_button_text_'.$i] = array(
            'id' => 'alchem_section_13_button_text_'.$i,
            'label' => __( 'Button Text', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => 'Buy Now',
        );
        $options['alchem_section_13_button_link_'.$i] = array(
            'id' => 'alchem_section_13_button_link_'.$i,
            'label' => __( 'Button Link', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'text',
            'default' => '#',
        );
        $options['alchem_section_13_button_target_'.$i] = array(
            'id' => 'alchem_section_13_button_target_'.$i,
            'label' => __( 'Button Link Target', 'alchem' ).' '.sprintf( __('(Item %d)','alchem' ),$i),
            'description'   => '',
            'section' => $section,
            'type'    => 'select',
            'choices' => $target,
            'default' => '_blank',
        );
	}
	
	//
	
	$options['alchem_section_13_id'] = array(
		'id' => 'alchem_section_13_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-14',
	);
	
	$options['alchem_section_13_content'] = array(
		'id' => 'alchem_section_13_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);

	$options['alchem_section_13_hide'] = array(
		'id' => 'alchem_section_13_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1',
	);
	
	
	// Section Portfolios
	$section = 'alchem-section-portfolio';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Portfolios', 'alchem' ),
		'priority' => '23',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_14_model'] = array(
		'id' => 'alchem_section_14_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	if($home_style == '4'){
	$options['alchem_section_14_color'] = array(
		'id' => 'alchem_section_14_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#1d1d1d',
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	}else{
	$options['alchem_section_14_color'] = array(
		'id' => 'alchem_section_14_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#ffffff',
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	}
	
	
	$options['alchem_section_14_background_color'] = array(
		'id' => 'alchem_section_14_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#000000',
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_14_background_image'] = array(
		'id' => 'alchem_section_14_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_14_parallax'] = array(
		'id' => 'alchem_section_14_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_14_top_padding'] = array(
		'id' => 'alchem_section_14_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_14_bottom_padding'] = array(
		'id' => 'alchem_section_14_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_14_title'] = array(
		'id' => 'alchem_section_14_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Portfolios',
	);
	
	$options['alchem_section_14_sub_title'] = array(
		'id' => 'alchem_section_14_sub_title',
		'label' => __( 'Subitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>Curabitur rhoncus elit sed magna.',

	);
	
	$options['alchem_section_14_columns'] = array(
		'id' => 'alchem_section_14_columns',
		'label' => __( 'Columns', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '3',
	);
	
	$options['alchem_section_14_posts_num'] = array(
		'id' => 'alchem_section_14_posts_num',
		'label' => __( 'Posts Num', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12),
		'default' => '6',
	);
	
	
	$options['alchem_section_14_id'] = array(
		'id' => 'alchem_section_14_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-15',
	);
	
	$options['alchem_section_14_content'] = array(
		'id' => 'alchem_section_14_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_14_hide'] = array(
		'id' => 'alchem_section_14_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1',
	);
	
	
	// Section Contact
	$section = 'alchem-section-contact';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Contact', 'alchem' ),
		'priority' => '24',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_13_model'] = array(
		'id' => 'alchem_section_13_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_13_color'] = array(
		'id' => 'alchem_section_13_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_13_background_color'] = array(
		'id' => 'alchem_section_13_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#ffffff',
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_13_background_image'] = array(
		'id' => 'alchem_section_13_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_13_parallax'] = array(
		'id' => 'alchem_section_13_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_13_top_padding'] = array(
		'id' => 'alchem_section_13_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_13_bottom_padding'] = array(
		'id' => 'alchem_section_13_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_13_title'] = array(
		'id' => 'alchem_section_13_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'CONTACT',
	);
	$options['alchem_section_13_sub_title'] = array(
		'id' => 'alchem_section_13_sub_title',
		'label' => __( 'Subitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	
	$options['alchem_gmap_api'] = array(
		'id' => 'alchem_gmap_api',
		'label' => __( 'Google Map API Key', 'alchem' ),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	
	$options['alchem_section_13_address'] = array(
		'id' => 'alchem_section_13_address',
		'label' => __( 'Map Address', 'alchem' ),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'New York City',
	);
	
	$options['alchem_section_13_infobox_content'] = array(
		'id' => 'alchem_section_13_infobox_content',
		'label' => __( 'Map Infobox Content', 'alchem' ),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'New York City',
	);
	
	$options['alchem_section_13_receiver'] = array(
		'id' => 'alchem_section_13_receiver',
		'label' => __( 'Contact Form Receiver Email', 'alchem' ),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => get_option( 'admin_email' ),
	);
	
	
	$options['alchem_section_13_display_terms'] = array(
        'id'          => 'alchem_section_13_display_terms',
        'label'       => __( 'Display Contact Form Terms', 'alchem' ),
        'description' => '',
        'default'     => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $choices
      );
	
	$options['alchem_section_13_terms_text'] = array(
		'id' => 'alchem_section_13_terms_text',
		'label' => __( 'Contact Form Terms Content', 'alchem' ),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'I have read and understood your reasonable terms <span class="required">*</span>',
	);
	
	
	$options['alchem_section_13_id'] = array(
		'id' => 'alchem_section_13_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-14',
	);
	
	$options['alchem_section_13_content'] = array(
		'id' => 'alchem_section_13_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_13_hide'] = array(
		'id' => 'alchem_section_13_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1',
	);
	
	
	// Section Latest Products
	$section = 'alchem-section-products';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Recent Products', 'alchem' ),
		'priority' => '25',
		'description' => '',
		'panel' => $panel
	);
	$options['alchem_section_14_model'] = array(
		'id' => 'alchem_section_14_model',
		'label'   => __( 'Content Model', 'alchem' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'alchem' ),'1'=>__( 'Custom', 'alchem' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'alchem' )
	);
	
	$options['alchem_section_14_color'] = array(
		'id' => 'alchem_section_14_color',
		'label'   => __( 'Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set color for this section.', 'alchem' )
	);
	
	$options['alchem_section_14_background_color'] = array(
		'id' => 'alchem_section_14_background_color',
		'label'   => __( 'Background Color', 'alchem' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#eeeeee',
		'description' => __( 'Set background color for this section.', 'alchem' )
	);
	
	$options['alchem_section_14_background_image'] = array(
		'id' => 'alchem_section_14_background_image',
		'label'   => __( 'Background Image', 'alchem' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'alchem' )
	);
	
	$options['alchem_section_14_parallax'] = array(
		'id' => 'alchem_section_14_parallax',
		'label' => __( 'Background Parallax Image', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '0',
	);
	
	$options['alchem_section_14_top_padding'] = array(
		'id' => 'alchem_section_14_top_padding',
		'label' => __( 'Section Top Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_14_bottom_padding'] = array(
		'id' => 'alchem_section_14_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'alchem' ),
		'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['alchem_section_14_title'] = array(
		'id' => 'alchem_section_14_title',
		'label' => __( 'Title', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Recent Products',
	);
	
	$options['alchem_section_14_sub_title'] = array(
		'id' => 'alchem_section_14_sub_title',
		'label' => __( 'Subitle', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	
	$options['alchem_section_14_columns'] = array(
		'id' => 'alchem_section_14_columns',
		'label' => __( 'Columns', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '4',
	);
	
	$options['alchem_section_14_posts_num'] = array(
		'id' => 'alchem_section_14_posts_num',
		'label' => __( 'Products Num', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10),
		'default' => '3',
	);
	
	
	$options['alchem_section_14_id'] = array(
		'id' => 'alchem_section_14_id',
		'label' => __( 'Section ID', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-15',
	);
	
	$options['alchem_section_14_content'] = array(
		'id' => 'alchem_section_14_content',
		'label' => __( 'Custom Section Content', 'alchem' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'alchem' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['alchem_section_14_hide'] = array(
		'id' => 'alchem_section_14_hide',
		'label' => __( 'Hide Section', 'alchem' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1',
	);
	
	
	##### General panel #####
	
	// General panel
	$panel = 'general';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'General', 'alchem' ),
		'priority' => '1'
	);
	
	
		
		// Tracking Options
   $section = 'tracking-options';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Tracking Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
		
	 $options['alchem_tracking_code'] =  array(
        'id'          => 'alchem_tracking_code',
        'label'      => __( 'Tracking Code', 'alchem' ),
        'description' => __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the header template of your theme. Please put code inside script tags.', 'alchem' ),
        'default' => '',
        'type' => 'textarea',
        'section' => $section,
        
      );
	 $options['alchem_space_before_head'] =  array(
        'id'          => 'alchem_space_before_head',
        'label'       => __( 'Space before &lt;/head&gt;', 'alchem' ),
        'description' => __( 'Add code before the head tag.', 'alchem' ),
        'default'     => '',
        'type'        => 'textarea',
        'section' => $section,
        
      );
	 $options['alchem_space_before_body'] =  array(
        'id'          => 'alchem_space_before_body',
        'label'       => __( 'Space before &lt;/body&gt;', 'alchem' ),
        'description' => __( 'Add code before the body tag.', 'alchem' ),
        'default'     => '',
        'type'        => 'textarea',
        'section' => $section,
        
      );
	 
	 // Custom CSS
	 $section = 'custom-css';
	 $sections[] = array(
		'id' => $section,
		'title' => __( 'Custom CSS', 'alchem' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);
		
		
	 $options['alchem_custom_css'] =  array(
        'id'          => 'alchem_custom_css',
        'label'       => __( 'Custom CSS', 'alchem' ),
        'description' => __( 'The following css code will add to the header before the closing &lt;/head&gt; tag.', 'alchem'),
        'default'     => '#custom {
      }',
        'type'        => 'textarea',
        'section'     => $section,
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses'
        
      );
	 
	  
	##### Site Width #####
	
	// Site Width panel
	
	$panel = 'site-width';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Site Width', 'alchem' ),
		'priority' => '2'
	);
	
	// Layout Options
	$section = 'layout-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Layout Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
     $options['alchem_layout'] = array(
        'id'          => 'alchem_layout',
        'label'      => __( 'Layout', 'alchem' ),
        'description'        => __( 'Select boxed or wide layout.', 'alchem' ),
        'default'         => 'wide',
        'type'        => 'select',
        'section' => $section,
        'choices'     => array( 
          'boxed'     => __( 'Boxed', 'alchem' ),
		   'wide'     => __( 'Wide', 'alchem' ),         
        )
      );
	$options['alchem_site_width'] = 	 array(
        'id'          => 'alchem_site_width',
        'label'      => __( 'Site Width', 'alchem' ),
        'description'        => __( 'Controls the overall site width. In px or %, ex: 100% or 1170px.', 'alchem' ),
        'default'         => '1170px',
        'type'        => 'text',
        'section' => $section,
        
        
        
    );
	// Content Width/Sidebar Width
  
    $section = 'content-sidebar';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Content Width/Sidebar Width', 'alchem' ),
		'priority' => '10',
		'description' => __( 'These settings are used on pages with 1 sidebar. Total values must add up to 100.', 'alchem' ),
		'panel' => $panel
	);
		 
	$options['alchem_content_width_1'] = array(
        'id'          => 'alchem_content_width_1',
        'label'       => __( 'Content Width', 'alchem' ),
        'description' => __( 'Controls the width of the content area. In px or %, ex: 100% or 1170px.', 'alchem' ),
        'default'     => '75%%',
        'type'        => 'text',
        'section' => $section,
        
    );
		  
	$options['alchem_sidebar_width'] = array(
        'id'          => 'alchem_sidebar_width',
        'label'       => __( 'Sidebar Width', 'alchem' ),
        'description' => __( 'Controls the width of the sidebar. In px or %.', 'alchem' ),
        'default'     => '25%%',
        'type'        => 'text',
        'section' => $section,
        
    );		
    $options['alchem_content_width_titled_2'] =  array(
        'id'          => 'alchem_content_width_titled_2',
        'label'      => __( 'Content Width/Left Sidebar Width/Right Sidebar Width', 'alchem' ),
        'description'        => __( 'These settings are used on pages with 2 sidebars. Total values must add up to 100.', 'alchem' ),
        'default'         => '',
        'type'        => 'textblock-titled',
        'section' => $section,
        
    );
		 
	// Content Width/Sidebar Width
  
    $section = 'content-sidebar-sidebar';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Content Width/Left & Right Sidebar Width', 'alchem' ),
		'priority' => '10',
		'description' => __( 'These settings are used on pages with 2 sidebars. Total values must add up to 100.', 'alchem' ),
		'panel' => $panel
	);

    $options['alchem_content_width_2'] = array(
    'id' => 'alchem_content_width_2',
    'label' => __( 'Content Width', 'alchem' ),
    'description'   => __( 'Controls the width of the content area. In px or %, ex: 100% or 1170px.', 'alchem' ),
    'section' => $section,
    'type'    => 'text',
    'default' => '60%%',
    );
		  
	$options['alchem_sidebar_width_1'] =    array(
	'id'          => 'alchem_sidebar_width_1',
	'label'      => __( 'Sidebar 1 Width', 'alchem' ),
	'description'        => __( 'Controls the width of the sidebar 1. In px or %.', 'alchem' ),
	'default'         => '20%%',
	'type'        => 'text',
	'section' => $section,
	
    );
	$options['alchem_sidebar_width_2'] =     array(
	'id'          => 'alchem_sidebar_width_2',
	'label'      => __( 'Sidebar 2 Width', 'alchem' ),
	'description'        => __( 'Controls the width of the sidebar 2. In px or %.', 'alchem' ),
	'default'         => '20%%',
	'type'        => 'text',
	'section' => $section,
	
    );
	
		  
    // styleling

 
### Styling ###
    $panel = 'styling';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Styling', 'alchem' ),
		'priority' => '2'
	);
	
	$section = 'styling_general';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General', 'alchem' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);
			
    $options[] = array(
        'id'          => 'alchem_scheme',
        'label'       => __( 'Primary Color', 'alchem' ),
        'description' => __( 'Set primary color for your site.', 'alchem' ),
        'default'     => '#fdd200',
        'type'        => 'color',
        'section'     => $section,
    );
	
	//Background Colors

    $section = 'background_colors';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Background Colors', 'alchem' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);

    $options['alchem_sticky_header_background_color'] =  array(
        'id'          => 'alchem_sticky_header_background_color',
        'label'      => __( 'Sticky Header Background Color', 'alchem' ),
        'description'        => __( 'Set background color for sticky header.', 'alchem' ),
        'default'         => '#ffffff',
        'type'        => 'color',
        'section' => $section,

    );
    $options['alchem_sticky_header_background_opacity'] = array(
        'id'          => 'alchem_sticky_header_background_opacity',
        'label'      => __( 'Sticky Header Background Opacity', 'alchem' ),
        'description'        => __( 'Opacity only works with header top position and ranges between 0 (transparent) and 1.', 'alchem' ),
        'default'         => '0.7',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $opacity,
    );
    $options['alchem_header_background_color'] = array(
        'id'          => 'alchem_header_background_color',
        'label'      => __( 'Header Background Color', 'alchem' ),
        'description'        => __( 'Set background color for header.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_header_background_opacity'] = array(
        'id'          => 'alchem_header_background_opacity',
        'label'      => __( 'Header Background Opacity', 'alchem' ),
        'description'        => __( 'Opacity only works with header top position and ranges between 0 (transparent) and 1.', 'alchem' ),
        'default'         => '1',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $opacity,
        
        
    );

    $options['alchem_header_border_color'] = array(
        'id'          => 'alchem_header_border_color',
        'label'      => __( 'Header Border Color', 'alchem' ),
        'description'        => __( 'Set border color for header.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_menu_background_color'] = array(
        'id'          => 'alchem_menu_background_color',
        'label'      => __( 'Menu Background Color', 'alchem' ),
        'description'        => __( 'Header style 2 only.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_menu_background_opacity'] = array(
        'id'          => 'alchem_menu_background_opacity',
        'label'      => __( 'Menu Background Opacity', 'alchem' ),
        'description'        => __( 'Header style 2 only. Opacity only works with header top position and ranges between 0 (transparent) and 1.', 'alchem' ),
        'default'         => '1',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $opacity,
    );

    $options['alchem_page_title_bar_background_color'] =  array(
        'id'          => 'alchem_page_title_bar_background_color',
        'label'      => __( 'Page Title Bar Background Color', 'alchem' ),
        'description'        => __( 'Set background color for page title bar.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );
    $options['alchem_page_title_bar_borders_color'] = array(
        'id'          => 'alchem_page_title_bar_borders_color',
        'label'      => __( 'Page Title Bar Borders Color', 'alchem' ),
        'description'        => __( 'Set border color for page title bar.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_content_background_color'] = array(
        'id'          => 'alchem_content_background_color',
        'label'      => __( 'Content Background Color', 'alchem' ),
        'description'        => __( 'Set background color for content area.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_sidebar_background_color'] = array(
        'id'          => 'alchem_sidebar_background_color',
        'label'      => __( 'Sidebar Background Color', 'alchem' ),
        'description'        => __( 'Set background color for sidebar.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_footer_background_color'] = array(
        'id'          => 'alchem_footer_background_color',
        'label'      => __( 'Footer Background Color', 'alchem' ),
        'description'        => __( 'Set background color for footer.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_footer_border_color'] = array(
        'id'          => 'alchem_footer_border_color',
        'label'      => __( 'Footer Border Color', 'alchem' ),
        'description'        => __( 'Set border color for header.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_copyright_background_color'] = array(
        'id'          => 'alchem_copyright_background_color',
        'label'      => __( 'Copyright Background Color', 'alchem' ),
        'description'        => __( 'Set background color for copyright area.', 'alchem' ),
        'default'         => '#666666',
        'type'        => 'color',
        'section' => $section,
    );

    $options[ 'copyright_border_color'] = array(
        'id'          => 'alchem_copyright_border_color',
        'label'      => __( 'Copyright Border Color', 'alchem' ),
        'description'        => __( 'Set border color for copyright area', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );
	
//Element Colors

    $section = 'element_colors';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Element Colors', 'alchem' ),
		'priority' => '12',
		'description' => '',
		'panel' => $panel
	);

    $options['alchem_footer_widget_divider_color'] =  array(
        'id'          => 'alchem_footer_widget_divider_color',
        'label'      => __( 'Footer Widget Divider Color', 'alchem' ),
        'description'        => __( 'Set divider color for footer.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_form_background_color'] =  array(
        'id'          => 'alchem_form_background_color',
        'label'      => __( 'Form Background Color', 'alchem' ),
        'description'        => __( 'Set background color for form fields.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_form_text_color'] =  array(
        'id'          => 'alchem_form_text_color',
        'label'      => __( 'Form Text Color', 'alchem' ),
        'description'        => __( 'Set text color for forms.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_form_border_color'] =  array(
        'id'          => 'alchem_form_border_color',
        'label'      => __( 'Form Border Color', 'alchem' ),
        'description'        => __( 'Set border color for forms.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

//  Layout Options

    $section = 'layout_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Layout Options', 'alchem' ),
		'priority' => '13',
		'description' => '',
		'panel' => $panel
	);

    $options['alchem_page_content_top_padding'] =  array(
        'id'          => 'alchem_page_content_top_padding',
        'label'      => __( 'Page Content Top Padding', 'alchem' ),
        'description'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'         => '55px',
        'type'        => 'text',
        'section' => $section,
    );

    $options['alchem_page_content_bottom_padding'] =  array(
        'id'          => 'alchem_page_content_bottom_padding',
        'label'      => __( 'Page Content Bottom Padding', 'alchem' ),
        'description'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'         => '40px',
        'type'        => 'text',
        'section' => $section,
    );

    $options['alchem_hundredp_padding'] =  array(
        'id'          => 'alchem_hundredp_padding',
        'label'      => __( '100% Width Left/Right Padding ###', 'alchem' ),
        'description'        => __( 'This option controls the left/right padding for page content when using 100% site width or 100% width page template. In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'         => '20px',
        'type'        => 'text',
        'section' => $section,
    );

    $options['alchem_sidebar_padding'] =  array(
        'id'          => 'alchem_sidebar_padding',
        'label'      => __( 'Sidebar Padding', 'alchem' ),
        'description'        => __( 'Enter a pixel or percentage based value, ex: 5px or 5%', 'alchem' ),
        'default'         => '0',
        'type'        => 'text',
        'section' => $section,
    );

    $options['alchem_column_top_margin'] =  array(
        'id'          => 'alchem_column_top_margin',
        'label'      => __( 'Column Top Margin', 'alchem' ),
        'description'        => __( 'Controls the top margin for all column sizes. In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'         => '0px',
        'type'        => 'text',
        'section' => $section,
    );

    $options['alchem_column_bottom_margin'] =  array(
        'id'          => 'alchem_column_bottom_margin',
        'label'      => __( 'Column Bottom Margin', 'alchem' ),
        'description'        => __( 'Controls the bottom margin for all column sizes. In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'         => '20px',
        'type'        => 'text',
        'section' => $section,
    );
	 
	 // Font Colors
	 
	$section = 'font_colors';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Font Colors', 'alchem' ),
		'priority' => '14',
		'description' => '',
		'panel' => $panel
	);


    $options['alchem_header_tagline_color'] =  array(
        'id'          => 'alchem_header_tagline_color',
        'label'      => __( 'Header Tagline', 'alchem' ),
        'description'        => __( 'Set color for header tagline.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_page_title_color'] =  array(
        'id'          => 'alchem_page_title_color',
        'label'      => __( 'Page Title', 'alchem' ),
        'description'        => __( 'Set color for page title.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_h1_color'] =  array(
        'id'          => 'alchem_h1_color',
        'label'      => __( 'Heading 1 (H1) Font Color', 'alchem' ),
        'description'        => __( 'Set color for h1 element.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_h2_color'] =  array(
        'id'          => 'alchem_h2_color',
        'label'      => __( 'Heading 2 (H2) Font Color', 'alchem' ),
        'description'        => __( 'Set color for h2 element.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
    );

    $options['alchem_h3_color'] =  array(
        'id'          => 'alchem_h3_color',
        'label'      => __( 'Heading 3 (H3) Font Color', 'alchem' ),
        'description'        => __( 'Set color for h3 element.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_h4_color'] =  array(
        'id'          => 'alchem_h4_color',
        'label'      => __( 'Heading 4 (H4) Font Color', 'alchem' ),
        'description'        => __( 'Set color for h4 element.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_h5_color'] =  array(
        'id'          => 'alchem_h5_color',
        'label'      => __( 'Heading 5 (H5) Font Color', 'alchem' ),
        'description'        => __( 'Set color for h5 element.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_h6_color'] =  array(
        'id'          => 'alchem_h6_color',
        'label'      => __( 'Heading 6 (H6) Font Color', 'alchem' ),
        'description'        => __( 'Set color for h6 element.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );
 
    $options['alchem_body_text_color'] =  array(
        'id'          => 'alchem_body_text_color',
        'label'      => __( 'Body Text Color', 'alchem' ),
        'description'        => __( 'Set color for body text.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_link_color'] =  array(
        'id'          => 'alchem_link_color',
        'label'      => __( 'Link Color', 'alchem' ),
        'description'        => __( 'Set color for hypelink element.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_breadcrumbs_text_color'] =  array(
        'id'          => 'alchem_breadcrumbs_text_color',
        'label'      => __( 'Breadcrumbs Text Color', 'alchem' ),
        'description'        => __( 'Set color for breadcrumbs text.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_sidebar_widget_headings_color'] =  array(
        'id'          => 'alchem_sidebar_widget_headings_color',
        'label'      => __( 'Sidebar Widget Headings Color', 'alchem' ),
        'description'        => __( 'Set color for widget headings in sidebar.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_footer_headings_color'] = array(
        'id'          => 'alchem_footer_headings_color',
        'label'      => __( 'Footer Headings Color', 'alchem' ),
        'description'        => __( 'Set color for widget headings in footer.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );

    $options['alchem_footer_text_color'] = array(
        'id'          => 'alchem_footer_text_color',
        'label'      => __( 'Footer Text Color', 'alchem' ),
        'description'        => __( 'Set color for text in footer.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section, 
    );

    $options['alchem_footer_link_color'] = array(
        'id'          => 'alchem_footer_link_color',
        'label'      => __( 'Footer Link Color', 'alchem' ),
        'description'        => __( 'Set color for link in footer.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );
 

	 // main menu colors
	 
	$section = 'main_menu_colors';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Main Menu Colors', 'alchem' ),
		'priority' => '15',
		'description' => '',
		'panel' => $panel
	);


    $options[ 'main_menu_background_color_1'] =  array(
        'id'          => 'alchem_main_menu_background_color_1',
        'label'      => __( 'Main Menu Background Color', 'alchem' ),
        'description'        => __( 'Set background color for main menu.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    );
    $options['alchem_main_menu_font_color_1'] =  array(
        'id'          => 'alchem_main_menu_font_color_1',
        'label'      => __( 'Main Menu Font Color ( First Level )', 'alchem' ),
        'description'        => __( 'Set font color for main menu.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,  
    );
    $options[ 'main_menu_font_hover_color_1'] =  array(
        'id'          => 'alchem_main_menu_font_hover_color_1',
        'label'      => __( 'Main Menu Font Hover Color ( First Level )', 'alchem' ),
        'description'        => __( 'Set hover font color for main menu.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
 
      );
$options[ 'main_menu_background_color_2'] =  array(
        'id'          => 'alchem_main_menu_background_color_2',
        'label'      => __( 'Main Menu Background Color ( Sub Level )', 'alchem' ),
        'description'        => __( 'Set background color for sub menu.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,

      );
   
$options[ 'main_menu_font_color_2'] =  array(
        'id'          => 'alchem_main_menu_font_color_2',
        'label'      => __( 'Main Menu Font Color ( Sub Level )', 'alchem' ),
        'description'        => __( 'Set font color for sub menu.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,

      );
$options['alchem_main_menu_font_hover_color_2'] =  array(
        'id'          => 'alchem_main_menu_font_hover_color_2',
        'label'      => __( 'Main Menu Font Hover Color ( Sub Level )', 'alchem' ),
        'description'        => __( 'Set hover font color for sub menu.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,

      );
$options['alchem_main_menu_separator_color_2'] =  array(
        'id'          => 'alchem_main_menu_separator_color_2',
        'label'      => __( 'Main Menu Separator Color ( Sub Levels )', 'alchem' ),
        'description'        => __( 'Set border color for sub menu.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,

      );
$options['alchem_woo_cart_menu_background_color'] =  array(
        'id'          => 'alchem_woo_cart_menu_background_color',
        'label'      => __( 'Woo Cart Menu Background Color', 'alchem' ),
        'description'        => __( 'Set background color for woocommerce cart menu.', 'alchem' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
      );

		##### Header #####
	
	// Header panel
	
	$panel = 'header';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Header', 'alchem' ),
		'priority' => '3'
	);
	
	// Top Bar Options
	$section = 'top-bar-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Top Bar Options', 'alchem' ),
		'priority' => '10',
		'description' => __( 'Top Bar Options.', 'alchem' ),
		'panel' => $panel
	);
	
	$options['alchem_display_top_bar'] = array(
        'id'          => 'alchem_display_top_bar',
        'label'       => __( 'Display Top Bar', 'alchem' ),
        'description' => __( 'Choose to display top bar or not.', 'alchem' ),
        'default'     => 'no',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $choices
      );
	$options['alchem_top_bar_background_color'] = array(
        'id'          => 'alchem_top_bar_background_color',
        'label'       => __( 'Background Color', 'alchem' ),
        'description' => __( 'Set background color for top bar.', 'alchem' ),
        'default'     => '#eee',
        'type'        => 'color',
        'section' => $section,
        
      );
    $options['alchem_top_bar_left_content'] = array(
    'id' => 'alchem_top_bar_left_content',
    'label'   => __( 'Left Content', 'alchem' ),
    'section' => $section,
    'type'    => 'select',
    'choices' => array( 
          'info'     => __( 'Info', 'alchem' ),
          'sns'     => __( 'SNS', 'alchem' ),
          'menu'     => __( 'Menu', 'alchem' ),
          'none'     => __( 'None', 'alchem' ),
           
        ),
    'default' => 'info',
    'description' => __( 'Select which content displays in left content area.', 'alchem')
  ); 
		$options['alchem_top_bar_right_content'] = array(
    'id' => 'alchem_top_bar_right_content',
    'label'   => __( 'Right Content', 'alchem' ),
    'section' => $section,
    'type'    => 'select',
    'choices' => array( 
          'info'     => __( 'Info', 'alchem' ),
          'sns'     => __( 'SNS', 'alchem' ),
          'menu'     => __( 'Menu', 'alchem' ),
          'none'     => __( 'None', 'alchem' ),
           
        ),
    'default' => 'sns',
    'description' => __( 'Select which content displays in right content area.', 'alchem')
  );		 
		$options['alchem_top_bar_info_color'] = array(
        'id'          => 'alchem_top_bar_info_color',
        'label'      => __( 'Info Color', 'alchem' ),
        'description'        => '',
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
      );
	$options['alchem_top_bar_info_content'] = array(
    'id' => 'alchem_top_bar_info_content',
    'label'   => __( 'Info Content', 'alchem' ),
    'section' => $section,
    'type'    => 'textarea',
    'default' => __( 'Mail: support@mageewp.com&nbsp;&nbsp;&nbsp;Phone: 1-234-567-8899', 'alchem' )
  );

  $options['alchem_top_bar_info_color'] = array(
    'id' => 'alchem_top_bar_info_color',
    'label'   => __( 'Info Color', 'alchem' ),
    'section' => $section,
    'type'    => 'color',
    'default' => '',
  );

  $options['alchem_top_bar_menu_color'] = array(
    'id' => 'alchem_top_bar_menu_color',
    'label'   => __( 'Menu Color', 'alchem' ),
    'section' => $section,
    'type'    => 'color',
    'default' => '',
    'description' => __( 'Set font color for menu.', 'alchem')
  );
				
		if( $alchem_social_icons ):
$i = 1;
 foreach($alchem_social_icons as $social_icon){
	
	 $options['alchem_header_social_title_'.$i] =  array(
        'id'          => 'alchem_header_social_title_'.$i,
        'label'      => __( 'Social Title', 'alchem' ) .' '.$i,
        'description'        => __( 'This would display in tooltip.', 'alchem' ),
        'default'         => $social_icon['title'],
        'type'        => 'text',
        'section' => $section,
        
      );
 $options['alchem_header_social_icon_'.$i] = array(
        'id'          => 'alchem_header_social_icon_'.$i,
        'label'      => __( 'Social Icon', 'alchem' ).' '.$i,
        'description'        => __( 'Insert font awesome icon here, more icons can be found at <a href="http://fontawesome.io/icons" target="_blank">FontAwesome Icons</a>.', 'alchem' ),
        'default'         => $social_icon['icon'],
        'type'        => 'text',
        'section' => $section,
        
      );
 $options['alchem_header_social_link_'.$i] = array(
        'id'          => 'alchem_header_social_link_'.$i,
        'label'      => __( 'Social Icon Link', 'alchem' ).' '.$i,
        'description'        => __( 'Insert the link to show this icon.', 'alchem' ),
        'default'         => $social_icon['link'],
        'type'        => 'text',
        'section' => $section,
        
      );

	 $i++;
	 }
	endif;	
	
		
 $options['alchem_top_bar_social_icons_color'] = array(
    'id' => 'alchem_top_bar_social_icons_color',
    'label'   =>  __( 'Social Icons Color', 'alchem' ),
    'section' => $section,
    'type'    => 'color',
    'default' => '',
    'description' => __( 'Set color for social icons.', 'alchem' )
  );
$options['alchem_top_bar_social_icons_tooltip_position'] = array(
    'id' => 'alchem_top_bar_social_icons_tooltip_position',
    'label'   => __( 'Tooltip Position for Social Icons', 'alchem' ),
    'section' => $section,
    'type'    => 'select',
    'choices' => array( 
          'left'     => __( 'left', 'alchem' ),
      'right'     => __( 'right', 'alchem' ),
          'bottom'     => __( 'bottom', 'alchem' ),
           
        ),
    'default' => 'left',
    'description' => __( 'Controls the tooltip position of the social icons in top bar.', 'alchem' )
  );

	// Header Options
	$section = 'header-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Header Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
	$options['alchem_header_style'] = array(
    'id' => 'alchem_header_style',
    'label'   => __( 'Header Style', 'alchem' ),
    'section' => $section,
    'type'    => 'select',
    'choices' => array('0'=>__('Style 1', 'alchem'),'1'=>__('Style 2', 'alchem')),
    'default' => '0',
    'description'   => __( 'Choose header style.', 'alchem'),
  );
		
	$options['alchem_header_overlay'] = array(
    'id' => 'alchem_header_overlay',
    'label'   => __( 'Header Overlay', 'alchem' ),
    'section' => $section,
    'type'    => 'select',
    'choices' => $choices_reverse,
    'default' => 'yes',
    'description'   => __( 'Choose to set header as overlay style.', 'alchem'),
  );
		
		
		$options['alchem_header_background_image'] = array(
        'id'          => 'alchem_header_background_image',
        'label'      => __( 'Header Background Image', 'alchem' ),
        'description'        => __( 'Background Image For Header Area', 'alchem' ),
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,
        
      );
		
		$options['alchem_header_background_full'] = array(
        'id'          => 'alchem_header_background_full',
        'label'      => __( '100% Background Image', 'alchem' ),
        'description'        => __( 'Turn on to have the header background image display at 100% in width and height and scale according to the browser size.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
		'choices'     => $choices
      );
		$options['alchem_header_background_parallax'] = array(
        'id'          => 'alchem_header_background_parallax',
        'label'      => __( 'Parallax Background Image', 'alchem' ),
        'description'        => __( 'Turn on to enable parallax scrolling on the background image for header top positions.', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
		'choices'     => $choices_reverse
      );
		
		$options['alchem_header_background_repeat'] =  array(
        'id'          => 'alchem_header_background_repeat',
        'label'      => __( 'Background Repeat', 'alchem' ),
        'description'        => __( 'Select how the background image repeats.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $repeat
      );
		$options['alchem_header_top_padding'] =  array(
        'id'          => 'alchem_header_top_padding',
        'label'      => __( 'Header Top Padding', 'alchem' ),
        'description'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'         => '0px',
        'type'        => 'text',
        'section' => $section,
        
      );
		 $options['alchem_header_bottom_padding'] = array(
        'id'          => 'alchem_header_bottom_padding',
        'label'      => __( 'Header Bottom Padding', 'alchem' ),
        'description'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'         => '0px',
        'type'        => 'text',
        'section' => $section,
        
      );
		 
		 
		  $options['alchem_tagline'] = array(
        'id'          => 'alchem_tagline',
        'label'      => __( 'Tagline', 'alchem' ),
        'description'        => __( 'Header Style 2 only.', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );
		
  
   // Logo
	$section = 'logo';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Logo', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
 
$options['alchem_default_logo'] = array(
        'id'          => 'alchem_default_logo',
        'label'      => __( 'Upload Logo', 'alchem' ),
        'description'        => __( 'Select an image file for your logo.', 'alchem' ),
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,
        
      );
	
$options['alchem_default_logo_retina'] =  array(
        'id'          => 'alchem_default_logo_retina',
        'label'      => __( 'Upload Logo (Retina Version @2x)', 'alchem' ),
        'description'        => __( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.', 'alchem' ),
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,
        
      );
$options['alchem_retina_logo_width'] = array(
        'id'          => 'alchem_retina_logo_width',
        'label'      => __( 'Standard Logo Width for Retina Logo', 'alchem' ),
        'description'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width. Use a number without \'px\', ex: 40', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );

$options['alchem_retina_logo_height'] =  array(
        'id'          => 'alchem_retina_logo_height',
        'label'      => __( 'Standard Logo Height for Retina Logo', 'alchem' ),
        'description'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height. Use a number without \'px\', ex: 40', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );
	

	 // Logo Options
	$section = 'logo-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Logo Options', 'alchem' ),
		'priority' => '30',
		'description' => '',
		'panel' => $panel
	);
	
	$options['alchem_logo_position'] =  array(
        'id'          => 'alchem_logo_position',
        'label'      => __( 'Logo Position', 'alchem' ),
        'description'        => '',
        'default'         => 'left',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $align
      );
	
$options['alchem_logo_left_margin'] =  array(
        'id'          => 'alchem_logo_left_margin',
        'label'      => __( 'Logo Left Margin', 'alchem' ),
        'description'        => __( 'Use a number without \'px\', ex: 40', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );
$options['alchem_logo_right_margin'] = array(
        'id'          => 'alchem_logo_right_margin',
        'label'      => __( 'Logo Right Margin', 'alchem' ),
        'description'        => __( 'Use a number without \'px\', ex: 40', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );
$options['alchem_logo_top_margin'] = array(
        'id'          => 'alchem_logo_top_margin',
        'label'      => __( 'Logo Top Margin', 'alchem' ),
        'description'        => __( 'Use a number without \'px\', ex: 40', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );
$options['alchem_logo_bottom_margin'] = array(
        'id'          => 'alchem_logo_bottom_margin',
        'label'      => __( 'Logo Bottom Margin', 'alchem' ),
        'description'        => __( 'Use a number without \'px\', ex: 40', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );
##### Sticky Header #####
$panel = 'sticky-header';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Sticky Header', 'alchem' ),
		'priority' => '6'
	);
// Sticky Header options
	$section = 'sticky-header-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Sticky Header options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
		
		
$options['alchem_enable_sticky_header'] = array(
    'id' => 'alchem_enable_sticky_header',
    'label'   => __( 'Enable Sticky Header', 'alchem' ),
    'section' => $section,
    'type'    => 'select',
    'choices' => $choices,
    'default' => 'yes',
    'description'   => __( 'Choose to enable a fixed header when scrolling.', 'alchem' ),
  );
$options['alchem_enable_sticky_header_tablets'] = array(
    'id' => 'alchem_enable_sticky_header_tablets',
    'label'   => __( 'Enable Sticky Header on Tablets', 'alchem' ),
    'section' => $section,
    'type'    => 'select',
    'choices' => $choices,
    'default' => 'no',
    'description'   => __( 'Choose to enable a fixed header when scrolling on tablets.', 'alchem' ),
  );
$options['alchem_enable_sticky_header_mobiles'] = array(
    'id' => 'alchem_enable_sticky_header_mobiles',
    'label'   => __( 'Enable Sticky Header on Mobiles', 'alchem' ),
    'section' => $section,
    'type'    => 'select',
    'choices' => $choices,
    'default' => 'no',
    'description'   => __( 'Choose to enable a fixed header when scrolling on mobiles.', 'alchem' ),
  );
		

$options['alchem_sticky_header_menu_item_padding'] = array(
        'id'          => 'alchem_sticky_header_menu_item_padding',
        'label'       => __( 'Sticky Header Menu Item Padding', 'alchem' ),
        'description'        => __( 'Controls the space between each menu item in the sticky header. Use a number without \'px\', default is 0. ex: 10', 'alchem' ),
        'default'         => '0',
        'type'        => 'text',
        'section'     => $section,
        
      );
$options['alchem_sticky_header_navigation_font_size'] = array(
        'id'          => 'alchem_sticky_header_navigation_font_size',
        'label'       => __( 'Sticky Header Navigation Font Size', 'alchem' ),
        'description' => __( 'Controls the font size of the menu items in the sticky header. Use a number without \'px\', default is 14. ex: 14', 'alchem' ),
        'default'     => '14',
        'type'        => 'text',
        'section'     => $section,
        
      );
$options['alchem_sticky_header_logo_width'] = array(
        'id'          => 'alchem_sticky_header_logo_width',
        'label'      => __( 'Sticky Header Logo Width', 'alchem' ),
        'description'        => __( 'Controls the logo width in the sticky header. Use a number without \'px\'.', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );

// Sticky Logo
	$section = 'sticky-logo';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Sticky Logo', 'alchem' ),
		'priority' => '20',
		'description' => '',
		'panel' => $panel
	);
$options['alchem_sticky_logo'] = array(
        'id'          => 'alchem_sticky_logo',
        'label'      => __( 'Upload Logo', 'alchem' ),
        'description'        => __( 'Select an image file for your logo.', 'alchem' ),
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,
        
      );
	
$options['alchem_sticky_logo_retina'] =  array(
        'id'          => 'alchem_sticky_logo_retina',
        'label'      => __( 'Upload Logo (Retina Version @2x)', 'alchem' ),
        'description'        => __( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.', 'alchem' ),
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,
        
      );
$options['alchem_sticky_logo_width_for_retina_logo'] = array(
        'id'          => 'alchem_sticky_logo_width_for_retina_logo',
        'label'      => __( 'Sticky Logo Width for Retina Logo', 'alchem' ),
        'description'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width. Use a number without \'px\', ex: 40', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );
$options['alchem_sticky_logo_height_for_retina_logo'] = array(
        'id'          => 'alchem_sticky_logo_height_for_retina_logo',
        'label'      => __( 'Sticky Logo Height for Retina Logo', 'alchem' ),
        'description'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height. Use a number without \'px\', ex: 40', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );

	
#### Menu Options ####

   $section = 'menu-options';
  $sections[] = array(
	  'id' => $section,
	  'title' => __( 'Menu Options', 'alchem' ),
	  'priority' => '6',
	  'description' => '',

  );
   
$options['alchem_main_nav_height'] =  array(
        'id'          => 'alchem_main_nav_height',
        'label'      => __( 'Main Nav Height', 'alchem' ),
        'description'        => __( 'Controls menu height. Use a number without \'px\', default is 70. ex: 70', 'alchem' ),
        'default'         => '70',
        'type'        => 'text',
        'section' => $section,
        
      );
$options['alchem_main_menu_highlight_bar_size'] =  array(
        'id'          => 'alchem_main_menu_highlight_bar_size',
        'label'      => __( 'Main Menu Highlight Bar Size', 'alchem' ),
        'description'        => __( 'Controls the border size of the menu highlight bar. Use a number without \'px\', default is 2, enter 0 to hide it. ex: 2.', 'alchem' ),
        'default'         => '2',
        'type'        => 'text',
        'section' => $section,
        
      );

$options['alchem_main_menu_dropdown_width'] =  array(
        'id'          => 'alchem_main_menu_dropdown_width',
        'label'      => __( 'Main Menu Dropdown Width', 'alchem' ),
        'description'        => __( 'Controls the width of the dropdown menu. In pixels, ex: 150px', 'alchem' ),
        'default'         => '150px',
        'type'        => 'text',
        'section' => $section,
        
      );

$options['alchem_mega_menu_max_width'] =  array(
        'id'          => 'alchem_mega_menu_max_width',
        'label'      => __( 'Mega Menu Max-Width', 'alchem' ),
        'description'        => __( 'Controls the the max width of the mega menu. In pixels, ex: 1100px.', 'alchem' ),
        'default'         => '1100px',
        'type'        => 'text',
        'section' => $section,
        
      );
$options['alchem_mega_menu_column_title_size'] =  array(
        'id'          => 'alchem_mega_menu_column_title_size',
        'label'      => __( 'Mega Menu Column Title Size', 'alchem' ),
        'description'        => __( 'Set the font size for mega menu column titles (menu 2nd level labels). In pixels, ex: 18px.', 'alchem' ),
        'default'         => '18px',
        'type'        => 'text',
        'section' => $section,
        
      );
$options['alchem_show_search_icon_in_main_nav'] =  array(
        'id'          => 'alchem_show_search_icon_in_main_nav',
        'label'      => __( 'Show Search Icon in Main Nav', 'alchem' ),
        'description'        => __( 'Choose to display search icon in main nav.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $choices
      );
$options['alchem_enable_circle_border_on_menu_icons'] = array(
        'id'          => 'alchem_enable_circle_border_on_menu_icons',
        'label'      => __( 'Enable Circle Border on Menu Icons', 'alchem' ),
        'description'        => __( 'Choose to enable circle border on menu icons.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $choices
      );
$options['alchem_navigation_drawer_breakpoint'] = array(
        'id'          => 'alchem_navigation_drawer_breakpoint',
        'label'      => __( 'Navigation Drawer breakpoint', 'alchem' ),
        'description'        => __( 'Use a number without \'px\', default is 919. ex: 919.', 'alchem' ),
        'default'         => '919',
        'type'        => 'text',
        'section' => $section,
        
      );

#### page title bar options ####

$panel = 'page-title-bar';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Page Title Bar', 'alchem' ),
		'priority' => '7'
	);
// Page Title Bar Options
  $section = 'page-title-bar-options';
  $sections[] = array(
	  'id' => $section,
	  'title' => __( 'Page Title Bar Options', 'alchem' ),
	  'priority' => '10',
	  'description' => '',
	  'panel' => $panel
  );
$options['alchem_enable_page_title_bar'] =  array(
        'id'          => 'alchem_enable_page_title_bar',
        'label'       => __( 'Enable Page Title Bar', 'alchem' ),
        'description' => '',
        'default'     => 'yes',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices,
        'description' => __( 'Choose to display page title bar for pages & posts.', 'alchem' )
      );
   
$options['alchem_page_title_bar_top_padding'] =  array(
        'id'          => 'alchem_page_title_bar_top_padding',
        'label'      => __( 'Page Title Bar Top Padding', 'alchem' ),
        'description'        => __( 'In pixels, ex: 210px', 'alchem' ),
        'default'         => '210px',
        'type'        => 'text',
        'section' => $section,
        
      );
   
$options['alchem_page_title_bar_bottom_padding'] =  array(
        'id'          => 'alchem_page_title_bar_bottom_padding',
        'label'      => __( 'Page Title Bar Bottom Padding', 'alchem' ),
        'description'        => __( 'In pixels, ex: 160px', 'alchem' ),
        'default'         => '160px',
        'type'        => 'text',
        'section' => $section,
        
      );
$options['alchem_page_title_bar_mobile_top_padding'] =  array(
        'id'          => 'alchem_page_title_bar_mobile_top_padding',
        'label'      => __( 'Page Title Bar Mobile Top Padding', 'alchem' ),
        'description'        => __( 'In pixels, ex: 70px', 'alchem' ),
        'default'         => '70px',
        'type'        => 'text',
        'section' => $section,
        
      );
   
$options['alchem_page_title_bar_mobile_bottom_padding'] =  array(
        'id'          => 'alchem_page_title_bar_mobile_bottom_padding',
        'label'      => __( 'Page Title Bar Mobile Bottom Padding', 'alchem' ),
        'description'        => __( 'In pixels, ex: 50px', 'alchem' ),
        'default'         => '50px',
        'type'        => 'text',
        'section' => $section,
      );

$options['alchem_page_title_bar_background'] =  array(
        'id'          => 'alchem_page_title_bar_background',
        'label'      => __( 'Page Title Bar Background', 'alchem' ),
        'description'        => '',
        'default'         => $imagepath.'bg-1.jpg',
        'type'        => 'upload',
        'section' => $section,
        
      );
$options['alchem_page_title_bar_retina_background'] =  array(
        'id'          => 'alchem_page_title_bar_retina_background',
        'label'      => __( 'Page Title Bar Background (Retina Version @2x)', 'alchem' ),
        'description'        => '',
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,
 
      );
   
$options['alchem_page_title_bg_full'] =  array(
        'id'          => 'alchem_page_title_bg_full',
        'label'      => __( '100% Background Image', 'alchem' ),
        'description'        => __( 'Select yes to have the page title bar background image display at 100% in width and height and scale according to the browser size.', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $choices_reverse
      );
$options['alchem_page_title_bg_parallax'] = array(
        'id'          => 'alchem_page_title_bg_parallax',
        'label'      => __( 'Parallax Background Image', 'alchem' ),
        'description'        => __( 'Select yes to enable parallax background image when scrolling.', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
         'choices'     => $choices_reverse
      );
	
$options['alchem_page_title_align'] =  array(
        'id'          => 'alchem_page_title_align',
        'label'      => __( 'Page Title Align', 'alchem' ),
        'description'        => __( 'Set alignment for page title.' ,'alchem' ),
        'default'         => 'left',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $align
      );
	
// Breadcrumb Options
  $section = 'breadcrumb-options';
  $sections[] = array(
	  'id' => $section,
	  'title' => __( 'Breadcrumb Options', 'alchem' ),
	  'priority' => '11',
	  'description' => '',
	  'panel' => $panel
  );
 
 $options['alchem_display_breadcrumb'] =  array(
        'id'          => 'alchem_display_breadcrumb',
        'label'       => __( 'Display breadcrumbs', 'alchem' ),
        'description' => __( 'Choose to display or hide breadcrumbs.', 'alchem'),
        'default'     => 'yes',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices
      );
$options['alchem_breadcrumbs_on_mobile_devices'] =  array(
        'id'          => 'alchem_breadcrumbs_on_mobile_devices',
        'label'       => __( 'Breadcrumbs on Mobile Devices', 'alchem' ),
        'description' => __( 'Choose to display breadcrumbs on mobile devices.', 'alchem' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['alchem_breadcrumb_menu_prefix'] =  array(
        'id'          => 'alchem_breadcrumb_menu_prefix',
        'label'      => __( 'Breadcrumb Menu Prefix', 'alchem' ),
        'description'        => __( 'The text before the breadcrumb menu.', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
        
        
      );
$options['alchem_breadcrumb_menu_separator'] =  array(
        'id'          => 'alchem_breadcrumb_menu_separator',
        'label'      => __( 'Breadcrumb Menu Separator', 'alchem' ),
        'description'        => __( 'Choose a separator between the single breadcrumbs.', 'alchem' ),
        'default'         => '/',
        'type'        => 'text',
        'section' => $section,

      );
$options['alchem_breadcrumb_show_post_type_archive'] =  array(
        'id'          => 'alchem_breadcrumb_show_post_type_archive',
        'label'      => __( 'Show Custom Post Type Archives on Breadcrumbs.', 'alchem' ),
        'description'        => __( 'Check to display custom post type archives in the breadcrumb path.', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     => $choices_reverse
      );
$options['alchem_breadcrumb_show_categories'] =  array(
        'id'          => 'alchem_breadcrumb_show_categories',
        'label'      => __( 'Show Post Categories on Breadcrumbs.', 'alchem' ),
        'description'        => __( 'Check to display custom post type archives in the breadcrumb path.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     => $choices
      );
 
 ### Footer ###
   $panel = 'footer';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Footer', 'alchem' ),
		'priority' => '8'
	);
// General Footer Options
	$section = 'general_footer_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Footer Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
 

$options['alchem_footer_special_effects'] =  array(
        'id'          => 'alchem_footer_special_effects',
        'label'       => __( 'Footer Special Effects', 'alchem' ),
        'description' => __( 'Select your preferred footer special effect.', 'alchem' ),
        'default'     => 'none',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => array( 
          'none'     => __( 'None', 'alchem' ),
          'footer_sticky'     => __( 'Sticky Footer', 'alchem' ),
           
        ),
  
      );
 

// Footer Widgets Area Options
$section = 'footer_widgets_area_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Footer Widgets Area Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);


$options['alchem_display_footer_widgets'] =  array(
        'id'          => 'alchem_display_footer_widgets',
        'label'       => __( 'Display footer widgets?', 'alchem' ),
        'description' => __( 'Choose to display footer widget area.', 'alchem' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices
      );
$options['alchem_footer_widget_columns'] =  array(
        'id'          => 'alchem_footer_widget_columns',
        'label'       => __( 'Number of Footer Columns', 'alchem' ),
        'description' => __( 'Set columns for footer widgets', 'alchem' ),
        'default'     => '4',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => array( 
          '1'     => '1',
          '2'     => '2',
          '3'     => '3',
          '4'     => '4',
        ),
  
      );
$options['alchem_footer_background_image'] =  array(
        'id'          => 'alchem_footer_background_image',
        'label'       => __( 'Upload Background Image', 'alchem' ),
        'description' => __( 'Background image for footer', 'alchem'),
        'default'     => '',
        'type'        => 'upload',
        'section'     => $section,
        
      );
$options['alchem_footer_bg_full'] =  array(
        'id'          => 'alchem_footer_bg_full',
        'label'       => __( '100% Background Image', 'alchem' ),
        'description' => __( 'Select yes to have the footer widgets area background image display at 100% in width and height and scale according to the browser size.', 'alchem' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['alchem_footer_parallax_background'] =  array(
        'id'          => 'alchem_footer_parallax_background',
        'label'       => __( 'Parallax Background Image', 'alchem' ),
        'description' => __( 'Turn on to enable parallax scrolling on the background image for footer.', 'alchem' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['alchem_footer_background_repeat'] =  array(
        'id'          => 'alchem_footer_background_repeat',
        'label'       => __( 'Background Repeat', 'alchem' ),
        'description' => __( 'Select how the background image repeats.', 'alchem' ),
        'default'     => 'repeat',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $repeat
      );
$options['alchem_footer_background_position'] =  array(
        'id'          => 'alchem_footer_background_position',
        'label'       => __( 'Background Position', 'alchem' ),
        'description' => __( 'Set background image position.', 'alchem' ),
        'default'     => 'top left',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $position
      );
$options['alchem_footer_top_padding'] =  array(
        'id'          => 'alchem_footer_top_padding',
        'label'       => __( 'Footer Top Padding', 'alchem' ),
        'description' => __( 'In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'     => '60px',
        'type'        => 'text',
        'section'     => $section,
        
      );
$options['alchem_footer_bottom_padding'] =  array(
        'id'          => 'alchem_footer_bottom_padding',
        'label'       => __( 'Footer Bottom Padding', 'alchem' ),
        'description' => __( 'In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'     => '40px',
        'type'        => 'text',
        'section'     => $section,
        
      );

// Copyright Options
	$section = 'copyright-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Copyright Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
$options['alchem_display_copyright_bar'] =  array(
        'id'          => 'alchem_display_copyright_bar',
        'label'       => __( 'Display Copyright Bar', 'alchem' ),
        'description' => __( 'Choose to display copyright bar.', 'alchem' ),
        'default'     => 'yes',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices
      );
$options['alchem_copyright_text'] =  array(
        'id'          => 'alchem_copyright_text',
        'label'       => __( 'Copyright Text', 'alchem' ),
        'description' => __( 'Enter the text that displays in the copyright bar. HTML markup can be used.', 'alchem' ),
        'default'     => '',
        'type'        => 'textarea',
        'section'     => $section,
        
      );
$options['alchem_copyright_top_padding'] =  array(
        'id'          => 'alchem_copyright_top_padding',
        'label'       => __( 'Copyright Top Padding', 'alchem' ),
        'description' => __( 'In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'     => '40px',
        'type'        => 'text',
        'section'     => $section,
        
      );
$options['alchem_copyright_bottom_padding'] =  array(
        'id'          => 'alchem_copyright_bottom_padding',
        'label'       => __( 'Copyright Bottom Padding', 'alchem' ),
        'description' => __( 'In pixels or percentage, ex: 10px or 10%.', 'alchem' ),
        'default'     => '40px',
        'type'        => 'text',
        'section'     => $section,
        
      );
 
 // Social Icon Options
 $section = 'social_icon_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Social Icon Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);

if( $alchem_social_icons ):
$i = 1;
 foreach($alchem_social_icons as $social_icon){
	
	 $options['alchem_footer_social_title_'.$i] =  array(
        'id'          => 'alchem_footer_social_title_'.$i,
        'label'       => __( 'Social Title', 'alchem' ) .' '.$i,
        'description' => __( 'This would display in tooltip.' , 'alchem' ),
        'default'     => $social_icon['title'],
        'type'        => 'text',
        'section'     => $section,
        
      );
 $options['alchem_footer_social_icon_'.$i] = array(
        'id'          => 'alchem_footer_social_icon_'.$i,
        'label'       => __( 'Social Icon', 'alchem' ).' '.$i,
        'description' => __( 'Insert font awesome icon here, more icons can be found at <a href="http://fontawesome.io/icons" target="_blank">FontAwesome Icons</a>.', 'alchem' ),
        'default'     => $social_icon['icon'],
        'type'        => 'text',
        'section'     => $section,
        
      );
 $options['alchem_footer_social_link_'.$i] = array(
        'id'          => 'alchem_footer_social_link_'.$i,
        'label'       => __( 'Social Icon Link', 'alchem' ).' '.$i,
        'description' => __( 'Insert the link to show this icon.', 'alchem'),
        'default'     => $social_icon['link'],
        'type'        => 'text',
        'section'     => $section,
        
      );

	 $i++;
	 }
	endif;	
$options['alchem_footer_social_icons_color'] =  array(
        'id'          => 'alchem_footer_social_icons_color',
        'label'       => __( 'Social Icons Color', 'alchem' ),
        'description' => __( 'Set color for icons.', 'alchem' ),
        'default'     => '#c5c7c9',
        'type'        => 'color',
        'section'     => $section,
        
      );
    
$options['alchem_footer_social_icons_boxed'] =  array(
        'id'          => 'alchem_footer_social_icons_boxed',
        'label'       => __( 'Social Icons Boxed', 'alchem' ),
        'description' => __( 'Choose to display boxed icons', 'alchem'),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices
      );
$options['alchem_footer_social_icons_box_color'] = array(
        'id'          => 'alchem_footer_social_icons_box_color',
        'label'       => __( 'Social Icons Box Color', 'alchem' ),
        'description' => __( 'Set background color for boxed icons', 'alchem' ),
        'default'     => '#ffffff',
        'type'        => 'color',
        'section'     => $section,
        
      );
$options['alchem_footer_social_icons_boxed_radius'] = array(
        'id'          => 'alchem_footer_social_icons_boxed_radius',
        'label'       => __( 'Social Icons Boxed Radius', 'alchem' ),
        'description' => __( 'In pixels, ex: 10px.', 'alchem' ),
        'default'     => '10px',
        'type'        => 'text',
        'section'     => $section,
        
      );
     
$options['alchem_footer_social_icons_tooltip_position'] =  array(
        'id'          => 'alchem_footer_social_icons_tooltip_position',
        'label'       => __( 'Social Icon Tooltip Position', 'alchem' ),
        'description' => __( 'Controls the tooltip position of the social icons.', 'alchem' ),
        'default'     => 'top',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => array( 
          'top'     => __( 'Top', 'alchem' ),
          'bottom'     => __( 'Bottom', 'alchem' ),
        ),
  
      );


### Sidebar  ###
    $panel = 'sidebar';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Sidebar', 'alchem' ),
		'priority' => '9'
	);

 // Pages
/*	$section = 'sidebar-pages';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Pages', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);

 
$options['alchem_left_sidebar_pages'] =  array(
        'id'          => 'alchem_left_sidebar_pages',
        'label'       => __( 'Left Sidebar', 'alchem' ),
        'description' => __( 'Select left sidebar that will display on all pages.', 'alchem' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $alchem_sidebars,
  
      );
$options['alchem_right_sidebar_pages'] =  array(
        'id'          => 'alchem_right_sidebar_pages',
        'label'       => __( 'Right Sidebar', 'alchem' ),
        'description' => __( 'Select right sidebar that will display on all pages.', 'alchem' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $alchem_sidebars,
  
      );
 */
 //
 
  // Portfolio Posts
	$section = 'sidebar_portfolio_posts';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Portfolio Posts', 'alchem' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);

 
$options['alchem_left_sidebar_portfolio_posts'] =  array(
        'id'          => 'alchem_left_sidebar_portfolio_posts',
        'label'      => __( 'Left Sidebar', 'alchem' ),
        'description'        => __( 'Select left sidebar that will display on portfolio posts.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     => $alchem_sidebars,
	
      );
$options['alchem_right_sidebar_portfolio_posts'] =  array(
        'id'          => 'alchem_right_sidebar_portfolio_posts',
        'label'      => __( 'Right Sidebar', 'alchem' ),
        'description'        => __( 'Select right sidebar that will display on portfolio posts.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     => $alchem_sidebars,
	
      );
 //
$options['alchem_sidebar_portfolio_archive'] =  array(
        'id'          => 'alchem_sidebar_portfolio_archive',
        'label'      => __( 'Portfolio Archive Category Pages', 'alchem' ).' <span data-accordion="accordion-group-7" class="fa fa-plus"></span>',
        'description'        => '',
        'default'         => '',
        'type'        => 'textblock-titled',
        'section' => $section,
        'rows'        => '4',
        
        
        
      );
 
$options['alchem_left_sidebar_portfolio_archive'] =  array(
        'id'          => 'alchem_left_sidebar_portfolio_archive',
        'label'      => __( 'Left Sidebar', 'alchem' ),
        'description'        => __( 'Select left sidebar that will display on portfolio archive page.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     => $alchem_sidebars,
	
      );
$options['alchem_right_sidebar_portfolio_archive'] =  array(
        'id'          => 'alchem_right_sidebar_portfolio_archive',
        'label'      => __( 'Right Sidebar', 'alchem' ),
        'description'        => __( 'Select right sidebar that will display on portfolio archive page.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     => $alchem_sidebars,
	
      );
 
 // Blog Posts
	$section = 'sidebar_blog_posts';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Posts', 'alchem' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);
 
$options['alchem_left_sidebar_blog_posts'] =  array(
        'id'          => 'alchem_left_sidebar_blog_posts',
        'label'      => __( 'Left Sidebar', 'alchem' ),
        'description'        => __( 'Select left sidebar that will display on all blog posts.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     => $alchem_sidebars,
	
      );
$options['alchem_right_sidebar_blog_posts'] =  array(
        'id'          => 'alchem_right_sidebar_blog_posts',
        'label'      => __( 'Right Sidebar', 'alchem' ),
        'description'        => __( 'Select right sidebar that will display on all blog posts.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     => $alchem_sidebars,
	
      );
 //
 
 
  // Blog Posts
	$section = 'sidebar_blog_archive';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Archive Category Pages', 'alchem' ),
		'priority' => '12',
		'description' => '',
		'panel' => $panel
	);
 
$options['alchem_left_sidebar_blog_archive'] =  array(
        'id'          => 'alchem_left_sidebar_blog_archive',
        'label'      => __( 'Left Sidebar', 'alchem' ),
        'description'        => __( 'Select left sidebar that will display on blog archive pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );
$options['alchem_right_sidebar_blog_archive'] =  array(
        'id'          => 'alchem_right_sidebar_blog_archive',
        'label'      => __( 'Right Sidebar', 'alchem' ),
        'description'        => __( 'Select right sidebar that will display on blog archive pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );

// Woo Products
	$section = 'sidebar_woo_products';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Woo Products', 'alchem' ),
		'priority' => '13',
		'description' => '',
		'panel' => $panel
	);
	
 
$options[ 'left_sidebar_woo_products'] =  array(
        'id'          => 'alchem_left_sidebar_woo_products',
        'label'      => __( 'Left Sidebar', 'alchem' ),
        'description'        => __( 'Select left sidebar that will display on product pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );
$options['alchem_right_sidebar_woo_products'] =  array(
        'id'          => 'alchem_right_sidebar_woo_products',
        'label'      => __( 'Right Sidebar', 'alchem' ),
        'description'        => __( 'Select right sidebar that will display on product pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );
 
// Woo Archive
	$section = 'sidebar_woo_archive';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Woo Archive', 'alchem' ),
		'priority' => '14',
		'description' => '',
		'panel' => $panel
	);
	
 
$options['alchem_left_sidebar_woo_archive'] =  array(
        'id'          => 'alchem_left_sidebar_woo_archive',
        'label'      => __( 'Left Sidebar', 'alchem' ),
        'description'        => __( 'Select left sidebar that will display on woocommerce archive pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );
$options['alchem_right_sidebar_woo_archive'] =  array(
        'id'          => 'alchem_right_sidebar_woo_archive',
        'label'      => __( 'Right Sidebar', 'alchem' ),
        'description'        => __( 'Select right sidebar that will display on woocommerce archive pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );


// bbPress
	$section = 'sidebar_bbpress';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Sidebar bbpress', 'alchem' ),
		'priority' => '14',
		'description' => '',
		'panel' => $panel
	);
	

 
$options['alchem_left_sidebar_bbpress'] =  array(
        'id'          => 'alchem_left_sidebar_bbpress',
        'label'      => __( 'Left Sidebar', 'alchem' ),
        'description'        => __( 'Select left sidebar that will display on bbpress pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );
$options['alchem_right_sidebar_bbpress'] =  array(
        'id'          => 'alchem_right_sidebar_bbpress',
        'label'      => __( 'Right Sidebar', 'alchem' ),
        'description'        => __( 'Select right sidebar that will display on bbpress pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );
 
  //Sidebar search

  $section = 'sidebar_search';
  $sections[] = array(
	  'id' => $section,
	  'title' => __( 'Search Page', 'alchem' ),
	  'priority' => '15',
	  'description' => '',
	  'panel' => $panel
  );
 
$options['alchem_left_sidebar_search'] =  array(
        'id'          => 'alchem_left_sidebar_search',
        'label'      => __( 'Left Sidebar', 'alchem' ),
        'description'        => __( 'Select left sidebar that will display on search pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );
$options['alchem_right_sidebar_search'] =  array(
        'id'          => 'alchem_right_sidebar_search',
        'label'      => __( 'Right Sidebar', 'alchem' ),
        'description'        => __( 'Select right sidebar that will display on search pages.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_sidebars,
	
      );
 //Sidebar 404
  $section = 'sidebar_404';
  $sections[] = array(
	  'id' => $section,
	  'title' => __( '404 Page', 'alchem' ),
	  'priority' => '13',
	  'description' => '',
	  'panel' => $panel
  );
	
  $options['alchem_left_sidebar_404'] =  array(
        'id'          => 'alchem_left_sidebar_404',
        'label'       => __( 'Left Sidebar', 'alchem' ),
        'description' => __( 'Select left sidebar that will display on 404 pages.', 'alchem' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $alchem_sidebars,
	
      );
$options['alchem_right_sidebar_404'] =  array(
        'id'          => 'alchem_right_sidebar_404',
        'label'       => __( 'Right Sidebar', 'alchem' ),
        'description' => __( 'Select right sidebar that will display on 404 pages.', 'alchem' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $alchem_sidebars,
	
      );
 
### Background ###
    $panel = 'background_options';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Background Options', 'alchem' ),
		'priority' => '10'
	);
	// BACKGROUND OPTIONS BELOW ONLY WORK IN BOXED MODE
    $section = 'background_boxed';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Background Options Only Work in Boxed Mode', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel,
	);

$options['alchem_bg_image_upload'] =  array(
        'id'          => 'alchem_bg_image_upload',
        'label'       => __( 'Background Image For Outer Areas In Boxed Mode', 'alchem' ),
        'description' => __( 'Upload an image to use for the backgroud.', 'alchem' ),
        'default'     => '',
        'type'        => 'upload',
        'section'     => $section,
        
      );
 
$options['alchem_bg_full'] =  array(
        'id'          => 'alchem_bg_full',
        'label'       => __( '100% Background Image', 'alchem' ),
        'description' => __( 'Choose to have the background image display at 100% in width and height and scale according to the browser size.', 'alchem' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['alchem_bg_repeat'] =  array(
        'id'          => 'alchem_bg_repeat',
        'label'       => __( 'Background Repeat', 'alchem' ),
        'description' => __( 'Select how the background image repeats.', 'alchem' ),
        'default'     => 'repeat',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $repeat
      );
 
$options['alchem_bg_color'] =  array(
        'id'          => 'alchem_bg_color',
        'label'       => __( 'Background Color For Outer Areas In Boxed Mode', 'alchem' ),
        'description' => __( 'Set background color for uter areas in boxed mode.', 'alchem' ),
        'default'     => '#ffffff',
        'type'        => 'color',
        'section'     => $section,
        
      );
 
$options['alchem_bg_pattern_option'] =  array(
        'id'          => 'alchem_bg_pattern_option',
        'label'      => __( 'Background Pattern', 'alchem' ),
        'description'        => __( 'Choose to display a pattern in the background. If \'yes\' is selected, select the pattern from below.', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     => $choices_reverse
      );

$options["bg_pattern"] =  array(
		'label' => __( 'Select a Background Pattern', 'alchem' ),
		'description' => __( 'Select a pattern for background', 'alchem' ),
		'id' => "bg_pattern",
		'default' => "1",
		'type' => "select",
		'section'     => $section,
		'choices' => array(
			'1' => __('Pattern 1', 'alchem' ),
			'2' => __('Pattern 2', 'alchem' ),
			'3' => __('Pattern 3', 'alchem' ),
			'4' => __('Pattern 4', 'alchem' ),
			'5' => __('Pattern 5', 'alchem' ),
			'6' => __('Pattern 6', 'alchem' ),
			'7' => __('Pattern 7', 'alchem' ),
			'8' => __('Pattern 8', 'alchem' ),
			'9' => __('Pattern 9', 'alchem' ),
			'10' => __('Pattern 10', 'alchem' ),
		)
	);

	// BACKGROUND OPTIONS ONLY WORK IN Wide MODE
$section = 'background_wide';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Background Options Work For Wide Mode', 'alchem' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);
	
$options['alchem_content_bg_image'] =  array(
        'id'          => 'alchem_content_bg_image',
        'label'       => __( 'Background Image For Main Content Area', 'alchem' ),
        'description' => __( 'Upload an image to use for the backgroud.', 'alchem' ),
        'default'     => '',
        'type'        => 'upload',
        'section'     => $section,
        
      );
 
$options['alchem_content_bg_full'] =  array(
        'id'          => 'alchem_content_bg_full',
        'label'       => __( '100% Background Image', 'alchem' ),
        'description' => __( 'Choose to have the background image display at 100% in width and height and scale according to the browser size.', 'alchem' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['alchem_content_bg_repeat'] =  array(
        'id'          => 'alchem_content_bg_repeat',
        'label'       => __( 'Background Repeat', 'alchem' ),
        'description' => __( 'Select how the background image repeats.', 'alchem' ),
        'default'     => 'repeat',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $repeat
      );


### Typography ###
    $panel = 'typography';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Typography', 'alchem' ),
		'priority' => '11'
	);
	// BACKGROUND OPTIONS BELOW ONLY WORK IN BOXED MODE
    $section = 'custom_font_for_menus_and_headings';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Custom Font for Menus and Headings', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	

$options['alchem_custom_font_woff'] = array(
        'id'          => 'alchem_custom_font_woff',
        'label'      => __( 'Custom Font .woff', 'alchem' ),
        'description'        => __( 'Upload the .woff font file.', 'alchem' ),
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,
        
        
        
      );
$options['alchem_custom_font_ttf'] = array(
        'id'          => 'alchem_custom_font_ttf',
        'label'      => __( 'Custom Font .ttf', 'alchem' ),
        'description'        => __( 'Upload the .ttf font file.', 'alchem' ),
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,
        
        
        
      );
$options['alchem_custom_font_svg'] = array(
        'id'          => 'alchem_custom_font_svg',
        'label'      => __( 'Custom Font .svg', 'alchem' ),
        'description'        => __( 'Upload the .svg font file.', 'alchem' ),
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,

      );
$options['alchem_custom_font_eot'] = array(
        'id'          => 'alchem_custom_font_eot',
        'label'      => __( 'Custom Font .eot', 'alchem' ),
        'description'        => __( 'Upload the .eot font file.', 'alchem' ),
        'default'         => '',
        'type'        => 'upload',
        'section' => $section,
        
      );
	

  $section = 'google_fonts';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Google Fonts ( will override standard fonts )', 'alchem' ),
		'priority' => '19',
		'description' => '',
		'panel' => $panel

	);
	
	
$options['alchem_body_font'] =  array(
        'id'          => 'alchem_body_font',
        'label'      => __( 'Select Body Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for body text.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $alchem_google_fonts_array_option
      );
	 
$options['alchem_menu_font'] =  array(
        'id'          => 'alchem_menu_font',
        'label'      => __( 'Select Menu Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for navigations.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
		'choices'     => $alchem_google_fonts_array_option
      )
	;
$options['alchem_headings_font'] = array(
        'id'          => 'alchem_headings_font',
        'label'      => __( 'Select Headings Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for headings.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'condition'   => '',
        'choices'     => $alchem_google_fonts_array_option
      );
$options[ 'footer_headings_font'] = array(
        'id'          => 'alchem_footer_headings_font',
        'label'      => __( 'Select Footer Headings Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for footer headings.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
		'choices'     => $alchem_google_fonts_array_option
      );
$options['alchem_button_font'] = array(
        'id'          => 'alchem_button_font',
        'label'      => __( 'Select Button Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for buttons.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
		'choices'     => $alchem_google_fonts_array_option
      );
	
  // Standard Fonts
  
  $section = 'standard_fonts';
  $sections[] = array(
		'id' => $section,
		'title' => __( 'Standard Fonts', 'alchem' ),
		'priority' => '19',
		'description' => '',
		'panel' => $panel

	);

$options['alchem_standard_body_font'] =  array(
        'id'          => 'alchem_standard_body_font',
        'label'      => __( 'Select Body Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for body text.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $default_theme_fonts_option
      );
	 
$options['alchem_standard_menu_font'] =  array(
        'id'          => 'alchem_standard_menu_font',
        'label'      => __( 'Select Menu Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for navigations.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
		'choices'     => $default_theme_fonts_option
      )
	;
$options['alchem_standard_headings_font'] = array(
        'id'          => 'alchem_standard_headings_font',
        'label'      => __( 'Select Headings Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for headings.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
        'condition'   => '',
        'choices'     => $default_theme_fonts_option
      );
$options['alchem_standard_footer_headings_font'] = array(
        'id'          => 'alchem_standard_footer_headings_font',
        'label'      => __( 'Select Footer Headings Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for footer headings.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
		'choices'     => $default_theme_fonts_option
      );
$options['alchem_standard_button_font'] = array(
        'id'          => 'alchem_standard_button_font',
        'label'      => __( 'Select Button Font Family', 'alchem' ),
        'description'        => __( 'Select a font family for buttons.', 'alchem' ),
        'default'         => '',
        'type'        => 'select',
        'section' => $section,
		'choices'     => $default_theme_fonts_option
      );

  // Custom Google Fonts
  
  $section = 'load_google_fonts';
  $sections[] = array(
		'id' => $section,
		'title' => __( 'Load Google Fonts', 'alchem' ),
		'priority' => '19',
		'description' => '',
		'panel' => $panel

	);
  
   $options['alchem_google_fonts'] =  array(
        'id'          => 'alchem_google_fonts',
        'label'       => __( 'Google Fonts', 'alchem' ) ,
        'description' => '',
        'default'     => '',
        'type'        => 'text',
        'section'     => $section,
        
      );

// Font Sizes
	
 $section = 'font_sizes';
  $sections[] = array(
		'id' => $section,
		'title' => __( 'Font Sizes', 'alchem' ),
		'priority' => '19',
		'description' => '',
		'panel' => $panel

	);

	
$options['alchem_body_font_size'] =  array(
        'id'          => 'alchem_body_font_size',
        'label'      => __( 'Body Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 14', 'alchem' ),
        'default'         => '14',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $font_size,
        
        
      );
$options['alchem_main_menu_font_size'] =  array(
        'id'          => 'alchem_main_menu_font_size',
        'label'      => __( 'Main Menu Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 14', 'alchem' ),
        'default'         => '14',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $font_size,
        
        
      );
$options['alchem_main_menu_dropdown_font_size'] =  array(
        'id'          => 'alchem_main_menu_dropdown_font_size',
        'label'      => __( 'Main Menu Dropdown Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 14', 'alchem' ),
        'default'         => '14',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $font_size,
        
        
      );
$options['alchem_secondary_menu_font_size'] =  array(
        'id'          => 'alchem_secondary_menu_font_size',
        'label'      => __( 'Secondary Menu and Top Contact Info Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 14', 'alchem' ),
        'default'         => '14',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        
      );

	 
$options['alchem_sidebar_widget_heading_font_size'] =  array(
        'id'          => 'alchem_sidebar_widget_heading_font_size',
        'label'      => __( 'Sidebar Widget Heading Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 16', 'alchem' ),
        'default'         => '16',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $font_size,
        
        
      );
$options['alchem_footer_widget_heading_font_size'] =  array(
        'id'          => 'alchem_footer_widget_heading_font_size',
        'label'      => __( 'Footer Widget Heading Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 16', 'alchem' ),
        'default'         => '16',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $font_size,
        
        
      );
$options['alchem_copyright_font_size'] =  array(
        'id'          => 'alchem_copyright_font_size',
        'label'      => __( 'Copyright Widget Heading Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 14', 'alchem' ),
        'default'         => '14',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $font_size,
        
        
      );
$options['alchem_h1_font_size'] =  array(
        'id'          => 'alchem_h1_font_size',
        'label'      => __( 'Heading Font Size H1', 'alchem' ),
        'description'        => __( 'In pixels, default is 36', 'alchem' ),
        'default'         => '36',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $font_size,
        
        
      );
$options['alchem_h2_font_size'] =  array(
        'id'          => 'alchem_h2_font_size',
        'label'      => __( 'Heading Font Size H2', 'alchem' ),
        'description'        => __( 'In pixels, default is 30', 'alchem' ),
        'default'         => '30',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $font_size,
        
        
      );
$options['alchem_h3_font_size'] =  array(
        'id'          => 'alchem_h3_font_size',
        'label'      => __( 'Heading Font Size H3', 'alchem' ),
        'description'        => __( 'In pixels, default is 24', 'alchem' ),
        'default'         => '24',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        
        
      );
$options['alchem_h4_font_size'] =  array(
        'id'          => 'alchem_h4_font_size',
        'label'      => __( 'Heading Font Size H4', 'alchem' ),
        'description'        => __( 'In pixels, default is 20', 'alchem' ),
        'default'         => '20',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        
        
      );
$options['alchem_h5_font_size'] =  array(
        'id'          => 'alchem_h5_font_size',
        'label'      => __( 'Heading Font Size H5', 'alchem' ),
        'description'        => __( 'In pixels, default is 18', 'alchem' ),
        'default'         => '18',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
      );
$options['alchem_h6_font_size'] =  array(
        'id'          => 'alchem_h6_font_size',
        'label'      => __( 'Heading Font Size H6', 'alchem' ),
        'description'        => __( 'In pixels, default is 16', 'alchem' ),
        'default'         => '16',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,     
      );
$options['alchem_tagline_font_size'] =  array(
        'id'          => 'alchem_tagline_font_size',
        'label'      => __( 'Header Tagline Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 14', 'alchem' ),
        'default'         => '14',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        );
$options['alchem_meta_data_font_size'] =  array(
        'id'          => 'alchem_meta_data_font_size',
        'label'      => __( 'Meta Data Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 14', 'alchem' ),
        'default'         => '14',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        
      );
$options['alchem_page_title_font_size'] =  array(
        'id'          => 'alchem_page_title_font_size',
        'label'      => __( 'Page Title Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 30', 'alchem' ),
        'default'         => '30',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        
        
      );
$options['alchem_page_title_subheader_font_size'] =  array(
        'id'          => 'alchem_page_title_subheader_font_size',
        'label'      => __( 'Page Title Sub-header Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 18', 'alchem' ),
        'default'         => '18',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        
        
      );
$options['alchem_breadcrumb_font_size'] =  array(
        'id'          => 'alchem_breadcrumb_font_size',
        'label'      => __( 'Breadcrumb Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 14', 'alchem' ),
        'default'         => '14',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        
      );
$options['alchem_pagination_font_size'] =  array(
        'id'          => 'alchem_pagination_font_size',
        'label'      => __( 'Pagination Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 18', 'alchem' ),
        'default'         => '18',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        
      );	
$options['alchem_woocommerce_icon_font_size'] =  array(
        'id'          => 'alchem_woocommerce_icon_font_size',
        'label'      => __( 'Woocommerce Icon Font Size', 'alchem' ),
        'description'        => __( 'In pixels, default is 18', 'alchem' ),
        'default'         => '18',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $font_size,
        
      );
		


 
### Blog ###
    $panel = 'blog';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Blog', 'alchem' ),
		'priority' => '13'
	);
	// General Blog Options
$section = 'general_blog_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Blog Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
	
$options['alchem_blog_list_style'] =  array(
        'id'          => 'alchem_blog_list_style',
        'label'      => __( 'Blog List Style', 'alchem' ),
        'description'        => '',
        'default'         => '1',
        'type'        => 'select',
        'section' => $section,
        'choices'     => array( '1' =>  sprintf(__( 'Blog List Style %d', 'alchem' ),1),
								'2' =>  sprintf(__( 'Blog List Style %d', 'alchem' ),2),
								'3' =>  sprintf(__( 'Blog List Style %d', 'alchem' ),3),
								'4' =>  sprintf(__( 'Blog List Style %d', 'alchem' ),4),
								),
      );	
 
 
$options['alchem_blog_title'] =  array(
        'id'          => 'alchem_blog_title',
        'label'      => __( 'Blog Page Title', 'alchem' ),
        'description'        => __( 'This text will display in the page title bar of the assigned blog page.', 'alchem' ),
        'default'         => 'Blog',
        'type'        => 'text',
        'section' => $section,    
      );
$options['alchem_blog_subtitle'] =  array(
        'id'          => 'alchem_blog_subtitle',
        'label'      => __( 'Blog Page Subtitle', 'alchem' ),
        'description'        => __( 'This text will display as subheading in the page title bar of the assigned blog page.', 'alchem' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,  
      );



$options['alchem_blog_pagination_type'] =  array(
        'id'          => 'alchem_blog_pagination_type',
        'label'      => __( 'Pagination Type', 'alchem' ),
        'description'        => __( 'Select the pagination type for the assigned blog page.', 'alchem' ),
        'default'         =>  'pagination',
        'type'        => 'select',
        'section' => $section,
        'choices'     => array( 
          'pagination'     => __( 'Pagination', 'alchem' ),
          'infinite_scroll'     => __( 'Infinite Scroll', 'alchem' ),
        ),
	
      );
	
$options['alchem_excerpt_or_content'] =  array(
        'id'          => 'alchem_excerpt_or_content',
        'label'      => __( 'Excerpt or Full Blog Content', 'alchem' ),
        'description'        => __( 'Choose to display an excerpt or full content on blog pages.', 'alchem' ),
        'default'         => 'excerpt',
        'type'        => 'select',
        'section' => $section,
        'choices'     => array( 
          'excerpt'     => __( 'Excerpt', 'alchem' ),
          'full_content'     => __( 'Full Content', 'alchem' ), 
        ),
	
      );
$options['alchem_excerpt_length'] =  array(
        'id'          => 'alchem_excerpt_length',
        'label'      => __( 'Excerpt Length', 'alchem' ),
        'description'        => __( 'Insert the number of words you want to show in the post excerpts.', 'alchem' ),
        'default'         => '55',
        'type'        => 'text',
        'section' => $section,
      );
$options['alchem_strip_html_excerpt'] =  array(
        'id'          => 'alchem_strip_html_excerpt',
        'label'      => __( 'Strip HTML from Excerpt', 'alchem' ),
        'description'        => __( 'Choose to display an excerpt or full content on blog pages.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_strip_html_excerpt'] =  array(
        'id'          => 'alchem_strip_html_excerpt',
        'label'      => __( 'Set All Post Items Full Width?', 'alchem' ),
        'description'        => __( 'Choose to strip HTML from the excerpt content only.', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     =>  $choices_reverse
	
      );
$options['alchem_archive_display_image'] =  array(
        'id'          => 'alchem_archive_display_image',
        'label'      => __( 'Featured image on blog archive page?', 'alchem' ),
        'description'        => __( 'Choose to display feature image in blog archive page.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     =>  $choices
	
      );

// Blog Single Post Page Options
    $section = 'single_blog_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Single Post Page Options', 'alchem' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);
 


$options['alchem_single_display_title_bar'] =  array(
        'id'          => 'alchem_single_display_title_bar',
        'label'      => __( 'Display Title Bar', 'alchem' ),
        'description'        => __( 'Choose to display page title bar in blog posts.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

$options[ 'alchem_single_display_image'] =  array(
        'id'          => 'alchem_single_display_image',
        'label'      => __( 'Display Featured Image', 'alchem' ),
        'description'        => __( 'Choose to display feature image in blog posts.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_display_pagination'] =  array(
        'id'          => 'alchem_display_pagination',
        'label'      => __( 'Display Previous/Next Pagination', 'alchem' ),
        'description'        => __( 'Choose to display previous/next pagination in blog posts.', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices_reverse
	
      );
$options['alchem_display_post_title'] =  array(
        'id'          => 'alchem_display_post_title',
        'label'      => __( 'Display Post Title', 'alchem' ),
        'description'        => __( 'Choose to display post title in blog posts.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_display_author_info_box'] =  array(
        'id'          => 'alchem_display_author_info_box',
        'label'      => __( 'Display Author Info Box', 'alchem' ),
        'description'        => __( 'Choose to display author info box in blog posts.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_display_social_sharing_box'] =  array(
        'id'          => 'alchem_display_social_sharing_box',
        'label'      => __( 'Display Social Sharing Box', 'alchem' ),
        'description'        => __( 'Choose to display social sharing box in blog posts.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_display_related_posts'] =  array(
        'id'          => 'alchem_display_related_posts',
        'label'      => __( 'Display Related Posts', 'alchem' ),
        'description'        => __( 'Choose to display related posts in blog posts.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

// Blog Meta Options
    $section = 'blog_meta_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Meta Options', 'alchem' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);

$options['alchem_display_post_meta'] =  array(
        'id'          => 'alchem_display_post_meta',
        'label'      => __( 'Display Post Meta', 'alchem' ),
        'description'        => __( 'Choose to display post meta in blog posts.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_display_meta_author'] =  array(
        'id'          => 'alchem_display_meta_author',
        'label'      => __( 'Disable Post Meta Author', 'alchem' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_display_meta_date'] =  array(
        'id'          => 'alchem_display_meta_date',
        'label'      => __( 'Disable Post Meta Date', 'alchem' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_display_meta_categories'] =  array(
        'id'          => 'alchem_display_meta_categories',
        'label'      => __( 'Disable Post Meta Categories', 'alchem' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

$options['alchem_display_meta_comments'] =  array(
        'id'          => 'alchem_display_meta_comments',
        'label'      => __( 'Disable Post Meta Comments', 'alchem' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_display_meta_readmore'] =  array(
        'id'          => 'alchem_display_meta_readmore',
        'label'      => __( 'Disable Post Meta Readmore', 'alchem' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_display_meta_tags'] =  array(
        'id'          => 'alchem_display_meta_tags',
        'label'      => __( 'Disable Post Meta Tags', 'alchem' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     =>  $choices
	
      );
$options['alchem_date_format'] =  array(
        'id'          => 'alchem_date_format',
        'label'      => __( 'Date Format', 'alchem' ),
        'description'        => '',
        'default'         => 'M d, Y',
        'type'        => 'text',
        'section' => $section,
        
        
        
      );


### Portfolio ###
    $panel = 'portfolio';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Portfolio', 'alchem' ),
		'priority' => '14'
	);
	// General Portfolio Options
    $section = 'general_portfolio_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Portfolio Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
 

$options['alchem_portfolio_number'] =  array(
        'id'          => 'alchem_portfolio_number',
        'label'      => __( 'Number of Portfolio Items Per Page', 'alchem' ),
        'description'        => __( 'Set the number of portfolios to display per page.', 'alchem' ),
        'default'         => '10',
        'type'        => 'text',
        'section' => $section,
        
      );

$options['alchem_portfolio_list_style'] =  array(
        'id'          => 'alchem_portfolio_list_style',
        'label'      => __( 'Portfolio List Style', 'alchem' ),
        'description'        => __( 'Set list style for portfolio archive page.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  array( 
          '1'     => __( 'Style 1', 'alchem' ),
          '2'     => __( 'Style 2', 'alchem' ), 
        ),
	
      );


$options['alchem_portfolio_grid_pagination_type'] =  array(
        'id'          => 'alchem_portfolio_grid_pagination_type',
        'label'      => __( 'Grid Pagination Type', 'alchem' ),
        'description'        => __( 'Set pagination type for portfolio archive page.', 'alchem' ),
        'default'         => 'pagination',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  array( 
          'pagination'     => __( 'Pagination', 'alchem' ),
          'infinite_scroll'     => __( 'Infinite Scroll', 'alchem' ),
        ),
	
      );
$options['alchem_portfolio_slug'] =  array(
        'id'          => 'alchem_portfolio_slug',
        'label'      => __( 'Portfolio Slug', 'alchem' ),
        'description'        => __( 'The slug name cannot be the same name as your portfolio page or the layout will break. This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'alchem' ),
        'default'         => 'portfolio',
        'type'        => 'text',
        'section' => $section,
      );

	// General Portfolio Options
$section = 'portfolio_single_post_page_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Portfolio Single Post Page Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
 

$options[ 'portfolio_display_featured'] =  array(
        'id'          => 'alchem_portfolio_display_featured',
        'label'      => __( 'Display Featured Image/Video', 'alchem' ),
        'description'        => __( 'Chosse to display featured image/video in single portfolio page.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

$options['alchem_portfolio_display_pagination'] =  array(
        'id'          => 'alchem_portfolio_display_pagination',
        'label'      => __( 'Display Previous/Next Pagination', 'alchem' ),
        'description'        => __( 'Choose to display previous/next pagination in single portfolio page.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['alchem_portfolio_show_comments'] =  array(
        'id'          => 'alchem_portfolio_show_comments',
        'label'      => __( 'Display Comments', 'alchem' ),
        'description'        => __( 'Choose to display comments in single portfolio page.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

$options['alchem_portfolio_show_social'] =  array(
        'id'          => 'alchem_portfolio_show_social',
        'label'      => __( 'Display Social Sharing Box', 'alchem' ),
        'description'        => __( 'Choose to display social sharing box in single portfolio page.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
      );

$options['alchem_portfolio_related_posts'] =  array(
        'id'          => 'alchem_portfolio_related_posts',
        'label'      => __( 'Display Related Posts', 'alchem' ),
        'description'        => __( 'Choose to display related portfolios in single portfolio page.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );



 ### Slider Settings ####

$section = 'slider_settings';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Slider Settings', 'alchem' ),
		'priority' => '16',
		'description' => '',
		
	);
	

 
$options['alchem_slider_autoplay'] =  array(
        'id'          => 'alchem_slider_autoplay',
        'label'       => __( 'Autoplay', 'alchem' ),
        'description' => __( 'Choose to autoplay the slides.', 'alchem' ),
        'default'     => 'yes',
        'type'        => 'select',
        'section'     => $section,
        'choices'     =>  $choices
  
      );

$options['alchem_slideshow_speed'] =  array(
        'id'          => 'alchem_slideshow_speed',
        'label'       => __( 'Slideshow Speed', 'alchem' ),
        'description' => __( 'Controls the speed of slideshows for the [alchem_slider] shortcode and sliders within posts. ex: 1000 = 1 second.', 'alchem' ),
        'default'     => '3000',
        'type'        => 'text',
        'section'     => $section,
        
      );

$options['alchem_caption_font_color'] =  array(
        'id'          => 'alchem_caption_font_color',
        'label'       => __( 'Caption Font Color', 'alchem' ),
        'description' => __( 'Set font color for slides caption.', 'alchem' ),
        'default'     => '',
        'type'        => 'color',
        'section'     => $section,
        
      );

$options['alchem_caption_heading_color'] =  array(
        'id'          => 'alchem_caption_heading_color',
        'label'       => __( 'Caption Heading h1-h6 Font Color', 'alchem' ),
        'description' => __( 'Set font color for headings in slides caption.', 'alchem' ),
        'default'     => '',
        'type'        => 'color',
        'section'     => $section,
        
      );
$options['alchem_caption_font_size'] =  array(
        'id'          => 'alchem_caption_font_size',
        'label'       => __( 'Caption Font Size', 'alchem' ),
        'description' => __( 'Set font size for slides caption.', 'alchem' ),
        'default'     => '14px',
        'type'        => 'text',
        'section'     => $section,
        'choices'     =>  ''
  
      );

$options['alchem_caption_alignment'] =  array(
        'id'          => 'alchem_caption_alignment',
        'label'       => __( 'Caption Alignment', 'alchem' ),
        'description' => __( 'Set alignment for slides caption.', 'alchem' ),
        'default'     => 'left',
        'type'        => 'select',
        'section'     => $section,
        'choices'     =>  $align,
  
      );


 ### 404 Page ####

$section = '404_page';
	$sections[] = array(
		'id' => $section,
		'title' => __( '404 Page', 'alchem' ),
		'priority' => '17',
		'description' => '',
		
	);
$options['alchem_title_404'] =  array(
        'id'          => 'alchem_title_404',
        'label'       => __( '404 Page Title', 'alchem' ),
        'description' => __( 'Insert title for 404 page.', 'alchem' ),
        'default'     => 'OOPS!',
        'type'        => 'text',
        'section'     => $section,
        'choices'     =>  ''
  
      );

$options['alchem_content_404'] =  array(
        'id'          => 'alchem_content_404',
        'label'       => __( '404 Page Content', 'alchem' ),
        'description' => __( 'Insert content for 404 page.', 'alchem' ),
        'default'     => '<h1>OOPS!</h1><p>Can\'t find the page.</p>',
        'type'        => 'textarea',
        'section'     => $section,
        'choices'     =>  ''
  
      );

$options['alchem_page_404_sidebar'] =  array(
        'id'          => 'alchem_page_404_sidebar',
        'label'       => __( 'Sidebar Position', 'alchem' ),
        'description' => __( 'Select siderbar positions for 404 page.', 'alchem' ),
        'default'     => 'none',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => array( 
      'none'     => __( 'None', 'alchem' ),
          'left'     => __( 'Left', 'alchem' ),
          'right'    => __( 'Right', 'alchem' ),
          'both'     => __( 'Both', 'alchem' ),
        ),
  
      );

### Extra ###
    $panel = 'extra';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Extra', 'alchem' ),
		'priority' => '18'
	);
	// Miscellaneous Options
$section = 'miscellaneous_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Miscellaneous Options', 'alchem' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	

$options['alchem_related_number'] =  array(
        'id'          => 'alchem_related_number',
        'label'      => __( 'Number of Related Posts / Projects', 'alchem' ),
        'description'        => __( 'Choose the amount of related posts / projects that show up on each single portfolio and blog post.', 'alchem'),
        'default'         => '4',
        'type'        => 'text',
        'section' => $section,
        
        
        'choices'     =>  ''
	
      );

$options['alchem_pages_comments'] =  array(
        'id'          => 'alchem_pages_comments',
        'label'      => __( 'Allow Comments on Pages', 'alchem' ),
        'description'        => __( 'Choose to display comments on pages', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

$options['alchem_pages_featured_images'] =  array(
        'id'          => 'alchem_pages_featured_images',
        'label'      => __( 'Disable Featured Images on Pages', 'alchem' ),
        'description'        => __( 'Choose to hidden featured images on pages', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

$options['alchem_social_links_nofollow'] =  array(
        'id'          => 'alchem_social_links_nofollow',
        'label'      => __( 'Add Nofollow to Social Links', 'alchem' ),
        'description'        => __( 'Choose to add "nofollow" attribute to all social links.', 'alchem' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     =>  $choices
	
      );
$options[ 'social_new_window'] =  array(
        'id'          => 'alchem_social_new_window',
        'label'      => __( 'Open Social Icons in New Window', 'alchem' ),
        'description'        => __( 'Choose to allow social icons to open in a new window.', 'alchem' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     =>  $choices
	
      );




 $alchem_default_options = array();
	foreach ( (array) $options as $option ) {
									  if ( ! isset( $option['id'] ) ) {
										  continue;
									  }
									  if ( ! isset( $option['default'] ) ) {
										  continue;
									  }
    $alchem_default_options[$option['id']] = $option['default'];
	}
	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'alchem_customizer_options' );
