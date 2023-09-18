<?php
if( !class_exists('Magee_Animation') ):
class Magee_Animation {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

		add_shortcode( 'ms_animation', array( $this, 'render' ) );

	}

	/**
	 * Render the shortcode
	 * @param  array $args	 Shortcode paramters
	 * @param  string $content Content between shortcode
	 * @return string		  HTML output
	 */
	function render( $args, $content = '') {
		$defaults = Magee_Core::set_shortcode_defaults(
			array(
				'class'		=> '',			
				'id'		=> '',
				'animation_speed' => '0.5',
				'animation_type' => 'bounce',
				'image_animation' =>'no'
			), $args 
		);

		extract( $defaults );

		self::$args = $defaults;
		
	  $animation = 'data-animationduration="'.$animation_speed.'" data-animationtype="'.$animation_type.'" data-imageanimation="'.$image_animation.'"';
	 
	  $html = '<div class="magee-animated '.$class.'" '.$animation.' id="'.$id.'">'.do_shortcode( Magee_Core::fix_shortcodes($content)).'</div>';
	 
	 return $html;

	}

}

new Magee_Animation();
endif;