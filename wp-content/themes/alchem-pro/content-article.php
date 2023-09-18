<?php  
 $display_image = alchem_option('archive_display_image','no');
 ?>
<div id="post-<?php the_ID(); ?>" <?php post_class("entry-box-wrap"); ?>>
  <article class="entry-box">
   <?php if (  $display_image == 'yes' && has_post_thumbnail() ) : ?>
      <div class="feature-img-box">
          <div class="img-box figcaption-middle text-center from-top fade-in">
              <a href="<?php the_permalink();?>">
                  <?php the_post_thumbnail();  ?>
                  <div class="img-overlay">
                      <div class="img-overlay-container">
                          <div class="img-overlay-content">
                              <i class="fa fa-link"></i>
                          </div>
                      </div>                                                        
                  </div>
              </a>
          </div>                                                 
      </div>
      <?php endif;?>
      <div class="entry-main">
          <div class="entry-header">
              <h1 class="entry-title"><?php the_title();?></h1>
          </div>
          <div class="entry-summary">
              <?php 
              the_content();
              ?>
          </div>
      </div>
  </article>
  <div style="text-align: center;">
        <?php 
        $contactURL = get_the_permalink(13);
        ?>
        <a class="magee-btn-normal btn-md btn-green" href="<?php echo $contactURL; ?>" target="_blank" ><?php echo product_contact;?></a>
  </div>
 </div>
<div class="separate">
    <hr class="grey">
</div>
<section class="section-other">
    <div class="main-content no-aside">
            <?php
            $categories = get_the_category();
            $category_id = $categories[0]->cat_ID;
            ?>
            <h1 class="page-title uppercase"><?php echo related_products; ?></h1>
    </div>
        <?php 
        $args = array ( 
            'cat' => $category_id, 
            'orderby' => 'meta_value_num', 
            'meta_key' => 'ordering', 
            'order' => 'asc', 
            'post_status' => array('publish'),
            'exclude' => array(get_the_ID()),
            'posts_per_page' => 3 );
        $posts = get_posts( $args );
        $total = count($posts);
        
        if($total){
        ?>
        <div class="">
            <?php
            foreach( $posts as $post ){
                setup_postdata($post);
                ?>
                <div class="col-md-4">
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
</section>
