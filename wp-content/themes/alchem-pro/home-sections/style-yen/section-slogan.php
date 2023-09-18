<?php 
// section slogan 
$args = array ( 'category_name' => 'home-slogan', 'orderby' => 'date', 
        'order' => 'asc', 'post_status' => array('publish') );
$posts = get_posts( $args );
$total = count($posts); 
$current_language = qtranxf_getLanguage();

if ($current_language == "en") {
    $preURL = "";
} else {
    $preURL = "/vi";
}
if($total){
    $post = $posts[0];
    setup_postdata($post);
?>
    <section class="section magee-section alchem-home-section-10 alchem-home-style-0" id="section-slogan"
    style="background-image:url('<?php the_post_thumbnail_url();?>');padding-bottom:60px;padding-top:60px;"
    >
        <div class="section-content">
            <div class="container alchem_section_10_model">
                <div class="magee-animated animated fadeIn" data-animationduration="1.2" data-animationtype="fadeIn" data-imageanimation="no">
                    <h2 style="text-align: center" class="section-title"><span style="color: #ffffff"><?php the_excerpt(); ?></span></h2>
                    <div class="divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
                        <div class="divider-inner light" style="border-bottom-width:3px;"></div>
                    </div>
                    <!-- short desc here -->
                    <div class="section-subtitle alchem_section_910_sub_title"><?php echo do_shortcode($sub_title);?></div>
                    <?php the_content(); ?>
                    <div style="height: 60px;"></div>
                    <div style="text-align: center" class="alchem_section_10_button_text">
                        <a href="<?php echo $preURL;?>/contact" target="_blank" style="" class="magee-btn-normal btn-md btn-line btn-light">
                            <?php echo home_contact_now;?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php    
}
wp_reset_postdata();
?>
 
   