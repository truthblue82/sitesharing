<?php
// section recent-works
   global $allowedposttags;
   $section_hide    = absint(alchem_option('section_3_hide',0));
   $content_model   = absint(alchem_option('section_3_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_3_id')));
   $section_color   = esc_attr(alchem_option('section_3_color'));
   $section_title   = wp_kses(alchem_option('section_3_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_3_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_3_content'), $allowedposttags);
   $button_text     = esc_attr(alchem_option('section_3_button_text'));
   $button_link     = esc_url(alchem_option('section_3_button_link'));
   $button_target   = esc_attr(alchem_option('section_3_button_target'),'_blank');
   
   $columns         = absint(alchem_option('section_3_columns',3));
   $col             = $columns>0?12/$columns:4;
   
   $section_class = 'section magee-section alchem-home-section-3 alchem-home-style-4';
   if( alchem_option('section_3_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?> 
<?php if( $content_model == 0 ):?> 
	 <?php if( $section_title != '' ):?>
    <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
    <div class="section-content " style="color:<?php echo $section_color;?>;">
    <div class="container alchem_section_3_model">
    <div class=" col-md-6"></div>
            <div class=" col-md-6">
              <h1 class="magee-heading" style="margin-bottom:30px;color:#eeeeee;"><span class="heading-inner alchem_section_3_title"><?php echo $section_title;?></span></h1>
              <p style="text-align:left;color:#eeeeee;font-size:18px;" class="alchem_section_3_sub_title"><?php echo do_shortcode($sub_title);?></p>
            </div>
          </div>
       </div>
    </section>          
    <?php endif;endif;?>
 <?php if( $section_hide != '1' ):?>
<section class="section magee-section alchem-home-style-4" style="background-color: #1d1d1d;">

<div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container-fullwidth">
  
<?php if( $content_model == 0 ):?>

 <?php
	 $works_item = '';
	 $works_str  = '';
	 $animationtype = array('fadeInLeft','fadeInDown','fadeInRight','fadeInLeft','fadeInUp','fadeInRight','fadeInDown','fadeInDown');
	 for( $j=0; $j<8; $j++ ){
	   
	  $image     =  esc_url(alchem_option('section_3_image_'.$j));
	  $link      =  esc_url(alchem_option('section_3_link_'.$j));
	  $target    =  esc_attr(alchem_option('section_3_target_'.$j));

	  if( $image !='' ):
	  $k = $j+1;
	  if( $link == "" ){
	  $work_inner = '<a href="'.$image.'" rel="portfolio-image"><img src="'.$image.'" class="feature-img">
                                                        <div class="img-overlay dark">
                                                            <div class="img-overlay-container">
                                                                <div class="img-overlay-content">
                                                                </div>
                                                            </div>
                                                        </div>
														</a>';
	  }else{
	  $work_inner = '<a target="'.$target.'" href="'.$link.'">
                                                        <img src="'.$image.'" class="feature-img">
                                                        <div class="img-overlay dark">
                                                            <div class="img-overlay-container">
                                                                <div class="img-overlay-content">
                                                                    <i class="fa fa-link"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>';
													
	  }
	  
	  $works_item .= '<div class="col-sm-3" style="padding:0;margin-bottom:0;">
	  <div class="magee-animated" data-animationduration="0.9" data-animationtype="'.$animationtype[$j].'" data-imageanimation="no">
<div class="img-frame rounded alchem_section_3_image_'.$j.'"><div class="img-box figcaption-middle text-center fade-in">'.$work_inner.'</div></div></div>
</div>';
      $k = $j+1;
	  if( $k % 4 == 0 ){
	        $works_str .= '<div class="row">'.$works_item.'</div>';
	        $works_item = '';
	   }

    endif;
	
	 }
if( $works_item != '' ){
		    $works_str .= '<div class="row">'.$works_item.'</div>';
	      
		   }
	 echo $works_str;
	  ?>

<?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
</div>
</div>
</section>
<?php endif;?>