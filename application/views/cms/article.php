<li class="article_list">
	<div class="article_set">
		<div class="article_date"><?php echo $this->escape($article['created_at']); ?></div>
		<div class="article"><?php echo $this->escape($article['title']); ?></div>
		<div class="article_btn">
			<a href="<?php echo $base_url; ?>/cms/edit/<?php echo $this->escape($article['id']); ?>"><button class="btn">編集</button></a>
			<button id="<?php echo $this->escape($article['id']); ?>" class="deleteBtn" >削除</button>
		</div>
	</div>
</li>