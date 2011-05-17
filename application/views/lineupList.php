<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>2011 Lineup Lists</title>

<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="header">
		<img src="/style/images/thmc_baseball_logo.gif" alt="thmc baseball" />
	</div>
	<div class="content">
		<div class="data lineupdata">
			<h1>Game Line-up</h1>
			<table>
				<tbody>
				<tr>
					<th valigh="top">id</th>
					<th valigh="top">순번</th>
					<th valigh="top">선수이름</th>
					<th valigh="top">백넘버</th>
					<th valigh="top">포지션</th>
					<th valigh="top">상대팀</th>
					<th valigh="top">날짜</th>
				</tr>
				<tr>
					<td valigh="top"><?php echo $id; ?></td>
					<td valigh="top"><?php echo $order_no; ?></td>
					<td valigh="top"><?php echo $player_name; ?></td>
					<td valigh="top"><?php echo $back_no; ?></td>
					<td valigh="top"><?php echo $position; ?></td>
					<td valigh="top"><?php echo $opponent; ?></td>
					<td valigh="top"><?php echo $date; ?></td>					
				</tr>
				</tbody>
			</table>
		</div>
		<br />
		<h1>2011 Lineup List</h1>
		<div class="paging"><?php echo $pagination; ?></div>
		<div class="data lineupdata"><?php echo $table; ?></div>
		<br />
		<?php echo anchor('lineup/add/','add new data',array('class'=>'add')); ?>
		<br />
	</div>
</body>
</html>