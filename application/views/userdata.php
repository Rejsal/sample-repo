<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Delete</th>
<th>Edit</th>
<th>View</th>
</tr>
<?php foreach ($user_items as $item):
echo '<tr>';
echo '<td>'.$item['name'].'</td>';
echo '<td>'.$item['email'].'</td>';
echo '<td>'.$item['mobile'].'</td>';
echo form_open('userinfohome/userdelete/'.$item['id']);
echo '<td><input type="submit" name="delete" value="Delete"></td>';
echo form_close();
echo form_open('userinfohome/userget/'.$item['id']);
echo '<td><input type="submit" name="edit" value="Edit"></td>';
echo form_close();
echo form_open('userinfohome/userview/'.$item['id']);
echo '<td><input type="submit" name="view" value="View"></td>';
echo form_close();
endforeach;?>
</table>
</body>
</html>