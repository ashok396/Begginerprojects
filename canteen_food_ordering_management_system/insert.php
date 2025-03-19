<?php
require('db.php');
include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$contact = $_REQUEST['contact'];
$address = $_REQUEST['address'];
$ordered_menu = $_REQUEST['ordered_menu'];
$menu="";
foreach($ordered_menu as $menu1)
{
	$menu .= $menu1.",";
}
$ordered_quantity_normal= $_REQUEST['ordered_quantity_normal'];
$ordered_rate_normal = $_REQUEST['ordered_rate_normal'];
$ordered_quantity_special= $_REQUEST['ordered_quantity_special'];
$ordered_rate_special = $_REQUEST['ordered_rate_special'];
$ordered_quantity_nonveg= $_REQUEST['ordered_quantity_nonveg'];
$ordered_rate_nonveg = $_REQUEST['ordered_rate_nonveg'];
$ordered_date = $_REQUEST['ordered_date'];
$submittedby = $_SESSION["username"];
$ins_query="insert into $record_table (trn_date,name,contact,address,ordered_menu,ordered_quantity_normal,ordered_rate_normal,ordered_quantity_special,ordered_rate_special,ordered_quantity_nonveg,ordered_rate_nonveg,ordered_date,submittedby) 
values ('$trn_date','$name','$contact','$address','$menu','$ordered_quantity_normal','150','$ordered_quantity_special','250','$ordered_quantity_nonveg','350','$ordered_date','$submittedby')";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<style>
body{background-color:lightblue;}
input[type='date'],input[type='text']{background-color:lightgreen;height:30px;width:250px;}
input[type='submit'] {background-color:#008CBA;font-size:20px;}
p{background-color:yellow;}
</style>
</head>
<body>
<div align="center" class="form">
<p><a href="index.php">Home</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a></p>
<h2>Insert New Record</h1>
<form name="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>"> 
<table colspan="10" cellpadding="1" cellspacing="1">
<tr><td><input type="hidden" name="new" value="1"/></td></tr>
<tr><td><b>Name</b>:</td><td><input type="text" name="name" placeholder="Enter Name"  /></td></tr>
<tr><td><b>Contact</b>:</td><td><input type="text" name="contact" placeholder="Enter contact"  /></td></tr>
<tr><td><b>Address</b>:</td><td><input type="text" name="address" placeholder="Enter address"  /></td></tr>
<tr><td><strong>ORDERED MENU</strong></td></tr>
<tr><td>Normal Veg Thali:</td><td><input type="checkbox" name="ordered_menu[]" value="Normal Veg Thali" /></td>
<td>Ordered_quantity:</td><td><input type="text" name="ordered_quantity_normal" placeholder="Enter Quantity_normal" /></td>
<td>Ordered_rate:</td><td><input type="text" name="ordered_rate_normal" placeholder="150" readonly /></td></tr>

<tr><td>Special Veg Thali:</td><td><input type="checkbox" name="ordered_menu[]" value="Special Veg Thali" /></td>
<td>Ordered_quantity:</td><td><input type="text" name="ordered_quantity_special" placeholder="Enter Quantity_special"  /></td>
<td>Ordered_rate:</td><td><input type="text" name="ordered_rate_special" placeholder="250" readonly /></td></tr>

<tr><td>Non Veg Thali:</td><td><input type="checkbox" name="ordered_menu[]" value="Nonveg Thali" /></td>
<td>Ordered_quantity:</td><td><input type="text" name="ordered_quantity_nonveg" placeholder="Enter Quantity_nonveg"  /></td>
<td>Ordered_rate:</td><td><input type="text" name="ordered_rate_nonveg" placeholder="350" readonly /></tr>

<tr><td>Ordered_date:</td><td><input type="date" name="ordered_date" placeholder="Enter ordered_date" required /></td></tr>

<tr><td></td><td><input name="submit" type="submit" value="Submit" /></td></tr>
</table>
</form>
<?php echo $status; ?>
</div>
</body>
</html>
