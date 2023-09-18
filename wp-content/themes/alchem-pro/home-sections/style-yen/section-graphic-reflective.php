<?php 
// section printing products
$args = array ( 'category_name' => 'graphic-reflective', 'orderby' => 'meta_value_num', 'meta_key' => 'ordering', 
        'order' => 'asc', 'post_status' => array('publish'), 'posts_per_page' => 12 );
$posts = get_posts( $args );
$total = count($posts);
//default 4 columns, class md-3
$default = 4;
$col = $total > 0 ? 12/$default : 3;
if($total){
    $section_title = get_cat_name(get_category_by_slug('graphic-reflective')->term_id);
    $url_printing = get_permalink(5);
?>
    <section class="section magee-section alchem-home-section-4 alchem-home-style-0" id="section-graphic-reflective">
        <div class="section-content container alchem_section_6_model graphic-content">
            <h2 style="text-align: center" class="section-title alchem_section_6_title"><a style="color: #555;" href="<?php echo $url_printing; ?>"><?php echo $section_title; ?></a></h2>
            
            <div class="divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
                <div class="divider-inner primary" style="border-bottom-width:3px;border-color:#1E70B7;"></div>
            </div>
            <?php 
            $desc = category_description( get_category_by_slug('graphic-reflective')->term_id );
            if($desc){
            ?>
                <div class="section-subtitle alchem_section_6_sub_title"><?php echo $desc; ?></div>
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
                if($j < $default*$i && $j < 12){    
                    setup_postdata($post);
            ?>
                    <div class="col-md-<?php echo $col;?>">
                        <div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" 
                             data-imageanimation="no">
                            <?php 
                            if(get_the_content()){
                                $link = get_permalink();
                            }else $link = "";
                            ?>
                            <div class="magee-person-box">
                                <div class="person-img-box">
                                    <div class="img-box figcaption-middle text-center fade-in alchem_section_6_avatar_<?php echo $j; ?>">
                                        <?php if(empty($link)){ ?>
                                            <a href="javascript:void();" target="_self">
                                        <?php }else{ ?>
                                            <a href="<?php echo $link;?>" target="_self">
                                        <?php } ?>
                                            <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" 
                                                 style="border-radius: 0; display: inline-block;border-style: solid;" />
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
                                            <h3 class="person-name alchem_section_6_name_<?php echo $j; ?>" style="text-transform: uppercase;"><?php the_title();?></h3>
                                        </a>
                                        <h4 class="person-title alchem_section_6_byline_<?php echo $j; ?>" style="text-transform: uppercase;"></h4>
                                        <?php the_excerpt(); ?>
                                    </div>
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
        <?php 
        // get total post of a category
        $category = get_category(get_category_by_slug('graphic-reflective')->term_id);
        $counter = $category->category_count;
        if($counter > 12){
            ?>
            <div style="text-align: center;padding-bottom:40px;" class="div-graphic-more">
                <a class="magee-btn-normal btn-md btn-blue graphic-more" href="javascript:void(0);" ><?php echo product_see_more;?></a>
            </div>
            <?php
        }
        ?>
    </section>
<?php
}
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".graphic-more").on("click", function(){
            jQuery(".div-graphic-more").html("<img alt='loading' class='loading' src='"+alchem_params.themeurl+"/images/AjaxLoader.gif' />");
            jQuery.ajax({
                url: alchem_params.ajaxurl,
                type: "POST",
                dataType: "html",
                data: {action: "alchem_getGraphicReflectiveMore"},
                success: function(res){
                    jQuery(".graphic-content").append(res);
                    jQuery(".div-graphic-more").hide();
                    jQuery('.loading').remove();
                }
            });
        });
    });
</script>
