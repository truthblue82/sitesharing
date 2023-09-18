<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package nopasare
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function alchem_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'alchem_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function alchem_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( is_front_page() ){
		$classes[] = 'has-slider';
	}

	return $classes;
}
add_filter( 'body_class', 'alchem_body_classes' );


if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function alchem_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'alchem_slug_render_title' );
}


  function alchem_title( $title ) {
  if ( $title == '' ) {
  return __('Untitled', 'alchem-pro'); 
  } else {
  return $title;
  }
  }
  add_filter( 'the_title', 'alchem_title' );
  

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function alchem_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'alchem_setup_author' );
global $wp_embed;
add_filter( 'the_excerpt', array( $wp_embed, 'autoembed' ), 9 );

function alchem_add_pages_link( $content ){
	$pages = wp_link_pages( 
		array( 
			'before' => '<div>' . __( 'Page: ', 'alchem-pro' ),
			'after' => '</div>',
			'echo' => false ) 
	);
	if ( $pages == '' ){
		return $content;
	}
	return $content . $pages;
}
add_filter( 'the_content', 'alchem_add_pages_link' );

add_filter( 'the_password_form', 'alchem_password_form' );
function alchem_password_form(){
    global $post;
    
    $form = '
    <form class="password-form" action="/wp-login.php?action=postpass" method="post">
    <p>' . __( 'This post is password protected. To read it please enter the password below.', 'alchem-pro' ) . '</p>
    <input type="password" value="" name="post_password" id="password-' . $post->ID . '"/>
    </form>';
    return $form;
}

add_action( 'widgets_init', 'alchem_widgets' );
function alchem_widgets(){
	global $alchem_sidebars ;
	  $alchem_sidebars =   array(
            ''  => __( 'No Sidebar', 'alchem-pro' ),
		    'default_sidebar'  => __( 'Default Sidebar', 'alchem-pro' ),
			'sidebar-1'  => __( 'Sidebar 1', 'alchem-pro' ),
			'sidebar-2'  => __( 'Sidebar 2', 'alchem-pro' ),
			'sidebar-3'  => __( 'Sidebar 3', 'alchem-pro' ),
			'sidebar-4'  => __( 'Sidebar 4', 'alchem-pro' ),
			'sidebar-5'  => __( 'Sidebar 5', 'alchem-pro' ),
			'sidebar-5'  => __( 'Sidebar 5', 'alchem-pro' ),
			'sidebar-6'  => __( 'Sidebar 6', 'alchem-pro' ),
			'footer_widget_1'  => __( 'Footer Widget 1', 'alchem-pro' ),
			'footer_widget_2'  => __( 'Footer Widget 2', 'alchem-pro' ),
			'footer_widget_3'  => __( 'Footer Widget 3', 'alchem-pro' ),
			'footer_widget_4'  => __( 'Footer Widget 4', 'alchem-pro' ),
			'left_sidebar_404'  => __( '404 Page Left Sidebar', 'alchem-pro' ),
			'right_sidebar_404'  => __( '404 Page Right Sidebar', 'alchem-pro' ),
          );
	  
	  foreach( $alchem_sidebars as $k => $v ){
		  if( $k !='' ){
		  register_sidebar(array(
			'name' => $v,
			'id'   => $k,
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		  }
		  }
	    
		register_widget( 'alchem_recent_posts' );
		register_widget( 'alchem_portfolio_widget' );
		
		
}

class alchem_recent_posts extends WP_Widget
{
	function __construct() {
		$widget_ops = array(
			'classname'   => 'alchem_recent_posts',
			'description' => __('Display recent posts.', 'alchem-pro' )
			);
		parent::__construct( 'alchem_recent_posts_widget', '(Alchem) Recent Posts', $widget_ops );
	}
	
	function widget( $args, $instance ){
		extract( $args );
		$limit = ( empty( $instance['limit'] ) ) ? '3' : $instance['limit'];
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'alchem-pro') : $instance['title'], $instance, $this->id_base);
		$limit = absint( $limit );
		// The Query
	  query_posts( 'posts_per_page='.$limit );
	  $content = '';
	  // The Loop
	  while ( have_posts() ) : the_post();
	  
	   $content .= '<li>';
	  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		$content .= '<a href="'.get_permalink().'" class="widget-img">';
		  $content .= get_the_post_thumbnail();
		   $content .= '</a>';
	  }  
		$content .= '<a href="'.get_permalink().'">'.get_the_title().'</a><br>
			  '.get_the_date("M d, Y").'
		  </li>';
		
	  endwhile;

// Reset Query
    wp_reset_postdata();
		
        $output = $before_widget . $before_title . esc_attr($title) . $after_title . '<ul>' . $content .'</ul>' . $after_widget;
        echo $output;
    }
        
    function update( $new_instance, $old_instance ){
        $instance = $old_instance; 
        $new_instance = wp_parse_args( (array) $new_instance, array( 'title' => __('Recent Posts', 'alchem-pro'), 'limit' => '3') ); 
        $instance['title'] = esc_attr($new_instance['title']);
        $instance['limit'] = $new_instance['limit']; 
        return $instance; 
    }
    
    function form( $instance ){
        $instance = wp_parse_args( (array)$instance, array('title'=>__('Recent Posts', 'alchem-pro'), 'limit'=>3) ); 
        $title = $instance['title']; 
        $limit = $instance['limit']; 
     ?> 
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'alchem-pro'); ?></label>
      <input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
      <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e( 'Limit:', 'alchem-pro'); ?></label>
      <input id="<?php echo $this->get_field_id('limit'); ?>" class="widefat" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" />
            
        <?php
    }
        
}



class alchem_portfolio_widget extends WP_Widget
{
	function __construct() {
		$widget_ops = array(
			'classname'   => 'alchem_portfolio',
			'description' => __('Display portfolios.', 'alchem-pro' )
			);
		parent::__construct( 'alchem_portfolio_widget', '(Alchem) Portfolio', $widget_ops );
	}
	
