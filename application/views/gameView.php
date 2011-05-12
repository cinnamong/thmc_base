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
				<td width="30%">ID</td>
				<td><?php echo $person->id; ?></td>
			</tr>
			<tr>
				<td valign="top">이름</td>
				<td><?php echo $person->name; ?></td>
			</tr>
			<tr>
				<td valign="top">출생연도</td>
				<td><?php echo $person->yob; ?></td>
			</tr>
			<tr>
				<td valign="top">백넘버</td>
				<td><?php echo $person->back_no; ?></td>
			</tr>
			<tr>
				<td valign="top">주포지션</td>
				<td><?php echo $person->pri_position; ?></td>
			</tr>
			<tr>
				<td valign="top">보조포지션</td>
				<td><?php echo $person->second_position; ?></td>
			</tr>
			<tr>
				<td valign="top">공/수</td>
				<td><?php echo $person->batting == 'R'? '우타':'좌타'; ?> / <?php echo $person->field == 'R'? '우투': '좌투'; ?></td>
			</tr>
			<tr>
				<td valign="top">특이사항</td>
				<td><?php echo $person->description; ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>
	</div>
</body>
</html>