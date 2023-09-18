<?php
 	/*	
	*	Magee Menu Options
	*	---------------------------------------------------------------------
	* 	@version	2.2
	* 	@author		Magee
	* 	@link		http://www.mageewp.com
	* 	@copyright	Copyright (c) MageeWP
	*	---------------------------------------------------------------------
	*/
class Magee_Menu_Options {
	function __construct() {
		add_action( 
			'init', 
			array( $this, 'textdomain' )
		);
		
		add_filter( 
			'wp_setup_nav_menu_item', 
			array( $this, 'magee_add_menuimage' )
		);
		add_filter( 
			'wp_setup_nav_menu_item', 
			array( $this, 'magee_add_columns' )
		);
		add_filter( 
			'wp_setup_nav_menu_item', 
			array( $this, 'magee_add_text' )
		);
		add_filter( 
			'wp_setup_nav_menu_item', 
			array( $this, 'magee_add_link' )
		);
		add_filter( 
			'wp_setup_nav_menu_item', 
			array( $this, 'magee_add_on_off' )
		);
		add_action( 
			'wp_update_nav_menu_item', 
			array( $this, 'magee_update_custom_nav_fields'), 
			10, 
			3 
		);
		
		add_filter(
			'wp_edit_nav_menu_walker', 
			array( $this, 'magee_edit_walker'), 
			10, 
			2
		);

	}

	public function textdomain() {

	}

	function magee_add_menuimage( $menu_item ) {
	    $menu_item->menuimage = get_post_meta( $menu_item->ID, '_menu_item_menuimage', true );
	    return $menu_item;
	}
	function magee_add_columns($menu_item){
	$menu_item->columns = get_post_meta( $menu_item->ID, '_menu_item_columns', true );
	return $menu_item;
	}
	function magee_add_text($menu_item){
	$menu_item->notext = get_post_meta( $menu_item->ID, '_menu_item_notext', true );
	return $menu_item;
	}
	function magee_add_link($menu_item){
	$menu_item->nolink = get_post_meta( $menu_item->ID, '_menu_item_nolink', true );
	return $menu_item;
	}
	function magee_add_on_off($menu_item){
	$menu_item->on_off = get_post_meta( $menu_item->ID, '_menu_item_on_off', true );
	return $menu_item;
	}
	
	
	
	function magee_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	  if(!isset($menu_id) && !isset($menu_item_db_id)){return;}
	  $_REQUEST['menu-item-menuimage'] = isset($_REQUEST['menu-item-menuimage'])?$_REQUEST['menu-item-menuimage']:"";
	    if ( is_array( $_REQUEST['menu-item-menuimage']) ) {
	        $menuimage_value = $_REQUEST['menu-item-menuimage'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_menuimage', $menuimage_value );
	    }
		     
	        $columns_value = isset($_REQUEST['menu-item-columns'][$menu_item_db_id])?$_REQUEST['menu-item-columns'][$menu_item_db_id]:"";
			if(isset($menu_item_db_id) && isset($columns_value)){
	        update_post_meta( $menu_item_db_id, '_menu_item_columns', $columns_value );
			}
			$_REQUEST['menu-item-notext'][$menu_item_db_id] = isset($_REQUEST['menu-item-notext'][$menu_item_db_id])?$_REQUEST['menu-item-notext'][$menu_item_db_id]:"";
			$_REQUEST['menu-item-nolink'][$menu_item_db_id] = isset($_REQUEST['menu-item-nolink'][$menu_item_db_id])?$_REQUEST['menu-item-nolink'][$menu_item_db_id]:"";
			
			$notext_value = $_REQUEST['menu-item-notext'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_notext', $notext_value );
			
			$nolink_value = $_REQUEST['menu-item-nolink'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_nolink', $nolink_value );
			
			$on_off_value =isset($_REQUEST['menu-item-on_off'][$menu_item_db_id])?$_REQUEST['menu-item-on_off'][$menu_item_db_id]:"";
			if(isset($menu_item_db_id) && isset($on_off_value)){
	        update_post_meta( $menu_item_db_id, '_menu_item_on_off', $on_off_value );
	   }
	    
	}
	
	function magee_edit_walker($walker,$menu_id) {
		return 'Magee_Nav_Menu_Edit';
	}

}

global $magee_menu_options;
$magee_menu_options = new Magee_Menu_Options();

class Magee_Nav_Menu_Edit extends Walker_Nav_Menu {

	function start_lvl(&$output, $depth = 0, $args = array()) {	
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
	}

	function start_el(&$output, $item, $depth=0, $args=array(),$current_item_id = 0) {
	    global $_wp_nav_menu_max_depth, $wp_registered_sidebars;
	   
	    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
	
	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	    ob_start();
	    $item_id = esc_attr( $item->ID );
	    $removed_args = array(
	        'action',
	        'customlink-tab',
	        'edit-menu-item',
	        'menu-item',
	        'page-tab',
	        '_wpnonce',
	    );
	
	    $original_title = '';
	    if ( 'taxonomy' == $item->type ) {
	        $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
	        if ( is_wp_error( $original_title ) )
	            $original_title = false;
	    } elseif ( 'post_type' == $item->type ) {
	        $original_object = get_post( $item->object_id );
	        $original_title = $original_object->post_title;
	    }
	
	    $classes = array(
	        'menu-item menu-item-depth-' . $depth,
	        'menu-item-' . esc_attr( $item->object ),
	        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
	    );
	
	    $title = $item->title;
	
	    if ( ! empty( $item->_invalid ) ) {
	        $classes[] = 'menu-item-invalid';
	        $title = sprintf( __( '%s (Invalid)', 'alchem-pro' ), $item->title );
	    } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
	        $classes[] = 'pending';
	        $title = sprintf( __('%s (Pending)', 'alchem-pro'), $item->title );
	    }
	
	    $title = empty( $item->label ) ? $title : $item->label;
	
	    ?>
	    <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
	        <dl class="menu-item-bar">
	            <dt class="menu-item-handle">
	                <span class="item-title"><?php echo esc_html( $title ); ?></span>
	                <span class="item-controls">
	                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
	                    <span class="item-order hide-if-js">
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-up-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'alchem-pro'); ?>">&#8593;</abbr></a>
	                        |
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-down-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'alchem-pro'); ?>">&#8595;</abbr></a>
	                    </span>
	                    <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', 'alchem-pro'); ?>" href="<?php
	                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
	                    ?>"><?php _e( 'Edit Menu Item' , 'alchem-pro'); ?></a>
	                </span>
	            </dt>
	        </dl>
	
