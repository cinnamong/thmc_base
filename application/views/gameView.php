<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>경기 스코어</title>

<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<div class="data">
		<table>
			<tr>
				<td width="30%">Game ID</td>
				<td><?php echo $game->id; ?></td>
			</tr>
			<tr>
				<td valign="top">상대팀</td>
				<td><?php echo $game->opponent; ?></td>
			</tr>
			<tr>
				<td valign="top">날짜</td>
				<td><?php echo $game->date; ?></td>
			</tr>
			<tr>
				<td valign="top">시간</td>
				<td><?php echo $game->time; ?></td>
			</tr>
			<tr>
				<td valign="top">구장</td>
				<td><?php echo $game->ballpark; ?></td>
			</tr>
			<tr>
				<td valign="top">날씨</td>
				<td><?php echo $game->weather; ?></td>
			</tr>
			<tr>
				<td valign="top">온도/수</td>
				<td><?php echo $game->temperature; ?></td>
			</tr>
			<tr>
				<td valign="top">홈/어웨이</td>
				<td><?php echo $game->field == 'Visitor'? '어웨이':'홈'; ?></td>
			</tr>
			<tr>
				<td valign="top">결과</td>
				<td><?php echo $game->result == 'W'? '승': ($game->result == 'L'? '패':'무'); ?></td>
			</tr>
			<tr>
				<td valign="top">승점</td>
				<td><?php echo $game->point; ?></td>
			</tr>
			<tr>
				<td valign="top">RS</td>
				<td><?php echo $game->rs; ?></td>
			</tr>
			<tr>
				<td valign="top">RA</td>
				<td><?php echo $game->ra; ?></td>
			</tr>
			<tr>
				<td valign="top">Diff</td>
				<td><?php echo $game->diff; ?></td>
			</tr>									
		</table>
		</div>
		<br />

		<?php echo $link_back; ?>
	</div>
</body>
</html>