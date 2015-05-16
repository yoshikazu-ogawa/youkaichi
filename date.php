<?php get_header(); ?>

<div id="contents" class="clearfix">

<div id="main">

<div id="center-contents">

<?php breadcrumb(); ?>

<div id="category-wrap">
<h1 id="category-title"><?php the_time('Y年m月'); ?></h1>
<p>「<?php the_time('Y年m月'); ?>」の記事一覧です。</p>
</div>

<main role="main">
<?php if(have_posts()): while(have_posts()):the_post();?>
	<article class="article clearfix">
		<header>
			<h1 class="title"><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header>
		<div class="article-inner clearfix">
			<div class="article-photo">
				<a href="<?php the_permalink();?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
			</div>
			<div class="article-text">
				<span class="date"><time datetime="<?php the_time('c'); ?>"><?php the_time('Y年m月d日 G:i'); ?></time></span>
				<?php echo mb_substr(get_the_excerpt(), 0, 55); ?>...
				<p class="btn-more"><a href="<?php the_permalink();?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/images/more-btn.png" width="80" height="25" alt="続きを読む"></a></p>
			</div><!--/.article-text-->
		</div><!--/.article-inner-->
	</article>
<?php endwhile;endif;?>
</main>

<?php get_template_part('pager');?>

</div><!--/center-contents-->

<?php include(TEMPLATEPATH . '/sidebar-left.php');?>

</div><!--/#main-->

<?php include(TEMPLATEPATH . '/sidebar-right.php');?>

</div><!--/#contents-->

<?php get_footer(); ?>