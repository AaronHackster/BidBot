<?php 
session_start();
if(!isset($_SESSION['login_user_name']))
{
	header("location: Register.php");
}
$p="";
if(isset($_REQUEST['q']))
{
	$a=($_REQUEST['q']);
	 include_once("connect_to_mysql.php");
	$sq=mysqli_query($conn,"select Pname,CurrentPrice from products,auction where auction.ProductID=products.ProductID and products.ProductID=".$a);
	$row=mysqli_fetch_array($sq,MYSQLI_ASSOC);
$p=$row["Pname"];
$cp=$row["CurrentPrice"];
	}
else
{
	header("location: index.php");
}
$username=$_SESSION["login_user_name"];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Winner</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
	<?php include_once("template_header_logged_in.php")?> 
<body>
<div class="container">
<div class="row">
<div class="thumbnail" style="background-color:#C0DCC0; width:65%; margin-left:10%;">
<img src="images/checkmark-69957_1280.jpg" height="65" width="65" style="float:left">
<h2>Congratulations <?php echo $username; ?>!</h2>
<hr>
<p>You have successfully won the product <?php echo $p.' for the Amount of Rs '.$cp; ?>. Your Payment has been Recieved.You will recieve the product within a week at the registered address.If not please contact us with your respective problem.</p>

</div>
</div>
</div>
</body>
</html>
