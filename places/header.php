<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @package FRX

 */

?>
<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/75452f04da.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>
<div class="overlay hidden"></div>
<div id="page" class="site d-flex flex-column min-vh-100">
	<header id="masthead" class="site-header" role="banner">
		
  			<?php get_template_part( 'template-parts/header/nav' );	?>
	

		
	</header>
	

	
