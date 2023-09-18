<?php 
  // section news 
  
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_12_hide',0));
   $content_model   = absint(alchem_option('section_12_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_12_id')));
   $section_color   = esc_attr(alchem_option('section_12_color'));
   $section_title   = wp_kses(alchem_option('section_12_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_12_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_12_content'), $allowedposttags);
   $columns         = absint(alchem_option('section_12_columns',3));
   $col             = $columns>0?12/$columns:4;
   $posts_num       = absint(alchem_option('section_12_posts_num',6));
   
   $section_class = 'section magee-section alchem-home-section-12 alchem-home-style-2';
   if( alchem_option('section_12_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content " style="color:<?php echo $section_color;?>;">
  <div class="container alchem_section_12_model">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h2 class="section-title alchem_section_12_title" ><?php echo $section_title;?></h2>
    <div class="section-subtitle alchem_section_12_sub_title"><?php echo do_shortcode($sub_title);?></div>
    <div style="height: 60px;"></div>
    <?php endif;?>
    <div class="<?php echo $alchem_home_animation;?> alchem_section_12_posts_num" data-animationduration="1.2" data-animationtype="zoomIn" data-imageanimation="no">
     <?php
	 $portfolio_item   = '';
	 $html    = '';
	 $j           = 0;
	 $class         = '';
	 	 
	 $html  .= '<nav class="portfolio-list-filter list-filter text-center">
                                <ul id="filters" class="clearfix list-inline">';
                            
							  $taxonomy     = 'portfolio-category';
							  $tax_terms    = get_terms($taxonomy) ;
							  $cats         = array() ;
							  $all_cats     = array() ;
							  $i            = 0 ;
							  if( $tax_terms ){
							  foreach ($tax_terms as $tax_term) {
							   $cats[$i]['slug'] = $tax_term->slug ;
							   $cats[$i]['name'] = $tax_term->name ;
							   $all_cats[]       = $tax_term->slug ;
							   $i++;
							    }
							  }
							
              $html  .= '<li><span class="filter active" data-filter="'.implode(' ',$all_cats ).'"><a href="javascript:;">'. __( 'All', 'alchem-pro' ).'</a></span></li>';
							  $i = 0;
                              if( $cats ):
                              foreach ($cats as $cat):
              $html  .= '<li><span class="filter" data-filter="'.$cat['slug'].'"><a href="javascript:;">'.$cat['name'].'</a></span></li>';
							  $i++;
                              endforeach;
                              endif;
              $html  .= '</ul></nav>';
                            $class .= ' portfolio-list-filter';  

	// The Loop
	     $html  .= '<div class="portfolio-list-wrap portfolio-list-wrap-shortcode portfolio-list-style-1 '.$class.'">';
		 $html  .= '<div class="portfolio-list-items">';
		 
		  $query = new WP_Query('post_type=magee_portfolio&orderby=menu_order&post_status=publish&posts_per_page='.$posts_num);
  
		if($query->have_posts() ):
		while ($query->have_posts() ) :
		  $query->the_post();
		  
		  $taxonomy  = 'portfolio-category';
				 $cats      = array();
				 $term_list = wp_get_post_terms(  get_the_ID(), $taxonomy, array("fields" => "all"));
				 foreach( $term_list as $term ){
					 $cats[] = $term->slug;
					 }
					 
		  $html .= '<div class="portfolio-box-wrap col-md-'.$col.' '.implode(' ',$cats ).'" data-cat="'.implode(' ',$cats ).'">';
		  ob_start();  
		   get_template_part('content','portfolio2');
		  $html .= ob_get_contents();  
          ob_end_clean();  
		  $html .= '</div>';
 
		  endwhile;
		 endif;
		
         $html .= '</div>';
		 $html .= '</div>';
		
	     wp_reset_postdata();
// Reset Query
 echo $html;	 

	  ?>      
    </div>
    </div>
    <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
</section>
<?php endif;?>