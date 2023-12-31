<?php

define( "WOO_IMAGES", get_template_directory_uri() . "/woocommerce/images" );

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
//add_action( 'alchem_before_content_wrap','woocommerce_breadcrumb');

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action( 'woocommerce_before_main_content', 'alchem_woocommerce_output_content_wrapper', 10);
add_action( 'woocommerce_after_main_content', 'alchem_woocommerce_output_content_wrapper_end', 10);

add_action( 'woocommerce_before_shop_loop', 'alchem_woocommerce_before_shop_loop', 0,0);
add_action( 'woocommerce_before_shop_loop', 'alchem_woocommerce_after_shop_loop', 40);

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 10);

//add_action( 'alchem_woocommerce_after_catalog_ordering', 'alchem_after_catalog_ordering', 40);

//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating' ,5);

add_action('woocommerce_sidebar','alchem_woocommerce_sidebar');

add_action( 'woocommerce_after_product_loop','alchem_get_portfolio_share_icons');
add_action('woocommerce_share','alchem_single_product_sharing');

add_action('alchem_header_shopping_cart','alchem_header_shopping_cart');

add_action('woocommerce_before_shop_loop_item_title','alchem_before_shop_loop_item_title');
add_action('woocommerce_after_shop_loop_item','alchem_after_shop_loop_item');



function alchem_woocommerce_sidebar(){
	
	}
function alchem_before_shop_loop_item_title(){
	
	echo '<div class="product-info text-center">';
	}
function alchem_after_shop_loop_item(){
	
	echo '</div>';
	}

function alchem_after_catalog_ordering(){
	
	}
function alchem_woocommerce_before_shop_loop(){
echo "<div class='product-page-title-container'>";
}
function alchem_woocommerce_after_shop_loop(){
echo "</div>";
}


function alchem_single_product_sharing(){
	
	}


