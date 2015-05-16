<?php
/*
Template Name: WP
*/
?>

<?php get_header(); ?>

<div id="contents" class="clearfix">

<div id="primary_area">
<div class="main_col">

<?php while ( have_posts() ) : the_post(); ?>
<main role="main">
	<article class="article_area">
		<header class="article_header">
			<img class="full_img" src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'article-icatch'); echo $image_url[0]; ?>">
			<h1 class="article_title"><?php the_title(); ?></h1>
		</header>
		<div class="article_contents">
			<?php the_content();?>
			<?php get_template_part('social');?>
		</div>	
		<div id="article_comment">
			<?php comments_template(); ?>
		</div>
	</article>
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