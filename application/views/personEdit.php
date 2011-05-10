<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>SIMPLE CRUD APPLICATION</title>

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
				<td valign="top">Name<span style="color:red;">*</span></td>
				<td><input type="text" name="name" class="text" value="<?php echo $this->validation->name; ?>"/>
				<?php echo $this->validation->name_error; ?></td>
			</tr>
			<tr>
				<td valign="top">Year of birth (출생년도 4자리)<span style="color:red;">*</span></td>
				<td><input type="text" name="yob" class="text" value="<?php echo $this->validation->yob; ?>"/>
				<?php echo $this->validation->yob_error; ?></td>
			</tr>
			<tr>
				<td valign="top">백넘버 <span style="color:red;">*</span></td>
				<td><input type="text" name="back_no" class="text" value="<?php echo $this->validation->back_no; ?>"/>
				<?php echo $this->validation->back_no_error; ?></td>
			</tr>
			<tr>
				<td valign="top">주포지션 <span style="color:red;">*</span></td>
				<td><?php echo $this->form_dropdown('pri_position', array('' => 'Select your position', 1 => 'P', 2 => 'C', 3 => '1B', 4 => '2B', 5 => '3B', 6 => 'SS', 7 => 'LF', 8 => 'CF', 9 => 'RF'),''); ?>
				<?php echo $this->validation->pri_position_error; ?></td>
			</tr>
			<tr>
				<td valign="top">백업포지션 </td>
				<td><input type="text" name="second_position" class="text" value="<?php echo $this->validation->second_position; ?>"/>
				<?php echo $this->validation->second_position_error; ?></td>
			</tr>
			<tr>
				<td valign="top">공격 </td>
				<td><input type="radio" name="batting" value="우타" <?php echo $this->validation->set_radio('batting', '우타'); ?>/> 우타
					<input type="radio" name="batting" value="좌타" <?php echo $this->validation->set_radio('batting', '좌타'); ?>/> 좌타
				<?php echo $this->validation->batting_error; ?></td>
			</tr>
			<tr>
				<td valign="top">수비 </td>
				<td><input type="radio" name="field" value="우투" <?php echo $this->validation->set_radio('field', '우투'); ?>/> 우투
					<input type="radio" name="field" value="좌투" <?php echo $this->validation->set_radio('field', '좌투'); ?>/> 좌투
				<?php echo $this->validation->field_error; ?></td>
			</tr>
			<tr>
				<td valign="top">특이사항 </td>
				<td><input type="text" name="description" class="text" value="<?php echo $this->validation->description; ?>"/>
				<?php echo $this->validation->description_error; ?></td>
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