	function widget( $args, $instance ){
		extract( $args );
		$limit = ( empty( $instance['limit'] ) ) ? '8' : $instance['limit'];
		$columns = ( empty( $instance['columns'] ) ) ? '4' : $instance['columns'];
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Latest Projects', 'alchem-pro') : $instance['title'], $instance, $this->id_base);
		$limit = absint( $limit );
		// The Query
		$alchem_css_class = 'col-xs-3';
		if( $columns == '2' )
		$alchem_css_class = 'col-xs-6';
		if( $columns == '3' )
		$alchem_css_class = 'col-xs-4';
		if( $columns == '4' )
		$alchem_css_class = 'col-xs-3';
		
       $item    = '';
	   $html    = '';
       query_posts(
			  array (
			  'post_type'=>'alchem_portfolio',
			  'orderby'=>'menu_order',
			  'post_status'=>'publish',
			  'posts_per_page'=>$limit,
			  'order' => 'DESC',
			  'meta_query' => array(
				  array( 'key' => '_thumbnail_id')
			  )
		  ));
       $i = 1;
		if(have_posts() ):
		while (have_posts() ) :
		 the_post();
// The Loop
        $item .= '<div class="column-item '.$alchem_css_class.'"><a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(),"portfolio-thumb").'</a></div>';

                                   
$i++;
endwhile;
endif;
if( $item != ''){
	$html .= '<div class="row">'.$item.' </div>';
	}  
// Reset Query
wp_reset_postdata();
		
        $output = $before_widget . $before_title . esc_attr($title) . $after_title . '<div class="widget-project">' . $html .'</div>' . $after_widget;
        echo $output;
    }
        
    function update( $new_instance, $old_instance ){
        $instance = $old_instance; 
        $new_instance = wp_parse_args( (array) $new_instance, array( 'title' => __('Latest Projects', 'alchem-pro'), 'limit' => '8', 'columns' => '4') ); 
        $instance['title'] = esc_attr($new_instance['title']);
        $instance['limit'] = $new_instance['limit']; 
		$instance['columns'] = $new_instance['columns'];
        return $instance; 
    }
    
    function form( $instance ){
        $instance = wp_parse_args( (array)$instance, array('title'=>__('Latest Projects', 'alchem-pro'), 'limit'=>8, 'columns' => 4) ); 
        $title = $instance['title']; 
        $limit = $instance['limit']; 
		$columns = $instance['columns']; 
     ?> 
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'alchem-pro'); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e( 'Limit:', 'alchem-pro'); ?></label>
            <input id="<?php echo $this->get_field_id('limit'); ?>" class="widefat" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" />
             <label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e( 'Columns:' , 'alchem-pro'); ?></label>
            <select id="<?php echo $this->get_field_id('columns'); ?>" name="<?php echo $this->get_field_name('columns'); ?>">
            <option value="2" <?php echo selected('2',$columns);?>>2</option>
            <option value="3" <?php echo selected('3',$columns);?>>3</option>
            <option value="4" <?php echo selected('4',$columns);?>>4</option>
            </select>
            
        <?php
    }
        
}


/**
 * Convert Hex Code to RGB
 * @param  string $hex Color Hex Code
 * @return array       RGB values
 */
 
function alchem_hex2rgb( $hex ) {
		if ( strpos( $hex,'rgb' ) !== FALSE ) {

			$rgb_part = strstr( $hex, '(' );
			$rgb_part = trim($rgb_part, '(' );
			$rgb_part = rtrim($rgb_part, ')' );
			$rgb_part = explode( ',', $rgb_part );

			$rgb = array($rgb_part[0], $rgb_part[1], $rgb_part[2], $rgb_part[3]);

		} elseif( $hex == 'transparent' ) {
			$rgb = array( '255', '255', '255', '0' );
		} else {

			$hex = str_replace( '#', '', $hex );

			if( strlen( $hex ) == 3 ) {
				$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
				$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
				$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
			} else {
				$r = hexdec( substr( $hex, 0, 2 ) );
				$g = hexdec( substr( $hex, 2, 2 ) );
				$b = hexdec( substr( $hex, 4, 2 ) );
			}
			$rgb = array( $r, $g, $b );
		}

		return $rgb; // returns an array with the rgb values
	}




add_filter('upload_mimes', 'alchem_filter_mime_types');
function alchem_filter_mime_types($mimes)
{
	$mimes['ttf'] = 'font/ttf';
	$mimes['woff'] = 'font/woff';
	$mimes['svg'] = 'font/svg';
	$mimes['eot'] = 'font/eot';

	return $mimes;
}


/* =============================================================================
Include the  Google Fonts 
========================================================================== */



global $of_options,$default_theme_fonts;

   // default fonts used in this theme, even though there are no google fonts
   $default_theme_fonts = array(

            'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
            "'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
            "'Bookman Old Style', serif" => "'Bookman Old Style', serif",
            "'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
            "Courier, monospace" => "Courier, monospace",
            "Garamond, serif" => "Garamond, serif",
            "Georgia, serif" => "Georgia, serif",
            "Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
            "'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
            "'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
            "'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
            "'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
            "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
            "Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
            "'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
            "'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
            "Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
			
   );

 defined('OF_FONT_DEFAULTS') or define('OF_FONT_DEFAULTS', serialize($default_theme_fonts));


include_once( get_template_directory().'/inc/google-fonts.php' );
global $alchem_google_fonts_array;

function of_filter_recognized_font_families( $array, $field_id ) {
  
  global $alchem_google_fonts_array;
  
  // loop through the cached google font array if available and append to default fonts
  $font_array = array();
  if($alchem_google_fonts_array){
  foreach($google_font_array as $index => $value){
  $font_array[$value['family']] = $value['family'];
  }
  }
  
  // put both arrays together
  $array = array_merge(unserialize(OF_FONT_DEFAULTS), $font_array);
  
  return $array;
  
}


// get  typography


 function alchem_get_typography($value){
 global $alchem_google_fonts_array,$default_theme_fonts;
 $return = "";
if ( is_array($value) && alchem_array_keys_exists( $value, array( 'font-color', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'letter-spacing', 'line-height', 'text-decoration', 'text-transform' ) ) ) {
          $font = array();
          
          if ( ! empty( $value['font-color'] ) )
            $font[] = "color: " . $value['font-color'] . " !important;";
          
		  
          if ( ! empty( $value['font-family'] ) ) {
		        if( isset($alchem_google_fonts_array[$value['font-family']]) )
                $font[] = "font-family: " . $alchem_google_fonts_array[$value['font-family']]['family'] . ";";
				else
				$font[] = "font-family: " . $default_theme_fonts[$value['font-family']] . ";";
          }
          
          if ( ! empty( $value['font-size'] ) )
            $font[] = "font-size: " . $value['font-size'] . ";";
          
          if ( ! empty( $value['font-style'] ) )
            $font[] = "font-style: " . $value['font-style'] . ";";
          
          if ( ! empty( $value['font-variant'] ) )
            $font[] = "font-variant: " . $value['font-variant'] . ";";
          
          if ( ! empty( $value['font-weight'] ) )
            $font[] = "font-weight: " . $value['font-weight'] . ";";
            
          if ( ! empty( $value['letter-spacing'] ) )
            $font[] = "letter-spacing: " . $value['letter-spacing'] . ";";
          
          if ( ! empty( $value['line-height'] ) )
            $font[] = "line-height: " . $value['line-height'] . ";";
          
          if ( ! empty( $value['text-decoration'] ) )
            $font[] = "text-decoration: " . $value['text-decoration'] . ";";
          
          if ( ! empty( $value['text-transform'] ) )
            $font[] = "text-transform: " . $value['text-transform'] . ";";
          
          /* set $value with font properties or empty string */
          $return = ! empty( $font ) ? implode( " ", $font ) : '';

        } 
		return $return;
		}



