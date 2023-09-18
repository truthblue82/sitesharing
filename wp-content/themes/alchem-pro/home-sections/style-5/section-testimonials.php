<?php
  // section testimonials 
  
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_7_hide',0));
   $content_model   = absint(alchem_option('section_7_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_7_id')));
   $section_color   = esc_attr(alchem_option('section_7_color'));
   $section_title   = wp_kses(alchem_option('section_7_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_7_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_7_content'), $allowedposttags);
   $columns         = absint(alchem_option('section_7_columns',3));
   $col             = $columns>0?12/$columns:4;
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-7 alchem-home-style-5';
   if( alchem_option('section_7_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container alchem_section_7_model">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
  <h1 class="magee-heading heading-boxed-reverse  heading-57202ed726d36"><span class="heading-inner alchem_section_7_title"><span style="font-family: 'Playfair Display';"><?php echo $section_title;?></span></span></h1>
  <p style="text-align: left; color: #666666; font-size: 16px; font-family: 'Playfair Display';" class="alchem_section_7_sub_title"><?php echo do_shortcode($sub_title);?></p>
  <div style="height: 50px;"></div>
    <?php endif;?>
      <div class="magee-alert box-shadow " role="alert">
         <div class="multi-carousel home-page-testimonial">  
        <!-- Controls -->
           <div class="multi-carousel-nav style3 nav-border  nav-circle"> <a href="javascript:;" class="carousel-prev" role="button" data-slide="prev"> <span class="multi-carousel-nav-prev"></span> </a> <a class="carousel-next" href="javascript:;" role="button" data-slide="next"> <span class="multi-carousel-nav-next"></span> </a> </div>
          <div class="multi-carousel-inner">
            <div id="home-page-testimonial" class="owl-carousel owl-theme ">
     <?php
	 $testimonial   = '';
	 $testimonials  = '';
	 $animationtype = array('fadeIn','fadeIn','fadeIn','fadeIn','fadeIn','fadeIn');
	 for( $j=0; $j<6; $j++ ){
	   
	  $avatar      =  esc_url(alchem_option('section_7_avatar_'.$j));
	  $name        =  esc_attr(alchem_option('section_7_name_'.$j));
	  $byline      =  esc_attr(alchem_option('section_7_byline_'.$j));
	  $description = wp_kses(alchem_option('section_7_desc_'.$j), $allowedposttags);
	  
	  if( $description != '' ):
	  $image = '';
	  if( $avatar != '' )
	  $image = '<img src="'.$avatar.'" style="width: 150px; display: inline-block;" class="img-circle">';
	  
		
$testimonial   .= '<div class="item">
					<div class="row">
						<div class=" col-md-2">
						  <div style="height: 20px;"></div>
						  <p style="text-align:center;" class="alchem_section_7_avatar_'.$j.'"> '.$image.'</p>
						  <div style="font-family: \'Playfair Display\';font-size: 18px; font-weight: bold; text-align: center;" class="alchem_section_7_name_'.$j.'">'.$name.'</div>
						  <div style="text-align: center;" class="alchem_section_7_byline_'.$j.'">'.$byline.'</div>
						</div>
						<div class=" col-md-10">
						  <div style="height: 50px;"></div>
						  <p class="alchem_section_7_desc_'.$j.'"><span style="font-family: \'Dancing Script\';font-size:18px;">'.do_shortcode($description).'</span> </p>
						</div>
					</div>
                  </div>
';
	   endif;
	 }
	 echo $testimonial;
	  ?>   
             </div>
           </div>
         </div>  
    </div>               
    <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
  </div>
</section>
<?php endif;?>