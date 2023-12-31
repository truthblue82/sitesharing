<?php
  global $alchem_page_meta;
  $detect                      = new Mobile_Detect;
  $display_top_bar             = alchem_option('display_top_bar');
  $header_background_parallax  = alchem_option('header_background_parallax');
  $header_top_padding          = alchem_option('header_top_padding','');
  $header_bottom_padding       = alchem_option('header_bottom_padding','');
  $header_background_parallax  = $header_background_parallax=="yes"?"parallax-scrolling":"";
  $top_bar_left_content        = alchem_option('top_bar_left_content');
  $top_bar_right_content       = alchem_option('top_bar_right_content');
  $header_fullwidth            = alchem_option('header_fullwidth');
  
  $header_overlay              = alchem_option('header_overlay');
  $overlay = '';
  if( $header_overlay == 'yes' ||  $header_overlay == '1' )
  $overlay = 'overlay';
  
  $header_container = 'container';
  if( $header_fullwidth == 1)
  $header_container = 'container-fluid';
 
  //sticky
  $enable_sticky_header         = alchem_option('enable_sticky_header');
  $enable_sticky_header_tablets = alchem_option('enable_sticky_header_tablets');
  $enable_sticky_header_mobiles = alchem_option('enable_sticky_header_mobiles');
  $logo_position                = alchem_option('logo_position','left');
  
  if(isset($alchem_page_meta['nav_menu']) && $alchem_page_meta['nav_menu'] !='')
 $theme_location = $alchem_page_meta['nav_menu'];
 else
 $theme_location = 'primary'; 

 
 $header_position = isset($alchem_page_meta['header_position'])?$alchem_page_meta['header_position']:'top';
 switch( $header_position ){
	 case "top":
	 break;
	 case "left":
	 $body_class   .= ' side-header';
	 $wrapper       = '';
	 $logo_position = 'center';
	 $overlay = '';
	 break;
	 case "right":
	 $body_class   .= ' side-header side-header-right';
	 $wrapper       = '';
	 $logo_position = 'center';
	 $overlay       = '';
	 break;
	 }

$template_dir = get_template_directory();
$current_language = qtranxf_getLanguage();

if ($current_language == "en") {
    require( $template_dir . '/inc/language/en_language.php' );
} else {
    require( $template_dir . '/inc/language/vi_language.php' );
}
?>
<header class="header-style-1 header-wrap <?php echo $overlay; ?> logo-<?php echo $logo_position;?>">
<?php if( $display_top_bar == 'yes' ):?>
    <div class="top-bar">
        <div class="<?php echo $header_container; ?>">
            <div class="top-bar-left alchem_display_top_bar">
                  <?php  alchem_get_topbar_content( $top_bar_left_content );?>
            </div>
            <div class="top-bar-right">
            <?php alchem_get_topbar_content( $top_bar_right_content );?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php endif;?>

<?php 
    $logo        = alchem_option('default_logo','');
    $logo_retina = alchem_option('default_logo_retina');
    $logo        = ( $logo == '' ) ? $logo_retina : $logo;

    $sticky_logo        = alchem_option('sticky_logo','');
    $sticky_logo_retina = alchem_option('sticky_logo_retina');
    $sticky_logo        = ( $sticky_logo == '' ) ? $sticky_logo_retina : $sticky_logo;
