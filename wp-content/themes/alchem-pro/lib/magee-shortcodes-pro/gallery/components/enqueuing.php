<?php

function magee_enqueue_stuff() {

	wp_enqueue_media();

	wp_enqueue_script( 'fg-admin-script',  MAGEE_URL.'gallery/js/admin.js' );

	wp_localize_script( 'fg-admin-script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

	wp_enqueue_style( 'fg-admin-style', MAGEE_URL.'gallery/css/admin.css' );

}