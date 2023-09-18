<?php
/*
  Template Name: News Master Page
 */

get_header();
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
<div class="news-master-sections" style="padding-bottom:60px;">
    <section class="section magee-section section-main">
        <div class="container">
            <div class="main-content row no-aside">
                <div class="col-main">
                    <h1 class="page-title uppercase"><?php the_title(); ?></h1>
                </div>
            </div>
            <?php
            $args = array ( 'category_name' => 'news', 'orderby' => 'post_modified', 'order' => 'desc', 'post_status' => array('publish'), 'posts_per_page' => -1 );
            $posts = get_posts( $args );
            $total = count($posts);
            
            if($total){
                $rows = ceil($total/3);
                for($i=1; $i <= $rows; $i++){
                    ?>
                    <div class="row">
                    <?php
                    for($j = 3*($i-1); $j < count($posts); $j++ ){
                        $post = $posts[$j];
                        if($j < 3*$i){
                            setup_postdata($post);
                            ?>
                            <div class="col-md-4">
                                <div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no">
                                    <?php 
                                    if(get_the_content()){
                                        $link = get_permalink();
                                    }else $link = "";
                                    ?>
                                    <div class="feature-img-box" id="">
                                        <div class="img-box figcaption-middle text-center from-top fade-in">
                                            <?php
                                            if(has_post_thumbnail()){
                                                $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), "alchem-portfolio-thumb" );
                                            ?>
                                                <div class="feature-img-box">
                                                    <div class="img-box figcaption-middle text-center from-top fade-in">
                                                        <?php if(empty($link)){ ?>
                                                            <a href="javascript:void();" target="_self">
                                                        <?php }else{ ?>
                                                            <a href="<?php echo $link;?>" target="_self">
                                                        <?php } ?>
                                                            <img src="<?php echo $image_attributes[0]; ?>" alt="<?php the_title();?>" class="feature-img">
                                                            <div class="img-overlay primary">
                                                                <div class="img-overlay-container">
                                                                    <div class="img-overlay-content">
                                                                        <i class="fa fa-link"></i>
                                                                    </div>
                                                                </div>                                                        
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            
                                            <div class="entry-main">
                                                <div class="entry-header">
                                                    <?php if(empty($link)){ ?>
                                                        <a href="javascript:void();" target="_self">
                                                    <?php }else{ ?>
                                                        <a href="<?php echo $link;?>" target="_self">
                                                    <?php } ?>
                                                        <h3 class="service-title"><?php the_title();?></h3>
                                                    </a>
                                                </div>
                                                <div class="entry-summary">
                                                    <?php the_excerpt();?>
                                                </div>
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
        <div style="text-align: center;">
            <?php 
            $contactURL = get_the_permalink(13);
            ?>
            <a class="magee-btn-normal btn-md btn-green" href="<?php echo $contactURL; ?>" target="_blank" ><?php echo product_contact;?></a>
        </div>
    </section>
    
</div>

<?php get_footer(); ?>