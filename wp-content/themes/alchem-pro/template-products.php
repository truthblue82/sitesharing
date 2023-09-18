<?php
/*
  Template Name: Product Master Page
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
            
            //$title = get_the_title();
            $slug = get_permalink();
            if(stripos($slug, "tape") !== false){
                $cat = "industrial-tapes";
            } else if(stripos($slug, 'printing') !== false) {
                $cat = "printing-packaging";
            } else {
                $cat = "graphic-reflective";
            }
            $args = array ( 
                'category_name' => $cat, 
                'post_type' => 'post',
                'orderby' => 'meta_value_num', 
                'meta_key' => 'ordering', 
                'order' => 'asc', 
                'post_status' => array('publish'), 
                'posts_per_page' => -1,
                //'child_of' => $catId,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => $cat,
                    ),
                )
             );
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
                                                    <a href="javascript:;" target="_self">
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
        <div style="text-align: center;">
            <?php 
            $contactURL = get_the_permalink(13);
            ?>
            <a class="magee-btn-normal btn-md btn-green" href="<?php echo $contactURL; ?>" target="_blank" ><?php echo product_contact;?></a>
        </div>
    </section>
    
    <div class="container">
        <div class="container separate">
            <hr class="grey">
        </div>
    </div>
    
    <section class="section-other">
        <div class="container">
            <div class="main-content row no-aside">
                <div class="col-main">
                    <?php 
                    if(stripos($slug, "tape") !== false){
                        //$title = str_ireplace("tape", "printing", $title);
                        $title = get_the_title(5);
                        $cat = "printing-packaging";
                        $moreLink = get_permalink(5);
                    }else if(stripos($slug, "printing") !== false){
                        //$title = str_ireplace("printing", "tape", $title);
                        $title = get_the_title(7);
                        $cat = "industrial-tapes";
                        $moreLink = get_permalink(7);
                    } else {
                        $title = get_the_title(7);
                        $cat = "industrial-tapes";
                        $moreLink = get_permalink(7);
                    }
                    ?>
                    <h1 class="page-title uppercase"><?php echo $title; ?></h1>
                </div>
            </div>
                <?php 
                $args = array ( 
                    'category_name' => $cat, 
                    'orderby' => 'meta_value_num', 
                    'meta_key' => 'ordering', 
                    'order' => 'asc', 
                    'post_status' => array('publish'), 
                    'posts_per_page' => 4 );
                $posts = get_posts( $args );
                $total = count($posts);
                
                if($total){
                ?>
                <div class="row">
                    <?php
                    foreach( $posts as $post ){
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
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
        <div style="text-align: center;padding-bottom: 75px;">
            <a class="magee-btn-normal btn-md btn-blue" href="<?php echo $moreLink; ?>" ><?php echo product_see_more;?></a>
        </div>
    </section>
</div>

<?php get_footer(); ?>