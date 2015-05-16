<?php if (function_exists('wpp_get_mostpopular')): ?>
<aside class="aside_area">
    <h2 class="main_title">人気記事</h2>
    <div class="inner">
    <?php $args = array(
                'limit' =>5, // 表示する記事数
                'range' => 'daily', // 期間
                'order_by' => 'views', // ソート順（これは閲覧数）
                'post_type' => 'post', // 投稿タイプ（カスタム投稿タイプを表示したくない場合など）
                'thumbnail_width' => 70, // サムネイルの横幅
                'thumbnail_height' => 70, // サムネイルの高さ
                'stats_comments' => 0, // コメントを表示する(1)/表示しない(0)
                'stats_views' => 1, // 閲覧数を表示する(1)/表示しない(0)
                'stats_author' => 0, // 投稿者を表示する(1)/表示しない(0)
                'stats_date' => 0, // 日付を表示する(1)/表示しない(0)
                'stats_date_format' => 'Y.n.j', // 日付のフォーマット
                'stats_category' => 0, // カテゴリを表示する(1)/表示しない(0)
                'wpp_start' => "<ul class='popular_posts'>", // リストの開始タグ
                'wpp_end' => "</ul>", // リストの終了タグ
                'title_length' => 30,
                'stats_views' => 1,
                'post_html' => // HTMLの出力フォーマット
                "
                <li>
                    <div class='img'>{thumb}</div>
                    <p class='title'><a href='{url}'>{title}</a><span class='rank'></span></p>
                </li>
                "
            );
 
            // 関数の実行
            wpp_get_mostpopular($args);?>
    </div>
</aside>
<?php endif; ?>

<?php dynamic_sidebar('sidebar-right'); ?>