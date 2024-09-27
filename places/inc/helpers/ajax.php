<?php

/**
 * Helper
 * 
 * @package frx
 */
/*
namespace FRX_THEME\Inc\Helpers;

function filter_projects() {
	$catSlug = $_POST['category'];

  
	$ajaxposts = new WP_Query([
	  'post_type' => 'post',
	  'posts_per_page' => -1,
	  'category_name' => $catSlug,
	  'orderby' => 'menu_order', 
	  'order' => 'desc',
	]);
	$response = '';
  
	if($ajaxposts->have_posts()) {
	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();
		$response .= get_template_part('template-parts/content');
	  endwhile;
	} else {
	  $response = 'empty';
	}
  
	echo $response;
	exit;
  } ?>*/