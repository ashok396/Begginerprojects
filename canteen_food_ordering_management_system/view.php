<?php 
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<style>
body{background-color:lightblue;}
input[type='date'],input[type='text']{background-color:lightgreen;}
input[type='submit'] {background-color:#008CBA;font-size:20px;}
p{background-color:yellow;}
table{background-color:lightgreen;}
</style>
</head>
<body>
<div align="center" class="form">
<p><a href="index.php">Home</a> | <a href="insert.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
<table colspan="10" width="100%" border="1" cellpadding="3" cellspacing="0px">
<tr><th align="center"><strong>S.No</strong></th>
<th align="center"><strong>Name</strong></th>
<th align="center"><strong>Contact</strong></th>
<th align="center"><strong>Address</strong></th>
<th align="center"><strong>Normal</strong></th>
<th align="center"><strong>Rate</strong></th>
<th align="center"><strong>Special</strong></th>
<th align="center"><strong>Rate</strong></th>
<th align="center"><strong>NONveg</strong></th>
<th align="center"><strong>Rate</strong></th>
<th align="center"><strong>TOTAL</strong></th>
<th align="center"><strong>Ordered_date</strong></th>
<th align="center"><strong>Edit</strong></th>
<th align="center"><strong>Delete</strong></th></tr>
<?php
$count=1;
$sel_query="Select * from catering_record ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
$total=0;
?>
<tr>
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["contact"]; ?></td>
<td align="center"><?php echo $row["address"]; ?></td>
<?php
if ($row["ordered_quantity_normal"] > 0)
{
?>
	<td align="center"><?php echo $row["ordered_quantity_normal"]; ?></td>
	<td align="center"><?php echo $row["ordered_rate_normal"]; ?></td>
<?php
	$total +=  ($row["ordered_quantity_normal"] * $row["ordered_rate_normal"]);
}
else
{
?>
	<td align="center"><?php echo "-"; ?></td>
	<td align="center"><?php echo "-"; ?></td>
<?php
}
?>

<?php
if ($row["ordered_quantity_special"] > 0)
{
?>
	<td align="center"><?php echo $row["ordered_quantity_special"]; ?></td>
	<td align="center"><?php echo $row["ordered_rate_special"]; ?></td>
<?php
	$total +=  ($row["ordered_quantity_special"] * $row["ordered_rate_special"]);
}
else
{
?>
	<td align="center"><?php echo "-"; ?></td>
	<td align="center"><?php echo "-";?></td>
<?php
}
?>

<?php
if ($row["ordered_quantity_nonveg"] > 0)
{
?>
	<td align="center"><?php echo $row["ordered_quantity_nonveg"]; ?></td>
	<td align="center"><?php echo $row["ordered_rate_nonveg"]; ?></td>
<?php
	$total +=  ($row["ordered_quantity_nonveg"] * $row["ordered_rate_nonveg"]);

}
else
{
?>
	<td align="center"><?php echo "-"; ?></td>
	<td align="center"><?php echo "-"; ?></td>
<?php
}
?>


<td align="center"><?php echo $total; ?></td>

<td align="center"><?php echo $row["ordered_date"]; ?></td>
<td align="center"><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td><td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</table>
</div>
</body>
</html>
