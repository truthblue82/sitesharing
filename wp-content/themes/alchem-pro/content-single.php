<?php
/**
 * @package alchem
 */
  global  $alchem_page_meta;
 $display_image = alchem_option('single_display_image');
 $display_meta_data   = isset($alchem_page_meta['display_meta_data'])?esc_attr($alchem_page_meta['display_meta_data']):'0';
 $display_share_icons = isset($alchem_page_meta['display_share_icons'])?esc_attr($alchem_page_meta['display_share_icons']):'1';
 $display_author_info = isset($alchem_page_meta['display_author_info'])?esc_attr($alchem_page_meta['display_author_info']):'1';
 $display_related     = isset($alchem_page_meta['display_related'])?esc_attr($alchem_page_meta['display_related']):'1';
 $display_title       = isset($alchem_page_meta['display_title'])?esc_attr($alchem_page_meta['display_title']):'1';
?>
<section class="post-main" role="main" id="content">
    <article class="post-entry text-left">
        <h1 class="entry-title uppercase"><?php the_title();?></h1>
        <?php if (  $display_image == 'yes' && has_post_thumbnail() ) : ?>
            <div class="feature-img-box">
                <div class="img-box figcaption-middle text-center from-top fade-in">
                    <?php the_post_thumbnail(); ?>
                    
                </div>                                                 
            </div>
        <?php endif;?>
        <div class="entry-main">
            <div class="entry-content"> 
                <?php the_content(); ?>
                <?php
                wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'alchem-pro' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
                ?>  

            </div>

            <?php
            $display_pagination = alchem_option('display_pagination');
            if($display_pagination == 'yes'):
            alchem_post_nav();
            endif;
            ?>

        </div>
    </article>
    <div style="text-align: center; padding-top: 30px;">
        <?php 
        $contactURL = get_the_permalink(13);
        ?>
        <a class="magee-btn-normal btn-md btn-orange" href="<?php echo $contactURL; ?>" target="_blank" ><?php echo home_contact_now;?></a>
    </div>
    <div class="post-attributes">
        <?php if($display_related == '1'):?>   
        <!--Related Posts-->
        <?php 
            $display_related_posts  = alchem_option('display_related_posts','yes');
            if( $display_related_posts == 'yes' ){

            $related_number         = alchem_option('related_number',8);
            $related                = alchem_get_related_posts($post->ID, $related_number, 'post'); 

        ?>
        <?php if($related->have_posts()  ): 
            $date_format = alchem_option('date_format','M d, Y');
        ?>

        <div class="related-posts">
            <h3><?php echo related_products; ?></h3>
            <div class="multi-carousel alchem-related-posts owl-carousel owl-theme">

                <?php while($related->have_posts()): $related->the_post(); ?>
                    <?php if(has_post_thumbnail()): ?>
                    <?php 
                        //$full_image  = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
                        $thumb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'related-post');
                    ?>
                <div class="owl-item">
                <div class="post-grid-box">
                    <div class="img-box figcaption-middle text-center from-left fade-in">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo $thumb_image[0];?>" class="feature-img"/>
                            <div class="img-overlay">
                                <div class="img-overlay-container">
                                    <div class="img-overlay-content">
                                        <i class="fa fa-link"></i>
                                    </div>
                                </div>
                            </div>
                        </a>                                                  
                    </div>
                    <div class="img-caption">
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                    </div>
                </div>
                </div>
                <?php endif; 
                endwhile; ?>
            </div>
        </div>
        <?php wp_reset_postdata(); 
        endif; 
        }?>
        <!--Related Posts End-->
        <?php endif;?>
    </div>
</section>