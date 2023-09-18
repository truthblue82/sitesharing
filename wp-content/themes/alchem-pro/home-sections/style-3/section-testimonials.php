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
   
   $section_class = 'section magee-section alchem-home-section-7 alchem-home-style-3';
   if( alchem_option('section_7_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?>
<?php if( $section_hide != '1' ):?>

<section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
    <div class="container alchem_section_7_model">
      <?php if( $content_model == 0 ):?>
      <?php if( $section_title != '' ):?>
      <h1 class="magee-heading " style="text-align:center;"><span class="heading-inner alchem_section_7_title"> <span style="font-family: 'Cabin Condensed'; font-size: 32px; color: #fff;"><?php echo $section_title;?></span></span></h1>
      <div class=" divider divider-border center" style="margin-top:; margin-bottom:;width:15%;">
        <div class="divider-inner divider-border"></div>
      </div>
      <p style="text-align: center; color: #fff; font-size: 16px;" class="alchem_section_7_sub_title"><?php echo do_shortcode($sub_title);?></p>
      <div style="height:60px;"></div>
      <?php endif;?>
      <div class="<?php echo $alchem_home_animation;?> " data-animationduration="0.9" data-animationtype="fadeIn" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
        <div style="color: #fff;">
          <div class="multi-carousel  home-page-testimonial">
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
						 <p style="text-align: center;" class="alchem_section_7_avatar_'.$j.'">'.$image.'</p>
						 <div style="color: #fff;font-family: \'Dancing Script\';text-align: center;font-size: 20px; padding-left: 10%; padding-right: 10%;" class="alchem_section_7_desc_'.$j.'">'.do_shortcode($description).'</div>
						 <div style="height: 40px;"></div>
						 <div style="color: #fff; font-size: 14px; font-weight: bold; text-align: center;" class="alchem_section_7_name_'.$j.'">'.$name.'</div>
						 <div style="color: #fff; ;text-align: center;" class="alchem_section_7_byline_'.$j.'">'.$byline.'</div>
					</div>
                  </div>
';
	   endif;
	 }
	 echo $testimonial;
	  ?>
              </div>
            </div>
            <!-- Controls -->
            <div class="multi-carousel-nav style1 nav-bg  nav-rounded"> <a href="javascript:;" class="carousel-prev" role="button" data-slide="prev"> <span class="multi-carousel-nav-prev"></span> </a> <a class="carousel-next" href="javascript:;" role="button" data-slide="next"> <span class="multi-carousel-nav-next"></span> </a> </div>
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
