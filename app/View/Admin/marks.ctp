<link rel="stylesheet" href="<?php $this->Path->myroot(); ?>css/admin.css">
<div class="row">
		<?php echo $this->Session->flash(); ?>
</div>
<div class="row">
	<h1>參賽者編號:<?=$_GET["id"]?></h1>
	<?php if(sizeOf($marks) == 0) :?>
	<h4>沒有資料</h4>
	<?php else : ?>
	<table width="100%" class="single striped">
		<thead>
			<tr>
				<td class="large-1 medium-1 small-1" id="names">ID</td>
				<td class="large-1 medium-1 small-1" id="names">參賽者編號</td>
				<td class="large-1 medium-1 small-1" >歌唱技巧(40%)</td>
				<td class="large-1 medium-1 small-1" >歌曲詮釋(40%)</td>
				<td class="large-1 medium-1 small-1" >個人台風(10%)</td>
				<td class="large-1 medium-1 small-1" >個人創意(10%)</td>
				<td class="large-1 medium-1 small-1" >評判</td>
				<td class="large-1 medium-1 small-1" >組別</td>
				<td class="large-1 medium-1 small-1" >刪除</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($marks as $key => $mark) : ?>
			<tr>
				<td><?= $mark["Mark"]["id"] ?></td>
				<td><?= $mark["Mark"]["singer_id"] ?></td>
				<td><div><?= $mark["Mark"]["skill"] ?></div></td>
				<td><div><?= $mark["Mark"]["interpretation"] ?></div></td>
				<td><div><?= $mark["Mark"]["style"] ?></div></td>
				<td><div><?= $mark["Mark"]["creativity"] ?></div></td>
				<td><div><?= $mark["User"]["name"] ?></div></td>
				<td><div><?= ($mark["Mark"]["type"]==0)?'獨唱':'合唱'; ?></div></td>
				<td><div><a href="<?php $this->Path->myroot(); ?>admin/deleteMark/<?=$mark['Mark']['id']?>" class="deleteMark btn small red">刪除</a></div></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
	<a href="<?php $this->Path->myroot(); ?>admin" class="btn green">返回</a>
</div>