<?php
/*
  Template Name: Front Page
 */
get_header(); 
?>
<div id="alchem-home-sections">
<?php 
global $alchem_homepage_sections,$alchem_home_animation;

$detect = new Mobile_Detect;
$isMobile = 0;
	if( $detect->isMobile() && !$detect->isTablet() ){
		$isMobile = 1;
		}
		
$home_style = absint(alchem_option('home_style',0));
$section_num = count($alchem_homepage_sections);
$alchem_home_animation = esc_attr(alchem_option('home_animation'));
if( $alchem_home_animation == 'yes' && $isMobile == 0 )
   $alchem_home_animation = 'magee-animated';
   else
   $alchem_home_animation = '';
   
$new_homepage_sections = array();
for($i=0;$i<$section_num;$i++){
$section = alchem_option('section_order_'.$i);
if($section)
$new_homepage_sections[] = $section;
}

foreach(  $new_homepage_sections as $section_part ){
get_template_part('home-sections/style-'.$home_style.'/section',$section_part);
}
?> 
</div>
<?php get_footer(); ?>