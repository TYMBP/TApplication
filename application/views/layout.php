<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title><?php if (isset($title)): echo $this->escape($title); endif; ?></title>
<link rel="stylesheet" type="text/css" href="/css/styles.css" />

<?php if (isset($resouce)): echo $resouce; endif;  ?>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<?php if (isset($script) && count($script) > 0): ?>
<?php foreach ($script as $value): ?>
<?php echo  $value; ?>
<?php endforeach; ?>
<?php endif; ?>

</head>
<body>
<header id="header">
	<h3><a href="<?php echo $base_url; ?>/"><img src="/images/logo.png" /></a></h3>
</header>

  <?php echo $_content; ?>

<footer id="footer">
	<p>copyright&copy;2014 saitakaita</p>
</footer>
</body>
</html>
