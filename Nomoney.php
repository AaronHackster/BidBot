<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Oops!!.</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<?php
session_start();
include_once("template_header_logged_in.php");
?>
<body>
<div class="container">
<div class="hero-unit center">
          <h1><font face="Tahoma" color="red" style="text-align:center;">Oops!</font></h1>
          <br />
          <p style="font-size:18px;">Looks like you dont have sufficient funds to continue your Bidding. Please sell any product so that you can participate in bidding again.</p>
          <br>	
          <a href="Post_ad.php" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Post Ad</a>
        </div>
        </div>
        


</body>
</html>
