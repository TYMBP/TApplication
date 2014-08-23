<?php $this->setLayoutVar('title', 'workshop') ?>
<?php $this->setLayoutResourceVar('resouce', '<link rel="stylesheet" href="/css/workshop.css" />') ?>
<?php $this->setScriptResourceVar(array('article' => '<script src="/js/workshop.js"></script>')) ?>

<div id="wrap">
	<div class="workshop_page">
		<h3 class="workshop_ttl">Workshop</h3>
		<p class="account_login"><span class="account_name">username</span>でログインしてます</p>
		<ul class="workshop_account">
			<li><a href="/">logout</a></li>
		</ul>
		<div id="article_wrapper">
			<?php if (isset($articles)):?>
			<ul>
				<?php foreach ($articles as $article):?>
				<?php echo $this->render('/workshop/article', array('article' => $article)) ?>
				<?php endforeach;?>
			
			</ul>
			<?php endif;?>
		</div>
	</div>
</div>