<html>
<?php $userid = $this->session->userdata('id');
if(!$userid){
redirect('userinfohome/login');
}?>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1>welcome : <?php echo $this->session->userdata('email');?></h1>
<br>
<br>
<?php echo form_open('userinfohome/logout');?>
<input type="submit" name="logout" value="Logout">
<?php echo form_close();?>
</body>
</html>
