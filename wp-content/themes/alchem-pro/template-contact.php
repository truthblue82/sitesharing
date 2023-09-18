<?php
/*
  Template Name: Contact Page
 */
get_header();
?>
<?php
function set_html_content_type() {
    return 'text/html';
}

global $aio_wp_security;
//process submit contact form here
if (isset($_POST['submitted'])){
    $secure = 1;
    if (array_key_exists('aiowps-captcha-answer', $_POST)) {
        isset($_POST['aiowps-captcha-answer']) ? ($captcha_answer = strip_tags(trim($_POST['aiowps-captcha-answer']))) : ($captcha_answer = '');
        $captcha_secret_string = $aio_wp_security->configs->get_value('aiowps_captcha_secret_key');
        $submitted_encoded_string = base64_encode($_POST['aiowps-captcha-temp-string'] . $captcha_secret_string . $captcha_answer);
        if ($submitted_encoded_string !== $_POST['aiowps-captcha-string-info']) {
            $secure = 0;
        }
    }
    if ($secure) {
        if (trim($_POST['fullname']) !== '') {
            $fullname = trim($_POST['fullname']);
        }
        if (trim($_POST['email']) !== '') {
            $email = trim($_POST['email']);
        }
        if (trim($_POST['company']) !== '') {
            $company = trim($_POST['company']);
        }
        if (trim($_POST['position']) !== '') {
            $position = trim($_POST['position']);
        }
        if (trim($_POST['content']) !== '') {
            $content = trim($_POST['content']);
        }
        
        $swpsmtp_options = get_option( 'swpsmtp_options' );

        //get admin email
        $adminEmail = $swpsmtp_options['from_email_field'];
        //$fp = fopen('./debug.txt','w');
        //fwrite($fp, 'from email:'.$adminEmail);
        //get site's title
        $fromName = strtoupper($swpsmtp_options['from_name_field']);
        //fwrite($fp,'from name:'.$fromName);
        //add information for header, who send email
        $args = array ( 'category_name' => 'reply-mail-template', 
        'order' => 'asc', 'post_status' => array('publish'), 'posts_per_page' => 1 );
        $posts = query_posts( $args );
        $post = $posts[0];
        //fwrite($fp, print_r($post, true));
        
        $subjectConfirm = $post->post_title;
        $subjectConfirm = apply_filters('the_title', $subjectConfirm);
        $subjectConfirm = sprintf($subjectConfirm, $fullname);
        
        $file = file_get_contents('inc/email_form.html', true);
        //fwrite($fp, 'file:'.$file);
        $body = sprintf($file, $email, $email, $fullname, $company, $position, str_replace("\n", "<br/>", $content));
        //fwrite($fp, 'file after:'.$body);
        //fclose($fp);
        $bodyConfirm = $post->post_content;
        $bodyConfirm = apply_filters('the_content',$bodyConfirm);
        $bodyConfirm = sprintf($bodyConfirm, $fullname, str_replace("\n", "<br/>", $content));
        $subject = contact_subject;

        //convert content email to html
        add_filter('wp_mail_content_type', 'set_html_content_type');
        $dateTime = new DateTime();
        $now = $dateTime->format("Y-m-d H:i:s");
        $contactInfo = array(
            'fullname' => $fullname,
            'email' => $email,
            'company' => $company,
            'position' => $position,
            'subject' => $subject,
            'content' => $content,
            'created_time' => $now);
        if(swpsmtp_send_mail( $adminEmail, $subject, $body ) && swpsmtp_send_mail($email, $subjectConfirm, $bodyConfirm)){
            $result = true;
            $fullname = $email = $subject = $content = "";
            $contactInfo['is_send'] = TRUE;
        } else {
            $result = false;
            $contactInfo['is_send'] = FALSE;
        }

        //Store contact information to database for backup
        global $wpdb;
        $table_name = $wpdb->prefix . "contact_info";
        $rows_affected = $wpdb->insert($table_name, $contactInfo);
        remove_filter('wp_mail_content_type', 'set_html_content_type');
        wp_reset_query();
        //fclose($fp);
    }
}
?>
<div class="contact-page">
    <div class="maps">
        <iframe id="location" src="<?php echo bloginfo('template_directory') . '/inc/contact/maps.php'; ?>"></iframe>
    </div>
    <div class="content">
        <div class="container">
            <?php if ($result === true) { ?>
                <div class="row-fluid">
                    <h4 class="red-symbol"><?php echo contact_email_sent_success; ?></h4>							
                    <p class="red-symbol">
                        <?php echo contact_email_thankyou; ?>
                    </p>						
                </div>									
            <?php } ?>
            <div class="contact-form">
                <div class="contact-form-title">
                    <h1 class="">
                    <?php 
                    /*write us*/
                    echo get_the_title(86); 
                    ?>
                    </h1>
                </div>
				
                <form id="contact-form" name="login-form" method="post" action="<?php the_permalink(); ?>">
                    <div class="contact-form-desc">
                        <?php 
                        $post = get_post(86);
                        $content = $post->post_content;
                        echo apply_filters('the_content',$content);
                        ?>
                    </div>
                    <div class="line">
                        <div class="haft">
                            <label><?php echo contact_fullname; ?></label>
                            <input maxlength="200" type="text" name="fullname" id="fullname" class="required span8" value="<?php if ($result == false || $secure == 0) echo $_POST['fullname']; ?>">
                        </div>
                        <div class="haft">
                            <label><?php echo contact_email; ?></label>
                        <input maxlength="80" type="text" name="email" id="email" class="required email span8" value="<?php if ($result == false || $secure == 0) echo $_POST['email']; ?>">
                        </div>
                    </div>
                    
                    <div class="line">
                        <div class="haft">
                            <label><?php echo contact_company; ?></label>
                            <input maxlength="80" type="text" name="company" id="company" class="required span8" value="<?php if ($result == false || $secure == 0) echo $_POST['company']; ?>">
                        </div>
                        <div class="haft">
                            <label><?php echo contact_position; ?></label>
                            <input maxlength="80" type="text" name="position" id="position" class="required span8" value="<?php if ($result == false || $secure == 0) echo $_POST['position']; ?>">
                        </div>
                    </div>
                    
                    <div class="line">
                        <label><?php echo contact_content; ?></label>
                        <textarea name="content" id="content" class="required"><?php if ($result == false || $secure == 0) echo $_POST['content']; ?></textarea>
                    </div>
                    
                    <div class="line">
                    <?php
                    $aio_wp_security->captcha_obj->display_captcha_form_for_contact();
                    if (isset($secure) && $secure == 0) {
                        ?>
                        <label class="error" for="aiowps-captcha-answer" style="display: block;"><?php echo __('Your answer was incorrect - please try again.'); ?></label>
                        <p></p>
                    <?php } ?>
                    </div>
                    
                    <div class="clear-both"></div>
                    <button class="button magee-btn-normal btn-md btn-blue" type="submit" name="submitted"><?php echo contact_send_btn; ?></button>
                    <div class="clear-both"></div>
                </form>						
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        //jQuery("#contact-form").validate();
                        //jQuery.validator.messages.required = '';

                        //changeSizeContact();

//                        jQuery(window).resize(function() {
//                            changeSizeContact();
//                        });
                    });
//                    function changeSizeContact() {
//                        var w = jQuery(".widthselect").width();
//                        jQuery("#fullname").css({width: w});
//                        jQuery("#youremail").css({width: w});
//                        jQuery("#yoursubject").css({width: w});
//                        jQuery("#yourcontent").css({width: w});
//                        jQuery("#aiowps-captcha-answer").css({width: w - 8, padding: "0 4px"});
//                    }
                </script>
            </div>
            <div class="contact-info">
                <div class="contact-info-title">
                    <h1 class="">
                    <?php
                    /*Address*/
                    //echo get_the_title(89);
                    ?>
                    </h1>
                </div>
				
                <div class="contact-info-content">
                    <?php 
                    $post = get_post(89);
                    $content = $post->post_content;
                    echo apply_filters('the_content',$content);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>