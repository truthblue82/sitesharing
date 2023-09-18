<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="s4Tc9Lv8QkXPGvOUFw2mqthFGmXSSrr1QVTYEDDGjqQ" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111566306-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-111566306-1');
    </script>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
    <?php

	    $custom_font_woff = alchem_option('custom_font_woff');
		$custom_font_svg  = alchem_option('custom_font_svg');
		$custom_font_eot  = alchem_option('custom_font_eot');
		$is_custom_font   = ( $custom_font_woff  && $custom_font_svg && $custom_font_eot);

	if ( $is_custom_font ): 
	echo  "<style type='text/css'>
	   @font-face {
		font-family: 'selfFont';
		src: url(".esc_url(alchem_option('custom_font_eot')).");
		src:
			url('".esc_url(alchem_option('custom_font_eot'))."?#iefix') format('eot'),
			url(".esc_url(alchem_option('custom_font_woff')).") format('woff'),
			url(".esc_url(alchem_option('custom_font_ttf')).") format('truetype'),
			url('".esc_url(alchem_option('custom_font_svg'))."#selfFont') format('svg');
		font-weight: 400;
		font-style: normal;
		}</style>";
	
 endif; 
?>
<?php wp_head(); ?>
</head>
<?php
 global  $alchem_page_meta,$post,$alchem_banner_position,$alchem_banner_type;
			  
 $layout     = esc_attr(alchem_option('layout','wide'));
 $full_width = isset($alchem_page_meta['full_width'])?$alchem_page_meta['full_width']:'no';
 $wrapper    = '';
 $body_class = '';
 if( $layout == 'boxed' )
 $wrapper    = ' wrapper-boxed container ';
 
 if( $full_width == 'yes' )
 $body_class     = 'page-full-width';
 
// slider
 $alchem_banner_type     = isset($alchem_page_meta['slider_banner'])?$alchem_page_meta['slider_banner']:'0';
 $alchem_banner_position = isset($alchem_page_meta['banner_position'])?$alchem_page_meta['banner_position']:'1';
 if( $alchem_banner_type != '0' && $alchem_banner_type != '' ):
 if( $alchem_banner_position == '2'):
 $body_class   .= ' slider-above-header';
 else:
 $body_class   .= ' slider-below-header';
 endif;
 endif;
 $header_image = get_header_image();
?>
<body <?php body_class($body_class); ?>>
    <div class="wrapper <?php echo $wrapper;?>">   
    <div class="top-wrap">
     <?php if( $header_image ):?>
        <img src="<?php echo esc_url($header_image); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
         <?php endif;?>
         
    <?php if( $alchem_banner_position == '2'):
	           alchem_get_page_slider( $alchem_banner_type );
			   endif;
	?>
        <?php 
		$header_style = absint(alchem_option('header_style','0'));
		get_template_part( 'header-template/header', $header_style );
		
		?>
        
         <?php if( $alchem_banner_position == '1'):
            alchem_get_page_slider( $alchem_banner_type );
			   endif;
	?>
	</div>