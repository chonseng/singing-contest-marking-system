<div class="row">
		<?php echo $this->Session->flash(); ?>
</div>


<style>
	
	

	.bar {
		background: orange;
	}
	

	table.single tbody tr:nth-child(-n+8) .bar{
		background: lightgreen !important;
	}

	table.multiple tbody tr:nth-child(-n+5) .bar{
		background: lightgreen !important;
	}



</style>
<link rel="stylesheet" href="<?php $this->Path->myroot(); ?>css/admin.css">
<div class="row">

		<h2>獨唱結果</h2>	
		<table width="100%" class="single striped">
			<thead>
				<tr>
					<td class="large-1 medium-1 small-1" style="text-align=center">排名</td>
					<td class="large-1 medium-1 small-1" id="names">參賽者編號</td>
					<td class="large-1 medium-1 small-1" >節奏(25%)</td>
					<td class="large-1 medium-1 small-1" >音準和歌唱技巧(25%)</td>
					<td class="large-1 medium-1 small-1" >發音、咬字(20%)</td>
					<td class="large-1 medium-1 small-1" >感情(20%)+台風(10%)</td>
					<td class="large-6 medium-6 small-6" >總分(100%)</td>
				</tr>
			</thead>
			<tbody>
				<?php $rank_count = 0; $previous = -1; $same = 1;?>
				<?php foreach ($marks0 as $key => $mark) : ?>
				<?php 
					if ($previous != $mark["overall"]) {
						$rank_count+=$same;
						$same = 1;
						$previous = $mark["overall"];
					}
					else {
						$same++;
					}
				?>
				<tr>
					<td><?= $rank_count ?></td>
					<td><?= $mark["singer_id"] ?></td>
					<td><div><?= $mark["skill"] ?></div></td>
					<td><div><?= $mark["interpretation"] ?></div></td>
					<td><div><?= $mark["style"] ?></div></td>
					<td><div><?= $mark["creativity"] ?></div></td>
					<td><div style="width:<?= $mark["overall"]/$users_amount?>%" id="singer<?= $key+1 ?>" class="bar"><?= $mark["overall"]?>&nbsp;(<?= round($mark["overall"]/$users_amount,2) ?>)</div></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

		<h2>合唱結果</h2>	
		<table width="100%" class="multiple striped">
			<thead>
				<tr>
					<td class="large-1 medium-1 small-1" style="text-align=center">排名</td>
					<td class="large-1 medium-1 small-1" id="names">參賽者編號</td>
					<td class="large-1 medium-1 small-1" >節奏(25%)</td>
					<td class="large-1 medium-1 small-1" >音準和歌唱技巧(25%)</td>
					<td class="large-1 medium-1 small-1" >發音、咬字(20%)</td>
					<td class="large-1 medium-1 small-1" >感情(20%)+台風(10%)</td>
					<td class="large-6 medium-6 small-6" >總分(100%)</td>
				</tr>
			</thead>
			<tbody>
				<?php $rank_count = 0; $previous = -1; $same = 1;?>
				<?php foreach ($marks1 as $key => $mark) : ?>
				<?php 
					if ($previous != $mark["overall"]) {
						$rank_count+=$same;
						$same = 1;
						$previous = $mark["overall"];
					}
					else {
						$same++;
					}
				?>
				<tr>
					<td><?= $rank_count ?></td>
					<td><?= $mark["singer_id"] ?></td>
					<td><div><?= $mark["skill"] ?></div></td>
					<td><div><?= $mark["interpretation"] ?></div></td>
					<td><div><?= $mark["style"] ?></div></td>
					<td><div><?= $mark["creativity"] ?></div></td>
					<td><div style="width:<?= $mark["overall"]/$users_amount?>%" id="singer<?= $key+1 ?>" class="bar"><?= $mark["overall"]?>&nbsp;(<?= round($mark["overall"]/$users_amount,2) ?>)</div></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

		<div style="margin-top: 50px;">
		</div>
		<a href="<?php $this->Path->myroot(); ?>admin/logout" class="btn green">登出</a>
		<a href="<?php $this->Path->myroot(); ?>" class="btn green">回首頁</a>
		<div class="row">
      <div class="col s12">
        <div class="card-panel blue">
          <div class="white-text">
          	<h2 class="white-text">操控欄</h2>
						<p>上次更新密碼紙時間：<?=substr($singer["Singer"]["created_at"],0,10)?></p>
						<a href="<?php $this->Path->myroot(); ?>admin/singers" class="btn small green">列印密碼紙</a>
						<a href="<?php $this->Path->myroot(); ?>admin/newsingers" class="btn small red" id="newsingers">更新密碼紙</a>
						<a href="<?php $this->Path->myroot(); ?>admin/deleteall" class="btn small red" id="deleteall">刪除所有資料</a>
          </div>
          <h3 class="white-text">搜尋參賽者分數</h3>
			    <form action="<?php $this->Path->myroot(); ?>admin/marks" method="get">
						<label>參賽者編號<input type="number" name="id"></label>
						<input type="submit" value="搜尋" class="btn small green">
			    </form>
        </div>
      </div>
    </div>
</div>