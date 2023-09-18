<?php

if( !class_exists('Magee_Pricing') ):
class Magee_Pricing {

	public static $args;
    private  $id;
	private  $style;
	private  $columns;
	

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_pricing', array( $this, 'render' ) );
		add_shortcode( 'ms_pricing_item', array( $this, 'render_child' ) );
		add_shortcode( 'ms_pricing_item_features', array( $this, 'render_features' ) );
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
				'style' =>'flat', //flat,box,table
				'columns'=>'3',
				'color' => '#fdd200',
			), $args
		);
		
		 extract( $defaults );
		 self::$args = $defaults;
		 $this->style = $style;
		 $this->columns = $columns;
		 
		 if($this->style == 'table' ){
		  $class .= ' no-margin';
		  }
		 
		 $class .= ' '.$columns.'_columns';
		 $html   = '<div class="magee-pricing-table row '.$class.'" id="'.$id.'">';
		 $html  .= do_shortcode( Magee_Core::fix_shortcodes(str_replace('<br />','',$content)));
		 $html  .= '</div>';
		
		
										
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
				'icon' => '',
				'title'=>'',
				'price'=>'',
				'currency'=>'',
				'unit'=>'',
				'buttontext'=> __('Buy Now','magee-shortcodes-pro'),
				'buttonlink'=>'#',
				'linktarget'=>'_blank',
				'is_label'=>'no',
				'featured'=>'no',
				'standout'=>'no',
				'color'=>''
			), $args
		);

		extract( $defaults );
		$columns = $this->columns;
		$addclass = uniqid('color');
		$item_class  = '';
		
		if( $columns > 6 || $columns < 2 )
		$columns = 3;
		
		if( $columns == 5 )
		$col = ' col-md-1_'.$columns;
		else
		$col = ' col-md-'.(12/$columns);
	
		$html = '';	
		
		
		 $class_panel = '';
		 $item_class .= $col;	
		 	 
		 
		  if($this->style == 'flat' )
		  $class_panel .= ' magee-pricing-box pricing-box-flat';
		 
		 if($this->style == 'box' )
		  $class_panel .= ' magee-pricing-box';
		  
		  if($this->style == 'table' ){
		  $class_panel .= ' magee-pricing-box';
		  $item_class .= ' no-padding';
		  }
		 
		 if( $featured == 'yes' )
		 $class_panel .= ' featured';
		 
		  if( $standout == 'yes' )
		 $class_panel .= ' standout';
		 
		if( $is_label == 'yes' && $this->style == 'table' ):
		$html .='<div class="magee-pricing-box-wrap col-md-3 no-padding '.$item_class.'">';
			if( $color )
			$html .='<style>
			.'.$addclass.' .pricing-box-flat.featured .magee-btn-normal {background-color:transparent;}
			.'.$addclass.' .pricing-top-icon, .'.$addclass.' .pricing-tag .currency, .'.$addclass.' .pricing-tag .price{color:'.esc_attr($color).';}
			.'.$addclass.'.pricing-box-flat.featured,.'.$addclass.'.featured .panel-heading,.'.$addclass.' .magee-btn-normal,.'.$addclass.' .pricing-box-flat.featured { background-color:'.esc_attr($color).';}
			.'.$addclass.' .magee-btn-normal:hover,.'.$addclass.' .magee-btn-normal:active,.'.$addclass.' .magee-btn-normal:focus{background-color:'.Magee_Core::colourBrightness(esc_attr($color),-0.9).'; }           		 
			</style>';
                                            $html .='<div class="panel panel-default magee-pricing-box '.$addclass.' pricing-box-label text-right">
                                                <div class="panel-heading">
                                                    <div class="pricing-top-icon">
                                                        <i class="fa fa-database"></i>
                                                    </div>
                                                    <h3 class="panel-title prcing-title">&nbsp;</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="pricing-tag">
                                                        <span class="currency">&nbsp; </span><span class="price">&nbsp; </span><span class="unit">&nbsp; </span>
                                                    </div>
                                                    <ul class="pricing-list">';
													
			$html .= do_shortcode( Magee_Core::fix_shortcodes(str_replace('<br />','',$content)));
                                                        
                                                   
            $html .='</ul>
                                               </div>
                                                <div class="panel-footer">
                                                    <a href="#" target="_blank" class="magee-btn-normal"><i class="fa fa-shopping-cart"> &nbsp;</i> &nbsp;</a>
                                                </div>
                                            </div>
                                        </div>';
										
			else:
         $html .='<div class="magee-pricing-box-wrap '.$item_class.'">';
					 if( $color )
						$html .='<style>
						.'.$addclass.' .magee-pricing-box .pricing-box-flat.featured .magee-btn-normal {background-color:transparent;}
						.'.$addclass.' .pricing-top-icon,.'.$addclass.' .pricing-tag .currency,.'.$addclass.' .pricing-tag .price {color:'.esc_attr($color).';}
						.'.$addclass.'.pricing-box-flat.featured,.'.$addclass.'.featured .panel-heading,.'.$addclass.' .magee-btn-normal,.'.$addclass.' .pricing-box-flat.featured { background-color:'.esc_attr($color).';}
						.'.$addclass.' .magee-btn-normal:hover,.'.$addclass.' .magee-btn-normal:active,.'.$addclass.' .magee-btn-normal:focus{background-color:'.Magee_Core::colourBrightness(esc_attr($color),-0.9).'; }           		 
						</style>';
                                            $html .='<div class="panel panel-default text-center '.$class_panel.' '.$addclass.' ">
                                                <div class="panel-heading">
                                                    <div class="pricing-top-icon">
                                                        <i class="fa '.esc_attr($icon).'"></i>
                                                    </div>
                                                    <h3 class="panel-title prcing-title">'.esc_attr($title).'</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="pricing-tag">
                                                        <span class="currency">'.esc_attr($currency).'</span><span class="price">'.esc_attr($price).'</span><span class="unit">'.($unit?esc_attr('/ '.$unit):'').'</span>
                                                    </div>
                                                    <ul class="pricing-list">'.do_shortcode( Magee_Core::fix_shortcodes(str_replace('<br />','',$content))).'</ul>
                                                </div>
                                                <div class="panel-footer">
                                                    <a href="'.esc_url($buttonlink).'" target="'.esc_attr($linktarget).'" class="magee-btn-normal">'.do_shortcode($buttontext).'</a>
                                                </div>
                                            </div>
                                        </div>';
	
		endif;
		return $html;
	}
	
	function render_features( $args, $content = '') {
		
		$defaults =	Magee_Core::set_shortcode_defaults(
			array(
				
			), $args
		);

		extract( $defaults );
		
		$html = '<li>'.do_shortcode( Magee_Core::fix_shortcodes($content)).'</li>';
		return $html;
	}
	
}

new Magee_Pricing();
endif;