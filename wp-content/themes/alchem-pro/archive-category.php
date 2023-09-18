<?php

get_header(); 
global  $alchem_page_meta,$alchem_blog_style, $alchem_css_class;
$detect  = new Mobile_Detect;
$sidebar ='none';
$enable_page_title_bar     = alchem_option('enable_page_title_bar','yes');
$page_title_bg_parallax    = esc_attr(alchem_option('page_title_bg_parallax','no'));
$page_title_bg_parallax    = $page_title_bg_parallax=="yes"?"parallax-scrolling":"";
$page_title_align          = esc_attr(alchem_option('page_title_align','left'));
$display_breadcrumb        = esc_attr(alchem_option('display_breadcrumb','yes'));
$breadcrumbs_on_mobile     = esc_attr(alchem_option('breadcrumbs_on_mobile_devices','yes'));
$breadcrumb_menu_prefix    = esc_attr(alchem_option('breadcrumb_menu_prefix',''));
$breadcrumb_menu_separator = esc_attr(alchem_option('breadcrumb_menu_separator','/'));
//$sidebar                   = isset($alchem_page_meta['page_layout'])?$alchem_page_meta['page_layout']:'none';
$left_sidebar              = esc_attr(alchem_option('left_sidebar_blog_archive',''));
$right_sidebar             = esc_attr(alchem_option('right_sidebar_blog_archive',''));
if( $left_sidebar !='' )
$sidebar ='left';
if( $right_sidebar !='' )
$sidebar ='right';
if( $left_sidebar !='' && $right_sidebar !='' )
$sidebar ='both';


$slider_banner = isset($alchem_page_meta['slider_banner'])?$alchem_page_meta['slider_banner']:'';

$enable_page_title_bar = (isset($alchem_page_meta['display_title_bar']) && $alchem_page_meta['display_title_bar']!='' )?$alchem_page_meta['display_title_bar']:$enable_page_title_bar;

?>
<div class="container forPC">
    <div class="container separate">
        <div class="col-md-3"><hr class="orange"/></div>
        <div class="col-md-9"><hr class="blue"/></div>
    </div>
</div>  
<div class="divider-inner forSP">
    <div class="container separate">
        <div class="col-md-12"><hr class="blue"/></div>
    </div>
</div>
<div class="produc-master-sections">
    <?php 
    $category = get_queried_object();
    //print_r($category);
    ?>
    <section class="section magee-section section-main">
        <div class="container">
            <div class="main-content row no-aside">
                <div class="col-main">
                    <h1 class="page-title uppercase"><?php echo $category->name; ?></h1>
                </div>
            </div>
            <?php
            $args = array ( 'category_name' => $category->slug, 'orderby' => 'meta_value_num', 'meta_key' => 'ordering', 'order' => 'asc', 'post_status' => array('publish'), 'posts_per_page' => -1 );
            $posts = get_posts( $args );
            $total = count($posts);
            
            if($total){
                $rows = ceil($total/4);
                for($i=1; $i <= $rows; $i++){
                    ?>
                    <div class="row">
                    <?php
                    for($j = 4*($i-1); $j < count($posts); $j++ ){
                        $post = $posts[$j];
                        if($j < 4*$i){
                            setup_postdata($post);
                            ?>
                            <div class="col-md-3">
                                <div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no">
                                    <?php 
                                    if(get_the_content()){
                                        $link = get_permalink();
                                    }else $link = "";
                                    ?>
                                    <div class="magee-person-box" id="">
                                        <div class="person-img-box">
                                            <div class="img-box figcaption-middle text-center fade-in">
                                                <?php if(empty($link)){ ?>
                                                    <a href="javascript:void();" target="_self">
                                                <?php }else{ ?>
                                                    <a href="<?php echo $link;?>" target="_self">
                                                <?php } ?>
                                                    <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" style="border-radius: 0; display: inline-block;border-style: solid;" />
                                                    <div class="img-overlay primary">
                                                        <div class="img-overlay-container">
                                                            <div class="img-overlay-content"><i class="fa fa-link"></i></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="person-vcard text-center">
                                                <?php if(empty($link)){ ?>
                                                    <a href="javascript:void();" target="_self">
                                                <?php }else{ ?>
                                                    <a href="<?php echo $link;?>" target="_self">
                                                <?php } ?>
                                                    <h3 class="person-name" style="text-transform: uppercase;"><?php the_title();?></h3>
                                                </a>
                                                <h4 class="person-title" style="text-transform: uppercase;"></h4>
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }else {break;}
                    }
                    wp_reset_postdata();
                    ?>
                    </div>
                    <?php
                }
            }
            unset($args, $posts, $total);
            ?>
        </div>
        <div style="text-align: center;padding-bottom: 75px;">
            <?php 
            $contactURL = get_the_permalink(13);
            ?>
            <a class="magee-btn-normal btn-md btn-green" href="<?php echo $contactURL; ?>" target="_blank" ><?php echo product_contact;?></a>
        </div>
    </section>
</div>    

<?php get_footer(); ?>