<?php 
// latest news 
$args = array ( 'category_name' => 'news', 'orderby' => 'date', 
        'order' => 'desc', 'post_status' => array('publish'), 'posts_per_page' => 3 );
$posts = get_posts( $args );
$date_format     = alchem_option('date_format','M d, Y');
$total = count($posts);
//default 3 column, class md-4
$default = 3;
$col = $total > 0 ? 12/$default : 4;
if($total){
    $session_title = get_cat_name(get_category_by_slug('news')->term_id);
?>
    <section class="section magee-section alchem-home-section-6 alchem-home-style-0" id="section-latest-news">
        <div class="section-content container alchem_section_6_model">
            <h2 style="text-align: center" class="section-title"><?php echo $session_title; ?></h2>
            
            <div class="divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
                <div class="divider-inner primary" style="border-bottom-width:3px;border-color:#1E70B7;"></div>
            </div>
            <?php
            $desc = category_description( get_category_by_slug('news')->term_id );
            if($desc){
            ?>
                <div class="section-subtitle alchem_section_6_sub_title"><?php echo $desc; ?></div>
                <div style="height: 60px;"></div>
            <?php
            }
            ?>
            
            <div class="magee-animated animated fadeIn alchem_section_6_category" data-animationduration="1.2" data-animationtype="fadeIn" data-imageanimation="no">
                <?php 
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
                            <div class="entry-box-wrap">
                                <article class="entry-box">
                                <?php
                                $link = get_permalink();
                                if(has_post_thumbnail()){
                                    $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), "alchem-portfolio-thumb" );
                                ?>
                                    <div class="feature-img-box">
                                        <div class="img-box figcaption-middle text-center from-top fade-in">
                                            <a href="<?php echo $link; ?>">
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
                                            <a href="<?php echo $link; ?>"><h3 class="service-title"><?php the_title();?></h3></a>
                                            <!--ul class="entry-meta">
                                                <li class="entry-date">
                                                    <i class="fa fa-calendar"></i>
                                                    <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php echo get_the_date( $date_format );?></a>
                                                </li>
                                                <li class="entry-comments pull-right"><?php echo alchem_get_comments_popup_link('', __( '<i class="fa fa-comment"></i> 1 ', 'alchem'), __( '<i class="fa fa-comment"></i> % ', 'alchem'), 'read-comments', ''); ?></li>
                                            </ul-->
                                        </div>
                                        <div class="entry-summary">
                                            <?php echo the_excerpt();?>
                                        </div>
                                    </div>
                                </article>
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
        </div>
        <?php 
        // get total post of a category
        $category = get_category(get_category_by_slug('news')->term_id);
        $counter = $category->category_count;
        if($counter > 3){
            $news_url = get_permalink(11);
            ?>
            <div style="text-align: center;padding-bottom:40px;" class="div-tape-more">
                <a class="magee-btn-normal btn-md btn-blue news-more" href="<?php echo $news_url; ?>" ><?php echo product_see_more;?></a>
            </div>
            <?php
        }
        ?>
    </section>
<?php    
}
?>
