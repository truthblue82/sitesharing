<?php
    $sidebar = esc_attr(alchem_option('left_sidebar_blog_posts'));

	 if ( $sidebar && is_active_sidebar( $sidebar ) ){
	 dynamic_sidebar( $sidebar );
	 }
	 elseif( is_active_sidebar( 'default_sidebar' ) ) {
	 dynamic_sidebar('default_sidebar');
	 }