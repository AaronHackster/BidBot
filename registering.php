<?php
session_start();

$name=$_POST['name'];
$mail=$_POST['mailid'];
$address=$_POST['address'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$acc=$_POST['accnum'];
include_once("connect_to_mysql.php");
$sq="INSERT INTO users(Name ,EmailAddress,Password,Address) values('".$name."','".$mail."','".$password."','".$address."')";
$s1=mysqli_query($conn,$sq);
//$sq2=mysqli_query($conn,"select UserID from Users where EmailAddress=".$mail);
//$row=mysqli_fetch_array($sq2,MYSQLI_ASSOC);
$t=$conn->insert_id;
$sq3="INSERT INTO account values('".$t."','".$acc."','100000')";
$s2=mysqli_query($conn,$sq3);
if ($s1 == TRUE && $s2==TRUE) {
	
    echo "New record created successfully";
	header("location: index.php");
} else {
    echo "Error: " . $sq . "<br>" . $conn->error;
}
$conn->close();
?>