?>

    <div class="main-header <?php echo $header_background_parallax; ?>">
        <div class="<?php echo $header_container; ?>">
            <div class="logo-box alchem_header_style alchem_default_logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if( $logo ):?>
                        <img class="site-logo normal_logo" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo); ?>" />
                    <?php endif;?>
                    <?php
                        if( $logo_retina ):
                            $pixels ="";
                        if(is_numeric(alchem_option('retina_logo_width')) && is_numeric(alchem_option('retina_logo_height'))):
                            $pixels ="px";
                        endif; ?>
                        <img src="<?php echo esc_url($logo_retina); ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo esc_attr(alchem_option('retina_logo_width')).$pixels; ?>;max-height:<?php echo esc_attr(alchem_option('retina_logo_height')).$pixels; ?>; " class="site-logo retina_logo" />
                        <?php endif; ?>
                </a>
                <div class="name-box hide">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a>
                    <span class="site-tagline"><?php bloginfo('description'); ?></span>
                </div>
            </div>
            <button class="site-nav-toggle">
                <span class="sr-only"><?php _e( 'Toggle navigation', 'alchem-pro' );?></span>
                <i class="fa fa-bars fa-2x"></i>
            </button>
            <!-- langbar -->
            <div class="langbar" style="padding-left:20px; right:0px;">
                <a class="gray <?php if ($current_language == 'en') echo "current-language" ?>"  href="<?php echo qtranxf_convertURL($url, "en"); ?>" title="English">EN</a> |
                <a class="gray <?php if ($current_language == 'vi') echo "current-language" ?>"  href="<?php echo qtranxf_convertURL($url, "vi"); ?>" title="Vietnamese">VI</a>
            </div>
            <nav class="site-nav nav_menu_locations[primary]" role="navigation">
            <?php 
                wp_nav_menu(array('theme_location'=>$theme_location,'depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span class="menu-item-label">', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>','walker'=> new MageeMenuWalker(),));
            ?>
            </nav>
        </div>
    </div>
    <?php if( $enable_sticky_header == 'yes' && $header_position !='left' && $header_position !='right' ):?>
    <?php if( !$detect->isTablet() || ( $detect->isTablet() && $enable_sticky_header_tablets == 'yes' ) || ( $detect->isMobile() && !$detect->isTablet() && $enable_sticky_header_mobiles == 'yes' )  ):?>
   <!-- sticky header -->
   <div class="fxd-header logo-<?php echo $logo_position;?>">
        <div class="<?php echo $header_container; ?>">
            <div class="logo-box text-left alchem_header_style alchem_default_logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">

                <?php if( $sticky_logo ):?>
                <img class="site-logo normal_logo" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($sticky_logo); ?>" />
                <?php endif;?>

                <?php
                    if( $sticky_logo_retina ):
                        $pixels ="";
                    if( is_numeric(alchem_option('sticky_logo_width_for_retina_logo')) && is_numeric(alchem_option('sticky_logo_height_for_retina_logo')) ):
                        $pixels ="px";
                    endif; ?>
                    <img src="<?php echo $sticky_logo_retina; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo alchem_option('sticky_logo_width_for_retina_logo').$pixels; ?>;max-height:<?php echo alchem_option('sticky_logo_height_for_retina_logo').$pixels; ?>; " class="site-logo retina_logo" />
                    <?php endif; ?>
                </a>
                <div class="name-box hide">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a>
                    <span class="site-tagline"><?php bloginfo('description'); ?></span>
                </div>
            </div>
            <button class="site-nav-toggle">
                <span class="sr-only"><?php _e( 'Toggle navigation', 'alchem-pro' );?></span>
                <i class="fa fa-bars fa-2x"></i>
            </button>
            <!-- langbar -->
            <div class="langbar" style="padding-left:20px; right:0px;">
                <a class="gray <?php if ($current_language == 'en') echo "current-language" ?>"  href="<?php echo qtranxf_convertURL("", "en"); ?>" title="English">EN</a> |
                <a class="gray <?php if ($current_language == 'vi') echo "current-language" ?>"  href="<?php echo qtranxf_convertURL("", "vi"); ?>" title="Vietnamese">VI</a>
            </div>
            <nav class="site-nav" role="navigation">
                <?php 
                    wp_nav_menu(array('theme_location'=>$theme_location,'depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span class="menu-item-label">', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>', 'walker'=> new MageeMenuWalker(),));
                ?>
            </nav>
        </div>
    </div>
    <?php endif;?>
    <?php endif; ?>
   <script type="text/javascript">
        jQuery('li.menu_column_2 > ul > li').addClass('col-md-6');
        jQuery('li.menu_column_3 > ul > li').addClass('col-md-4');
        jQuery('li.menu_column_4 > ul > li').addClass('col-md-3');
        jQuery('li.menu_column_5 > ul > li').addClass('col-md-1_5');
        jQuery('li.menu_column_6 > ul > li').addClass('col-md-2');			  
   </script>

    <div class="clear"></div>
</header>