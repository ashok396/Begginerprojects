<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from $record_table where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<style>
body{background-color:lightblue;}
input[type='date'],input[type='text']{background-color:lightgreen;height:40px;width:250px;}
input[type='submit'] {background-color:#008CBA;font-size:20px;}
p{background-color:yellow;}
</style>
</head>
<body>
<div align="center" class="form">
<p><a href="index.php">Home</a> | <a href="insert.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$contact = $_REQUEST['contact'];
$address = $_REQUEST['address'];
$ordered_quantity_normal= $_REQUEST['ordered_quantity_normal'];
$ordered_rate_normal =  $_REQUEST['ordered_rate_normal'];
$ordered_quantity_special= $_REQUEST['ordered_quantity_special'];
$ordered_rate_special = $_REQUEST['ordered_rate_special'];
$ordered_quantity_nonveg= $_REQUEST['ordered_quantity_nonveg'];
$ordered_rate_nonveg = $_REQUEST['ordered_rate_nonveg'];
$ordered_date = $_REQUEST['ordered_date'];

$submittedby = $_SESSION["username"];
$update="update $record_table set trn_date='".$trn_date."', name='".$name."', contact='".$contact."',address='".$address."',ordered_menu=' ',
ordered_quantity_normal='".$ordered_quantity_normal."',ordered_rate_normal='".$ordered_rate_normal."',ordered_quantity_special='".$ordered_quantity_special."',
ordered_rate_special='".$ordered_rate_special."',ordered_quantity_nonveg='".$ordered_quantity_nonveg."',ordered_rate_nonveg='".$ordered_rate_nonveg."',ordered_date='".$ordered_date."',submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
?>
<?php echo $status?></div><?php
}else {
?>
<h1 align="center">Update Record</h1>
<div align="center">
<form name="form" method="post" action=""> 
<table colspan="10" cellpadding="1" cellspacing="1">
<tr><input type="hidden" name="new" value="1" />
<tr><td><input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<tr><td>Name: </td><td><input type="text" name="name" placeholder="Enter Name"  value="<?php echo $row['name'];?>" />
<tr><td>Contact:</td><td><input type="text" name="contact" placeholder="Enter contact"  value="<?php echo $row['contact'];?>" />
<tr><td>Address:</td><td><input type="text" name="address" placeholder="Enter address"  value="<?php echo $row['address'];?>" />
Ordered Menu

<?php
if($row['ordered_quantity_normal'] > 0)
{
?>
	<tr><td><td> Normal_thali:<input type="checkbox" name="ordered_menu[]" placeholder="Enter Menu"  value="" />
	<td>ordered_quantity_normal:</td><td><input type="text" name="ordered_quantity_normal" placeholder="Enter quantity"  value="<?php echo $row['ordered_quantity_normal'];?>" />
	<td>ordered_rate_normal:</td><td><input type="text" name="ordered_rate_normal" placeholder="Enter rate"  value="<?php echo $row['ordered_rate_normal'];?>" /></tr>
<?php
}
else
{
?>
	<tr><td><td> Normal_thali:<input type="checkbox" name="ordered_menu[]" placeholder="Enter Menu"  value="" />
	<td>ordered_quantity_normal:</td><td><input type="text" name="ordered_quantity_normal" placeholder="Enter quantity"  value="<?php?>" />
	<td>ordered_rate_normal:</td><td><input type="text" name="ordered_rate_normal" placeholder="Enter rate"  value="150" readonly /></tr>
<?php
}
?>



<?php
if($row['ordered_quantity_special'] > 0)
{
?>
	<tr><td><td> Special_thali:<input type="checkbox" name="ordered_menu[]" placeholder="Enter Menu"  value="" />
	<td>ordered_quantity_special:</td><td><input type="text" name="ordered_quantity_special" placeholder="Enter quantity"  value="<?php echo $row['ordered_quantity_special'];?>" />
	<td>ordered_rate_special:</td><td><input type="text" name="ordered_rate_special" placeholder="Enter rate"  value="<?php echo $row['ordered_rate_special'];?>" /></tr>
<?php
}
else
{
?>
	<tr><td><td> Special_thali:<input type="checkbox" name="ordered_menu[]" placeholder="Enter Menu"  value="" />
	<td>ordered_quantity_special:</td><td><input type="text" name="ordered_quantity_special" placeholder="Enter quantity"  value="<?php?>" />
	<td>ordered_rate_special:</td><td><input type="text" name="ordered_rate_special" placeholder="Enter rate"  value="250" readonly /></tr>
<?php
}
?>



<?php
if($row['ordered_quantity_nonveg'] > 0)
{
?>
	<tr><td><td> NONveg_thali:<input type="checkbox" name="ordered_menu[]" placeholder="Enter Menu"  value="" />
	<td>ordered_quantity_nonveg:</td><td><input type="text" name="ordered_quantity_nonveg" placeholder="Enter quantity"  value="<?php echo $row['ordered_quantity_nonveg'];?>" />
	<td>ordered_rate_nonveg:</td><td><input type="text" name="ordered_rate_nonveg" placeholder="Enter rate"  value="<?php echo $row['ordered_rate_nonveg'];?>" /></tr>
<?php
}
else
{
?>
	<tr><td><td> NONveg_thali:<input type="checkbox" name="ordered_menu[]" placeholder="Enter Menu"  value="" />
	<td>ordered_quantity_nonveg:</td><td><input type="text" name="ordered_quantity_nonveg" placeholder="Enter quantity"  value="<?php?>" />
	<td>ordered_rate_nonveg:</td><td><input type="text" name="ordered_rate_nonveg" placeholder="Enter rate"  value="350" readonly /></tr>
<?php
}
?>

<tr><td>ordered_date:</td><td><input type="date" name="ordered_date" placeholder="Enter ordered_date"  value="<?php echo $row['ordered_date'];?>" />

<td><input name="submit" type="submit" value="Update" />
</form>
<?php } ?>
</div>
</div>
</body>
</html>
