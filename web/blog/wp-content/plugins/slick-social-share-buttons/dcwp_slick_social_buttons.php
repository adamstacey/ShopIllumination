<?php
/*
		Plugin Name: Slick Social Share Buttons
		Plugin URI: http://www.designchemical.com/blog/index.php/wordpress-plugins/wordpress-plugin-slick-social-share-buttons/
		Tags: social media, facebook, linkedin, twitter, google+1, google buzz, digg, social networks, bookmarks, buttons, animated, jquery, flyout, drop down, floating, sliding
		Description: Slick social share buttons adds facebook, twitter, google +1, google buzz, linkedin, digg, and stumbleupon social media buttons in a floating or slide out tab.
		Author: Lee Chestnutt
		Version: 1.3
		Author URI: http://www.designchemical.com
*/

global $registered_skins;

class dc_jqslicksocial {

	function dc_jqslicksocial(){
		global $registered_skins;
	
		if(!is_admin()){
			// Header styles
			add_action( 'wp_head', array('dc_jqslicksocial', 'header') );
			// Scripts
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'gasocial', dc_jqslicksocial::get_plugin_directory() . '/js/ga.social_tracking.js', array('jquery') );
			wp_enqueue_script( 'jqueryeasing', dc_jqslicksocial::get_plugin_directory() . '/js/jquery.easing.js', array('jquery') );
			wp_enqueue_script( 'jqueryhoverintent', dc_jqslicksocial::get_plugin_directory() . '/js/jquery.hoverIntent.minified.js', array('jquery') );
			wp_enqueue_script( 'jqueryfloater', dc_jqslicksocial::get_plugin_directory() . '/js/jquery.social.float.1.3.js', array('jquery') );
			wp_enqueue_script( 'jqueryslick', dc_jqslicksocial::get_plugin_directory() . '/js/jquery.social.slick.1.0.js', array('jquery') );
			
			add_filter('language_attributes', array('dc_jqslicksocial','OpenGraph'));
			add_filter('language_attributes', array('dc_jqslicksocial','FGraph'));
		
			// Shortcodes
			add_shortcode( 'dcssb-link', 'dcssb_share_link_shortcode' );
		}
		add_action( 'wp_footer', array('dc_jqslicksocial', 'footer') );
		
		$registered_skins = array();
	}

	function header(){
		//echo "\n\t";
		dc_jqslicksocial_buttons::dcssb_styles();
		dc_jqslicksocial_buttons::dcssb_opengraph();
	}
	
	function footer(){
		//echo "\n\t";
		
		$dcjqslicksocial_buttons = new dc_jqslicksocial_buttons();
	}
	
	function get_plugin_directory(){
		return WP_PLUGIN_URL . '/slick-social-share-buttons';	
	}
	
	/* OpenGraph Support */
	function OpenGraph($attr) {
        $attr .= "\n xmlns:og='http://opengraphprotocol.org/schema/'"; 
		return $attr;
	}
	
	function FGraph($attr) {
		$attr .= "\n xmlns:fb='http://www.facebook.com/2008/fbml'";
		return $attr;
	}
};

require_once('inc/dcwp_admin.php');
require_once('inc/dcwp_social.php');

if(is_admin()) {

	$dc_jqslicksocial_admin = new dc_jqslicksocial_admin();

}

// Initialize the plugin.
$dcjqslicksocial = new dc_jqslicksocial();

/**
* Create a link shortcode for opening/closing the form
*/
function dcssb_share_link_shortcode($atts){
	
	extract(shortcode_atts( array(
		'text' => 'Share',
		'action' => 'link'
	), $atts));

	return "<a href='#' class='dcssb-$action'>$text</a>";

}
?>