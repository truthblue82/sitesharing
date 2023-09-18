<?php
/**
 * The template for displaying single portfolio.
 *
 * @package alchem
 */

get_header(); 

global  $alchem_page_meta;

$detect  = new Mobile_Detect;

$enable_page_title_bar     = alchem_option('enable_page_title_bar','yes');
$page_title_bg_parallax    = esc_attr(alchem_option('page_title_bg_parallax','no'));
$page_title_bg_parallax    = $page_title_bg_parallax=="yes"?"parallax-scrolling":"";
$page_title_align          = esc_attr(alchem_option('page_title_align','left'));
$display_breadcrumb        = esc_attr(alchem_option('display_breadcrumb','yes'));
$breadcrumbs_on_mobile     = esc_attr(alchem_option('breadcrumbs_on_mobile_devices','yes'));
$breadcrumb_menu_prefix    = esc_attr(alchem_option('breadcrumb_menu_prefix',''));
$breadcrumb_menu_separator = esc_attr(alchem_option('breadcrumb_menu_separator','/'));
$left_sidebar              = esc_attr(alchem_option('left_sidebar_portfolio_posts',''));
$right_sidebar             = esc_attr(alchem_option('right_sidebar_portfolio_posts',''));
$portfolio_show_social     = esc_attr(alchem_option('portfolio_show_social','yes'));
$portfolio_related_posts   = esc_attr(alchem_option('portfolio_related_posts','yes'));
$related_number            = absint(alchem_option('related_number','8'));
$sidebar                   = isset($alchem_page_meta['page_layout'])?$alchem_page_meta['page_layout']:'none';

