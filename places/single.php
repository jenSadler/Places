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
			<div class="row">
				
				<div class="col-sm-12 col-md-12 col-lg-12">
				<?php while(have_posts()): the_post(); ?>
			
				<?php get_template_part( 'template-parts/content-single'); ?>
			
				<?php endwhile; ?>
				</div>
			</div>
		</div>
		
		<?php endif; ?>
	</main>
</div>

<?php get_footer();?>
