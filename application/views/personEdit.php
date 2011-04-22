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
				<td valign="top">Gender<span style="color:red;">*</span></td>
				<td><input type="radio" name="gender" value="M" <?php echo $this->validation->set_radio('gender', 'M'); ?>/> M
					<input type="radio" name="gender" value="F" <?php echo $this->validation->set_radio('gender', 'F'); ?>/> F
					<?php echo $this->validation->gender_error; ?></td>
			</tr>
			<tr>
				<td valign="top">Date of birth (dd-mm-yyyy)<span style="color:red;">*</span></td>
				<td><input type="text" name="dob" onclick="displayDatePicker('dob');" class="text" value="<?php echo $this->validation->dob; ?>"/>
				<a href="javascript:void(0);" onclick="displayDatePicker('dob');"><img src="<?php echo base_url(); ?>style/images/calendar.png" alt="calendar" border="0"></a>
				<?php echo $this->validation->dob_error; ?></td>
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