<?php $menu_class = \FRX_THEME\Inc\MENUS::get_instance();
$signin_menu_id = $menu_class->get_menu_id('frx-signin-menu');
$signin_menus= wp_get_nav_menu_items($signin_menu_id);

?>


<div class="hold-signin">


	<div class="container ">	
    <?php get_breadcrumb()?>
	<?php if(!empty($signin_menus) && is_array($signin_menus)){ ?>
			<ul class="signin-topbar">
			<?php
				foreach($signin_menus as $menu_item){
					$addCurrentClass="";
					$menuPageID = get_post_meta( $menu_item ->ID, '_menu_item_object_id', true );
					if($menuPageID ==$post_id){
						$addCurrentClass="active";
					}

					if(!$menu_item->menu_item_parent){
						$child_menu_items = $menu_class->get_child_menu_items($header_menus,$menu_item->ID);
						$has_children = !empty($child_menu_items && is_array($child_menu_items));
						

						if(! $has_children){ ?>

						


						<li class="nav-item ">
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