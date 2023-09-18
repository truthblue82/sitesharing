<?php
/*	
	*	One page scroll  Portfolio Options
	*	---------------------------------------------------------------------
	* 	@author		Hoothemes
	* 	@link		http://www.hoothemes.com
	* 	@copyright	Copyright (c) hoothemes.com
	*	---------------------------------------------------------------------
	*/
	
	// Portfolio  URL change
add_filter('nimble_portfolio_posttype_slug','handle_nimble_portfolio_posttype_slug');
function handle_nimble_portfolio_posttype_slug(){
return 'project';
}
		
 add_action('init', 'alchem_portfolio_register');
 function alchem_portfolio_register() {

    $portfolio_slug = alchem_option('portfolio_slug','portfolio');
	$labels = array(
		'name' => 'Portfolios',
		'singular_name' => __('Portfolio', 'alchem-pro'),
		'add_new_item' => 'Add New Portfolio',
		'edit_item' => __('Edit Portfolio', 'alchem-pro'),
		'new_item' => __('New Portfolio', 'alchem-pro'),
		'view_item' => 'View Portfolio',
		'all_items' => 'All Portfolios',
		'search_items' => __('Search Portfolio', 'alchem-pro'),
		'not_found' =>  __('Nothing found', 'alchem-pro'),
		'not_found_in_trash' => __('Nothing found in Trash', 'alchem-pro'),
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'menu_icon' =>  get_template_directory_uri() .'/images/portfolio-icon.png',
		'can_export' => true,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 7,
		'rewrite' => array('slug' =>$portfolio_slug, 'with_front' => true),
		'supports' => array('title','editor','thumbnail','excerpt','page-attributes')
	  ); 
 	   
	register_post_type( 'portfolio' , $args );
   }
		register_taxonomy(
			"portfolio-category", array("portfolio"), array(
				"hierarchical" => true,
				"label" => __("Portfolio Categories", 'alchem-pro'), 
				"singular_label" => __("Portfolio Categories", 'alchem-pro'), 
				"rewrite" => true));
		register_taxonomy_for_object_type('portfolio-category', 'portfolio');
		register_taxonomy(
			"portfolio-tag", array("portfolio"), array(
				"hierarchical" => false, 
				"label" => __("Portfolio Tags", 'alchem-pro'), 
				"singular_label" => __("Portfolio Tags", 'alchem-pro'), 
				"rewrite" => true));
				
    register_taxonomy_for_object_type('portfolio-tag', 'portfolio');
		
	
	add_filter("manage_edit-portfolio_columns", "alchem_show_portfolio_columns");	
	function alchem_show_portfolio_columns($columns){
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => __("Title", 'alchem-pro'),
			"portfolio-tag" => __("Portfolio Tags", 'alchem-pro'),
			"portfolio-category" => __("Portfolio Categories", 'alchem-pro'),
			"date" => "date");
		return $columns;
	}
	add_action("manage_posts_custom_column","alchem_portfolio_custom_columns");
	function alchem_portfolio_custom_columns($column){
		global $post;

		switch ($column) {
			case "portfolio-tag":
			echo get_the_term_list($post->ID, 'portfolio-tag', '', ', ','');
			break;
			case "portfolio-category":
			echo get_the_term_list($post->ID, 'portfolio-category', '', ', ','');
			break;
		}
	}	
	
	
