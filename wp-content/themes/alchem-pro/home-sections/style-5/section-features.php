<?php
//section features
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_4_hide',0));
   $content_model   = absint(alchem_option('section_4_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_4_id')));
   $section_color   = esc_attr(alchem_option('section_4_color'));
   $section_title   = wp_kses(alchem_option('section_4_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_4_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_4_content'), $allowedposttags);
   $image           = esc_url(alchem_option('section_4_image'));
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-4 alchem-home-style-4';
   if( alchem_option('section_4_parallax') == '1' )
   $section_class .= ' parallax-scrolling';

 ?> 
 <?php if( $section_hide != '1' ):?>
  <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container">
  <?php if( $content_model == 0 ):?>   
 <?php if( $section_title != '' ):?>
 <div class=" row">
      <div class="col-md-6" style="padding: 0; margin-bottom: 0;">
      <div class="magee-animated  animated fadeInLeft" data-animationduration="0.9" data-animationtype="fadeInLeft" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
          <h1 class="magee-heading"><span class="heading-inner alchem_section_4_title"><span style="font-family: 'Playfair Display'; color: #333333;font-size:25px;"><?php echo $section_title;?></span></span></h1>
          <p style="text-align:left; color: #666666; font-size: 16px; font-family: 'Playfair Display';" class="alchem_section_4_sub_title"><?php echo do_shortcode($sub_title);?></p>
        </div>
        <div style="height: 40px;"></div>
        <p style="text-align: left;" class="alchem_section_4_image"><img class="  wp-image-4673" src="<?php echo $image;?>" alt="show-img-1" width="500" height="375"></p>
      </div>
<?php endif;?>
<div class="col-md-6" style="padding: 0; margin: 0;">
<div style="height: 30px;"></div>
<?php 
	  $colors = array('#faca87','#2d828d','#8ed7c4','#fce9c7','#fb606c','#e53a31');
	  for( $j=0;$j<6;$j++):
	                                            
	  $feature_icon    =  esc_attr(alchem_option('section_4_feature_icon_'.$j));
	  $feature_icon    =  str_replace('fa-','',$feature_icon );
	  $feature_image   =  esc_attr(alchem_option('section_4_feature_image_'.$j));
	  $feature_title   =  esc_attr(alchem_option('section_4_feature_title_'.$j));
	  $feature_content =  wp_kses(alchem_option('section_4_feature_content_'.$j), $allowedposttags);
	  $link            =  esc_url(alchem_option('section_4_link_'.$j));
	  $target          =  esc_attr(alchem_option('section_4_target_'.$j));
	  if( $feature_icon !='' || $feature_image !='' || $feature_title!='' || $feature_content!='' ):
	  if( $link == "" )
	  $title = '<h3 class="alchem_section_4_feature_title_'.$j.'">'.$feature_title.'</h3>';
	  else
	  $title = '<a href="'.$link.'" target="'.$target.'"><h3 class="alchem_section_4_feature_title_'.$j.'">'.$feature_title.'</h3></a>';
	  
	  $icon            = '';
	  $addclass        = '';
	  if( $feature_image !='' ){
	  $icon  = '<img class="feature-box-icon"  src="'.$feature_image.'" alt="" />';
	  $addclass = 'alchem_section_4_feature_image_'.$j;
	  }else{
	  $icon  = '<i class="feature-box-icon fa fa-'.$feature_icon.'"></i>';
	  $addclass = 'alchem_section_4_feature_icon_'.$j;
	  }
	  ?>
    <div class="<?php echo $alchem_home_animation;?> <?php echo $addclass;?>" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no"> 
    <div class="icon-box  icon-circle" data-animation="rubberBand" style="border-color: <?php echo $colors[$j]?>;background-color: <?php echo $colors[$j]?>;"> <?php echo $icon;?></div>
    <h1 class="magee-heading "><span class="heading-inner"><span style="font-family: 'Playfair Display'; color: #333333; font-size: 16px;"><?php echo $title;?></span></span></h1>
          <p style="text-align: left; color: #666666; font-size: 12px; font-family: 'Playfair Display';" class="<?php echo 'alchem_section_4_feature_content_'.$j;?>"><?php echo do_shortcode($feature_content);?></p>
         
          <div class=" divider divider-border" style="margin-top:; margin-bottom:;">
            <div class="divider-inner divider-border" style="border-color:#999999;"></div>
          </div>
    </div>
  <?php endif;?>
  <?php endfor;?>
    </div></div>
 <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
 </div>
  </div>
</section>
<?php endif;?>