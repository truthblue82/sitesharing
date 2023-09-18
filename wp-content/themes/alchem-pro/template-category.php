<?php
/*
  Template Name: Category Master Page
 */
// Yen Truong write
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
<div class="produc-master-sections"> 
    
    <section class="section magee-section section-main">
        <div class="container">
            <div class="main-content row no-aside">
                <div class="col-main">
                    <h1 class="page-title uppercase"><?php the_title(); ?></h1>
                </div>
            </div>
            <?php 
            $current_language = qtranxf_getLanguage();

            if ($current_language == "en") {
                $preURL = "";
            } else {
                $preURL = "/vi";
            }
            
            $title = get_the_title();
            //$categories = get_the_category();
            //$category_id = $categories[0]->cat_ID;
            //$category_id = get_cat_ID($title);
            //get cateory slug
            $cat = $title;
            //$args = array ( 'category_name' => $cat, 'post_type' => 'post', 'orderby' => 'meta_value_num', 'meta_key' => 'ordering', 'order' => 'asc', 'post_status' => array('publish'), 'posts_per_page' => -1 );
            $args = array ( 
                'category_name' => $cat, 
                'post_type' => 'post', 
                'orderby' => 'meta_value_num', 'meta_key' => 'ordering', 
                'order' => 'asc', 'post_status' => array('publish'), 
                'posts_per_page' => -1,
                /*'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $category_id
                    )
                    )*/ );
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
                                    $link = get_permalink();
                                    ?>
                                    <div class="magee-person-box" id="">
                                        <div class="person-img-box">
                                            <div class="img-box figcaption-middle text-center fade-in">
                                                <a href="<?php echo $link;?>" target="_blank">
                                                    <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" style="border-radius: 0; display: inline-block;border-style: solid;" />
                                                    <div class="img-overlay primary">
                                                        <div class="img-overlay-container">
                                                            <div class="img-overlay-content"><i class="fa fa-link"></i></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="person-vcard text-center">
                                                <a href="<?php echo $link; ?>" target="_blank">
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