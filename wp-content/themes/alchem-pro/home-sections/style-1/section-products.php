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
   $columns         = absint(alchem_option('section_4_columns',4));
   $col             = $columns>0?12/$columns:3;
   $posts_num       = absint(alchem_option('section_14_posts_num',4));
   $date_format     = alchem_option('date_format','M d, Y');
   
   $section_class = 'section magee-section alchem-home-section-14 alchem-home-style-1';
   if( alchem_option('section_14_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container alchem_section_14_model">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h2 class="section-title alchem_section_14_title" ><?php echo $section_title;?></h2>
    <div style="text-align:center;" class="section-subtitle alchem_section_14_sub_title"><?php echo do_shortcode($sub_title);?></div>
    <div style="height: 80px;"></div>
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