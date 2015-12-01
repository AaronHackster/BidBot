<?php 
include_once("connect_to_mysql.php");

$sql=mysqli_query($conn,"SELECT CurrentPrice,ProductID from auction where status='NOT OVER' ORDER BY ProductID");
$a=array();
$b="";
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
	//echo $b;
	$b=$b.$row["CurrentPrice"]." ".$row["ProductID"]." ";
//	array_push($a,$row["CurrentPrice"]);
	//echo $row["CurrentPrice"];echo'<br>';
}
	echo $b;
?>