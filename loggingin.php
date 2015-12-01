<?php
if(!isset($_SESSION['login_user_name']))
{//session_start(); // Starting Session
}$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "email or Password is invalid";
}
else
{
// Define $email and $password
$email=$_POST['email'];
$password=$_POST['password'];
?>
<?php
include_once("connect_to_mysql.php");
?>
<?php
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$password = stripslashes($password);
//$email = mysqli_real_escape_string($conn, $email);
//$email = mysqli_real_escape_string($conn,$email);
//$password = mysqli_real_escape_string($conn,$password);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($conn,'select * from users where Password="'.$password.'" AND EmailAddress="'.$email.'"');
$rows = mysqli_num_rows($query);

if ($rows == 1) {
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
$_SESSION['login_user_name']=$row["Name"];	
$_SESSION['login_user_mail']=$email; // Initializing Session
$_SESSION['login_user_id']=$row["UserID"]; // Initializing Session


} else {
$error = "Email or Password is invalid";
}
//mysqli_close($conn); 
//unset($conn);
}
}
?>