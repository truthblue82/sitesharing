<?php
/* Plugin Name: Hamina Contact Info
Plugin URI: http://hamina.vn
Description: Manage contact information for hamina
Version: 1.0
Author: Yen Truong
Author URI: no link
License: free
*/
define( 'CONTACT_INFO_PATH', plugin_dir_url(__FILE__) );

add_action('admin_menu', 'contact_info_settings');

function contact_info_settings() {
    add_menu_page('Contact Infor', 'Contact Infor', 'administrator', 'contact_info_settings', 'contact_info_display_settings');
}

add_action( 'admin_enqueue_scripts', 'contact_info_admin_enqueue_styles');

function contact_info_admin_enqueue_styles() {
    wp_register_style( 'contact-info-style', CONTACT_INFO_PATH . 'css/contact-info-style.css' );
	wp_enqueue_style ( 'contact-info-style' );
}

function set_mail_sent() {
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
        $id = $_REQUEST['id'];
        global $wpdb;
        $table_name = $wpdb->prefix . "contact_info";
        $contact_info = $wpdb->get_results( "SELECT * FROM $table_name WHERE id=$id");
        $contact_info[0]->is_send = true;
        $result = $wpdb->update($table_name, (array) $contact_info[0], array( 'id' => $id ));
        if ($result == true) echo "success";
        else echo "fail";
    }
    die();
}
add_action( 'wp_ajax_set_mail_sent', 'set_mail_sent' );

function delete_contact_infor() {
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
        $id = $_REQUEST['id'];
        global $wpdb;
        $table_name = $wpdb->prefix . "contact_info";
        $result = $wpdb->delete( $table_name, array( 'id' => $id));
        if ($result == true) echo "success";
        else echo "fail";
    }
    die();
}
add_action( 'wp_ajax_delete_contact_infor', 'delete_contact_infor' );

function contact_info_display_settings() {
    wp_register_style( 'contact-info-style', CONTACT_INFO_PATH . 'css/contact-info-style.css' );
    global $wpdb;
    $table_name = $wpdb->prefix . "contact_info";
    $contact_infos = $wpdb->get_results( "SELECT * FROM $table_name ");
?>
<div id="icon-edit" class="icon32 icon32-posts-staff-member"><br></div><h2>Contact Information List</h2>
<div class="wrap">
    <table class="wp-list-table widefat fixed posts contact-info" id="sortable-table">
        <thead>
                <tr>
                        <th class="column-id">ID</th>
                        <th class="column-name">Full Name</th>
                        <th class="column-name">Company</th>
                        <th class="column-email">Email</th>
                        <th class="column-subject">Subject</th>
                        <th class="column-content">Content</th>
                        <th class="column-sent">Sent</th>
                        <th class="column-time">Created time</th>
                        <th class="column-delete">Action</th>
                </tr>
        </thead>
        <tbody data-post-type="product">
            <?php 
            foreach ($contact_infos as $contact_info) {
            ?>
                <tr id="post-<?php echo $contact_info->id; ?>">
                        <td class="column-id"><?php echo $contact_info->id; ?></td>
                        <td class="column-name"><?php echo $contact_info->fullname; ?></td>
                        <td class="column-company"><?php echo $contact_info->company;?></td>
                        <td class="column-email"><?php echo $contact_info->email; ?></td>
                        <td class="column-subject"><?php echo $contact_info->subject; ?></td>
                        <td class="column-content"><?php echo $contact_info->content; ?></td>
                        <td class="column-sent">
                            <?php if ($contact_info->is_send) {
                                echo "<img src=\"" . esc_url( admin_url( 'images/yes.png' ) ) ."\" alt=\"\" /></td>"; 
                            } else {
                                echo "<a href=\"#\"><img id=\"$contact_info->id\" class=\"notsent\"src=\"" . esc_url( admin_url( 'images/no.png' ) ) ."\" alt=\"\"/></a></td>"; 
                            }
                        ?>
                        <td class="column-time"><?php echo $contact_info->created_time; ?></td>
                        <td class="column-delete"><a id="<?php echo $contact_info->id; ?>" class="delete" href="#">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
                <tr>
                        <th class="column-id">ID</th>
                        <th class="column-name">Full Name</th>
                        <th class="column-name">Company</th>
                        <th class="column-email">Email</th>
                        <th class="column-subject">Subject</th>
                        <th class="column-content">Content</th>
                        <th class="column-sent">Sent</th>
                        <th class="column-time">Created time</th>
                        <th class="column-delete">Action</th>
                </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    jQuery(function() {
        jQuery(".notsent").click(function(e){
            var id = this.getAttribute("id");
            that = this;
            if (confirm("Would you like to mark the contact information #" + id + " as sent?")) {
                jQuery.ajax({
                    url: "admin-ajax.php",
                    data: {
                        'action' : 'set_mail_sent',
                        'id' : id
                    },
                    success:function(data) {
                        if (data === "success") {
                            var src = jQuery(that).attr("src");
                            jQuery(that).attr("src", src.replace("no", "yes"));
                        } else {
                            alert("Cannot set as mark!");
                        }
                    },
                    error: function(){
                        alert("Cannot set as mark!");
                    }
                });
            }
            e.preventDefault();
        });
        
        jQuery(".delete").click(function(e){
            var id = this.getAttribute("id");
            var that = this;
            if (confirm("Would you like to delete the contact information #" + id + "?")) {
                jQuery.ajax({
                url: "admin-ajax.php",
                data: {
                    'action' : 'delete_contact_infor',
                    'id' : id
                },
                success:function(data) {
                    if (data === "success") {
                        jQuery(that).parents("tr").fadeOut();
                    } else {
                        alert("Cannot set as mark!");
                    }
                },
                error: function(){
                    alert("Cannot set as mark!");
                }
                });
            };
            e.preventDefault();
        });
    });
</script>
<?php }
?>