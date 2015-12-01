<?php 
include_once("connect_to_mysql.php");

  if(isset($_REQUEST['q']) && ($_REQUEST['q'])!='')	    	
  {
	  
	  $r=$_REQUEST['q'];
	$sql=mysqli_query($conn,"SELECT CurrentPrice,EndTime,Name from auction,users where auction.BuyerID=users.UserID and ProductID=".$r);

$a=array();
$b="";
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
	//echo $b;
	//$b=$b.$row["CurrentPrice"]." ".$row["Name"]." ";
	$b=$b.$row["CurrentPrice"]." ".$row["Name"]." ".$row["EndTime"]." ";
//	array_push($a,$row["CurrentPrice"]);
	//echo $row["CurrentPrice"];echo'<br>';
}
	echo $b;
  }
?>