/**
 * Modifies WordPress's built-in comments_popup_link() function to return a string instead of echo comment results
 */
function alchem_get_comments_popup_link( $zero = false, $one = false, $more = false, $alchem_css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = __( 'No Comments', 'alchem-pro');
    if ( false === $one ) $one = __( '1 Comment', 'alchem-pro');
    if ( false === $more ) $more = __( '% Comments', 'alchem-pro');
    if ( false === $none ) $none = __( 'Comments Off', 'alchem-pro');
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($alchem_css_class)) ? ' class="' . esc_attr( $alchem_css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
	
 
    if ( post_password_required() ) {
     
        return '';
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $alchem_css_class ) ) {
        $str .= ' class="'.$alchem_css_class.'" ';
    }
    $title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( __('Comment on %s', 'alchem-pro'), $title ) ) . '">';
    $str .= alchem_get_comments_number_str( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}

/**
 * Modifies WordPress's built-in comments_number() function to return string instead of echo
 */
function alchem_get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments', 'alchem-pro') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __('No Comments', 'alchem-pro') : $zero;
    else // must be one
        $output = ( false === $one ) ? __('1 Comment', 'alchem-pro') : $one;
 
    return apply_filters('comments_number', $output, $number);
}

// get summary

 function alchem_get_summary(){
	 
	 $excerpt_or_content        = alchem_option('excerpt_or_content','excerpt');
	 $excerpt_length            = alchem_option('excerpt_length','55');
	 if( $excerpt_or_content == 'full_content' ){
	 $output = get_the_content();
	 }
	 else{
	 $output = get_the_excerpt();
	 if( is_numeric($excerpt_length) && $excerpt_length > 0  )
	 $output = alchem_content_length($output, $excerpt_length );
	 }
	 return  $output;
	 }
	 
 function alchem_content_length($content, $limit) {
    $excerpt = explode(' ', trim($content), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
    }

// get post content css class
 function alchem_get_content_class( $sidebar = '' ){
	 
	 if( $sidebar == 'left' )
	 return 'left-aside';
	 if( $sidebar == 'right' )
	 return 'right-aside';
	 if( $sidebar == 'both' )
	 return 'both-aside';
	  if( $sidebar == 'none' )
	 return 'no-aside';
	 
	 return 'no-aside';
	 
	 }
	

 // get breadcrumbs
 function alchem_get_breadcrumb( $options = array()){
   global $post,$wp_query ;
    $postid = isset($post->ID)?$post->ID:"";
	
   $show_breadcrumb = "";
   if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) { 
    $postid = $wp_query->get_queried_object_id();
   }
  
   if(isset($postid) && is_numeric($postid)){
    $show_breadcrumb = get_post_meta( $postid, '_alchem_show_breadcrumb', true );
	}
	if($show_breadcrumb == 'yes' || $show_breadcrumb==""){

               alchem_breadcrumb_trail( $options);           
	}
	   
	}
	
	
 // footer tracking code
	
 function alchem_tracking_code(){
   $tracking_code = alchem_option('tracking_code');
   echo '<script type="text/javascript">'.$tracking_code.'</script>';
 } 

add_action('wp_footer', 'alchem_tracking_code'); 

 // Space before </head>
	
 function alchem_space_before_head(){
   $space_before_head = alchem_option('space_before_head');
   echo '<script type="text/javascript">'.$space_before_head.'</script>';
 } 

add_action('wp_head', 'alchem_space_before_head'); 


 // Space before </body>
	
 function alchem_space_before_body(){
   $space_before_body = alchem_option('space_before_body');
   echo '<script type="text/javascript">'.$space_before_body.'</script>';
 } 

add_action('wp_footer', 'alchem_space_before_body'); 

// get social icon

function alchem_get_social( $position, $class = 'top-bar-sns',$placement='top',$target='_blank'){
	global $alchem_social_icons;
   $return = '';
   $rel    = '';
   
   $social_links_nofollow  = alchem_option( 'social_links_nofollow','no' ); 
   $social_new_window = alchem_option( 'social_new_window','yes' );  
   if( $social_new_window == 'no')
   $target = '_self';
   
   if( $social_links_nofollow == 'yes' )
   $rel    = 'nofollow';
   
   if(is_array($alchem_social_icons) && !empty($alchem_social_icons)):
   $return .= '<ul class="'.esc_attr($class).'">';
   $i = 1;
   foreach($alchem_social_icons as $sns_list_item){
	 
		 $icon = alchem_option( $position.'_social_icon_'.$i,'' );  
		 $title = alchem_option( $position.'_social_title_'.$i,'' );
		 $link = alchem_option( $position.'_social_link_'.$i,'' );  
	if(  $icon !="" ){
	 $return .= '<li><a target="'.esc_attr($target).'" rel="'.$rel.'" href="'.esc_url($link).'" data-placement="'.esc_attr($placement).'" data-toggle="tooltip" title="'.esc_attr( $title).'"><i class="fa fa-'.esc_attr( $icon).'"></i></a></li>';
	} 
	$i++;
	} 
	$return .= '</ul>';
	endif;
	return $return ;
	}
	