	        <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
	            <?php if( 'custom' == $item->type ) : ?>
	                <p class="field-url description description-wide">
	                    <label for="edit-menu-item-url-<?php echo $item_id; ?>">
	                        <?php _e( 'URL' , 'alchem-pro' ); ?><br />
	                        <input type="text" 
                            	id="edit-menu-item-url-<?php echo $item_id; ?>" 
                                class="widefat code edit-menu-item-url" 
                                name="menu-item-url[<?php echo $item_id; ?>]" 
                                value="<?php echo esc_attr( $item->url ); ?>" />
	                    </label>
	                </p>
	            <?php endif; ?>
	            <p class="description description-thin">
	                <label for="edit-menu-item-title-<?php echo $item_id; ?>">
	                    <?php _e( 'Navigation Label' , 'alchem-pro' ); ?><br />
	                    <input type="text" 
                        	id="edit-menu-item-title-<?php echo $item_id; ?>" 
                            class="widefat edit-menu-item-title" 
                            name="menu-item-title[<?php echo $item_id; ?>]" 
                            value="<?php echo esc_attr( $item->title ); ?>" />
	                </label>
	            </p>
	            <p class="description description-thin">
	                <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
	                    <?php _e( 'Title Attribute'  , 'alchem-pro'); ?><br />
	                    <input type="text" 
                        	id="edit-menu-item-attr-title-<?php echo $item_id; ?>" 
                            class="widefat edit-menu-item-attr-title" 
                            name="menu-item-attr-title[<?php echo $item_id; ?>]" 
                            value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
	                </label>
	            </p>
	            <p class="field-link-target description">
	                <label for="edit-menu-item-target-<?php echo $item_id; ?>">
	                    <input type="checkbox" 
                        	id="edit-menu-item-target-<?php echo $item_id; ?>" 
                            value="_blank" 
                            name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
	                    <?php _e( 'Open link in a new window/tab' , 'alchem-pro'); ?>
	                </label>
	            </p>
	            <p class="field-css-classes description description-thin">
	                <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
	                    <?php _e( 'CSS Classes (optional)', 'alchem-pro' ); ?><br />
	                    <input type="text" 
                        	id="edit-menu-item-classes-<?php echo $item_id; ?>" 
                            class="widefat code edit-menu-item-classes" 
                            name="menu-item-classes[<?php echo $item_id; ?>]" 
                            value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
	                </label>
	            </p>
	            <p class="field-xfn description description-thin">
	                <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
	                    <?php _e( 'Link Relationship (XFN)', 'alchem-pro' ); ?><br />
	                    <input type="text" 
                        	id="edit-menu-item-xfn-<?php echo $item_id; ?>" 
                            class="widefat code edit-menu-item-xfn" 
                            name="menu-item-xfn[<?php echo $item_id; ?>]" 
                            value="<?php echo esc_attr( $item->xfn ); ?>" />
	                </label>
	            </p>
	            <p class="field-description description description-wide">
	                <label for="edit-menu-item-description-<?php echo $item_id; ?>">
	                    <?php _e( 'Description' , 'alchem-pro'); ?><br />
	                    <textarea 
                        	id="edit-menu-item-description-<?php echo $item_id; ?>" 
                            class="widefat edit-menu-item-description" 
                            rows="3" cols="20" 
                            name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); ?></textarea>
	                    <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'alchem-pro'); ?></span>
	                </label>
	            </p>    
				<?php if($depth == 0){?>
				 <p class="description description-thin">
	                <label for="edit-menu-item-on_off-<?php echo $item_id; ?>">
					<?php _e( 'Enable Magee Menu Options', 'alchem-pro' ); ?>:
 <select name="menu-item-on_off[<?php echo $item_id; ?>]" <?php if($item->on_off){echo 'checked="checked"';}?> id="edit-menu-item-on_off-<?php echo $item_id; ?>" class="widefat edit-menu-item-on_off" > 
					       <?php if($item->on_off != ""){?>
					 <option value="<?php echo esc_attr( $item->on_off); ?>"><?php echo esc_attr( $item->on_off ); ?></option>
					 <?php }?>
						  <option value="no"><?php _e( 'No', 'alchem-pro' ); ?></option>
						  <option value="yes"><?php _e( 'Yes', 'alchem-pro' ); ?></option>
					</select> 
	                </label>
	            </p>
				<?php }?>
				 <p class="description description-thin">
	                <label for="edit-menu-item-notext-<?php echo $item_id; ?>">
	                  <?php _e( 'Disable Text', 'alchem-pro' ); ?>:
					<select name="menu-item-notext[<?php echo $item_id; ?>]" <?php if($item->text){echo 'checked="checked"';}?>  id="edit-menu-item-notext-<?php echo $item_id; ?>" class="widefat edit-menu-item-notext"> 
	                    <?php if($item->notext != ""){?>
					 <option value="<?php echo esc_attr( $item->notext ); ?>"><?php echo esc_attr( $item->notext ); ?></option>
					 <?php }?>
						  <option value="no"><?php _e( 'No', 'alchem-pro' ); ?></option>
						  <option value="yes"><?php _e( 'Yes', 'alchem-pro' ); ?></option>
					</select> 
	                </label>
	            </p>
				
				 <p class="description description-thin">
	                <label for="edit-menu-item-nolink-<?php echo $item_id; ?>">
	                 <?php _e( 'Disable Link', 'alchem-pro' ); ?>: <select name="menu-item-nolink[<?php echo $item_id; ?>]" <?php if($item->nolink){echo 'checked="checked"';}?>   id="edit-menu-item-link-<?php echo $item_id; ?>" class="widefat edit-menu-item-nolink">
					<?php if($item->nolink != ""){?>
					 <option value="<?php echo esc_attr( $item->nolink ); ?>"><?php echo esc_attr( $item->nolink ); ?></option>
					 <?php }?>
						  <option value="no"><?php _e( 'No', 'alchem-pro' ); ?></option>
						  <option value="yes"><?php _e( 'Yes', 'alchem-pro' ); ?></option>
					</select> 
	                    
	                </label>
	            </p>
				
				<?php if($depth == 0){?>
				 <p class="description description-thin">
	                <label for="edit-menu-item-columns-<?php echo $item_id; ?>">
	                    <?php _e( 'Columns' , 'alchem-pro'); ?> :
						
						<select name="menu-item-columns[<?php echo $item_id; ?>]" id="edit-menu-item-columns-<?php echo $item_id; ?>" class="widefat edit-menu-item-columns" >
						  <option value=""><?php _e( 'Default' , 'alchem-pro'); ?></option>
						  <option <?php echo selected($item->columns,2);?> value="2">2</option>
						  <option <?php echo selected($item->columns,3);?> value="3">3</option>
						  <option <?php echo selected($item->columns,4);?> value="4">4</option>
						  <option <?php echo selected($item->columns,5);?> value="5">5</option>
						  <option <?php echo selected($item->columns,6);?> value="6">6</option>
						</select>
	                    
	                </label>
	            </p>
				    <?php }?>
	            <?php
	            /* New fields insertion starts here */
	            ?>      
	            <p class="field-custom description description-wide">
	                <label for="edit-menu-item-menuimage-<?php echo $item_id; ?>">
	                    <?php _e( 'Menu Icon' , 'alchem-pro'); ?><br />
                        <img id="menu-icon-<?php echo $item_id; ?>" src="<?php echo esc_url( $item->menuimage ); ?>" width="50"/><br/>
	                    <input type="hidden" id="edit-menu-item-menuimage-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-menuimage[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menuimage ); ?>" />
                        <a id="bt-icon-add-<?php echo $item_id; ?>" class="button button-primary" <?php if($item->menuimage != ''){ ?>style="display:none;"<?php }?> onclick="getMenuIcon('<?php echo $item_id; ?>');"><?php _e( 'Add an Icon' , 'alchem-pro'); ?></a>
                        <a id="bt-icon-remove-<?php echo $item_id; ?>" class="button button-primary" <?php if($item->menuimage == ''){ ?>style="display:none;"<?php }?> onclick="removeMenuIcon('<?php echo $item_id; ?>');"><?php _e( 'Remove an Icon' , 'alchem-pro'); ?></a> 
	                </label>
	            </p>
	            <?php
	            /* New fields insertion ends here */
	            ?>
	            <div class="menu-item-actions description-wide submitbox">
	                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
	                    <p class="link-to-original">
	                        <?php printf( __('Original: %s', 'alchem-pro'), '<a href="' . esc_url( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
	                    </p>
	                <?php endif; ?>
	                <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
	                echo wp_nonce_url(
	                    add_query_arg(
	                        array(
	                            'action' => 'delete-menu-item',
	                            'menu-item' => $item_id,
	                        ),
	                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                    ),
	                    'delete-menu_item_' . $item_id
	                ); ?>"><?php _e('Remove', 'alchem-pro'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
	                    ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', 'alchem-pro'); ?></a>
	            </div>
	
 <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
 <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
 <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
 <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
 <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
 <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
	        </div><!-- .menu-item-settings-->
	        <ul class="menu-item-transport"></ul>
 <?php
 $output .= ob_get_clean();
	  }
}

