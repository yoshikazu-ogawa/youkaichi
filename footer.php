<footer id="footer" role="contentinfo">
	<div id="footer_inner">
	
	<?php if(wp_is_mobile()):?>
	<ul class="btn_switch">
		<li><a id="btnPC" href="#">PCサイトを表示</a></li>
		<li><a id="btnSP" href="#">スマホサイトを表示</a></li>
	</ul>
	<?php endif;?>

	<div class="profile">
		<img src="http://yogawa.com/wp-content/uploads/2015/04/yoshikazuogawa.jpg">
		<p>わぃ、おがわ、金沢市在住。プログラムもバリバリ出来るフロントエンドエンジニアを目指している。WordPressと筋トレ、あと最先端ガジェットを弄るのが大好物。</p>
		<a href="https://twitter.com/YoshikazuOgawa" class="twitter-follow-button" data-show-count="false" data-lang="ja" data-size="large">@YoshikazuOgawaさんをフォロー</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>

		<div id="copyright">
		<small>&copy; <?php bloginfo( 'name' ); ?></small>
		</div><!--/copyright-->
		
	</div><!--footer_inner-->
</footer>
<?php wp_footer(); ?>
</body>
</html>