// get top bar content

 function alchem_get_topbar_content( $type =''){

	 switch( $type ){
		 case "info":
		 echo '<div class="top-bar-info">';
		 echo alchem_option('top_bar_info_content');
		 echo '</div>';
		 break;
		 case "sns":
		 $tooltip_position = alchem_option('top_social_tooltip_position','bottom'); 
		 echo alchem_get_social('header','top-bar-sns',$tooltip_position);
		 break;
		 case "menu":
		 echo '<nav class="top-bar-menu">';
		 wp_nav_menu(array('theme_location'=>'top_bar_menu','depth'=>1,'fallback_cb' =>false,'container'=>'','container_class'=>'','menu_id'=>'','menu_class'=>'','link_before' => '<span>', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
		 echo '</nav>';
		 break;
		 case "none":
		
		 break;
		 }
	 }
	 
	// get related posts
	
 function alchem_get_related_posts($post_id, $number_posts = -1,$post_type = 'post') {
	$query = new WP_Query();

    $args = '';

	if($number_posts == 0) {
		return $query;
	}

	$args = wp_parse_args($args, array(
		'posts_per_page' => $number_posts,
		'post__not_in' => array($post_id),
		'ignore_sticky_posts' => 0,
        'meta_key' => '_thumbnail_id',
        'category__in' => wp_get_post_categories($post_id),
		'post_type' =>$post_type 
	));

	$query = new WP_Query($args);

  	return $query;
}

// get favicon
 function alchem_favicon()
	{
	    $favicon                =  alchem_option('default_favicon');
		$iphone_favicon         =  alchem_option('iphone_favicon');
		$iphone_retina_favicon  =  alchem_option('iphone_retina_favicon');
		$ipad_favicon           =  alchem_option('ipad_favicon');
		$ipad_retina_favicon    =  alchem_option('ipad_retina_favicon');
		
		$detect = new Mobile_Detect;
		
		 if( $detect->is('ipad') && $ipad_favicon !='' )
		  $favicon = $ipad_favicon ;
		  
		if( $detect->is('iphone') && $iphone_favicon !='' )
	       $favicon = $iphone_favicon ;
		   
		$icon_link = "";
		if($favicon)
		{
			$type = "image/x-icon";
			if(strpos($favicon,'.png' )) $type = "image/png";
			if(strpos($favicon,'.gif' )) $type = "image/gif";
		
			$icon_link = '<link rel="icon" href="'.esc_url($favicon).'" type="'.$type.'">';
		}
		
		echo $icon_link;
	}
 add_action( 'wp_head', 'alchem_favicon' );
 
 // get nav memu search form
 function alchem_nav_searchform(){
	 echo get_search_form();
	 exit(0);
	 }
 add_action( 'wp_ajax_alchem_nav_searchform', 'alchem_nav_searchform' );
 add_action( 'wp_ajax_nopriv_alchem_nav_searchform', 'alchem_nav_searchform' );
 


// fix shortcodes

 function alchem_fix_shortcodes($content){   
			$replace_tags_from_to = array (
				'<p>[' => '[', 
				']</p>' => ']', 
				']<br />' => ']',
				']<br>' => ']',
				']\r\n' => ']',
				']\n' => ']',
				']\r' => ']',
				'\r\n[' => '[',
			);

			return strtr( $content, $replace_tags_from_to );
		}
		

 function alchem_the_content_filter($content) {
	  $content = alchem_fix_shortcodes($content);
	  return $content;
	}
	
 add_filter( 'the_content', 'alchem_the_content_filter' );
	
		
// set portfolio number of archive
   add_filter('pre_get_posts', 'alchem_filter_portfolio_tax');

    function alchem_filter_portfolio_tax( $query ){
				 
		$portfolio_number = absint(alchem_option('portfolio_number',10));

		 if ( $query->is_main_query() && ( is_tax( 'portfolio_category' ) || is_tax( 'portfolio_skills' ) || is_tax( 'portfolio_tags' ) ) ) {
            $query->set( 'posts_per_page', $portfolio_number );
        }

        return $query;
		
    }
	

//get page top slider

 function alchem_get_page_slider($slider_type,$alchem_css_class=""){
	  global  $alchem_page_meta;
	
	  $return       = '';
	  switch($slider_type){
		  case "layer":
		  if(isset($alchem_page_meta['layer_slider']) && is_numeric($alchem_page_meta['layer_slider']) && $alchem_page_meta['layer_slider']>0 )
		  $return        .= do_shortcode('[layerslider id="'.$alchem_page_meta['layer_slider'].'"]');
		  break;
		  case "rev":
		 
		   if(isset($alchem_page_meta['rev_slider']) && $alchem_page_meta['rev_slider'] !="" )
		  $return        .= do_shortcode('[rev_slider '.$alchem_page_meta['rev_slider'].']');
		  break;
		   case "magee_slider":
		  if(isset($alchem_page_meta['magee_slider']) && is_numeric($alchem_page_meta['magee_slider']) && $alchem_page_meta['magee_slider']>0 )
		  $return .= do_shortcode('[ms_slider id="'.$alchem_page_meta['magee_slider'].'"]');	  
		  break;
		  default:
		  return;
		  break;
		  }
	 echo  '<div class="slider-wrap"><div class="page-top-slider '.$alchem_css_class.'">'.$return.'</div></div>';
	 }
	 
	 
 /**
	 * Shortcode: slider
	 *
	 * @param string $content
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
 function magee_slider_shortcode($atts,$content=NULL){
   extract( shortcode_atts( array(
  'css_class' => '',
  'id' => ''
  ), $atts ) );
   
		$sliderContent = array();
		if(isset($id) && is_numeric($id)){
		$custom = get_post_custom($id);
	
		if(isset($custom["alchem_custom_slider"][0]) && $custom["alchem_custom_slider"][0] !="")
	    $sliderContent = unserialize( $custom["alchem_custom_slider"][0]);
		}
       $slider_id  = uniqid( 'alchem-slider-' );
	   $return     = "";
	   $indicators = "";
	   $items      = "";
	   
	   
	   if ( is_array($sliderContent) && count($sliderContent) > 0 ) {
		$return .= '<div id="'.$slider_id.'" class="carousel slide alchem-carousel" data-ride="carousel">'; 
		
		$i       = 0;
         foreach ( $sliderContent as $slide ) {
					$active = "";
					if($i == 0) $active = "active";
					
					$image       = wp_get_attachment_image_src( $slide['id'] , "full");
					$indicators .= '<li data-target="#'.$slider_id.'" data-slide-to="'.$i.'" class="'.$active.'"></li>';
					$items      .= ' <div class="item '.$active.'">
      <img src="'.$image[0].'" alt="'.$slide['title'].'">
      <div class="carousel-caption">
        <h3>'.$slide['title'].'</h3>
        <p>'.do_shortcode( alchem_fix_shortcodes(stripslashes($slide['caption'])) ).'</p>
      </div>
    </div>';
	$i++;
				}
				
		$return .= '<ol class="carousel-indicators">'.$indicators.'</ol>';
		
		$return .= '<div class="carousel-inner" role="listbox">'.$items.'</div>';
				
		$return .= '<a class="left carousel-control" href="#'.$slider_id.'" role="button" data-slide="prev">
    <span class="fa fa-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">'.__( 'Previous', 'alchem-pro' ).'</span>
  </a>
  <a class="right carousel-control" href="#'.$slider_id.'" role="button" data-slide="next">
    <span class="fa fa-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">'.__( 'Next', 'alchem-pro' ).'</span>
  </a>';
		
		$return .= '</div>';
		   
	   }
	   
							
	 return $return ;	
							
 }
 add_shortcode('magee_slider','magee_slider_shortcode');
 
 
 
/**
 * Infinite Scroll
 */
function alchem_infinite_scroll_js() {
    if( ! is_singular() ) { ?>
    <script>
	if( alchem_params.portfolio_grid_pagination_type == 'infinite_scroll' && typeof infinitescroll !=='undefined'){
    var infinite_scroll = {
        loading: {
            img: "<?php echo get_template_directory_uri(); ?>/images/AjaxLoader.gif",
            msgText: "<?php _e( 'Loading the next set of posts...', 'alchem-pro' ); ?>",
            finishedMsg: "<?php _e( 'All posts loaded.', 'alchem-pro' ); ?>"
        },
        "nextSelector":"a.next",
        "navSelector":".post-pagination",
        "itemSelector":".portfolio-box-wrap",
        "contentSelector":".portfolio-list-items"
    };
	
	jQuery('.portfolio-list-wrap .post-pagination').hide();
    jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll,function(arrayOfNewElems){
			jQuery('.portfolio-box-wrap').css({ display: 'inline-block', opacity: 1});
			jQuery('#filters li span').removeClass('active');
			jQuery('#filters li:first span').addClass('active');
			jQuery("a[rel^='portfolio-image']").prettyPhoto();
			

      } );
	
	}
	if( alchem_params.blog_pagination_type == 'infinite_scroll' ){
		
		var infinite_scroll = {
        loading: {
            img: "<?php echo get_template_directory_uri(); ?>/images/AjaxLoader.gif",
            msgText: "<?php _e( 'Loading the next set of posts...', 'alchem-pro' ); ?>",
            finishedMsg: "<?php _e( 'All posts loaded.', 'alchem-pro' ); ?>"
        },
        "nextSelector":"a.next",
        "navSelector":".post-pagination",
        "itemSelector":".entry-box-wrap",
        "contentSelector":".blog-list-wrap"
    };
	
	jQuery('.blog-list-wrap .post-pagination').hide();
    jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
		
		}
    </script>
    <?php
	
    }
}

add_action( 'wp_footer', 'alchem_infinite_scroll_js',100 );

function alchem_enqueue_less_styles($tag, $handle) {
		global $wp_styles;
		$match_pattern = '/\.less$/U';
		if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
			$handle = $wp_styles->registered[$handle]->handle;
			$media = $wp_styles->registered[$handle]->args;
			$href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
			$rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
			$title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';
	
			$tag = "<link rel='stylesheet' id='$handle' $title href='$href' type='text/less' media='$media' />\n";
		}
		return $tag;
	}
	add_filter( 'style_loader_tag', 'alchem_enqueue_less_styles', 5, 2);
	

