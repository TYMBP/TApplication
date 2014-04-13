<?php $this->setLayoutVar('title', 'ログイン'); ?>
<?php $this->setLayoutResourceVar('resouce', '<link rel="stylesheet" href="/css/signup.css" />') ?>

<div id="wrap">
	
	<h3 class="account_form_ttl">ログイン</h3>
	<p><a href="<?php echo $base_url; ?>/account/signup">ユーザー新規登録</a></p>
	
	<div class="account_form">
		<form action="<?php echo $base_url; ?>/account/authenticate" method="post">
			<input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
			<!--  エラー -->
			<?php if (isset($errors) && count($errors) > 0): ?>
			<?php echo $this->render('errors', array('errors' => $errors)); ?>
			<?php endif; ?>
			
			<div><input type="text" name="user_name" value="<?php echo $this->escape($user_name); ?>"/></div>
			<div><input type="password" name="password" value="<?php echo $this->escape($password); ?>"/></div>
			<div><input type="submit" value="ログイン"/></div>	
		</form>
	</div>

</div>