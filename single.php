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
			<div class="article_meta">
				<p class="time"><time datetime="<?php the_time('c'); ?>"><?php the_time('Y-m-d G:i'); ?></time></p>
			</div>
		</header>
		<div class="article_contents">
			<?php the_content();?>
			<?php get_template_part('social');?>
		</div>	
		<div id="article_comment">
			<?php comments_template(); ?>
		</div>
		<footer class="article_footer">
			<div class="category"><span class="genericon genericon-category"></span> <?php the_category(','); ?></div>
			<div class="tag"><span class="genericon genericon-tag"></span> <?php the_tags('');?></div>
		</footer>
	</article>
</main>
<?php endwhile;?>

<?php if(!in_category(253)):?>
<div style="text-align:center;margin:30px 0;">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- yogawa single bottom 336x280 -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:336px;height:280px"
			     data-ad-client="ca-pub-0762896458885754"
			     data-ad-slot="1656919089"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			</div>
<?php endif;?>

<div class="post_link">
	<ul>
		<li><?php previous_post_link('%link','<i class="genericon genericon-previous"></i>'); ?></li>
		<li><a href="<?php echo home_url();?>"><i class="genericon genericon-menu"></i></a></li>
		<li><?php next_post_link('%link','<i class="genericon genericon-next"></i>'); ?></li>
	</ul>
</div>
			
<?php related_posts();?>

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