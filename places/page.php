<?php
/**
 * The main template file
 * 
 * @package frx

 */
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
	</main>
</div>

<?php get_footer();?>
