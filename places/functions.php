<?php 

/**
 * Theme Functions
 * @package frx
 * */

 if(!defined('FRX_DIR_PATH')){
	define('FRX_DIR_PATH', untrailingslashit(get_template_directory()));
}

if(!defined('FRX_DIR_URI')){
	define('FRX_DIR_URI', untrailingslashit(get_template_directory_uri()));
}


require_once (FRX_DIR_PATH . '/inc/helpers/autoloader.php');
require_once (FRX_DIR_PATH . '/inc/helpers/template-tags.php');
//require_once (FRX_DIR_PATH . '/inc/helpers/breadcrumbs.php');
//require_once (FRX_DIR_PATH . '/inc/helpers/ajax.php');


function frx_get_theme_instance(){
	\FRX_THEME\Inc\FRX_THEME::get_instance();
}

frx_get_theme_instance();


add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');
add_action('after_setup_theme', 'remove_admin_bar');



function filter_projects() {
  get_template_part('template-parts/ajax'); } 


function get_breadcrumb() {
  get_template_part('template-parts/breadcrumbs');

}

function website_remove($fields){
	if(isset($fields['url']))
		unset($fields['url']);
	return $fields;
}

function wc_comment_form_change_cookies( $fields ) {
	$commenter = wp_get_current_commenter();

	$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
					 '<label for="wp-comment-cookies-consent">'.__(' Save my name and email in this browser for the next time I comment.', 'textdomain').'</label></p>';
	return $fields;
}

function remove_admin_bar() {
	if (!current_user_can('administrator') && !current_user_can('editor') && !is_admin()) {
	  show_admin_bar(false);
	}
}

// This enables the function that lets you set new image sizes
add_theme_support( 'post-thumbnails' );
// These are the new image sizes we cooked up
add_image_size( 'wave-tiny-thumb', 50 );
add_image_size( 'wa-thumb', 600,400, true );
// Now we register the size so it appears as an option within the editor
add_filter( 'image_size_names_choose', 'my_custom_image_sizes' );
function my_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'wave-tiny-thumb' => __( 'Tiny Thumb' ),
		'wa-thumb' => __( 'Writers Archive Thumb' ),
    ) );
}

?>