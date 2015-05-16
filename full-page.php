<?php
/*
Template Name: Full
*/
?>

<?php get_header(); ?>

<div id="contents">

<?php while ( have_posts() ) : the_post(); ?>
<main role="main" class="full_page">
	<?php the_content();?>
</main>
<?php endwhile;?>

</div><!--/contents-->
<?php get_footer(); ?>