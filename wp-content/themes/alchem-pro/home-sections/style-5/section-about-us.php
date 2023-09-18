<?php 
// section ahout us
   global $allowedposttags;
   $section_hide    = absint(alchem_option('section_5_hide',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_5_id')));
   $section_color   = esc_attr(alchem_option('section_5_color'));
   $section_title   = wp_kses(alchem_option('section_5_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_5_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_5_content'), $allowedposttags);
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-5 alchem-home-style-5';
   if( alchem_option('section_5_parallax') == '1' )
   $section_class .= ' parallax-scrolling';

 ?>
<?php if( $section_hide != '1' ):?>

<section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
    <div class="container">
      <?php if( $section_title != '' ):?>
      <h1 class="magee-heading heading-boxed-reverse"><span class="heading-inner alchem_section_5_title"><span style="font-family: 'Playfair Display';"><?php echo $section_title;?></span></span></h1>
      <p style="text-align: left; color: #666666; font-size: 16px; font-family: 'Playfair Display';" class="alchem_section_5_sub_title"><?php echo do_shortcode($sub_title);?></p>
      <div style="height: 50px;"></div>
      <?php endif;?>
      <p class="alchem_section_5_content" style="width:20%;text-align: center;"></p>
      <?php echo do_shortcode($section_content);?> </div>
  </div>
</section>
<?php endif;?>
