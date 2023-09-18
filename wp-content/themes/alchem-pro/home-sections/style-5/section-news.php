<?php 
  // section news 
  
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_8_hide',0));
   $content_model   = absint(alchem_option('section_8_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_8_id')));
   $section_color   = esc_attr(alchem_option('section_8_color'));
   $section_title   = wp_kses(alchem_option('section_8_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_8_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_8_content'), $allowedposttags);
   $category        = esc_attr(alchem_option('section_8_category'));
   $columns         = absint(alchem_option('section_8_columns',3));
   $col             = $columns>0?12/$columns:4;
   $posts_num       = absint(alchem_option('section_8_posts_num',3));
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-8 alchem-home-style-5';
   if( alchem_option('section_8_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <style>
 .alchem-home-section-8 .entry-box, .alchem-home-section-8 .entry-box a,.alchem-home-section-8 .entry-title{color:<?php echo $section_color;?>;}
 </style>
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>" style="background:url(https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/03/al024.jpg);">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container alchem_section_8_model">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
  <h1 class="magee-heading heading-boxed-reverse  heading-57204fc7e0000"><span class="heading-inner alchem_section_8_title"><span style="font-family: 'Playfair Display';"><?php echo $section_title;?></span></span></h1>
  <p style="text-align: left; color: #666666; font-size: 16px; font-family: 'Playfair Display';" class="alchem_section_8_sub_title"><?php echo do_shortcode($sub_title);?></p>
  <div style="height: 50px;"></div>
    <?php endif;?>
    <div class="shortcode-blog-list-wrap magee-shortcode magee-blog  alchem_section_8_category">
    <div class="blog-timeline-wrap">
      <div class="blog-timeline-icon"> <i class="fa fa-comments"></i> </div>  
      <div class="blog-timeline-inner">
        <div class="blog-timeline-line"></div>
        <div class="blog-list-wrap blog-timeline clearfix">
        
     <?php
	 $news_item   = '';
	 $news_str    = '';
	 $j           = 0;
	 query_posts( 'cat='.$category.'&ignore_sticky_posts=1&posts_per_page='.$posts_num );
     $positions = array('timeline-right','timeline-left','timeline-right','timeline-left','timeline-right','timeline-left');
// The Loop
while ( have_posts() ) : the_post();  
   
     $featured_image = '';
	if( has_post_thumbnail()  ){
		$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), "alchem-portfolio-thumb" );
		$featured_image = '
		<div class="feature-img-box"><div class="img-box figcaption-middle text-center from-top fade-in">
                                                                <a href="'.get_permalink().'">
                                                                    <img src="'.$image_attributes[0].'" alt="" class="feature-img">
                                                                    <div class="img-overlay dark">
                                                                        <div class="img-overlay-container">
                                                                            <div class="img-overlay-content">
                                                                                <i class="fa fa-link"></i>
                                                                            </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                </a>
                                                            </div> </div>
						  ';				  
		}else{
		$featured_image = '
		<div class="feature-img-box"><div class="img-box figcaption-middle text-center from-top fade-in">
                                                                <a href="'.get_permalink().'">
                                                                    <img src="" alt="" class="feature-img">
                                                                    <div class="img-overlay dark">
                                                                        <div class="img-overlay-container">
                                                                            <div class="img-overlay-content">
                                                                                <i class="fa fa-link"></i>
                                                                            </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                </a>
                                                            </div> </div>
						  ';				
		}
	
	
	$news_item .= '
                                                <div class="entry-box-wrap '.$positions[$j].'">
                                                    <article class="entry-box row" role="article">
                                                        
                                                           '.$featured_image.'                                             
                                                       
                                                        <div class="entry-main">
                                                            <div class="entry-header">
                                                                <a href="'.get_permalink().'"><h1 class="entry-title">'.get_the_title().'</h1></a>
                                                                <ul class="entry-meta">
                                                                    <li class="entry-date"><i class="fa fa-calendar"></i><a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'">'.get_the_date(  ).'</a></li>
                                                                    <li class="entry-comments pull-right">'.alchem_get_comments_popup_link('', __( '<i class="fa fa-comment"></i> 1 ', 'alchem-pro'), __( '<i class="fa fa-comment"></i> % ', 'alchem-pro'), 'read-comments', '').'</li>
                                                                </ul>
                                                            </div>
                                                            <div class="entry-summary">
                                                                '.alchem_get_summary().'
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>';
											
 $j++;
endwhile;
$news_str .= $news_item;
// Reset Query
 wp_reset_query();
 
 echo $news_str;	 
       	  
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