<?php 
  // section slogan 
  
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_10_hide',0));
   $content_model   = absint(alchem_option('section_10_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_10_id')));
   $section_color   = esc_attr(alchem_option('section_10_color'));
   $section_title   = wp_kses(alchem_option('section_10_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_10_content'), $allowedposttags);
   $button_text     = esc_attr(alchem_option('section_10_button_text'));
   $button_link     = esc_attr(alchem_option('section_10_button_link'));
   $button_target   = esc_attr(alchem_option('section_10_button_target'),'_blank');
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-10 alchem-home-style-3';
   if( alchem_option('section_10_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?>
<?php if( $section_hide != '1' ):?>

<section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
    <div class="container alchem_section_10_model">
      <?php if( $content_model == 0 ):?>
      <div class="<?php echo $alchem_home_animation;?>" data-animationduration="1.2" data-animationtype="fadeInDown" data-imageanimation="no">
        <?php if( $section_title != '' ):?>
        <h1 class="magee-heading " style="text-align:center;"><span class="heading-inner alchem_section_10_title"> <span style="font-family: 'Cabin Condensed'; font-size: 32px;"><?php echo $section_title;?></span></span></h1>
        <div class=" divider divider-border center" style="margin-top:; margin-bottom:;width:15%;">
          <div class="divider-inner divider-border"></div>
        </div>
        <div style="height: 30px;"></div>
        <?php endif;?>
        <div style="text-align:center;" class="alchem_section_10_button_text">
         <?php if( $button_text!='' ):?>
        <a href="<?php echo $button_link;?>" target="<?php echo $button_target;?>" class=" magee-btn-normal btn-rounded btn-md"><?php echo $button_text;?></a>
        <?php endif;?>
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
