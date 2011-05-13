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
				<td width="30%">Lineup ID</td>
				<td><?php echo $lineup->id; ?></td>
			</tr>
			<tr>
				<td valign="top">상대팀</td>
				<td><?php echo $lineup->opponent; ?></td>
			</tr>
			<tr>
				<td valign="top">날짜</td>
				<td><?php echo $lineup->date; ?></td>
			</tr>
			<tr>
				<td valign="top">시간</td>
				<td><?php echo $lineup->time; ?></td>
			</tr>
			<tr>
				<td valign="top">구장</td>
				<td><?php echo $lineup->ballpark; ?></td>
			</tr>
			<tr>
				<td valign="top">날씨</td>
				<td><?php echo $lineup->weather; ?></td>
			</tr>
			<tr>
				<td valign="top">온도/수</td>
				<td><?php echo $lineup->temperature; ?></td>
			</tr>
			<tr>
				<td valign="top">홈/어웨이</td>
				<td><?php echo $lineup->field == 'Visitor'? '어웨이':'홈'; ?></td>
			</tr>
			<tr>
				<td valign="top">결과</td>
				<td><?php echo $lineup->result == 'W'? '승': ($lineup->result == 'L'? '패':'무'); ?></td>
			</tr>
			<tr>
				<td valign="top">승점</td>
				<td><?php echo $lineup->point; ?></td>
			</tr>
			<tr>
				<td valign="top">RS</td>
				<td><?php echo $lineup->rs; ?></td>
			</tr>
			<tr>
				<td valign="top">RA</td>
				<td><?php echo $lineup->ra; ?></td>
			</tr>
			<tr>
				<td valign="top">Diff</td>
				<td><?php echo $lineup->diff; ?></td>
			</tr>									
		</table>
		</div>
		<br />

		<?php echo $link_back; ?>
	</div>
</body>
</html>