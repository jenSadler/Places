<?php
/**
 * The main template file
 * 
 * @package frx

 */
?>
<style>

 .hold-ack-top {
background-color: var(--primary-dark);
color: white;
padding: 0;
margin:0;
}

.wp-block-column.ack-top-text.is-layout-flow.wp-block-column-is-layout-flow {
padding: 10% 5%;
}

 .wp-block-image.ack-top-image {
height: 500px;
width:100%;
object-fit: cover;
}
.container{
	margin:0 auto;
}

main#main{
	padding:0;
	margin:0;
}

.wp-block-heading.ack-top-text {
padding: 10%;
}
.wp-block-image.ack-top-image img {
padding: 0;
margin: 0;
opacity: 0.5;
height: 100%;
}

.hold-ack-top {
padding: 5%;
padding: 0;
margin: 0;
}
.wp-block-image.ack-top-image {
margin: 0;
padding: 0;
height:100%;
}

.wp-block-image.alignfull.ack-top-image img, .wp-block-image.ack-top-image.alignwide img {
height: 100%;
}

.wp-block-column.container.is-layout-flow.wp-block-column-is-layout-flow {
margin: 5%;
}

.hold-3-profiles div {
  text-align: center;
}

.ack-profile-name {
  font-size: large;
  font-weight: bold;
  color: var(--primary-light);
  margin-bottom: 0;
}

body h2{
	font-size:xx-large;
	margin-bottom:20px;
	font-weight:bold;
}

.ack-contrib-header{
	color:var(--primary-dark);
}

.ack-hold-contrib-2{
	margin-bottom:20px;
}
	</style>

<?php get_header(); ?>
<div id="primary">
	<main id="main" class="site-main" role="main">
	<?php if(have_posts()): ?>
		
		
			
			<?php while(have_posts()): the_post(); ?>
				
					
					<?php the_content();?>
			<?php endwhile; ?>
	
		<?php endif ?>
	</main>
</div>

<?php get_footer();?>
