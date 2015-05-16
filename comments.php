<div id="comments">
<?php
if (!empty($post->post_password)) {
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) return;
}
?>
<?php if ($comments) : ?>
<p class="comments_title"><?php comments_number('コメントはありません', 'コメント１件', 'コメント%件');?></p>

<?php foreach ($comments as $comment) : ?>
<aside class="comments_area">
	<div class="comments_avatar">
	<p><?php echo get_avatar( $comment, 32 ); ?>
	<?php if ($comment->comment_approved == '0') : ?>
	<strong>あなたのコメントは認証待ちです。</strong></p>
	<?php endif; ?>
	</div>

	<div class="comments_text">
	<?php printf('<cite>%s</cite> | ', get_comment_author_link()); ?> <?php echo get_comment_time('Y.m.d G:i'); ?></p>
	<?php comment_text() ?>
	</div>
</aside>	
<?php endforeach; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
<aside class="comment_area">
<h3 class="comment-title">お気軽にコメントどうぞ♪<span>承認後に反映されます</span></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf('コメントを書くには<a href="%s">ログイン</a>が必要です', get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<p>
<?php if ( $user_ID ) : ?>
<?php printf('<a href="%1$s">%2$s</a>としてログインしています', get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="このユーザーからログアウトする">ログアウト &raquo;</a>
<?php else : ?>
<label for="author">名前 <?php if ($req) echo "：必須"; ?></label><br />
<input type="text" class="text-form form-shadow" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /><br />
<!--<label for="email">メールアドレス（公開されません） <?php if ($req) echo "：必須"; ?></label><br />
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /><br />
<label for="url">ホームページURL</label><br />
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /><br />-->
<?php endif; ?>

コメント内容<br />
<textarea name="comment" id="comment" cols="50" rows="10" class="textarea-form form-shadow" tabindex="4"></textarea><br />
<input name="submit" type="submit" id="submit" tabindex="5" value="コメントを送信する" /><br />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php do_action('comment_form', $post->ID); ?>
</p>

</form>
</aside>
<?php endif; ?>
<?php endif; ?>
</div>