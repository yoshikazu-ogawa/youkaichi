<?php get_header(); ?>

<div id="contents" class="clearfix">


<div id="primary_area">
<div class="main_col">

<?php if (is_home() && !is_paged()) : ?>

<div class="latest_area">
	<ul class="tab">
		<li><a href="#tab1" class="selected">最近の記事</a></li>
		<li><a href="#tab2">人気の記事</a></li>
	</ul>
	<ul class="panel">
		<li id="tab1">
		<?php $my_query = new WP_Query(array('posts_per_page'=>5,'orderby'=>'date','order'=>'DESC','ignore_sticky_posts'=>'true'));if ($my_query->have_posts()):?>
				<?php while($my_query->have_posts()):$my_query->the_post();?>
				<div class='article'>
					<p class="date"><?php the_time('Y年m月d日 G:i'); ?></p>
					<p class="title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></p>
				</div>
				<?php endwhile;endif;?>
				<?php wp_reset_query(); ?>
		</li>
		<li id="tab2">
			<?php if (function_exists('wpp_get_mostpopular')): ?>
    		<?php $args = array(
                'limit' => 5, // 表示する記事数
                'range' => 'daily', // 期間
                'order_by' => 'views', // ソート順（これは閲覧数）
                'post_type' => 'post', // 投稿タイプ（カスタム投稿タイプを表示したくない場合など）
                'thumbnail_width' => 70, // サムネイルの横幅
                'thumbnail_height' => 70, // サムネイルの高さ
                'stats_comments' => 0, // コメントを表示する(1)/表示しない(0)
                'stats_views' => 1, // 閲覧数を表示する(1)/表示しない(0)
                'stats_author' => 0, // 投稿者を表示する(1)/表示しない(0)
                'stats_date' => 0, // 日付を表示する(1)/表示しない(0)
                'stats_date_format' => 'Y年n月j日 G:i', // 日付のフォーマット
                'stats_category' => 0, // カテゴリを表示する(1)/表示しない(0)
                'wpp_start' => "<ul class='popular_posts'>", // リストの開始タグ
                'wpp_end' => "</ul>", // リストの終了タグ
                'stats_views' => 1,
                'post_html' => // HTMLの出力フォーマット
                "
                <div class='article'>
                	<p class='date'>{date}</p>
                    <p class='title'><a href='{url}'>{title}</a></p>
                </div>
                "
            );
 
            // 関数の実行
            wpp_get_mostpopular($args);?>
    		<?php endif; ?>
		</li>
	</ul>
</div>

<script>
$(function(){
    $("ul.panel li:not("+$("ul.tab li a.selected").attr("href")+")").hide()
    $("ul.tab li a").click(function(){
        $("ul.tab li a").removeClass("selected")
        $(this).addClass("selected")
        $("ul.panel li").hide()
        $($(this).attr("href")).show()
        return false
    })
})
</script>

<?php endif;?>

<main class="article_list_area" role="main">
<section>
<h2 class="main_title">新着記事</h2>

<?php $paged = get_query_var( 'paged' ); ?>
<?php query_posts('post_type=post&posts_per_page=15&ignore_sticky_posts=true&orderby=date&paged='.$paged); ?>
<?php if (have_posts()):while ( have_posts()) : the_post(); ?>
<?php $cat = get_the_category();$cat = $cat[0];$cat_name = $cat->cat_name;?>
	<article class="article clearfix">
		<div class="photo_area">
			<a href="<?php the_permalink();?>" rel="bookmark"><?php the_post_thumbnail('article-thumb'); ?></a>
			<?php
				$days = 1; //Newを表示させたい期間の日数
				$today = date_i18n('U');
				$entry = get_the_time('U');
				$kiji = date('U',($today - $entry)) / 86400 ;
				if( $days > $kiji ){
				echo '<span class="btn-attend-new">新着</span>';
				}
			?>
			<p class="label"><?php echo $cat_name;?></p>
		</div>
		<div class="detail_area">
			<h2 class="article_title"><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time class="time" datetime="<?php the_time('c'); ?>"><?php the_time('Y年m月d日 G:i'); ?></time>
			<p><?php echo mb_substr(get_the_excerpt(), 0, 40); ?>...</p>
		</div><!--/.article-inner-->
	</article>
<?php endwhile;endif;?>

<?php include( TEMPLATEPATH . '/pager.php' ); ?>
<?php wp_reset_query(); ?>
</section>
</main>
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