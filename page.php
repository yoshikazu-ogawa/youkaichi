

<?php get_header(); ?>

<div id="contents" class="clearfix">

<div id="primary_area">
<div class="main_col">

<?php while ( have_posts() ) : the_post(); ?>
<main role="main">
	<?php the_content();?>
</main>
<?php endwhile;?>

</div><!--/main_col-->

<div class="side_col">
<?php get_sidebar( 'left' ); ?>
</div>
</div><!--/primary-->

<div id="secondary_area">
<div class="side_col">
<?php get_sidebar( 'right' ); ?>
</div>
</div><!--/secondary-->

</div><!--/contents-->
<?php get_footer(); ?>