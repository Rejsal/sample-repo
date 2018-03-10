<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1>User edit form</h1>
<h2>Edit user : <?php foreach ($item_by_id as $item):
$id = $item['id'];
echo $item['name']; 
endforeach; ?></h2>
<br/>
<br/>
<font color="red"><?php echo validation_errors();?></font>
<?php echo form_open('userinfohome/useredit/'.$id);?>
<label for="email">Email : </label>
<input type="text" name="email"><br><br>
<label for="mobile">Mobile no. : </label>
<input type="text" name="mobile"><br><br>
<input type="submit" name="submit" value="Update">
<?php echo form_close();?>
</body>
</html>