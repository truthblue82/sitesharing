<?php
//home services
$args = array ( 'category_name' => 'home-services', 'orderby' => 'meta_value', 'meta_key' => 'ordering', 
        'order' => 'asc', 'post_status' => array('publish'), 'posts_per_page' => -1 );
$posts = get_posts( $args );
$total = count($posts);
//default 3 column, class md-4
$default = 3;
$col = $total > 0 ? 12/$default : 4; 

$current_language = qtranxf_getLanguage();

if ($current_language == "en") {
    $preURL = "";
} else {
    $preURL = "/vi";
}
if($total){
    $session_title = get_cat_name(get_category_by_slug('home-services')->term_id);
?> 
    <section class="section magee-section alchem-home-section-2 alchem-home-style-0" id="section-services">
        <div class="section-content container alchem_section_2_model">
            <h2 style="text-align: center" class="section-title alchem_section_2_title"><?php echo $session_title; ?></h2>
            
            <div class=" divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
                <div class="divider-inner primary" style="border-bottom-width:3px;border-color:#1E70B7;"></div>
            </div>
            <?php 
            $desc = category_description( get_category_by_slug('home-services')->term_id );
            if($desc){
            ?>
                <div class="section-subtitle alchem_section_2_sub_title"><?php echo $desc; ?></div>
                <div style="height: 60px;"></div>
            <?php
            }
            $rows = ceil($total/$default);
            for($i=1; $i <= $rows; $i++){
            ?>
            
            <div class="row">
            <?php    
            //foreach( $posts as $post ){
            for($j = $default*($i-1); $j < count($posts); $j++ ){
                $post = $posts[$j];
                if($j < $default*$i){    
                    setup_postdata($post);         
            ?>
                    <div class="col-md-<?php echo $col; ?>">
                        <div class="magee-animated animated zoomIn" data-animationduration="0.9" data-animationtype="zoomIn" data-imageanimation="no">
                            <div class="magee-feature-box style1" data-os-animation="fadeOut">
                                <?php
                                $services_alias = get_post_meta($post->ID, 'services_alias', true);
                                $link = $preURL . "/" . $services_alias;
                                if ( has_post_thumbnail() ){
                                ?>
                                    <div class="icon-box" data-animation="">
                                        <a href="<?php echo $link; ?>" target="_blank">
                                        <img class="feature-box-icon" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>" >
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                                <a href="<?php echo $link; ?>" target="_blank"><h3 class="service-title"><?php the_title(); ?></h3></a>
                                <div class="feature-content">
                                    <?php the_excerpt(); ?>
                                    <a href="#<?php /*echo $link;*/?>" target="_blank" class="feature-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                }else break;
            }
            wp_reset_postdata();
            ?>    
            </div>
            <?php 
            }
            ?>
        </div>
    </section>
<?php    
}
?>