function alchem_woocommerce_output_content_wrapper() {
    global $woocommerce;
  $detect  = new Mobile_Detect;
  $sidebar ='none';
  $enable_page_title_bar     = alchem_option('enable_page_title_bar','yes');
  $page_title_bg_parallax    = esc_attr(alchem_option('page_title_bg_parallax','no'));
  $page_title_bg_parallax    = $page_title_bg_parallax=="yes"?"parallax-scrolling":"";
  $page_title_align          = esc_attr(alchem_option('page_title_align','left'));
  $display_breadcrumb        = esc_attr(alchem_option('display_breadcrumb','yes'));
  $breadcrumbs_on_mobile     = esc_attr(alchem_option('breadcrumbs_on_mobile_devices','yes'));
  $breadcrumb_menu_prefix    = esc_attr(alchem_option('breadcrumb_menu_prefix',''));
  $breadcrumb_menu_separator = esc_attr(alchem_option('breadcrumb_menu_separator','/'));
 if(is_single())
 {
 $left_sidebar  =	alchem_option('left_sidebar_woo_products','');
 $right_sidebar =	alchem_option('right_sidebar_woo_products','');
 
 }else {
 $left_sidebar  =	alchem_option('left_sidebar_woo_archive','');
 $right_sidebar =	alchem_option('right_sidebar_woo_archive','');
 }
 
if( $left_sidebar )
$sidebar = 'left';
if( $right_sidebar )
$sidebar = 'right';
if( $left_sidebar && $right_sidebar )
$sidebar = 'both';

$aside          = 'no-aside';
if( $left_sidebar !='' )
$aside          = 'left-aside';
if( $right_sidebar !='' )
$aside          = 'right-aside';
if(  $left_sidebar !='' && $right_sidebar !='' )
$aside          = 'both-aside';


echo '<div class="col-md-12">';
do_action("alchem_before_content_wrap");
echo '</div>';

 if( $enable_page_title_bar == 'yes' ):?>
<section class="page-title-bar title-<?php echo $page_title_align;?> no-subtitle <?php echo $page_title_bg_parallax;?>">
            <div class="container alchem_enable_page_title_bar">
                <hgroup class="page-title text-light">
                <?php if( is_shop() ):?>
                <h1><?php woocommerce_page_title(); ?></h1>
                <?php elseif( is_product_category() ):?>
                 <h1><?php single_term_title();?></h1>
                  <?php else:?>
                    <h1><?php the_title();?></h1>
                    <?php endif;?>
                    <!--<h3>This is a subtitle for the page.</h3>-->
                </hgroup>
                <?php if( $display_breadcrumb == 'yes' && !$detect->isMobile()):?>
                <?php alchem_get_breadcrumb(array("before"=>"<div class='breadcrumb-nav text-light alchem_display_breadcrumb'>".$breadcrumb_menu_prefix,"after"=>"</div>","show_browse"=>false,"separator"=>$breadcrumb_menu_separator));?>
                <?php endif;?>
                <?php if( $breadcrumbs_on_mobile == 'yes' && $detect->isMobile()):?>
                <?php alchem_get_breadcrumb(array("before"=>"<div class='breadcrumb-nav text-light alchem_display_breadcrumb'>".$breadcrumb_menu_prefix,"after"=>"</div>","show_browse"=>false,"separator"=>$breadcrumb_menu_separator));?>
                <?php endif;?>
                <div class="clearfix"></div>            
            </div>
        </section>
<?php endif;?>

<div class="post-wrap">
            <div class="container">
                <div class="post-inner row <?php echo $aside; ?>">
                    <div class="col-main">
                        <section class="post-main" role="main" id="content">
                            <div class="woo-product clearfix">
                                <div class="post-attributes">
                       

<?php
}
function alchem_woocommerce_output_content_wrapper_end() {
	
		 if(is_single())
 {
 $left_sidebar  =	alchem_option('left_sidebar_woo_products','');
 $right_sidebar =	alchem_option('right_sidebar_woo_products','');
 $sidebar_l     =   'woo_products_left';
 $sidebar_r     =   'woo_products_right';
 
 }else {
 $left_sidebar  =	alchem_option('left_sidebar_woo_archive','');
 $right_sidebar =	alchem_option('right_sidebar_woo_archive','');
 $sidebar_l     =   'woo_archive_left';
 $sidebar_r     =   'woo_archive_right';
 }
 
echo '</div>
</div></section></div>';

 if( $left_sidebar !='' ):?>
                    <div class="col-aside-left">
                        <aside class="blog-side left text-left">
                            <div class="widget-area">
                                <?php get_sidebar( $sidebar_l );?> 
                            </div>
                        </aside>
                    </div>
                    <?php endif; ?>
                    <?php if( $right_sidebar !='' ):?>
                    <div class="col-aside-right">
                       <?php get_sidebar( $sidebar_r );?>
                    </div>
                    
                    <?php
					endif;
echo '</div></div></div>';

}


function alchem_woocommerce_styles(){
	if(is_admin() || 'wp-login.php' == basename($_SERVER['PHP_SELF'])){
		return;
	}
	//wp_enqueue_style('alchem-woocommerce', get_template_directory_uri().'/style/woocommerce.css', false, false, 'all');
	
}
add_action('wp_print_styles', 'alchem_woocommerce_styles',12);





add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'alchem-pro'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'alchem-pro'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;

}

/*--------------------------------------------------------------------------------------------------
	PRODUCTS PAGE - FILTER IMAGE
--------------------------------------------------------------------------------------------------*/
 
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	} 
}
 

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
	
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 500, $placeholder_height = 500  ) {
		global $post, $woocommerce;
		
		$items_in_cart = array();

		if ( $woocommerce->cart->get_cart() && is_array( $woocommerce->cart->get_cart() ) ) {
			foreach ( $woocommerce->cart->get_cart() as $cart ) {
				$items_in_cart[] = $cart['product_id'];
			}
		}

		$id      = get_the_ID();
		$in_cart = in_array( $id, $items_in_cart );
		$size    = 'shop_catalog';
		
		$gallery          = get_post_meta( $id, '_product_image_gallery', true );
		$attachment_image = '';
		if ( ! empty( $gallery ) ) {
			$gallery          = explode( ',', $gallery );
			$first_image_id   = $gallery[0];
			$attachment_image = wp_get_attachment_image( $first_image_id, $size, false, array( 'class' => 'hover-image' ) );
		}
		
		
		$output = '<div class="product-image">';
			
			if ( has_post_thumbnail() ) {
				$thumb = get_the_post_thumbnail( get_the_ID() , "shop_catalog" ); 
				
				 $output .= '<div class="product-image-front">
							  '.$thumb.'
						  </div>
						  <div class="product-image-back">
							  '.$attachment_image.'
						  </div>';
						  
						  
				
			} else {
			
				$output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="'.$placeholder_width.'" height="'.$placeholder_height.'" />';
			
			}
			
			$output .= '<div class="product-image-overlay"></div>
					  </div>';
			
			return $output;
	}
}

 
function alchem_short_desc_filter($content){   


    $content = str_replace ('<p>','<p class="desc">',$content);
    return $content;
}

