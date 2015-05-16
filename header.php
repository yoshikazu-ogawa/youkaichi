<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content=”width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes”/>
<title><?php wp_title ( '|', true,'right' ); ?></title>	
<link rel="Shortcut Icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/genericons/genericons.css">

<script src="<?php bloginfo('template_url'); ?>/js/html5media.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.7.2.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.cookie.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<script>
$("head").append("<meta name='viewport' content="
  +($.cookie("switchScreen") == 1 ? 
    "'width=980'" : 
    "'width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0'")
  +" />");

$(document).ready(function() {
  $("#btnPC, #btnSP").click(function() {
    $.cookie("switchScreen", $(this).attr("id") == "btnPC" ? 1 : 0);
    location.reload();
    return false;
  });
});
</script>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-833034-18', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body>

<header id="header" role="banner">
  <h1 id="logo"><a href="<?php echo home_url();?>"><img src="http://yogawa.com/wp-content/uploads/2015/04/logo.jpg"><span>わぃ、おがわ</span></a></h1>
</header>

<nav id="gnav" role="navigation">
  <ul>
    <li><a href="<?php echo home_url();?>">トップ</a></li>
    <li><a href="http://yogawa.com/article-ranking">人気の記事</a></li>
    <li><a href="http://yogawa.com/category/web/wordpress">WordPress</a></li>
    <li><a href="http://yogawa.com/category/web">WEB関連</a></li>
    <li><a href="http://yogawa.com/category/hobby/drone">ドローン</a></li>
    <li><a href="http://yogawa.com/category/hobby/cat-camera">カメラ・映像</a></li>
    <li><a href="http://yogawa.com/category/cat-beauty">美容・健康</a></li>
  </ul>
</nav>