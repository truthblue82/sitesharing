<?php 
  // section news 
  
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_14_hide',0));
   $content_model   = absint(alchem_option('section_14_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_14_id')));
   $section_color   = esc_attr(alchem_option('section_14_color'));
   $section_title   = wp_kses(alchem_option('section_14_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_14_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_14_content'), $allowedposttags);
   $columns         = absint(alchem_option('section_14_columns',4));
   $col             = $columns>0?12/$columns:3;
   $posts_num       = absint(alchem_option('section_14_posts_num',4));
   $date_format     = alchem_option('date_format','M d, Y');
   
   $section_class = 'section magee-section alchem-home-section-14 alchem-home-style-5';
   if( alchem_option('section_14_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container alchem_section_14_model">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h1 class="magee-heading heading-boxed-reverse"><span class="heading-inner alchem_section_14_title"><span style="font-family: 'Playfair Display';"><?php echo $section_title;?></span></span></h1>
      <p style="text-align: left; color: #666666; font-size: 16px; font-family: 'Playfair Display';" class="alchem_section_14_sub_title"><?php echo do_shortcode($sub_title);?></p>
      <div style="height: 50px;"></div>
    <?php endif;?>
    <div class="<?php echo $alchem_home_animation;?> alchem_section_14_posts_num" data-animationduration="1.2" data-animationtype="fadeIn" data-imageanimation="no">
     <?php
 
 echo do_shortcode('[recent_products per_page="'.$posts_num.'" columns="'.$columns.'"]');

	  ?>      
    </div>
    <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
  </div>
</section>
<?php endif;?>