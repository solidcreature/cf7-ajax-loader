<?php
/*
Plugin Name: CF7 AJAX-Loader
Plugin URI: 
Description: Less spam in CF7 with postponed initialiazation via AJAX
Version: 
Author: Nikolay Mironov
Author URI: https://wpfolio.ru
License: 
License URI: 
*/

define( CF7AI_URL, plugin_dir_url( __FILE__ ));
 
//Registering JS-code needed for plugin action
function cf7ai_scripts() {
	$ver = '1.01';
	wp_enqueue_script('cf7ai-js', CF7AI_URL . 'js/script.js', array('jquery'), $ver );
	wp_localize_script('cf7ai-js', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action( 'wp_enqueue_scripts', 'cf7ai_scripts' );


//Registering hooks for ajax-action from our JS
add_action( 'wp_ajax_init_cf7_form', 'get_cf7_htmlcode' );
add_action( 'wp_ajax_nopriv_init_cf7_form', 'get_cf7_htmlcode' );


//Function generates html code for our form
function get_cf7_htmlcode() {
	$form_id = intval( $_POST['form_id'] );

	$shortcode = '[contact-form-7 id="' . $form_id . '"]';
	
	echo do_shortcode($shortcode);

	wp_die();
}

//Regestering new shortcode. Just add "ajax-" at the begining of the existing cf7 shortcode
add_shortcode( 'ajax-contact-form-7', 'cf7ai_shortcode' );

function cf7ai_shortcode( $atts ) {

	$atts = shortcode_atts( [
		'id' => '',
		'offset'  => 300,
	], $atts );

	return '<div class="cf7-init__wrapper" data-id="' . $atts['id'] . '" data-offset="' . $atts['offset'] .'"></div>';
}