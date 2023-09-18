<?php
//contact, submenu tape, printing, social, career, sitemap, privacy, term of use
$tooltip_position = alchem_option('footer_social_tooltip_position'); 
$current_language = qtranxf_getLanguage();

if ($current_language == "en") {
    $preURL = "";
} else {
    $preURL = "/vi";
}
?>
<footer class="">
    <div class="footer-widget-area">
        <div class="container">
        <?php 
        ?>
            <div class="row">
                <!-- printing packaging submenu -->
                <div class="col-md-2">
                    <h2 class="widget-title"><?php echo footer_printing_packaging; ?></h2>
                        <?php 
                        wp_nav_menu(array('theme_location'=>'custom_menu_1','depth'=>1,'fallback_cb' =>false,'menu_class'=>'footer-links','link_before' => '', 'link_after' => '','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
                        ?>
                </div>
				<!-- tape submenu -->
                <div class="col-md-2">
                    <h2 class="widget-title"><?php echo footer_tape_industry; ?></h2>
                        <?php 
                        wp_nav_menu(array('theme_location'=>'custom_menu_2','depth'=>1,'fallback_cb' =>false,'menu_class'=>'footer-links','link_before' => '', 'link_after' => '','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
                        ?>
                </div>
                <!-- graphic reflective submenu -->
                <div class="col-md-2">
                    <h2 class="widget-title"><?php echo footer_graphic_reflective; ?></h2>
                        <?php 
                        wp_nav_menu(array('theme_location'=>'custom_menu_3','depth'=>1,'fallback_cb' =>false,'menu_class'=>'footer-links','link_before' => '', 'link_after' => '','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
                        ?>
                </div>
                <!-- contact submenu -->
                <div class="col-md-4">
                    <?php
                    $args = array ( 'category_name' => 'footer', 'order' => 'asc', 'post_status' => array('publish'), 'posts_per_page' => 1 );
                    $posts = get_posts( $args );
                    $post = $posts[0];
                    setup_postdata($post);
                    the_content();
                    wp_reset_postdata();
                    ?>
                </div>
                <!-- About -->
                <div class="col-md-2">
                    <h2 class="widget-title"><?php echo footer_more; ?></h2>
                    <div class="row">
                        <div class="col-md-10"><a href="<?php echo $preURL; ?>/about">About</a></div>
                    </div>
                    <!--div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10"><a href="<?php echo $preURL; ?>/blog">News</a></div>
                    </div-->
                    <div class="row">
                        <div class="col-md-10"><a href="<?php echo $preURL; ?>/career">Career</a></div>
                    </div>
                    <div class="row">
                        <div class="col-md-10"><a href="<?php echo $preURL; ?>/contact">Contact</a></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <hr class="hr-footer">
            </div>
            <div class="container text-center forPC"> 
                <div class="line">
                    <div class="site-info">
                    <?php echo str_replace("%d",date('Y'),home_copyright);?>
                    </div>
                    <?php echo alchem_get_social('footer','footer-sns', $tooltip_position);?>
                </div>

                <div class="clearfix"></div>
                <?php 
                 //wp_nav_menu(array('theme_location'=>'footer_menu','depth'=>1,'fallback_cb' =>false,'menu_class'=>'footer-links','link_before' => '', 'link_after' => '','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
                ?>

            </div>
        </div>
    </div>
    
    
    <!-- copyright -->
    <!--div class="footer-info-area"-->
        <!--div class="container">
            <hr class="hr-footer">
        </div>
        <div class="container text-center forPC"> 
            <div class="line">
                <div class="site-info">
                <?php echo str_replace("%d",date('Y'),home_copyright);?>
                </div>
                <?php echo alchem_get_social('footer','footer-sns', $tooltip_position);?>
            </div>
            
            <div class="clearfix"></div>
            <?php 
             //wp_nav_menu(array('theme_location'=>'footer_menu','depth'=>1,'fallback_cb' =>false,'menu_class'=>'footer-links','link_before' => '', 'link_after' => '','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
            ?>
            
        </div-->
        <!--div class="container text-center forSP">
            <div class="line">
                <?php echo alchem_get_social('footer','footer-sns', $tooltip_position);?>
                <div class="site-info">
                <?php echo str_replace("%d",date('Y'),home_copyright);?>
                </div>
                
                <ul class="metalink">
                    <li><a href="<?php echo $preURL; ?>/sitemap"><?php echo footer_sitemap;?></a></li>
                    <li><a href="<?php echo $preURL; ?>/privacy"><?php echo footer_privacy;?></a></li>
                    <li><a href="<?php echo $preURL; ?>/term-condition"><?php echo footer_term;?></a></li>
                </ul>
            </div>
            
            <div class="clearfix"></div>
        </div-->
    <!--/div-->
</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>