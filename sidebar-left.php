<?php if(is_single()):?>
<a href="http://www.amazon.co.jp/exec/obidos/ASIN/4873116783/yogawa05-22/ref=nosim/" name="amazletlink" target="_blank"><img src="http://ecx.images-amazon.com/images/I/51dJyHCuBhL._SL160_.jpg" alt="詳解 WordPress" style="border: none;" />詳解 WordPress</a>

<a href="http://www.amazon.co.jp/exec/obidos/ASIN/4797383097/yogawa05-22/ref=nosim/" name="amazletlink" target="_blank"><img src="http://ecx.images-amazon.com/images/I/51y35l-LhEL._SL160_.jpg" alt="基礎からのWordPress　改訂版 (BASIC LESSON For Web Engineers)" style="border: none;" />基礎からのWordPress　改訂版</a>




<?php endif;?>

<aside class="aside_none_area">
    <h2 class="main_title">ピックアップ</h2>
    <div class="inner">
        <ul>
        <?php $sticky = implode(",",get_option('sticky_posts'));?>
        <?php $news = get_posts("posts_per_page=5&include=$sticky");?>
        <?php foreach($news as $post):?>
        <?php setup_postdata($post);?>
        <li style="font-size:0.7rem;margin-bottom:20px;line-height:1.4;">
            <p><a href="<?php the_permalink();?>"><img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'article-thumb'); echo $image_url[0]; ?>"></a></p>
            <p class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
        </li>
        <?php endforeach;?>
        <?php wp_reset_postdata();?>
        </ul>
    </div>
</aside>

<?php dynamic_sidebar('sidebar-left'); ?>