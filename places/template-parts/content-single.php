<?php
/**
 * Template part for displaying sidbar
 * 
 * @package frx
 */
?>

<style>
    .wp-block-button__link {
background-color: #32373c;
border-radius: 9999px;
background-color: var(--primary-dark);
border-radius: 15px;
}

.wp-block-button__link:hover {
color: white;
background-color: var(--primary-light);
text-decoration: none;
}

.smallWave{
    padding:0 5%;
    border-radius:15px;
    background-color:var(--primary-dark)

}

.sswButton{
    border:6px solid var(--primary-dark);
}

.sswButton .smallWaveIcon{
    color:var(--primary-dark);
}
</style>
<script>
jQuery(document).ready(function() {
	insertWaves(".wave-content-close-button");

});

jQuery.each(holdSurfers , function(index, val) { 
    var thisSurfer = val;
    refreshWaves(thisSurfer);
});
</script>


<?php get_breadcrumb()?>
<h1 id="main-header" class="mt-3">
    <?php the_title() ?> </h1>
</div>

<?php the_content();?>