?>
<?php if(have_posts()): the_post(); 

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if( $enable_page_title_bar == 'yes' ):?>
<section class="page-title-bar title-<?php echo $page_title_align;?> no-subtitle <?php echo $page_title_bg_parallax;?>">
            <div class="container alchem_enable_page_title_bar">
                <hgroup class="page-title text-light">
                    <h1><?php the_title();?></h1>
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
                            <article class="post-portfolio full-width">
							<div class="post-slider">
							    <!--slider-->
                                    <div id="carousel-single-portfolio" class="carousel slide" data-ride="carousel">
                             
                                        <!-- Wrapper for slides -->
                                        <?php
										  $active = 0;
										?>
                                        <div class="carousel-inner" role="listbox" style=" ">
                                       <?php 
									     if(isset( $alchem_page_meta['embed_video'] ) && $alchem_page_meta['embed_video'] !='' ):
										 $active = 1;
									   
									   ?>
                                        <div class="item portfolio-video active">
                                              <?php echo $alchem_page_meta['embed_video']; ?>
                                            </div>
                                       <?php endif; ?>
                                       
                                       <?php
									   $portfolio_gallery = isset($alchem_page_meta['portfolio_gallery'])?$alchem_page_meta['portfolio_gallery']:null;
									   
									   if( $portfolio_gallery ):
									   $attachment_id_arr = explode(",",$portfolio_gallery);
									   if($attachment_id_arr && is_array($attachment_id_arr)){
										$i = 0;
									   foreach($attachment_id_arr as $attachment_id){
										   $image_attributes = wp_get_attachment_image_src( $attachment_id, "portfolio" );
										   if( $active == 0 && $i == 0 )
										   $active = 'active';
										   else
										   $active = '';
									   ?>
                                            <div class="item <?php echo $active;?>">
                                                <img src="<?php echo $image_attributes[0];?>" width="<?php echo  $image_attributes[1];?>" height="<?php echo $image_attributes[2];?>" alt="" />
                                            </div>
                                           <?php 
										    $i++;
										    } 
										   }
										   endif;
										   ?>
                                        </div>
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-single-portfolio" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only"><?php _e( "Previous" , 'alchem-pro')?></span>
                                          </a>
                                          <a class="right carousel-control" href="#carousel-single-portfolio" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only"><?php _e( "Nex" , 'alchem-pro')?>t</span>
                                          </a>
                                    </div>
                                    <!--slider end-->
							</div>
            
            <div class="portfolio-content row clear">
                                    <div class="portfolio-description-wrap">
                                        <div class="portfolio-description">
                                            <h3><?php the_title();?></h3>
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                                                           
                                </div>
								
								<div class="portfolio-footer">
                                    <ul class="entry-tags no-border pull-left">
                                       <?php

										$taxonomy = 'portfolio-tag';
										$tax_terms = wp_get_post_terms($post->ID,$taxonomy);
										
										if( $tax_terms ){
										foreach ($tax_terms as $tax_term) {
										echo '<li><a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" , 'alchem-pro'), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';
										}
										}
										?>
                                    </ul>
                                    <?php if( $portfolio_show_social == 'yes' ):?>
                                    <ul class="entry-share no-border pull-right">
                                         <li><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title();?>&url=<?php the_permalink();?>"><i class="fa fa-twitter fa-fw"></i></a></li>
                                                <li><a  target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="fa fa-facebook fa-fw"></i></a></li>
                                                <li><a  target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title();?>&source=<?php echo $feat_image;?>&summary=<?php the_excerpt();?>"><i class="fa fa-google-plus fa-fw"></i></a></li>
                                                <li><a  target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&description=<?php the_excerpt();?>&media=<?php echo $feat_image;?>"><i class="fa fa-pinterest fa-fw"></i></a></li>
                                                <li><a  target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title();?>&source=<?php echo $feat_image;?>&summary=<?php the_excerpt();?>"><i class="fa fa-linkedin fa-fw"></i></a></li>
                                                <li><a target="_blank"  href="http://www.reddit.com/submit/?url=<?php the_permalink();?>"><i class="fa fa-reddit fa-fw"></i></a></li>
                                                <li><a target="_blank"  href="http://vk.com/share.php?url=<?php the_permalink();?>&title=<?php the_title();?>"><i class="fa fa-vk fa-fw"></i></a></li>
                                    </ul>
                                    <?php endif; ?>
                                </div>
		  </article>
		  <?php if( $portfolio_related_posts == 'yes' ):?>
		  <div class="post-attributes">
                              
                                    <!--About Author End-->
                                    <!--Related Posts-->
                                    <?php 
								
									$related = alchem_get_related_posts($post->ID, $related_number,'alchem_portfolio'); 
									
									?>
			                        <?php if($related->have_posts()): 
									        $date_format = alchem_option('date_format','M d, Y');
									?>
            
                                    <div class="related-posts">
                                        <h3><?php _e( 'Related Project', 'alchem-pro' );?></h3>
                                        <div class="multi-carousel alchem-related-posts owl-carousel owl-theme">
                                        
                            <?php while($related->have_posts()): $related->the_post(); ?>
							<?php if(has_post_thumbnail()): ?>
                            <?php  $full_image  = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
							        $thumb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'related-post');
							?>
                                            <div class="owl-item">
											<div class="portfolio-box">
                                                                <div class="feature-img-box">
                                                                    <div class="img-box figcaption-middle text-center from-top fade-in">
                                                                        <img src="<?php echo $thumb_image[0];?>" class="feature-img"/>
                                                                        <div class="img-overlay">
                                                                            <div class="img-overlay-container">
                                                                                <div class="img-overlay-content">
                                                                                    <div class="img-overlay-icons">
                                                                                       <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                                                                                       <a rel="portfolio-image" href="<?php echo $full_image[0];?>"><i class="fa fa-search"></i></a>                                                                                    </div>         
                                                                                </div>
                                                                            </div>                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="entry-main text-center">
                                                                    <div class="entry-header">
                                                                        <a href="<?php the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
                                                                    </div>
                                                                    <div class="entry-meta">
                                                                        <div class="entry-category">
														<?php
														$taxonomy = 'portfolio-tag';
														$tax_terms = wp_get_post_terms($post->ID,$taxonomy);
														$tags      = array();
														if( $tax_terms ){
														foreach ( $tax_terms as $tax_term ) {
														$tags[] = '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" , 'alchem-pro'), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a>';
														}
														}
														$tags = implode(', ',$tags);
														echo $tags;
														?>
																		</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            
                                                            </div>
                                                            
                                            <?php endif; endwhile; ?>
                                        </div>
                                    </div>
                                    <?php wp_reset_postdata(); endif; ?>
                                    <!--Related Posts End-->
                                    <!--Comments Area-->                                
                                     <div class="comments-area text-left"> 
                                     <?php
											// If comments are open or we have at least one comment, load up the comment template
											if ( comments_open()  ) :
												comments_template();
											endif;
										?>
                                     </div>
                                    <!--Comments End-->
                                    <?php //alchem_post_nav(); ?>
                                </div>
                                <?php endif;?>
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
      </article>
<?php endif; ?>
<?php get_footer(); ?>