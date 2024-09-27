<?php
/**
 * Template part for displaying cards
 * 
 * @package frx
 */

$disabled="";
$isSingle = true;
if(!is_single()){
    $disabled = "disabled";
    $isSingle=false;
}
$tag_html="";

if(has_tag()) {
$tags = get_the_tags();
$tag_html = '<div class="post_tags">';
foreach ( $tags as $tag ) {
	$tag_link = get_tag_link( $tag->term_id );

        $tag_html .= "<a title='{$tag->name} 'class='{$tag->slug}  btn btn-primary button-sm mx-1 my-1 py-0 tag-button ' href='{$tag_link}'>";
        $tag_name = $tag->name;
        if(strlen($tag_name)>10 && $isSingle == false){
            $tag_name = substr($tag_name,0,10) . "...";
        }
        $tag_html .= $tag_name."</a>";
}
$tag_html .= '</div>';
}

echo $tag_html;?>
             