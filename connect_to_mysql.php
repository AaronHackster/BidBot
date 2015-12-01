<?php
$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="auctionsite";
$conn=	new mysqli("localhost","root","","auctionsite");
if($conn->connect_error)
{
	die("Connection error");
}

?>