/*	
*	send email
*	---------------------------------------------------------------------
*/
function alchem_contact(){
	if(trim($_POST['name']) === '') {
		$Error = __('Please enter your name.', 'alchem-pro');
		$hasError = true;
	} else {
		$name = trim($_POST['name']);
	}

	if(trim($_POST['email']) === '')  {
		$Error = __('Please enter your email address.', 'alchem-pro');
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$Error = __('You entered an invalid email address.', 'alchem-pro');
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['message']) === '') {
		$Error =  __('Please enter a message.', 'alchem-pro');
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
	}

	if(!isset($hasError)) {
		
	   if (isset($_POST['receiver']) && preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim(base64_decode($_POST['receiver'])))) {
	     $emailTo = base64_decode($_POST['receiver']);
	   }
	   else{
	 	 $emailTo = get_option('admin_email');
		}
		 if($emailTo !=""){
		if(trim($_POST['subject']) === '')
		$subject = 'From '.$name;
		else
		$subject = trim($_POST['subject']);
		
		$body = sprintf(__('Name', 'alchem-pro').": %s \n\n".__('Email', 'alchem-pro').": %s \n\n".__('Message', 'alchem-pro').": %s",$name,$email,$message);
		$headers = sprintf(__('From', 'alchem-pro').': %s <%s>' . "\r\n" . 'Reply-To: %s',$name,$emailTo, $email);

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
		}
		echo json_encode(array("msg"=>__("Your message has been successfully sent!", 'alchem-pro'),"error"=>0));
		
	}
	else
	{
	echo json_encode(array("msg"=>$Error,"error"=>1));
	}
	die() ;
	}
	add_action('wp_ajax_alchem_contact', 'alchem_contact');
	add_action('wp_ajax_nopriv_alchem_contact', 'alchem_contact');

/**
 * Get tape-product-more
 * @param type $hex
 * @param type $percent
 * @return type
 */        
