<?php
/**
 * Template part for displaying sidbar
 * 
 * @package frx
 */
?>

<?php

$slug1 = 'place';
$cat1 = get_category_by_slug($slug1);
if($cat1 !=null){
	$excluded_category1 = $cat1->term_id;
}
$slug2 = 'uncategorized';
$cat2 = get_category_by_slug($slug2); 
$excluded_category2 = $cat2->term_id;

$allExcluded = $excluded_category1 . ",". $excluded_category2;

$catargs = array(
		'taxonomy' => 'category',
		'orderby' => 'term_order',
		'order'=>'ASC',
        'hide_empty'    => '1',
		'hierarchical' =>'1',
		'walker'=> new Walker_Simple_Example,
		'title_li'           => __( '' ),
		'exclude'=> $allExcluded
);
	

?>

<!-- Default checked -->
<?php get_breadcrumb()?>
<h1 id="main-header" class="mt-3"><?php echo single_post_title();?></h1>

<div class="page-list-hold-filter">
<?php get_search_form();?>
</div>

<div class="hold-filter-title">
	<h2>Filter</h2>
</div>


<div class="page-list-hold-filter">

<?php wp_list_categories($catargs); ?>
		

</div>
<?php
class Walker_Simple_Example extends Walker_Category {  

function start_lvl(&$output, $depth=1, $args=array()) {  
	$output .= "\n<ul class=\"cat-list hidden\">\n";
	
}  

function end_lvl(&$output, $depth=0, $args=array()) {  
	$output .= "</ul></div>\n";  
}  

function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {  
	if($depth == 0){
		$output .= "<div class=\"hold-subject\">";  
		$output .= "<h3 class=\"cat-title\" id=\"hold-subject".$item->slug."\"><a href=\"#\" onclick=\"toggleFilterBox('hold-subject".$item->slug."')\">".$item->name."</a></h3>";
	}
	else{
		$cur_cat = "";
		if(is_category()){
			$cur_cat = get_category(get_query_var('cat'),false);
		}
		$output .= "<li class=\"item\">";

		if($cur_cat != "" && $cur_cat->slug == $item->slug){
			$output .= "<label for=\"".$item->slug ."\"><input type=\"checkbox\" id=\"".$item->slug ."\" name=\"cat-value\" value=\"".$item->slug ."\" class=\"cat-list-item\" checked>";
		}
		else{
			$output .= "<label for=\"".$item->slug ."\"><input type=\"checkbox\" id=\"".$item->slug ."\" name=\"cat-value\" value=\"".$item->slug ."\" class=\"cat-list-item\">";
		
		}
		
		$output .= "<span class=\"cat-checkbox-item\"> ".$item->name."</span></label>";
	}	$output .= "</li>";
}  

function end_el(&$output, $item, $depth=0, $args=array()) {  
	$output .= "</li>\n";  
}  
}  ?>

<script>
	function toggleFilterBox(boxToToggle){
		jQuery("#"+boxToToggle).siblings('ul:first').toggleClass("hidden");
	
	}
</script>


<?php /*
class Walker_Year extends Walker_Category {  

function start_lvl(&$output, $depth=1, $args=array()) {  
	$output .= "\n<ul class=\"year-list my-4 mx-0 px-1 py-0\">\n";  
}  

function end_lvl(&$output, $depth=0, $args=array()) {  
	$output .= "</ul>\n";  
}  

function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {  
	if($depth == 0){
		$output .= "<h3 class=\"year-title\">".$item->name."</h3>";
	}
	else{
		$cur_cat = "";
		if(is_category()){
			$cur_cat = get_category(get_query_var('cat'),false);
		}
		$output .= "<li class=\"item my-2\">";

		if($cur_cat != "" && $cur_cat->slug == $item->slug){
			$output .= "<label for=\"".$item->slug ."\"><input type=\"checkbox\" id=\"".$item->slug ."\" name=\"cat-value\" value=\"".$item->slug ."\" class=\"cat-list-item\" checked>";
		}
		else{
			$output .= "<label for=\"".$item->slug ."\"><input type=\"checkbox\" id=\"".$item->slug ."\" name=\"cat-value\" value=\"".$item->slug ."\" class=\"cat-list-item\">";
		
		}
		
		$output .= "<span class=\"cat-checkbox-item\"> ".$item->name."</span></label>";
	}	$output .= "</li>";
}  

function end_el(&$output, $item, $depth=0, $args=array()) {  
	$output .= "</li>\n";  
}  
}  */ ?>