<?php
//hamina commitment
$args = array ( 'category_name' => 'gudi-commitment', 'orderby' => 'date', 
        'order' => 'asc', 'post_status' => array('publish') );
$posts = get_posts( $args );
$total = count($posts);
if($total){
    $post = $posts[0];
    setup_postdata($post);
    $session_title = get_cat_name(get_category_by_slug('gudi-commitment')->term_id);
?>
    <section class="section magee-section alchem-home-section-5 alchem-home-style-0" id="section-hamina-commitment"
    style="background-image:url('<?php the_post_thumbnail_url();?>');padding-bottom:60px;padding-top:60px;"
    >
        <div class="section-content" >
            <div class="container alchem_section_5_content">
                <h2 style="text-align: center" class="section-title alchem_section_5_title"><span style="color: #ffffff"><?php echo $session_title;?></span></h2>
                <div class="divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
                    <div class="divider-inner primary" style="border-color:#fff;border-bottom-width: 3px"></div>
                </div>
                
                <?php 
                $desc = category_description( get_category_by_slug('hamina-commitment')->term_id );
                if($desc){
                ?>
                    <div class="section-subtitle alchem_section_5_sub_title"><?php echo $desc; ?></div>
                    <div style="height: 60px;"></div>
                <?php
                }
                ?>
                
                <div class="row">
                <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php    
}
wp_reset_postdata();
?>