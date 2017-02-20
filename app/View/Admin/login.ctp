<link rel="stylesheet" href="<?php $this->Path->myroot(); ?>css/admin.css">
<div class="row">
		<?php echo $this->Session->flash(); ?>
</div>
<div class="row">
		<h2>登入管理系統</h2>
		<form action="<?php $this->Path->myroot(); ?>admin/login" id="AdminLoginForm" method="post" accept-charset="utf-8">
			<div style="display:none;">
				<input type="hidden" name="_method" value="POST">
			</div>

					
			<div class="input-field input text">
				<label for="AdminLogin" class="">用戶名</label>
				<input name="data[Admin][login]" type="text" id="AdminLogin" data-emoji_font="true" style="font-family: Roboto, 'Segoe UI Emoji', 'Segoe UI Symbol', Symbola, EmojiSymbols !important;">
			</div>			
			<div class="input-field input password">
				<label for="AdminPassword" class="">密碼</label>
				<input name="data[Admin][password]" type="password" id="AdminPassword">
			</div>

								
			<div class="submit"><button class="btn amber darken-3" type="submit">登入</button></div></form>
<!-- 			<?= $this->Form->create("Admin") ?>


			<?= $this->Form->input("login", array("label"=>"用戶名")) ?>
			<?= $this->Form->input("password", array("label"=>"密碼")) ?>


			<?php 
				$options = array(
				    'label' => '登入',
				    'class' => 'button medium large-12 medium-12 small-12'
				);
			?>
			<?= $this->Form->end($options) ?> -->
</div>