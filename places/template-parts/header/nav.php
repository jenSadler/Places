<?php 

/** 
 * Navigation Template Part
 * @package frx
 * 
 * 
 * */
$menu_class = \FRX_THEME\Inc\MENUS::get_instance();
$header_menu_id = $menu_class->get_menu_id('frx-header-menu');
$header_menus= wp_get_nav_menu_items($header_menu_id);
global $post;
$post_id ="";
if(!is_404() && !is_search()){
$object = get_queried_object();
$post_id =  $object->ID;
}
?>

<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">	
	
	<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
		
		<?php
			$site_title = get_bloginfo( 'name' );
			echo $site_title;
		?>
		
	</a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<?php
		
		if(!empty($header_menus) && is_array($header_menus)){ ?>
			<ul class="navbar-nav">
			<?php
				foreach($header_menus as $menu_item){
					$addCurrentClass="";
					$menuPageID = get_post_meta( $menu_item ->ID, '_menu_item_object_id', true );
					if($menuPageID ==$post_id){
						$addCurrentClass="active";
					}

					if(!$menu_item->menu_item_parent){
						$child_menu_items = $menu_class->get_child_menu_items($header_menus,$menu_item->ID);
						$has_children = !empty($child_menu_items && is_array($child_menu_items));
						

						if(! $has_children){ ?>

						


						<li class="nav-item px-3">
							<a class="nav-link <?php echo $addCurrentClass;?>" href="<?php echo esc_url($menu_item->url);?>"><?php echo esc_html($menu_item->title);?></a>
						</li>
						<?php
						}
						else{
						?>
					<li class="nav-item dropdown">
        				<a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url)?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo esc_html($menu_item->title); ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php foreach($child_menu_items as $child_menu_item){?>
						<a class="dropdown-item <?php echo $addCurrentClass;?>" href="<?php echo esc_url($child_menu_item->url)?>"><?php echo(esc_html($child_menu_item->title))?></a>
							<?php } ?>
					</div>
      </li>
						<?php	
					}
					?>



			

					<?php
					}
				}
			?>
			
			</ul>
	
		<?php } ?>	
		
		
	</div>
	</div>
</nav>
<!--<div class="container mt-3 mb-3">

			</div> -->
<?php wp_reset_postdata();?>