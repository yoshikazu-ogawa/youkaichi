<aside class="main_common_area">
    <h2 class="main_common_title">この記事に関連する動画</h2>
    <div class="main_common_inner">
        <ul class="item_list_3">
        <?php if ($related_query->have_posts()):?>
        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink() ?>">
    	    	<img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id, ”, true); echo $image_url[0]; ?>">
    	    	<p><?php the_title();?></p>
             </a>
        </li>
        <?php endwhile; ?>
        
        <?php else: ?>
        <p>関連記事は有りません...</p>
        <?php endif; ?>
        </ul>
    </div>
</aside>