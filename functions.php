<?php

add_action( 'customize_register', 'themename_customize_register' );

function themename_customize_register($wp_customize) {

    // セクションを追加
    $wp_customize->add_section( 'twentyeleven_logo_image', array(
        'title'          => 'ロゴ',
        'priority'       => 15,
    ) );

    // セクションの動作設定
    $wp_customize->add_setting( 'twentyeleven_logo_image', array(
        'default'        => '',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
    ) );

    // セクションのUIを作成する
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'logo_Image',
        array(
            'label'     => '画像',
            'section'   => 'twentyeleven_logo_image',
            'settings'  => 'twentyeleven_logo_image',
        )
    ) );

}

// アイキャッチ
add_theme_support( 'post-thumbnails' );
add_image_size( 'article-thumb', 200, 150, true );
add_image_size( 'article-icatch', 598, 399, true );

// 管理画面ロゴ
function my_custom_login_logo() {
  echo '<style type="text/css">
h1 a { background-image:url('.get_bloginfo('template_directory').'/images/login-logo.png) !important; }     </style>';
}
add_action('login_head', 'my_custom_login_logo');


// 背景
$youkaichi_custom_background_args = array(
	'default-color' => '#f6f6f6',
	'default-image' => ''
);
add_theme_support( 'custom-background', $youkaichi_custom_background_args );

//ウィジェット
class MyWidgetItem extends WP_Widget {
	function MyWidgetItem() {
    	parent::WP_Widget(false, $name = 'ウィジェットの名前');
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $body = apply_filters( 'widget_body', $instance['body'] );
    	?>
        <li <?php echo 'id="foo"'; ?> >
                <?php if ( $title ) ?>
        	<?php echo $before_title . $title . $after_title; ?>
        	<?php echo '<p>' . $body . '</p>'; ?>
        </li>
        <?php
    }
    function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['body'] = trim($new_instance['body']);
        return $instance;
    }
    function form($instance) {
        $title = esc_attr($instance['title']);
        $body = esc_attr($instance['body']);
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
          <?php _e('サイトに表示されるコンテンツ:'); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
           <label for="<?php echo $this->get_field_id('body'); ?>">
           <?php _e('サイトに表示されるコンテンツ:'); ?>
           </label>
           <textarea  class="widefat" rows="16" colls="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>">
<?php echo $body; ?>
           </textarea>
        </p>
        <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("MyWidgetItem");'));

// Moreリンク
function remove_more_jump_link($link) { 
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// ウィジェット設定
if ( function_exists('register_sidebar') )

        /*ここから2つ目のウィジェット*/
        register_sidebar(array(
        'name' => '左サイドバー',
        'id' => 'sidebar-left',
        'before_widget' => '<aside class="aside_area">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="main_title">',
        'after_title' => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => '右サイドバー',
        'id' => 'sidebar-right',
        'before_widget' => '<aside class="aside_area">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="main_title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'フッター',
        'id' => 'sidebar-footer',
        'before_widget' => '<aside class="aside_area">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="main_title">',
        'after_title' => '</h2>'
    ));

// 不要なサイドバー項目の非表示
add_action( 'admin_menu', 'remove_admin_menu_links' );
function remove_admin_menu_links() {
     //remove_menu_page('index.php'); // ダッシュボード
     //remove_menu_page('edit.php'); // 記事投稿
     //remove_menu_page('upload.php'); // メディア
     remove_menu_page('link-manager.php'); // リンク
     //remove_menu_page('edit.php?post_type=page'); // 固定ページ
     // remove_menu_page('edit-comments.php'); // コメント
     //remove_menu_page('themes.php'); // 外観
     //remove_menu_page('plugins.php'); // プラグイン
     remove_menu_page('users.php'); // ユーザー
     //remove_menu_page('tools.php'); // ツール
     //remove_menu_page('options-general.php'); // 設定
}

//カスタム投稿の月別アーカイブ
global $my_archives_post_type;
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
global $my_archives_post_type;
if ( isset($r['post_type']) ) {
$my_archives_post_type = $r['post_type'];
$where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
} else {
$my_archives_post_type = '';
}
return $where;
}
add_filter( 'get_archives_link', 'my_get_archives_link' );
function my_get_archives_link( $link_html ) {
global $my_archives_post_type;
if ( '' != $my_archives_post_type )
$add_link .= '?post_type=' . $my_archives_post_type;
$link_html = preg_replace("/href=\'(.+)\'\s/","href='$1".$add_link."'",$link_html);

return $link_html;
}

// 不要なP,brを削除
remove_filter('the_content', 'wpautop');

//ぱんくず
function breadcrumb($divOption = array("id" => "breadcrumb", "class" => "clearfix")){
	global $post;
	$str ='';
	if(!is_home()&&!is_admin()){ /* !is_admin は管理ページ以外という条件分岐 */
		$tagAttribute = '';
		foreach($divOption as $attrName => $attrValue){
			$tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
		}
		$str.= '<div'. $tagAttribute .'>';
		$str.= '<ul>';
		$str.= '<li><a href="'. home_url() .'/">トップ</a></li>';
		$str.= '<li>&gt;</li>';

		if(is_category()) {								//カテゴリーのアーカイブページ
			$cat = get_queried_object();
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'</a></li>';
					$str.='<li>&gt;</li>';
				}
			}
			$str.='<li>'. $cat -> name . '</li>';
		} elseif(is_single()){							//ブログの個別記事ページ
			$categories = get_the_category($post->ID);
			$cat = $categories[0];
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor).'">'. get_cat_name($ancestor). '</a></li>';
					$str.='<li>&gt;</li>';
				}
			}
			$str.='<li><a href="'. get_category_link($cat -> term_id). '">'. $cat-> cat_name . '</a></li>';
		} elseif(is_page()){							//固定ページ
			if($post -> post_parent != 0 ){
				$ancestors = array_reverse(get_post_ancestors( $post->ID ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_permalink($ancestor).'">'. get_the_title($ancestor) .'</a></li>';
					$str.='<li>&gt;</li>';
				}
			}
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_date()){							//日付ベースのアーカイブページ
			if(get_query_var('day') != 0){				//年別アーカイブ
				$str.='<li><a href="'. get_year_link(get_query_var('year')). '">' . get_query_var('year'). '年</a></li>';
				$str.='<li>&gt;</li>';
				$str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '">'. get_query_var('monthnum') .'月</a></li>';
				$str.='<li>&gt;</li>';
				$str.='<li>'. get_query_var('day'). '日</li>';
			} elseif(get_query_var('monthnum') != 0){	//月別アーカイブ
				$str.='<li><a href="'. get_year_link(get_query_var('year')) .'">'. get_query_var('year') .'年</a></li>';
				$str.='<li>&gt;</li>';
				$str.='<li>'. get_query_var('monthnum'). '月</li>';
			} else {									//年別アーカイブ
				$str.='<li>'. get_query_var('year') .'年</li>';
			}
		} elseif(is_search()) {							//検索結果表示ページ
			$str.='<li>「'. get_search_query() .'」で検索した結果</li>';
		} elseif(is_author()){							//投稿者のアーカイブページ
			$str .='<li>投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'</li>';
		} elseif(is_tag()){								//タグのアーカイブページ
			$str.='<li>タグ : '. single_tag_title( '' , false ). '</li>';
		} elseif(is_attachment()){						//添付ファイルページ
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_404()){								//404 Not Found ページ
			$str.='<li>404 Not found</li>';
		} else{											//その他
			$str.='<li>'. wp_title('', true) .'</li>';
		}
		$str.='</ul>';
		$str.='</div>';
	}
	echo $str;
}