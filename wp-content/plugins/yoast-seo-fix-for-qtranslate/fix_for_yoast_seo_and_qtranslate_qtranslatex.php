<?php
/**
 * Plugin Name: Fix for Yoast SEO and qTranslate
 * Plugin URI: http://wordpress.org
 * Description: It runs filter that wraps $title and meta into __() and fixes Yoast SEO plugin that outputs all languanges at once
 * Version: 1.2.4
 * Author: Luka Petrovic
 * Author URI: http://smartweb.rs
 * License: GPL2
 */
 
add_filter('wpseo_title','fysq_qtranslate_filter',10,3);
function fysq_qtranslate_filter($title)
{
	return __($title);
}
add_filter('wpseo_metadesc','fysq_qtranslate_filter_desc',10,3);

function fysq_qtranslate_filter_desc($metadesc)
{
	return __($metadesc);
}
?>
