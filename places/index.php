<?php
/**
 * The main template file
 * 
 * @package frx

 */
?>
<?php
/**
 * The main template file
 * 
 * @package frx

 */
?>
<?php 
 /* $projects = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'order_by' => 'date',
    'order' => 'desc',
  ]);
*/


$slug1 = 'place';
$cat1 = get_category_by_slug($slug1);
if($cat1 !=null){
	$excluded_category = $cat1->term_id;
}

  $projects = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'order_by' => 'date',
    'order' => 'desc',
	'category__not_in'=> $excluded_category
  ]);

  ?>



<?php get_header(); ?>

<div id="primary">
		<main id="main" class="site-main" role="main">
			<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-5 col-lg-4 col-xl-3"> 
				
				<?php get_template_part('template-parts/sidebar-content'); ?>
				
				</div>
				<div class="col-sm-12 col-md-7 col-lg-8 col-xl-9">
  				
				<div class="hold-header onindex">
				
					<?php $page_for_posts = get_option( 'page_for_posts' );?>
					
					
				</div>
				<div class="single-page-content">
				<?php
					// Display the content of the static posts Page.
					// This is just an example using setup_postdata().
					$post = get_queried_object();
					setup_postdata( $post );
					the_content();
					wp_reset_postdata();
					?>
				</div>
			<?php
			if($projects->have_posts()):
				?>
				<div class="project-tiles">
				<div class="card-columns">
				<?php 
					
					 
					while($projects->have_posts()) : $projects->the_post();
				?>
				
				<?php get_template_part('template-parts/content'); ?>
				
				<?php 
					endwhile;
				?>
			</div>	
				</div>
			<?php wp_reset_postdata(); ?>	
			<?php else: ?>
				
			<?php get_template_part('template-parts/content-none'); ?>
			<?php endif;?>	
			</div>
			</div>
		</main>
	</div>

<?php

get_footer();?>



<?php /*

$slug1 = 'place';
$cat1 = get_category_by_slug($slug1);
if($cat1 !=null){
	$excluded_category = $cat1->term_id;
}

  $projects = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'order_by' => 'date',
    'order' => 'desc',
	'category__not_in'=> $excluded_category
  ]);

  ?>





<?php get_header(); ?>

<div id="primary">
		<main id="main" class="site-main" role="main">
			<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-5 col-lg-4 col-xl-3"> 
				
				<?php get_template_part('template-parts/sidebar-content'); ?>
				
				</div>
				<div class="col-sm-12 col-md-7 col-lg-8 col-xl-9">
  				
				<div class="hold-header">
				<h1 id="main-header" class="mt-3"><?php echo single_post_title();?></h1>
					<?php $page_for_posts = get_option( 'page_for_posts' );?>
					
				
				</div>
				<div class="single-page-content">
				<?php
					// Display the content of the static posts Page.
					// This is just an example using setup_postdata().
					$post = get_queried_object();
					setup_postdata( $post );
					the_content();
					wp_reset_postdata();
					?>
				</div>
			<?php
			if($projects->have_posts()):
				?>
				<div class="row project-tiles">
				<?php 
					
					 
					while($projects->have_posts()) : $projects->the_post();
				?>
				
				<?php get_template_part('template-parts/content'); ?>
				
				<?php 
					endwhile;
				?>
			</div>	
			<?php wp_reset_postdata(); ?>	
			<?php else: ?>
				
			<?php get_template_part('template-parts/content-none'); ?>
			<?php endif;?>	
			</div>
			</div>
		</main>
	</div>

<?php

get_footer(); */?>
