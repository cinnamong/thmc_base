<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>2011 Game Lists</title>

<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="content">
		<div class="data gamedata">
			<h1>2011 Season Summary</h1>
			<table>
				<tbody>
				<tr>
					<th valigh="top">총게임수</th>
					<th valigh="top">총득점</th>
					<th valigh="top">총실점</th>
					<th valigh="top">득실차</th>
					<th valigh="top">총승점</th>
					<th valigh="top">게임당득점</th>
					<th valigh="top">게임당실점</th>
				</tr>
				<tr>
					<td valigh="top"><?php echo $total_game_count; ?></td>
					<td valigh="top"><?php echo $total_rs; ?></td>
					<td valigh="top"><?php echo $total_ra; ?></td>
					<td valigh="top"><?php echo $total_diff; ?></td>
					<td valigh="top"><?php echo $total_point; ?></td>
					<td valigh="top"><?php echo sprintf("%01.2f", $rs_game); ?></td>
					<td valigh="top"><?php echo sprintf("%01.2f", $ra_game); ?></td>					
				</tr>
				</tbody>
			</table>
		</div>
		<br />
		<h1>2011 Game List</h1>
		<div class="paging"><?php echo $pagination; ?></div>
		<div class="data gamedata"><?php echo $table; ?></div>
		<br />
		<?php echo anchor('game/add/','add new data',array('class'=>'add')); ?>
		<br />
	</div>
</body>
</html>