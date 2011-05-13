<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>2011 Game Lists</title>

<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="content">
		<h1>2011 Game List</h1>
		<div class="paging"><?php echo $pagination; ?></div>
		<div class="data gamedata"><?php echo $table; ?></div>
		<br />
		
		<div id="data gamedata">
			<h1>스코어 현황</h1>
			<table>
				<tr>
					<td valigh="top">총득점</td>
					<td valigh="top">총실점</td>
					<td valigh="top">득실차</td>
					<td valigh="top">총포인트</td>
				</tr>
				<tr>
					<td valigh="top"><?php echo $total_rs; ?></td>
					<td valigh="top"><?php echo $total_ra; ?>/td>
					<td valigh="top"><?php echo ($total_rs - $total_ra); ?></td>
					<td valigh="top"><?php echo $total_point; ?></td>					
				</tr>
			</table>
		</div>
		<?php echo anchor('game/add/','add new data',array('class'=>'add')); ?>
	</div>
</body>
</html>