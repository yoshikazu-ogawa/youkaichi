<?php get_header(); ?>

<div id="contents" class="clearfix">

<?php breadcrumb(); ?>

<div id="primary_area">
<div class="main_col">

<main class="article_list_area" role="main">
<section>
<h2 class="main_title">「<?php single_cat_title(); ?>」のタグ</h2>
<?php if (have_posts()):while ( have_posts()) : the_post(); ?>
<?php $cat = get_the_category();$cat = $cat[0];$cat_name = $cat->cat_name;?>
	<article class="article clearfix">
		<div class="photo_area">
			<a href="<?php the_permalink();?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
			<?php
				$days = 1; //Newを表示させたい期間の日数
				$today = date_i18n('U');
				$entry = get_the_time('U');
				$kiji = date('U',($today - $entry)) / 86400 ;
				if( $days > $kiji ){
				echo '<span class="btn-attend-new">新着</span>';
				}
			?>
			<p class="label"><?php echo $cat_name;?><br><?php if ( function_exists ( 'wpp_get_views' ) ) { echo wpp_get_views ( get_the_ID() ); } ?>views</p>
		</div>
		<div class="detail_area">
			<h2 class="article_title"><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time class="time" datetime="<?php the_time('c'); ?>"><?php the_time('Y年m月d日 G:i'); ?></time>
			<p><?php echo mb_substr(get_the_excerpt(), 0, 40); ?>...</p>
			<!--<p class="btn-more"><a href="<?php the_permalink();?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/images/more-btn.png" width="80" height="25" alt="続きを読む"></a></p>-->
		</div><!--/.article-inner-->
	</article>
<?php endwhile;endif;?>

<?php include( TEMPLATEPATH . '/pager.php' ); ?>
<?php wp_reset_query(); ?>
</section>
</main>
</div><!--/main_col-->

<div class="side_col">
<?php include(TEMPLATEPATH . '/sidebar-left.php');?>
</div>
</div><!--/primary-->

<div id="secondary_area">
<div class="side_col">
<?php include(TEMPLATEPATH . '/sidebar-right.php');?>
</div>
</div><!--/secondary-->

</div><!--/contents-->

<?php get_footer(); ?>