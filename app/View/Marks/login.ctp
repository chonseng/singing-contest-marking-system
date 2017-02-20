<div id="marking_wrapper" class="purple darken-3">
	<div class="row">
			<?php echo $this->Session->flash(); ?>
	</div>
	<div class="row">
		<div class="login_logo"></div>
		<div class="login_title"></div>
	</div>
		<div class="row">

			<div class="marking_login z-depth-2">
				<form action="<?php $this->Path->myroot(); ?>marks/login" id="UserLoginForm" method="post" accept-charset="utf-8">
					<div style="display:none;">
						<input type="hidden" name="_method" value="POST">
					</div>

					<div class="input-field input text">
						<input name="data[User][login]" type="text" id="UserLogin" data-emoji_font="true" style="font-family: Roboto, 'Segoe UI Emoji', 'Segoe UI Symbol', Symbola, EmojiSymbols !important;">
						<label>用戶名</label>
					</div>
					<div class="input-field input password">
						<input name="data[User][password]" type="password" id="UserPassword">
						<label>密碼</label>
					</div>
					<div class="submit">
						<button class="btn waves-effect waves-light purple darken-3" type="submit">登入</button>
					</div>
				</form>
<!-- 

					<?= $this->Form->create("User") ?>


					<?= $this->Form->input("login", array("label"=>false, "placeholder"=>"用戶名")) ?>
					<?= $this->Form->input("password", array("label"=>false, "placeholder"=>"密碼")) ?>



					<?php 
						$options = array(
						    'label' => '登入',
						    'class' => 'login_btn medium large-12 medium-12 small-12'
						);
					?>
					<?= $this->Form->end($options) ?> -->
			</div>
		</div>
</div>