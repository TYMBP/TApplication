<?php $this->setLayoutVar('title', 'cms') ?>
<?php $this->setLayoutResourceVar('resouce', '<link rel="stylesheet" href="/css/cms.css" />') ?>
<?php $this->setScriptResourceVar(array('article' => '<script src="/js/article.js"></script>')) ?>

<div id="wrap">
	<div class="cms_page">
		<h3 class="cms_ttl">cms test</h3>
		<p class="account_login"><span class="account_name"><?php echo $this->escape($user['user_name']); ?></span>でログインしてます</p>
		<ul class="cms_account">
			<li><a href="<?php echo $base_url; ?>/account/signout">logout</a></li>
			<li><a href="<?php echo $base_url; ?>/account/signup">ユーザー新規登録</a></li>
			<li><a href="<?php echo $base_url; ?>/cms/edit">新規記事作成</a></li>
		</ul>
		<div id="article_box">
			<ul>
			<?php foreach ($articles as $article): ?>
			<?php echo $this->render('cms/article', array('article' => $article)) ?>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
<input type="hidden" id="token" name="_token" value="<?php echo $this->escape($_token); ?>" />