<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>2011 또감사 교회 야구 경기</title>

<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>style/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>script/calendar.js"></script>

</head>
<body>
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<?php echo $message; ?>
		<form method="post" action="<?php echo $action; ?>">
		<div class="data">
		<table>
			<tr>
				<td width="30%">ID</td>
				<td><input type="text" name="id" disabled="disable" class="text" value="<?php echo $this->validation->id; ?>"/></td>
				<input type="hidden" name="id" value="<?php echo $this->validation->id; ?>"/>
			</tr>
			<tr>
				<td valign="top">상대팀<span style="color:red;">*</span></td>
				<td><input type="text" name="opponent" class="text" value="<?php echo $this->validation->opponent; ?>"/>
				<?php echo $this->validation->opponent_error; ?></td>
			</tr>
			<tr>
				<td valign="top">날짜 (dd-mm-yyyy)<span style="color:red;">*</span></td>
				<td><input type="text" name="date" onclick="displayDatePicker('date');" class="text" value="<?php echo $this->validation->date; ?>"/>
				<a href="javascript:void(0);" onclick="displayDatePicker('date');"><img src="<?php echo base_url(); ?>style/images/calendar.png" alt="calendar" border="0"></a>
				<?php echo $this->validation->date_error; ?></td>
			</tr>
			<tr>
				<td valign="top">시간 <span style="color:red;">*</span></td>
				<td><input type="text" name="time" class="text" value="<?php echo $this->validation->time; ?>"/>
				<?php echo $this->validation->time_error; ?></td>
			</tr>
			<tr>
				<td valign="top">경기장 <span style="color:red;">*</span></td>
				<td><input type="text" name="ballpark" class="text" value="<?php echo $this->validation->ballpark; ?>"/>
				<?php echo $this->validation->ballpark_error; ?></td>
			</tr>
			<tr>
				<td valign="top">날씨 </td>
				<td><input type="text" name="weather" class="text" value="<?php echo $this->validation->weather; ?>"/>
				<?php echo $this->validation->weather_error; ?></td>
			</tr>
			<tr>
				<td valign="top">온도 </td>
				<td><input type="text" name="temperature" class="text" value="<?php echo $this->validation->temperature; ?>"/>
				<?php echo $this->validation->temperature_error; ?></td>
			</tr>
			<tr>
				<td valign="top">홈/어웨이</td>
				<td><input type="radio" name="field" value="Visitor" <?php echo $this->validation->set_radio('field', 'Visitor'); ?>/> 어웨이
					<input type="radio" name="field" value="Home" <?php echo $this->validation->set_radio('field', 'Home'); ?>/> 홈
				<?php echo $this->validation->field_error; ?></td>
			</tr>
			<tr>
				<td valign="top">결과 </td>
				<td><input type="radio" name="result" value="W" <?php echo $this->validation->set_radio('result', 'W'); ?>/> 승
					<input type="radio" name="result" value="L" <?php echo $this->validation->set_radio('result', 'L'); ?>/> 패
					<input type="radio" name="result" value="T" <?php echo $this->validation->set_radio('result', 'T'); ?>/> 무
				<?php echo $this->validation->result_error; ?></td>
			</tr>
			<tr>
				<td valign="top">승점 </td>
				<td><input type="text" name="point" class="text" value="<?php echo $this->validation->point; ?>"/>
				<?php echo $this->validation->point_error; ?></td>
			</tr>
			<tr>
				<td valign="top">RS </td>
				<td><input type="text" name="rs" class="text" value="<?php echo $this->validation->rs; ?>"/>
				<?php echo $this->validation->rs_error; ?></td>
			</tr>
			<tr>
				<td valign="top">RA </td>
				<td><input type="text" name="ra" class="text" value="<?php echo $this->validation->ra; ?>"/>
				<?php echo $this->validation->ra_error; ?></td>
			</tr>
			<tr>
				<td valign="top">Diff </td>
				<td><input type="text" name="diff" class="text" value="<?php echo $this->validation->diff; ?>"/>
				<?php echo $this->validation->diff_error; ?></td>
			</tr>									
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Save"/></td>
			</tr>
		</table>
		</div>
		</form>
		<br />
		<?php echo $link_back; ?>
	</div>
</body>
</html>