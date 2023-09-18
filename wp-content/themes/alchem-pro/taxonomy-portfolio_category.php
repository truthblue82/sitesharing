<?php
/**
 * The template for displaying single portfolio.
 *
 * @package alchem
 */

get_header(); 
$detect  = new Mobile_Detect;
$sidebar ='';
$enable_page_title_bar     = alchem_option('enable_page_title_bar','yes');
$page_title_bg_parallax    = esc_attr(alchem_option('page_title_bg_parallax','no'));
$page_title_bg_parallax    = $page_title_bg_parallax=="yes"?"parallax-scrolling":"";
$page_title_align          = esc_attr(alchem_option('page_title_align','left'));
$display_breadcrumb        = esc_attr(alchem_option('display_breadcrumb','yes'));
$breadcrumbs_on_mobile     = esc_attr(alchem_option('breadcrumbs_on_mobile_devices','yes'));
$breadcrumb_menu_prefix    = esc_attr(alchem_option('breadcrumb_menu_prefix',''));
$breadcrumb_menu_separator = esc_attr(alchem_option('breadcrumb_menu_separator','/'));
$left_sidebar              = esc_attr(alchem_option('left_sidebar_portfolio_archive',''));
$right_sidebar             = esc_attr(alchem_option('right_sidebar_portfolio_archive',''));
$portfolio_pagination_type = esc_attr(alchem_option('portfolio_grid_pagination_type','pagination'));
$portfolio_list_style      = esc_attr(alchem_option('portfolio_list_style','1'));


if( $left_sidebar )
$sidebar = 'left';
if( $right_sidebar )
$sidebar = 'right';
if( $left_sidebar && $right_sidebar )
$sidebar = 'both';

$infinite_scroll = '';
if( $portfolio_pagination_type == 'infinite_scroll' )
$infinite_scroll = 'alchem-infinite-scroll';

?>
<?php if(have_posts()): 
?>
<?php if( $enable_page_title_bar == 'yes' ):?>
<section class="page-title-bar title-<?php echo $page_title_align;?> no-subtitle <?php echo $page_title_bg_parallax;?>">
            <div class="container alchem_enable_page_title_bar">
                <hgroup class="page-title text-light">
                    <h1><?php single_cat_title( '', true ); ?></h1>
                    <!--<h3>This is a subtitle for the page.</h3>-->
                </hgroup>
                <?php if( $display_breadcrumb == 'yes' && !$detect->isMobile()):?>
                <?php alchem_get_breadcrumb(array("before"=>"<div class='breadcrumb-nav text-light alchem_display_breadcrumb'>".$breadcrumb_menu_prefix,"after"=>"</div>","show_browse"=>false,"separator"=>$breadcrumb_menu_separator));?>
                <?php endif;?>
                <?php if( $breadcrumbs_on_mobile == 'yes' && $detect->isMobile()):?>
                <?php alchem_get_breadcrumb(array("before"=>"<div class='breadcrumb-nav text-light alchem_display_breadcrumb'>".$breadcrumb_menu_prefix,"after"=>"</div>","show_browse"=>false,"separator"=>$breadcrumb_menu_separator));?>
                <?php endif;?>
                <div class="clearfix"></div>            
            </div>
        </section>
<?php endif;?>
 <div class="post-wrap">
            <div class="container">
                <div class="post-inner row <?php echo alchem_get_content_class($sidebar);?>">
                        <div class="col-main">
						<section class="post-main" role="main" id="content">
                             <div class="page-content" id="<?php echo $infinite_scroll;?>">
                                <!--portfolio list begin-->
                                
                                  <div id="portfoliolist" class="portfolio-list-wrap portfolio-list-filter clearfix no-text">
                                  <div class="portfolio-list-items">
                                    <?php 
					               while ( have_posts() ) : the_post(); 
								   if ( has_post_thumbnail()) :
								   $taxonomy  = 'portfolio_category';
								   $cats      = array();
								   $term_list = wp_get_post_terms(  get_the_ID(), $taxonomy, array("fields" => "all"));
								   foreach( $term_list as $term ){
									   $cats[] = $term->slug;
									   }
									   ?>
                                       <div id="post-<?php the_ID(); ?>" class="portfolio-box-wrap col-md-4 <?php echo implode(' ',$cats );?>" data-cat="<?php echo implode(' ',$cats );?>">
                                       <?php
					                  get_template_part('content','portfolio');
									  ?>
                                      </div>
                                      <?php
									  endif;
									  endwhile;
									  ?>
                                      </div>
                                      <div class="clear"></div>
                                    <?php 
			//if( $portfolio_pagination_type == 'pagination' )
			alchem_paging_nav('echo'); 
			
			?>
                                    </div>
                                </div>				
		</section>
                        </div>
                        <?php if( $sidebar == 'left' || $sidebar == 'both'  ): ?>
       <div class="col-aside-left">
                        <aside class="blog-side left text-left">
                            <div class="widget-area">
                            <?php get_sidebar('portfolioleft');?>
                            </div>
                        </aside>
                    </div>
            <?php endif; ?>
            <?php if( $sidebar == 'right' || $sidebar == 'both'  ): ?>        
                    <div class="col-aside-right">
                        <div class="widget-area">
                           <?php get_sidebar('portfolioright');?>
                            </div>
                    </div>
             <?php endif; ?>
                    </div>
                </div>
            </div>

<?php endif; ?>
<?php get_footer(); ?>