function alchem_getTapeProductMore(){
    $args = array ( 
        'category_name' => 'industrial-tapes', 
        'orderby' => 'meta_value_num', 
        'meta_key' => 'ordering', 
        'order' => 'asc', 
        'post_status' => array('publish'), 
        'posts_per_page' => 200, 
        'offset' => 12,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'industrial-tapes',
            ),
        )
     );
    $posts = get_posts( $args );
  
    $total = count($posts);
    $default = 4;
    $col = $total > 0 ? 12/$default : 3;
    if($total){
        $rows = ceil($total/$default);
        for($i=1; $i <= $rows; $i++){
            ?>
            <div class="row">
                <?php
                for($j = $default*($i-1); $j < count($posts); $j++ ){
                    $post = $posts[$j];
                    $pid = $post->ID;
                    if($j < $default*$i ){
                        $title = get_the_title($pid);
                        $title = apply_filters("the_title", $title);
                        ?>
                        <div class="col-md-<?php echo $col;?>">
                            <div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" 
                                 data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
                                <?php 
                                $content = $post->post_content;
                                $content = apply_filters('the_content', $content);
                                if($content){
                                    $link = get_permalink($pid);
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
                                                <img src="<?php echo get_the_post_thumbnail_url($pid);?>" alt="<?php echo $title; ?>" 
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
                                                <h3 class="person-name alchem_section_6_name_<?php echo $j; ?>" style="text-transform: uppercase;"><?php echo $title;?></h3>
                                            </a>
                                            <h4 class="person-title alchem_section_6_byline_<?php echo $j; ?>" style="text-transform: uppercase;"></h4>
                                            <?php 
                                            $excerpt = get_the_excerpt($pid);
                                            $excerpt = apply_filters("the_excerpt",$excerpt);
                                            echo $excerpt;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php
        }
    }
    wp_die();
}
add_action('wp_ajax_alchem_getTapeProductMore', 'alchem_getTapeProductMore');
add_action('wp_ajax_nopriv_alchem_getTapeProductMore', 'alchem_getTapeProductMore');

/**
 * Get printing-product-more
 * @param type $hex
 * @param type $percent
 * @return type
 */
function alchem_getPrintingProductMore(){
    $args = array ( 
        'category_name' => 'printing-packaging-supplies', 
        'orderby' => 'meta_value_num', 
        'meta_key' => 'ordering', 
        'order' => 'asc', 
        'post_status' => array('publish'), 
        'posts_per_page' => 200, 
        'offset' => 12,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'printing-packaging-supplies',
            ),
        )
     );
    $posts = get_posts( $args );
  
    $total = count($posts);
    $default = 4;
    $col = $total > 0 ? 12/$default : 3;
    if($total){
        $rows = ceil($total/$default);
        for($i=1; $i <= $rows; $i++){
            ?>
            <div class="row">
                <?php
                for($j = $default*($i-1); $j < count($posts); $j++ ){
                    $post = $posts[$j];
                    $pid = $post->ID;
                    if($j < $default*$i ){
                        $title = get_the_title($pid);
                        $title = apply_filters("the_title", $title);
                        ?>
                        <div class="col-md-<?php echo $col;?>">
                            <div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" 
                                 data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
                                <?php 
                                $content = $post->post_content;
                                $content = apply_filters('the_content', $content);
                                if($content){
                                    $link = get_permalink($pid);
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
                                                <img src="<?php echo get_the_post_thumbnail_url($pid);?>" alt="<?php echo $title; ?>" 
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
                                                <h3 class="person-name alchem_section_6_name_<?php echo $j; ?>" style="text-transform: uppercase;"><?php echo $title;?></h3>
                                            </a>
                                            <h4 class="person-title alchem_section_6_byline_<?php echo $j; ?>" style="text-transform: uppercase;"></h4>
                                            <?php 
                                            $excerpt = get_the_excerpt($pid);
                                            $excerpt = apply_filters("the_excerpt",$excerpt);
                                            echo $excerpt;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php
        }
    }
    wp_die();
}
add_action('wp_ajax_alchem_getPrintingProductMore', 'alchem_getPrintingProductMore');
add_action('wp_ajax_nopriv_alchem_getPrintingProductMore', 'alchem_getPrintingProductMore');

/**
 * Get printing-packaging-more
 * @param type $hex
 * @param type $percent
 * @return type
 */
function alchem_getPrintingPackagingMore(){
    $args = array ( 
        'category_name' => 'printing-packaging', 
        'orderby' => 'meta_value_num', 
        'meta_key' => 'ordering', 
        'order' => 'asc', 
        'post_status' => array('publish'), 
        'posts_per_page' => 200, 
        'offset' => 12,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'printing-packaging',
            ),
        )
     );
    $posts = get_posts( $args );
  
    $total = count($posts);
    $default = 4;
    $col = $total > 0 ? 12/$default : 3;
    if($total){
        $rows = ceil($total/$default);
        for($i=1; $i <= $rows; $i++){
            ?>
            <div class="row">
                <?php
                for($j = $default*($i-1); $j < count($posts); $j++ ){
                    $post = $posts[$j];
                    $pid = $post->ID;
                    if($j < $default*$i ){
                        $title = get_the_title($pid);
                        $title = apply_filters("the_title", $title);
                        ?>
                        <div class="col-md-<?php echo $col;?>">
                            <div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" 
                                 data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
                                <?php 
                                $content = $post->post_content;
                                $content = apply_filters('the_content', $content);
                                if($content){
                                    $link = get_permalink($pid);
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
                                                <img src="<?php echo get_the_post_thumbnail_url($pid);?>" alt="<?php echo $title; ?>" 
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
                                                <h3 class="person-name alchem_section_6_name_<?php echo $j; ?>" style="text-transform: uppercase;"><?php echo $title;?></h3>
                                            </a>
                                            <h4 class="person-title alchem_section_6_byline_<?php echo $j; ?>" style="text-transform: uppercase;"></h4>
                                            <?php 
                                            $excerpt = get_the_excerpt($pid);
                                            $excerpt = apply_filters("the_excerpt",$excerpt);
                                            echo $excerpt;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php
        }
    }
    wp_die();
}
add_action('wp_ajax_alchem_getPrintingPackagingMore', 'alchem_getPrintingPackagingMore');
add_action('wp_ajax_nopriv_alchem_getPrintingPackagingMore', 'alchem_getPrintingPackagingMore');


/**
 * Get graphic-reflective-more
 * @param type $hex
 * @param type $percent
 * @return type
 */
function alchem_getGraphicReflectiveMore(){
    $args = array ( 
        'category_name' => 'graphic-reflective', 
        'orderby' => 'meta_value_num', 
        'meta_key' => 'ordering', 
        'order' => 'asc', 
        'post_status' => array('publish'), 
        'posts_per_page' => 200, 
        'offset' => 12,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'graphic-reflective',
            ),
        )
     );
    $posts = get_posts( $args );
  
    $total = count($posts);
    $default = 4;
    $col = $total > 0 ? 12/$default : 3;
    if($total){
        $rows = ceil($total/$default);
        for($i=1; $i <= $rows; $i++){
            ?>
            <div class="row">
                <?php
                for($j = $default*($i-1); $j < count($posts); $j++ ){
                    $post = $posts[$j];
                    $pid = $post->ID;
                    if($j < $default*$i ){
                        $title = get_the_title($pid);
                        $title = apply_filters("the_title", $title);
                        ?>
                        <div class="col-md-<?php echo $col;?>">
                            <div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" 
                                 data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
                                <?php 
                                $content = $post->post_content;
                                $content = apply_filters('the_content', $content);
                                if($content){
                                    $link = get_permalink($pid);
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
                                                <img src="<?php echo get_the_post_thumbnail_url($pid);?>" alt="<?php echo $title; ?>" 
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
                                                <h3 class="person-name alchem_section_6_name_<?php echo $j; ?>" style="text-transform: uppercase;"><?php echo $title;?></h3>
                                            </a>
                                            <h4 class="person-title alchem_section_6_byline_<?php echo $j; ?>" style="text-transform: uppercase;"></h4>
                                            <?php 
                                            $excerpt = get_the_excerpt($pid);
                                            $excerpt = apply_filters("the_excerpt",$excerpt);
                                            echo $excerpt;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php
        }
    }
    wp_die();
}
add_action('wp_ajax_alchem_getGraphicReflectiveMore', 'alchem_getGraphicReflectiveMore');
add_action('wp_ajax_nopriv_alchem_getGraphicReflectiveMore', 'alchem_getGraphicReflectiveMore');

 function alchem_colourBrightness($hex, $percent) {
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE 
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}

function alchem_sanitize_allowedposttags(){
	global $allowedposttags;
    $allowedposttags['span'] = array (
                        'class' => array (),
                        'dir' => array (),
                        'align' => array (),
                        'lang' => array (),
                        'style' => array (),
                        'title' => array (),
						'data-accordion' => array (),
                        'xml:lang' => array()
						
						);

}
add_action( 'init', 'alchem_sanitize_allowedposttags' );



function alchem_optionscheck_change_santiziation() {

    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'alchem_of_sanitize_textarea_custom' );

}

function alchem_of_sanitize_textarea_custom($input) {

    global $allowedposttags;

        $of_custom_allowedtags["script"] = array(
             "type" => array(),  
			  "src" => array(), 
    );
      $of_custom_allowedtags["style"] = array(
             "type" => array(),  
    );
	   $of_custom_allowedtags["link"] = array(
             "rel" => array(),  
			  "href" => array(), 
			  "media" => array(), 
			  "type" => array(), 
    );
	  

        $of_custom_allowedtags = array_merge($of_custom_allowedtags, $allowedposttags);

        $output = wp_kses( $input, $of_custom_allowedtags);

    return $output;

}
add_action('admin_init','alchem_optionscheck_change_santiziation', 100); 


   /**
 * alchem admin panel menu
 */
 
   add_action( 'optionsframework_page_title_after','alchem_options_page_title' );

function alchem_options_page_title() { ?>

		        <ul class="options-links">
                  <li><a href="<?php echo esc_url( 'http://www.mageewp.com/wordpress-themes' ); ?>" target="_blank"><?php _e( 'MageeWP Themes', 'alchem-pro' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'http://www.mageewp.com/manuals/theme-guide-alchem.html' ); ?>" target="_blank"><?php _e( 'Manual', 'alchem-pro' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'http://www.mageewp.com/documents/faq/' ); ?>" target="_blank"><?php _e( 'FAQ', 'alchem-pro' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'http://www.mageewp.com/knowledges/' ); ?>" target="_blank"><?php _e( 'Knowledge', 'alchem-pro' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'http://www.mageewp.com/forums/alchem-theme/' ); ?>" target="_blank"><?php _e( 'Support Forums', 'alchem-pro' ); ?></a></li>
                  </ul>
      			
<?php
}


/****
 alchem admin page
****/

function alchem_admin_tabs( $current = 'alchem' ) {
    $tabs = array( 'import-demos' => __('Import Demos', 'alchem-pro' ),'options-backup' => __('Options Backup', 'alchem-pro' )  );
    echo '<div id="icon-themes" class=""><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
	if( isset($_GET['page']) && $_GET['page'] !=''  )
	$current = $_GET['page'];
	
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=$tab'>$name</a>";

    }
    echo '</h2>';
}


function alchem_register_admin_menu_page(){
	
	add_theme_page(__('Alchem Backup', 'alchem-pro' ),__('Alchem Backup', 'alchem-pro' ), 'edit_theme_options', 'import-demos', 'alchem_import_demos');
	add_theme_page(__('Options Backup', 'alchem-pro' ),'', 'edit_theme_options', 'options-backup', 'alchem_options_backup_form');
	
}
add_action( 'admin_menu', 'alchem_register_admin_menu_page' );


function alchem_import_demos(){
	alchem_admin_tabs();
	?>
	<div class="updated error importer-notice importer-notice-1" style="display: none;">
		<p><strong><?php echo __( "We're sorry but the demo data could not be imported. It is most likely due to low PHP configurations on your server.", 'alchem-pro' ); ?></strong></p>
	</div>

	<div class="updated importer-notice importer-notice-2" style="display: none;"><p><strong><?php echo __( "Demo data successfully imported.", 'alchem-pro' ); ?> .</strong></p></div>

	<div class="updated error importer-notice importer-notice-3" style="display: none;">
		<p><strong><?php echo __( "We're sorry but the demo data could not be imported. It is most likely due to low PHP configurations on your server .", 'alchem-pro' ); ?></strong></p>

	</div>
<?php
	
	echo '<div class="alchem-import-demos">
	<style> .theme-browser .theme .theme-actions{opacity: 1 !important; }.demo-import-loader {
	background: rgba(255,255,255,0.7);
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	text-align: center;
	display:none;
}
.demo-import-loader i {
	text-align: center;
	display: inline-block;
	margin: 0 auto;
	height: 32px;
	width: 32px;
	top: 110px;
	position: relative;
	font-size: 32px;
	line-height: 32px;
}
</style>
	<div class="feature-section theme-browser rendered">
  <div class="theme" style="margin-top:20px;">
    <div class="theme-screenshot"> <img src="'.get_template_directory_uri().'/lib/importer/images/alchem.jpg"> </div>
    <h3 class="theme-name" id="classic">'.__('Alchem - Classic', 'alchem-pro' ).'</h3>
    <div class="theme-actions"> <a class="button button-primary button-import-demo" data-demo-id="classic" href="#">'.__('Import', 'alchem-pro' ).'</a> <a class="button" target="_blank" href="'.esc_url('https://demo.mageewp.com/alchem-pro').'">'.__('Preview', 'alchem-pro' ).'</a> </div>
<div class="demo-import-loader preview-all"></div>
<div class="demo-import-loader preview-classic "><i class="fa fa-cog dashicons-admin-generic fa-spin"></i></div>
  </div>
</div>
</div>
';
	}
	
	
function alchem_options_backup_form(){
	alchem_admin_tabs();
	
	  $backup_list      = get_option('alchem_options_backup');
	  $backup_list_html = '';
	  if( is_array($backup_list) && $backup_list != NULL )
	  {
		  foreach( $backup_list as $backup_item ){
			  
			  $backup_list      = get_option('alchem_options_backup_'.$backup_item);
			  $backup_list_html .= '<tr id="tr-'.$backup_item.'">
    <td style="padding-left:20px;"> '.__('Backup', 'alchem-pro').' '.date('Y-m-d H:i:s',$backup_item).'</td>
    <td><a class="button" id="alchem-restore-btn" data-key="'.$backup_item.'" href="#"><i class="fa fa-refresh"></i> '.__('Restore', 'alchem-pro').'</a></td>
    <td><a class="button" id="alchem-delete-btn" data-key="'.$backup_item.'" href="#"><i class="fa fa-remove"></i> '.__('Delete', 'alchem-pro').'</a></td>
  </tr>';
			  }
		  
		  }
		  
 $html = '<style>#alchem-backup-lists {
    border-collapse:collapse;
}
.alchem-desc{
	margin-top:20px;
}
table#alchem-backup-lists,
#alchem-backup-lists td,
#alchem-backup-lists th {
    border: 1px solid #ccc;
}

#alchem-backup-lists td {
    padding: 10px;
}</style><div class="alchem-desc"> <a class="button" id="alchem-backup-btn" href="#">'.__('Create New Backup', 'alchem-pro').'</a> <span style=" padding-left:20px; display:none; color:green;" class="alchem-backup-complete">'.__('Theme options have been backuped.', 'alchem-pro').'</span></div>
						  <table width="100%" border="1" id="alchem-backup-lists" style=" margin-top:50px;">'.$backup_list_html.'</table>';
 echo $html;

	}
	

