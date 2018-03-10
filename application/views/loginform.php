<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1>Login form</h1>
<?php echo validation_errors();?>
<?php echo $msg;?>
<?php echo form_open('userinfohome/loginprocess');?>
<label for="email">Email : </label>
<input type="text" name="email"><br><br>
<label for="password">Password : </label>
<input type="password" name="pass"><br><br>
<input type="submit" name="login" value="Login">
</body>
</html>