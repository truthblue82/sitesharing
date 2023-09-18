<?php 
// section suppliers-partners 
$args = array ( 'category_name' => 'providers-partners', 'orderby' => 'meta_value_num', 'meta_key' => 'ordering',
        'order' => 'asc', 'post_status' => array('publish'), 'posts_per_page' => -1 );
$posts = get_posts( $args );

$total = count($posts);
//default 5 column, class md-1_5
$default = 5;
$col = '1_5'; 
if($total){
?>
    <section class="section magee-section alchem-home-section-7 alchem-home-style-0" id="section-7" style="padding-top:60px;padding-bottom:60px;">
        <div class="section-content container">
            <h2 style="text-align: center;" class="section-title"><?php echo home_supplier_partner; ?></h2>
            <div class=" divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
                <div class="divider-inner light" style="border-bottom-width:3px;border-color:#1E70B7;"></div>
            </div>
            
            <?php
            $desc = category_description( get_category_by_slug('our-suppliers-partners')->term_id );
            if($desc){
            ?>
                <div class="section-subtitle"><?php echo $desc; ?></div>
                <div style="height: 60px;"></div>
            <?php
            }
            ?>
            
            <div class="magee-animated animated alchem_section_8_category fadeIn" data-animationduration="1.2" data-animationtype="fadeIn" data-imageanimation="no">
                <?php 
                $rows = ceil($total/$default);
                for($i=1; $i <= $rows; $i++){
                ?>
                    <div class="row">
                    <?php
                    for($j = $default*($i-1); $j < count($posts); $j++ ){
                        $post = $posts[$j];
                        if($j < $default*$i){
                            setup_postdata($post);
                    ?>
                            <div class="col-md-<?php echo $col; ?>">
                            <?php
                            //custom field: partner_url
                            $link = get_post_custom_values("partner_url");
                            $link = $link[0];
                            if(has_post_thumbnail()){
                                $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), "alchem-portfolio-thumb" );
                                $image = $image_attributes[0];
                            }else $image = "";
                            if($link){
                            ?>
                                <a target="_blank" href="<?php echo $link; ?>" class="primary">
                                    <img data-placement="top" data-toggle="tooltip" src="<?php echo $image; ?>" alt="<?php the_title();?>">
                                </a>
                            <?php
                            }else{
                            ?>
                                <img data-placement="top" data-toggle="tooltip" src="<?php echo $image; ?>" alt="<?php the_title();?>">
                            <?php
                            }
                            ?>

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
            <!-- desc here if any -->
        </div>
    </section>
<?php    
}        
?>        
        
        
   