/**
// alchem options backup
*/
function alchem_options_backup(){
	$options        = array();
	$keys           = array();
	$option_name    = alchem_get_textdomain();
	$key            = time();
    $keys           = get_option('alchem_options_backup');
	$keys[]         = $key;
	update_option('alchem_options_backup',$keys,'','no');
	
	$alchem_options = get_theme_mods();
	
	add_option( 'alchem_options_backup_'.$key,$alchem_options,'','no' );
	
	$list_item = '<tr id="tr-'.$key.'">
    <td style="padding-left:20px;"> '.__('Backup', 'alchem-pro').' '.date('Y-m-d H:i:s',$key).'</td>
    <td><a class="button" id="alchem-restore-btn" data-key="'.$key.'" href="#"><i class="fa fa-refresh"></i> '.__('Restore', 'alchem-pro').'</a></td>
    <td><a class="button" id="alchem-delete-btn" data-key="'.$key.'" href="#"><i class="fa fa-remove"></i> '.__('Delete', 'alchem-pro').'</a></td>
  </tr>';
	echo $list_item;
	}
 add_action('wp_ajax_alchem_options_backup', 'alchem_options_backup');
 add_action('wp_ajax_nopriv_alchem_options_backup', 'alchem_options_backup');
 
/**
// delete alchem options backup
*/
 function alchem_options_backup_delete(){
	if( isset($_POST['key'])){
		$key  = $_POST['key'];
		delete_option( 'alchem_options_backup_'.$key );
		$keys = get_option('alchem_options_backup');
   	    
		foreach ($keys as $k=>$v)
		{
			
		   if ($v == $key){
		     unset($keys[$k]);
		   }
		}
	    update_option('alchem_options_backup',$keys,'','no');
	
		}
	
	}
 add_action('wp_ajax_alchem_options_backup_delete', 'alchem_options_backup_delete');
 add_action('wp_ajax_nopriv_alchem_options_backup_delete', 'alchem_options_backup_delete');
 
 /**
// restore alchem options backup
*/
 function alchem_options_backup_restore(){
	if( isset($_POST['key'])){
		$key = $_POST['key'];
		$options        = get_option( 'alchem_options_backup_'.$key );
		$option_name    = alchem_get_textdomain();
	    
 if( is_array( $options ) && $options != null ):
	foreach( $options  as $k => $v ){
	
		if( isset( $options[$k] ) && $v !='' ){
			
			set_theme_mod( $k, $v );
			
			}
		
		}
		endif;
		
		_e('Restore successfully.', 'alchem-pro' ) ;
		exit(0);
	
		}
	
	}
 add_action('wp_ajax_alchem_options_backup_restore', 'alchem_options_backup_restore');
 add_action('wp_ajax_nopriv_alchem_options_backup_restore', 'alchem_options_backup_restore');

	
	
	
	
