<?php
class Magee_Table {

	public static $args;
    private  $id;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_table', array( $this, 'render' ) );
	}

	/**
	 * Render the shortcode
	 * @param  array $args     Shortcode paramters
	 * @param  string $content Content between shortcode
	 * @return string          HTML output
	 */
	function render( $args, $content = '') {

		$defaults =	Magee_Core::set_shortcode_defaults(
			array(
				'id' =>'',
				'class' =>'',
				'style' =>'simple',
				'striped' => 'yes'
			), $args
		);
		
		extract( $defaults );
		self::$args = $defaults;
		
		$class .= ' magee-table';
		
		$table_style = ' table';
		if( $style == 'normal')
		$table_style .= ' table-bordered';
		
		if( $striped == 'yes')
		$table_style .= ' table-striped';

		$html = sprintf('<div id="%s" class="%s" data-style="%s">%s</div>',$id,$class,$table_style,do_shortcode( Magee_Core::fix_shortcodes($content)));
		return $html;
	}
	
}

new Magee_Table();