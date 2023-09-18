<?php

if( !class_exists('Magee_ProcessSteps') ):
class Magee_ProcessSteps {

	public static $args;
    private  $id;
	private  $column;
	private  $style;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_process_steps', array( $this, 'render' ) );
		add_shortcode( 'ms_process_steps_item', array( $this, 'render_child' ) );
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
				'id' =>'magee-process_steps',
				'class' =>'',
				'style' => 'horizontal', //horizontal,vertical 
				'columns'=>'4',
			), $args
		);
		
		extract( $defaults );
		self::$args = $defaults;
		$this->columns = $columns;
		$this->style  = $style;
		
		if( $this->style == 'vertical' )
		$html  = '<div class="magee-process-steps process-steps-vertical '.esc_attr($class).'" id="'.esc_attr($id).'"><ul>';
		else
		$html  = '<div class="magee-process-steps text-center '.esc_attr($class).'" id="'.esc_attr($id).'"><ul class="row">';
		$html .= do_shortcode( Magee_Core::fix_shortcodes($content));
        $html .= '</ul></div>';				
		return $html;
	} 
	
	
	
	/**
	 * Render the child shortcode
	 * @param  array $args     Shortcode paramters
	 * @param  string $content Content between shortcode
	 * @return string          HTML output
	 */
	function render_child( $args, $content = '') {
		
		$defaults =	Magee_Core::set_shortcode_defaults(
			array(
				'icon' =>'',
				'title' =>'',
			), $args
		);

		extract( $defaults );
		self::$args = $defaults;
		$columns  = $this->columns;
		if( $columns == '3')
		$col = 4;
		else
		$col = 3;
		
		if( $this->style == 'vertical' )
		$html = '<li class="magee-feature-box style2 magee-step-box" style="padding-left: 115px;">
                                                <div class="icon-box icon-circle icon-md center-block" style="">
                                                    <i class="fa '.esc_attr($icon).'"></i>
                                                </div>
                                                <h3>'.esc_attr($title).'</h3>
                                                <p>'.do_shortcode( Magee_Core::fix_shortcodes($content)).'</p>
                                            </li>';
		else
		
        $html = '<li class="magee-feature-box magee-step-box col-md-'.$col.'">
                                                <div class="icon-box icon-circle icon-md center-block" style="">
                                                    <i class="fa '.esc_attr($icon).'"></i>
                                                </div>
                                                <h3>'.esc_attr($title).'</h3>
                                                <p>'.do_shortcode( Magee_Core::fix_shortcodes($content)).'</p>
                                            </li>';
											
											

		return $html;
	}
	
	
}

new Magee_ProcessSteps();
endif;