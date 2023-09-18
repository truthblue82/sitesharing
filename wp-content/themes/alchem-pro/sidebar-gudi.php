<div id="secondary" class="widget-area" role="complementary">
    <div id="search-3" class="widget widget-box widget_search">
        <form role="search" class="search-form" action="<?php echo get_site_url(); ?>">
            <div>
                <input name="s" id="s" value="" placeholder="<?php echo search_text; ?>" type="text">
                <input value="" type="submit">
            </div>          
        </form>
        <span class="seperator extralight-border"></span>
    </div>
    <div class="widget widget-box widget_recent_entries">
    <?php
    $html = "";
    $flag = '';
    $cur_id = $post->ID;
    //check a post is news or not
    if(in_category(7, $post)){
        $new_cat = get_the_category_by_ID(7);
        $new_url = get_permalink(11);
        $html .= "<h2 class='widget-title' ><a href='$new_url' class='active'>$new_cat</a></h2>";
        
        $args = array ( 'category_name' => 'news', 'post_status' => array('publish'), 'posts_per_page' => -1 );
        $posts = get_posts( $args );
        if(count($posts)){
            $html .= "<ul class='leftnav news'>";
            foreach($posts as $pst){
                //print_r($post);
                $link = get_permalink($pst);
                $title = get_the_title($pst);
                if($cur_id === $pst->ID){
                    $html .= "<li><a href='$link' class='active'>$title</a></li>";
                }else
                    $html .= "<li><a href='$link' >$title</a></li>";
            }
            $html .= "</ul>";
        }
        
    }

    $print_cat = get_the_category_by_ID(53);
    $print_url = get_permalink(5);
    $html .= "<h2 class='widget-title printing'><a href='$print_url'>$print_cat</a></h2>";
    //echo $cur_id;
    //printing: printing-packaging-supplies
    $args = array(
        'post_type' => 'post', 
        'orderby' => 'meta_value_num', 
        'meta_key' => 'ordering', 
        'order' => 'asc', 
        'posts_per_page' => 15,
        'tax_query' => array(
              array(
                  'taxonomy' => 'category',
                  'field'    => 'term_id',
                  'terms'    => '53',
              ),
          ),
      );

    $posts = get_posts( $args );
    if(count($posts)){
        $html .= "<ul class='leftnav printing hide'>";
        foreach($posts as $pst){
            $content = $pst->post_content;
            $content = apply_filters('the_content', $content);
            if($content)
                $link = get_permalink($pst);
            else $link = 'javascript:void();';
            $title = get_the_title($pst);
            if($cur_id === $pst->ID){
                $flag = 'printing';
                $html .= "<li><a href='$link' class='active'>$title</a></li>";
            }else
                $html .= "<li><a href='$link' >$title</a></li>";
        }
        $html .= "</ul>";
    }
    /*$categories = get_categories('child_of=53&orderby=name&order=ASC&hide_empty=0');

    if(count($categories)) {
        $html .= "<ul class='leftnav printing hide'>";
        foreach ($categories as $category) {
            // list category link
            $html .= "<li rel='$category->term_id'>$category->name";
            $args = array ( 'category_name' => $category->cat_name, 'orderby' => 'meta_value_num', 'meta_key' => 'ordering', 'order' => 'asc', 'post_status' => array('publish'), 'posts_per_page' => -1 );
            $posts = get_posts( $args );
            if(count($posts)){
                $html .= "<ul>";
                foreach($posts as $pst){
                    //print_r($post);
                    $link = get_permalink($pst);
                    $title = get_the_title($pst);
                    if($cur_id === $pst->ID){
                        $flag = 'printing';
                        $html .= "<li><a href='$link' class='active'>$title</a></li>";
                    }else
                        $html .= "<li><a href='$link' >$title</a></li>";
                }
                $html .= "</ul>";
            }
            $html .= "</li>";
        }
        $html .= "</ul>";
    }*/
    //industriall: 5
    $tape_cat = get_the_category_by_ID(5);
    $tape_url = get_permalink(7);
    $html .= "<h2 class='widget-title tape'><a href='$tape_url'>$tape_cat</a></h2>";
    $args = array(
        'post_type' => 'post', 
        'orderby' => 'meta_value_num', 
        'meta_key' => 'ordering', 
        'order' => 'asc', 
        'posts_per_page' => 15,
        'tax_query' => array(
              array(
                  'taxonomy' => 'category',
                  'field'    => 'term_id',
                  'terms'    => '5',
              ),
          ),
      );

    $posts = get_posts( $args );
    if(count($posts)){
        $html .= "<ul class='leftnav tape hide'>";
        foreach($posts as $pst){
            $content = $pst->post_content;
            $content = apply_filters('the_content', $content);
            if($content)
                $link = get_permalink($pst);
            else $link = 'javascript:void();';
            $title = get_the_title($pst);
            if($cur_id === $pst->ID){
                $flag = 'tape';
                $html .= "<li><a href='$link' class='active'>$title</a></li>";
            }else
                $html .= "<li><a href='$link' >$title</a></li>";
        }
        $html .= "</ul>";
    }
    /*$categories = get_categories('child_of=5&orderby=name&order=ASC&hide_empty=0');
    if(count($categories)){
        $html .= "<ul class='leftnav tape hide'>";
        foreach($categories as $category){
            $html .= "<li rel='$category->term_id'>$category->name";
            $args = array ( 'category_name' => $category->cat_name, 'orderby' => 'meta_value_num', 'meta_key' => 'ordering', 'order' => 'asc', 'post_status' => array('publish'), 'posts_per_page' => -1 );
            $posts = get_posts( $args );
            if(count($posts)){
                $html .= "<ul>";
                foreach($posts as $pst){
                    //print_r($post);
                    $link = get_permalink($pst);
                    $title = get_the_title($pst);
                    if($cur_id === $pst->ID){
                        $flag = 'tape';
                        $html .= "<li><a href='$link' class='active'>$title</a></li>";
                    }else
                        $html .= "<li><a href='$link'>$title</a></li>";
                }
                $html .= "</ul>";
            }
            $html .= "</li>";
        }
        $html .= "</ul>";
    }*/
    if(!in_category(7, $post)){
        $new_cat = get_the_category_by_ID(7);
        $new_url = get_permalink(11);
        $html .= "<h2 class='widget-title' ><a href='$new_url'>$new_cat</a></h2>";
    }
    echo $html;

    ?>
    </div>
</div><!-- #secondary -->
<script type="text/javascript">
    jQuery(document).ready(function(){
        var flag = '<?php echo $flag ?>';
        
        if(flag.length){
            jQuery("ul.leftnav."+flag).removeClass("hide");
            jQuery("h2.widget-title."+flag+" a").addClass("active");
        }
    });
</script>
