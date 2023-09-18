<?php
/*
  Template Name: Home Page
 */
// Yen Truong write
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
//banner
get_template_part('home-sections/style-yen/section','home-banner');

//printing industry ( our team )
//get_template_part('home-sections/style-yen/section','printing-products');
get_template_part('home-sections/style-yen/section','printing-packaging');
?>
    <div class="container">
        <div class="container separate">
            <hr class="grey">
        </div>
    </div>

<?php
//tape industry ( our team )
get_template_part('home-sections/style-yen/section','tape-products');
?>
    <div class="container">
        <div class="container separate">
            <hr class="grey">
        </div>
    </div>

<?php
//graphic reflective
get_template_part('home-sections/style-yen/section','graphic-reflective');

// home services
get_template_part('home-sections/style-yen/section','home-service');

//Hamina commitment -> About us/ what do you want 
get_template_part('home-sections/style-yen/section','hamina-commitment');

//Our client OUR SUPPLIERS & PARTNERS 
//get_template_part('home-sections/style-yen/section','suppliers-partners');

//slogan / latest news
get_template_part('home-sections/style-yen/section','slogan');

// home-news / lastest news
get_template_part('home-sections/style-yen/section','home-news');

?> 
</div>
<?php get_footer(); ?>