<link rel="stylesheet" href="<?php $this->Path->myroot(); ?>css/admin.css">
<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>
<div class="singers_wrapper">
	<?php foreach ($singers as $singer) : ?>
	<div class="one_singer">
		<div>參賽編號：<?=$singer["Singer"]["singer_id"]?></div>
		<div>密碼：<span><?=$singer["Singer"]["password"]?><span></div>
		<div>登入以下網址查詢分數：<p>http://goo.gl/e146xZ</p></div>
		<div class="qrcode_wrapper"><img src="<?php $this->Path->myroot(); ?>img/qrcode_mymark.png"></div>
	</div>
	<?php endforeach; ?>
</div>