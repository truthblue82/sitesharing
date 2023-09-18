<?php
/*
 * Template Name: About Page
 * 
 * @author: Yen Truong
 */

get_header();
global  $alchem_page_meta,$alchem_banner_position,$alchem_banner_type;

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
$sidebar                   = isset($alchem_page_meta['page_layout'])?$alchem_page_meta['page_layout']:'none';
$left_sidebar              = isset($alchem_page_meta['left_sidebar_pages'])?esc_attr($alchem_page_meta['left_sidebar_pages']):''; 
$right_sidebar             = isset($alchem_page_meta['right_sidebar_pages'])?esc_attr($alchem_page_meta['right_sidebar_pages']):''; 

$display_title_bar         = isset($alchem_page_meta['display_title_bar'])?$alchem_page_meta['display_title_bar']:'';
$full_width                = (isset($alchem_page_meta['full_width']) && $alchem_page_meta['full_width'] !='')?$alchem_page_meta['full_width']:'no';

if( $full_width  == 'no' )
 $container = 'container';
else
 $container = 'container-fullwidth';
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
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="post-wrap">
        <div class="<?php echo $container;?>">
            <div class="page-inner row <?php echo alchem_get_content_class($sidebar);?>">
                <div class="col-main">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php  get_template_part( 'content', 'page' ); ?>
                    <?php endwhile; // end of the loop. ?>
                </div>
                <?php if( $sidebar == 'left' || $sidebar == 'both'  ): ?>
                <div class="col-aside-left">
                    <aside class="blog-side left text-left">
                        <div class="widget-area">
                        <?php get_sidebar('pageleft');?>
                        </div>
                    </aside>
                </div>
                <?php endif; ?>
                <?php if( $sidebar == 'right' || $sidebar == 'both'  ): ?>        
                    <div class="col-aside-right">
                        <div class="widget-area">
                           <?php get_sidebar('pageright');?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div style="text-align: center; padding-top: 30px;">
            <a class="magee-btn-normal btn-md btn-orange" href="http://gudi.lc/contact/" target="_blank">CONTACT US NOW!</a>
        </div>
    </div>
    <div style="padding-bottom: 30px;"></div>
</div>
<?php get_footer(); ?>