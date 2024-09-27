<?php
	$catSlug = $_POST['category'];
	$search =  $_POST['s'];

  
$slug1 = 'place';
$cat1 = get_category_by_slug($slug1);
if($cat1 !=null){
	$excluded_category = $cat1->term_id;
}

	$ajaxposts = new WP_Query([
	  'post_type' => 'post',
	  'posts_per_page' => -1,
	  'category_name' => $catSlug,
	  's' => $search,
	  'category__not_in'=> $excluded_category
	  
	]);

	$response = '';
  
	if($ajaxposts->have_posts()) {
		$response .= '<div class="card-columns">';
	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();
	 	ob_start(); // Start output buffering
        get_template_part('template-parts/content');
		$response .= ob_get_clean();
		//$response .= get_template_part('template-parts/content');
	  endwhile;
	  $response .="</div>";
	} else {
		//$response .= get_template_part('template-parts/content-none');
		ob_start();
		get_template_part('template-parts/content-none');
		$response .= ob_get_clean();
	}
  
	echo $response;
	exit; ?>