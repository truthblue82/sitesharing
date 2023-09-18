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
   
   $section_class = 'section magee-section alchem-home-section-4 alchem-home-style-3';
   if( alchem_option('section_4_parallax') == '1' )
   $section_class .= ' parallax-scrolling';

 ?> 
 <?php if( $section_hide != '1' ):?>
  <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container alchem_section_4_model">
  <?php if( $content_model == 0 ):?>   
 <?php if( $section_title != '' ):?>
 
 <h1 class="magee-heading section-title"><span class="heading-inner alchem_section_4_title"><span style="font-family: 'Cabin Condensed'; font-size: 42px; color: #8ed7c4;"><?php echo $section_title;?></span></span></h1>

<div class=" divider divider-title divider-border center">
  <div class="divider-inner divider-border"></div>
</div>
<p class="section-subtitle alchem_section_4_sub_title"><?php echo do_shortcode($sub_title);?></p>
<div style="height:60px;"></div>

<?php endif;?>
    
    
    <p class="alchem_section_4_image"><img src="<?php echo $image;?>" alt="" class="alignnone size-full" /></p>
<div class=" row">
<?php 
	  
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
	  if( $feature_image !='' ){
	  $icon  = '<img class="feature-box-icon"  src="'.$feature_image.'" alt="" />'; 
	  }else{
	  $icon  = '<i class="feature-box-icon fa fa-'.$feature_icon.'" style="color: #2db5c2;"></i>'; 
	  }
	  ?>
  <div class=" col-md-4">
    <div class="<?php echo $alchem_home_animation;?>" data-animationduration="0.9" data-animationtype="fadeInUp" data-imageanimation="no"> 
    <span class="text-primary" style="font-family: 'Poiret One'; font-size: 42px;">0<?php echo ($j+1);?></span><br />
      <div class="magee-feature-box style2" data-os-animation="fadeOut">
        <?php echo $title;?>
        <div class="feature-content">
         <p class="<?php echo 'alchem_section_4_feature_content_'.$j;?>"><?php echo do_shortcode($feature_content);?></p>
          <a href="<?php echo $link;?>" target="<?php echo $target;?>" class="feature-link"></a>
          </div>
      </div>
    </div>
  </div>
  <?php endif;?>
  <?php endfor;?>
    </div>
 <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
 </div>
  </div>
</section>
<?php endif;?>