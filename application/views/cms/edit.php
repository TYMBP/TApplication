<?php $this->setLayoutVar('title', '新規登録') ?>
<?php $this->setLayoutResourceVar('resouce', '<link rel="stylesheet" href="/css/cms.css" />') ?>

<div id="wrap">
	<div class="cms_editor">
		<?php if (isset($errors) && count($errors) > 0): ?>
		<?php echo $this->render('errors', array('errors' => $errors)); ?>
		<?php endif; ?>
		<form action="<?php echo $base_url; ?>/cms/<?php echo $this->escape($action); ?><?php if (isset($id)): ?>/<?php echo $this->escape($id) ?><?php endif; ?> " method="post">
			<input type="hidden" id="token" name="_token" value="<?php echo $this->escape($_token); ?>" />
			<div class="cms_fm">
				<input type="text" name="title"
					value="<?php echo $this->escape($title) ?>" />
			</div>
			<div class="cms_fm">
				<select name="category">
					<option value="0">未選択</option>
					<option value="1" <?php if (isset($category)): ?><?php if ($category == 1) echo 'selected'; ?><?php endif; ?>>workshop</option>
					<option value="2" <?php if (isset($category)): ?><?php if ($category == 2) echo 'selected'; ?><?php endif; ?>>plugin</option>
				</select>
			</div>
			<div class="cms_fm">
				<textarea name="body"><?php echo $this->escape($body) ?></textarea>
			</div>
			<div class="cms_fm">
				<input type="submit" value="登録" />
			</div>
		</form>
	</div>
</div>