function alchem_excerpt_length( $length ) {
	return 1000;
}
add_filter( 'excerpt_length', 'alchem_excerpt_length', 999 );


add_action('init', 'alchem_html_tags_code', 10);
function alchem_html_tags_code() {
  global $allowedposttags,$allowedtags;

    $allowedposttags["javascript"] = array("src" => array(),"type" => array());
    $allowedposttags["style"] = array("type" => array());
	$allowedposttags["link"] = array("rel" => array(),"href" => array(),"id" => array(),"type" => array(),"media" => array());
	
	$allowedtags["javascript"] = array("src" => array(),"type" => array());
    $allowedtags["style"] = array("type" => array());
	$allowedtags["link"] = array("rel" => array(),"href" => array(),"id" => array(),"type" => array(),"media" => array());

}


//custom widgets

add_action( 'widgets_init', 'alchem_register_widget' );
function alchem_register_widget() {
	register_widget( 'alchem_menu_widget' );
}

class alchem_menu_widget extends WP_Widget
{
	function __construct() {
		$widget_ops = array(
			'classname'   => 'alchem_menu_widget',
			'description' => __( 'Alchem custom menu widget.', 'alchem-pro' ),
			);
		parent::__construct( 'alchem_menu_widget', __( '(Alchem) Custom Menu', 'alchem-pro' ), $widget_ops );
	} # __construct()

	function widget( $args, $instance ) {
		extract( $args );
		$nav_menu =  absint($instance['nav_menu']) ;
		$title    =  esc_attr($instance['title']) ;
		if( $nav_menu> 0 ):
		?>

        <?php echo  $before_widget ;?>
        <?php 
		if( $title != '' ):
		echo $before_title . $title . $after_title;
		endif;
		?>
        
        <?php wp_nav_menu(array('menu'=>$nav_menu));?>
        <?php echo $after_widget;?>

        <?php
		endif;
	} # widget()

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'nav_menu' => '' ) );
		$instance['title'] = $new_instance['title'];
		$instance['nav_menu'] = $new_instance['nav_menu'];
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'nav_menu' => '') );
		$title = $instance['title'];
		$nav_menu = $instance['nav_menu'];
		$menus = wp_get_nav_menus();
		
		?>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'alchem-pro' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu', 'alchem-pro'  ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
            <option value="0">-- <?php _e( 'Select' , 'alchem-pro' ); ?> --</option>
			<?php foreach ( $menus as $menus ) {
				echo '<option value=' . $menus->term_id;
				selected( $nav_menu, $menus->term_id );
				echo ">$menus->name</option>";
			} ?>
			</select>
	<?php
	} # form()
} 