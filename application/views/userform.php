<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1>User form</h1>
<br/>
<br/>
<font color="red"><?php echo validation_errors();?></font>
<?php echo form_open('userinfohome/userhome');?>
<label for="name">Name : </label>
<input type="text" name="name"><br><br>
<label for="email">Email : </label>
<input type="text" name="email"><br><br>
<label for="mobile">Mobile no. : </label>
<input type="text" name="mobile"><br><br>
<label for="password">Password : </label>
<input type="password" name="pass"><br><br>
<input type="submit" name="submit" value="Save">
<?php echo form_close();?>
<br/>
<br/>
<?php echo form_open('userinfohome/userdetails');?>
<input type="submit" name="submit" value="Show details">
<?php echo form_close();?>
<br/>
<br/>
<?php echo form_open('userinfohome/login');?>
<input type="submit" name="login_page" value="Login page">
<?php echo form_close();?>
</body>
</html>