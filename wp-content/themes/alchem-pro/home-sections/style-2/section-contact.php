<?php 
  // section news 
  
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_13_hide',0));
   $content_model   = absint(alchem_option('section_13_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_13_id')));
   $section_color   = esc_attr(alchem_option('section_13_color'));
   $section_title   = wp_kses(alchem_option('section_13_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_13_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_13_content'), $allowedposttags);
 
   $infobox_content = wp_kses(alchem_option('section_13_infobox_content'), $allowedposttags);
   $address         = wp_kses(alchem_option('section_13_address'), $allowedposttags);
   $receiver        = esc_attr(alchem_option('section_13_receiver'), $allowedposttags);
   $display_terms   = esc_attr(alchem_option('section_13_display_terms'), $allowedposttags);
   $terms_text      = wp_kses(alchem_option('section_13_terms_text'), $allowedposttags);
   $gmap_api        = esc_attr(alchem_option('gmap_api'));
   
   $section_class = 'section magee-section alchem-home-section-13 alchem-home-style-2';
   if( alchem_option('section_13_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
   
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
   <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container alchem_section_13_model">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h2 class="section-title alchem_section_13_title" ><?php echo $section_title;?></h2>
    <div class="section-subtitle alchem_section_13_sub_title"><?php echo do_shortcode($sub_title);?></div>
    <div style="height: 60px;"></div>
    <?php endif;?>
  
     <?php
	$shortcode = '[ms_row]
		[ms_column style="1/2" class="alchem_section_13_address"]
		<div class="'.$alchem_home_animation.'" data-animationduration="0.9" data-animationtype="fadeInLeft" data-imageanimation="no">
		[ms_google_map api_key="'.$gmap_api.'" address="'.$address.'" type="roadmap" overlay_color="" infobox_background_color="#ffffff" infobox_text_color="#000000" infobox_content="'.do_shortcode($infobox_content).'" icon="" width="100%" height="450px" zoom="14" scrollwheel="yes" scale="yes" zoom_pancontrol="yes" popup="yes" animation="yes" class=""][/ms_google_map]
		</div>
		[/ms_column]
		[ms_column style="1/2"]
		<div class="'.$alchem_home_animation.'" data-animationduration="0.9" data-animationtype="fadeInRight" data-imageanimation="no">
		[ms_contact receiver="'.$receiver.'" style="outline" color="#ccc" terms="'.$display_terms.'" class=""]'.do_shortcode($terms_text).'[/ms_contact]
		</div>
		[/ms_column]
		[/ms_row]';
		$html = do_shortcode($shortcode);
		// Reset Query
 echo $html;	 

	  ?>      
    
    <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
  </div>
</section>
<?php endif;?>