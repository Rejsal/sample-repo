<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1>User info</h1>
<br>
<br>
<?php foreach ($items as $item):
echo '<p>'.$item['name'].'</p>';
echo '<br>';
echo '<p>'.$item['email'].'</p>';
echo '<br>';
echo '<p>'.$item['mobile'].'</p>';
endforeach;?>
<br>
<br>
<?php echo form_open_multipart('userinfohome/do_upload');?>
<input type="file" name="userfile">
<br>
<br>
<input type="submit" name="upload" value="Upload">
<?php echo form_close();?>
</body>
</html>