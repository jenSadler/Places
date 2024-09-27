<?php
/**
 * The main template file
 * 
 * @package frx

 */
?>
<?php 
 
?>


<?php get_header(); ?>
<div id="primary">
		<main id="main" class="site-main" role="main">
		<?php if(have_posts()): ?>
			<div class="container">
				<?php while(have_posts()): the_post(); ?>
					
						<?php the_content();?>
				<?php endwhile; ?>
			</div>
		<?php endif ?>
		<div class="container">
			<div class="row">
			
			
			<?php
			 $modules = new WP_Query([
				'post_type' => 'post',
				'posts_per_page' => -1,
				'category_name'=>'special-module'
				
			  ]);
			if($modules->have_posts()):
				?>
				<div class="row project-tiles">
				<?php 
					
					 
					while($modules->have_posts()) : $modules->the_post();
				?>
				
				<?php get_template_part('template-parts/content'); ?>
				
				<?php 
					endwhile;
				?>
				
			</div>	
				
			<?php else: ?>
				
			<?php get_template_part('template-parts/content-none'); ?>
			<?php endif;?>	
			<?php wp_reset_postdata(); ?>
			</div>
			</div>
		</main>
	</div>

<?php

get_footer();