add_filter('woocommerce_short_description', 'alchem_short_desc_filter');

function alchem_url_set_value($url,$key,$value)
{
	$a=explode('?',$url);
	$url_f=$a[0];
	$query=isset($a[1])?$a[1]:"";
	parse_str($query,$arr);
	$arr[$key]=$value;
	return $url_f.'?'.http_build_query($arr);
} 

function alchem_get_self_url(){    
    if (isset($_SERVER['REQUEST_URI']))  
    {  
        $serverrequri = $_SERVER['REQUEST_URI'];   
    }  
    else  
    {  
        if (isset($_SERVER['argv']))  
        {  
            $serverrequri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];  
        }  
        else if(isset($_SERVER['QUERY_STRING']))  
        {  
            $serverrequri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];  
        }  
    }  
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";  
    $protocol = strstr(strtolower($_SERVER["SERVER_PROTOCOL"]), "/",true).$s;  
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);  
    return $protocol."://".$_SERVER['SERVER_NAME'].$port.$serverrequri;     
} 


function alchem_header_shopping_cart(){
global $woocommerce;


			}
			

	/**
	 * Register the [woocommerce_recently_viewed_products per_page="5"] shortcode
	 *
	 * This shortcode displays recently viewed products using WooCommerce default cookie
	 * It only has one parameter "per_page" to choose number of items to show
	 *
	 * @access      public
	 * @since       1.0
	 * @return      $content
	*/
	function alchem_woocommerce_recently_viewed_products(  ) {
	 
	  
	
	 
	    // Get WooCommerce Global
	    global $woocommerce;
	 
	    // Get recently viewed product cookies data
	    $viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
	    $viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
	 
	    // If no data, quit
	    if ( empty( $viewed_products ) )
	        return __( 'You have not viewed any product yet!', 'alchem-pro' );
	 
	    // Create the object
	
	 
	    // Get products per page
	    if( !isset( $per_page ) ? $number = 4 : $number = $per_page )
	 
	    // Create query arguments array
	    $query_args = array(
	                    'posts_per_page' => $number,
	                    'no_found_rows'  => 1,
	                    'post_status'    => 'publish',
	                    'post_type'      => 'product',
	                    'post__in'       => $viewed_products,
	                    'orderby'        => 'rand'
	                    );
	 
	    // Add meta_query to query args
	    $query_args['meta_query'] = array();
	 
	    // Check products stock status
	    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
	 
	    // Create a new query
	    $r = new WP_Query($query_args);
	 
	    // If query return results
	    if ( $r->have_posts() ) {
	 
	       woocommerce_product_loop_start();
	 
	        // Start the loop
	        while ( $r->have_posts()) {
	            $r->the_post();
	            wc_get_template_part( 'content', 'product' );
	 
	    }
		woocommerce_product_loop_end();
		}
		wp_reset_query();
	
	}

	add_action("woocommerce_cart_is_empty", "alchem_woocommerce_recently_viewed_products");
	
	function alchem_before_cart(){}
	add_action("woocommerce_before_cart", "alchem_before_cart",0);
	
	function alchem_before_checkout_form(){}
	add_action("woocommerce_before_checkout_form", "alchem_before_checkout_form",20);
	
	function alchem_before_thankyou(){}
	add_action("woocommerce_before_thankyou", "alchem_before_thankyou");
	
	function alchem_after_nav_menu(){}
		
	add_action("alchem_before_nav_menu", "alchem_after_nav_menu");