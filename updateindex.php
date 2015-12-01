<?php 
include_once("connect_to_mysql.php");

  if(isset($_REQUEST['q']) && ($_REQUEST['q'])!='')	    	
  {	  
	  $r=$_REQUEST['q'][0];
	  
if($r=='@')	
{ 
$a=substr($_REQUEST['q'],1);
	$sql=mysqli_query($conn,"SELECT CurrentPrice,EndTime,products.ProductID from products,auction where products.ProductID=auction.ProductID and auction.status='NOT OVER' and Pname like '%".$a."%' ORDER BY products.ProductID");
}
else
{
	//echo $r;
$sql=mysqli_query($conn,"SELECT CurrentPrice,EndTime,products.ProductID from products,auction where products.ProductID=auction.ProductID and auction.status='NOT OVER' and CategoryID=".$_REQUEST['q']." ORDER BY products.ProductID");	
} }
  else
$sql=mysqli_query($conn,"SELECT CurrentPrice,EndTime,ProductID from auction where status='NOT OVER' ORDER BY ProductID");
$a=array();
$b="";
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
	//echo $b;
	$b=$b.$row["CurrentPrice"]." ".$row["ProductID"]." ".$row["EndTime"]." ";
//	array_push($a,$row["CurrentPrice"]);
	//echo $row["CurrentPrice"];echo'<br>';
}
	echo $b;
?>