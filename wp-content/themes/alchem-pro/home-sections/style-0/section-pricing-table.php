<?php 
// section team
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_11_hide',0));
   $content_model   = absint(alchem_option('section_11_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_11_id')));
   $section_title   = wp_kses(alchem_option('section_11_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_11_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_11_content'), $allowedposttags);
   
   $section_class = 'section magee-section alchem-home-section-11 alchem-home-style-0';
   if( alchem_option('section_11_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 
 ?> 
 <?php if( $section_hide != '1' ):?>
  <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content container alchem_section_11_model">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h2 style="text-align: center" class="section-title alchem_section_11_title"><?php echo $section_title;?></h2>
    <div class=" divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner primary" style="border-bottom-width:3px; "></div>
    </div>
    <?php endif;?>   
    <?php if( $sub_title != '' ):?>
    <div class="section-subtitle alchem_section_11_sub_title"><?php echo do_shortcode($sub_title);?></div>
      <div style="height: 60px;"></div>
      <?php endif;?>
     <div class="<?php echo $alchem_home_animation;?>" data-animationduration="1.2" data-animationtype="bounceIn" data-imageanimation="no">
    <div class="magee-pricing-table row  no-margin 4_columns">
    <?php 
	for($i=1;$i<=4;$i++):
	
	$featured = absint(alchem_option('section_11_featured_'.$i));
	$icon = str_replace('fa-','',esc_attr(alchem_option('section_11_icon_'.$i)));
	$image = esc_attr(alchem_option('section_11_image_'.$i));
	$currency = esc_attr(alchem_option('section_11_currency_'.$i));
	$price    = esc_attr(alchem_option('section_11_price_'.$i));
	$unit     = esc_attr(alchem_option('section_11_unit_'.$i));
	$title    = esc_attr(alchem_option('section_11_title_'.$i));
	$features = alchem_option('section_11_features_'.$i);
	$button_text = alchem_option('section_11_button_text_'.$i);
	$button_link = alchem_option('section_11_button_link_'.$i);
	$button_target = alchem_option('section_11_button_target_'.$i);
	
	?>
<div class="magee-pricing-box-wrap  col-md-3 no-padding">
                                            <div class="panel panel-default text-center  magee-pricing-box <?php echo $featured=='1'?'featured':'';?> <?php echo 'alchem_section_11_featured_'.$i;?>">
                                                <div class="panel-heading">
                                                    <div class="pricing-top-icon">
                                                    <?php if( $image !="" ):?>
                                                    <img src="<?php echo $image ;?>" alt=""/>
                                                    <?php else:?>
                                                        <i class="fa fa-<?php echo $icon ;?>"></i>
                                                        <?php endif;?>
                                                    </div>
                                                    <h3 class="panel-title prcing-title"><?php echo $title ;?></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="pricing-tag">
                                                        <span class="currency"><?php echo $currency ;?></span><span class="price"><?php echo $price ;?></span><span class="unit"><?php echo $unit?'/ '.$unit:'' ;?></span>
                                                    </div>
                                                    <ul class="pricing-list">
                                                    <?php
													if( $features ){
			
														  $features = explode("\n",$features);
														  foreach( $features as $feature ){
															  if( $feature != '' ){
																	echo '<li>'.$feature.'</li>';
																  }
															  }
														  
														  }
														  ?>
                                                    </ul>
                                                </div>
                                                <div class="panel-footer">
                                                    <a href="<?php echo $button_link ;?>" target="<?php echo $button_target ;?>" class="magee-btn-normal"><i class="fa fa-shopping-cart"></i> <?php echo $button_text ;?></a>
                                                </div>
                                            </div>
                                        </div>
                           <?php endfor;?>
</div></div>
    
 <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
</section>
<?php endif;?>