add_action( 'admin_init', 'magee_menus_options_scripts' ); 
function magee_menus_options_scripts() { 
	wp_enqueue_script( 'thickbox' ); 
	wp_enqueue_script( 'media-upload' ); 
	wp_enqueue_style( 'thickbox' );
	
}

add_filter("esc_attr", "button_menus_icons", 10, 2);
function button_menus_icons($safe_text, $text) {
	return str_replace("Insert into Post", "Set to Icon", $text);
}
function getSettings(){}
if(!class_exists("MageeMenuWalker")){
	
class MageeMenuWalker extends Walker_Nav_Menu{
	private $menu_column;
	private $menu_child_column;
	private $menu_child_displayed_column;
	
function start_lvl(&$output, $depth = 0, $args =array()) {
        $li_style = isset($li_style)?$li_style:"";
		$indent = str_repeat( "\t", $depth );
		$class  = '';
			
		$output .= "\n$indent<ul class=\"sub-menu sub-menu-".($depth+1)."\"  style=\"".$li_style."\">\n";
	}
function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		
		$columns = $item->columns;
		if(is_numeric($columns) && $columns>0 && $item->on_off == "yes"){
    	$classes[] = "menu_column";
		$classes[] = "menu_column_".$columns;
 		}
		if($item->notext == "yes"){
			$classes[] = "hide-text";
		}
		
        if($item->menuimage != "" ){$classes[] = "menu_icon_item";}
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        //if($item->on_off == "yes"){
		//$output .= $indent . "<li" . $id . $value . $class_names ."><div class='magee_menu_layout' data-columns='".$columns."'>";
		//}else{
		$output .= $indent . "<li" . $id . $value . $class_names .">";
      //   }
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		if($item->nolink == "yes"){
		$attributes .= ' style="text-decoration:none;"';
		}else{
		$permalink = get_permalink($item->ID);
		$attributes .= ! empty( $item->url )? ' href="'   . esc_attr($item->url) .'"' : ' href="'   . esc_attr( $permalink  ) .'"';
		}
		$attributes .= ! empty( $item->menuimage )? ' class="icon_item"' : '';
	
	    $args = (object) $args;
	    $args->before = isset($args->before)?$args->before:"";
		$args->after = isset($args->after)?$args->after:"";
		$args->link_before = isset($args->link_before)?$args->link_before:"";
		$args->link_after = isset($args->link_after)?$args->link_after:"";
		
		$item_output = $args->before;
		
		
		$item_output .= '<a'. $attributes .'>';
		if($item->menuimage != "" ){
		$item_output .= '<span class="menu_icon"><img alt="" src="'.$item->menuimage.'"  /></span>';
		}
		//if($item->notext != "yes"){
		$item->title = isset( $item->title)? $item->title: $item->post_title;
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		//}
		$item_output .= '</a>';
	
	
		$item_output .= $args->after;
		if($item->on_off == "yes"){
		//$item_output .= "<div class='magee_menu_layout' data-columns='".$columns."'>";
	}
	

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function end_el(&$output, $item,$depth = 0,  $args =array()) {
	 //if($item->on_off == "yes"){
	//	 $output .= "</div></li>\n";
	//	}else{
		 $output .= "</li>\n";
      //   }
      
    }
	
}
}

