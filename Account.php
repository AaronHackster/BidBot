<?php session_start(); include_once("connect_to_mysql.php")?> 

<?php 

$username=$_SESSION["login_user_name"];
$userid=$_SESSION["login_user_id"];
$sql=mysqli_query($conn,"SELECT * from users,account where users.UserID=account.UserID and users.UserID=".$userid);
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	
?>
	
		<?php include_once("template_header_logged_in.php")?> 
	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Account</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bidbot</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <style>
	
    #navbar
{
		background-color:#000;
}
#searchbar
{
padding:10px;
	
}
    </style>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    
    <style>
   .user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
</style> 
    
</head>

<body>																						<!-- Modal Login-->
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
<div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info" style="width:1000px; margin-left:-300px;">
            <div class="panel-heading">
              <h3 class="panel-title">Account Details</h3>
            </div>
            <div class="panel-body" style="margin-left:-350px; font-size:17px;">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name :</td>
                        <td><?php echo $row["Name"]?></td>
                      </tr>
                      <tr>
                        <td>Email id :</td>
                        <td><?php echo $row["EmailAddress"]?></td>
                      </tr>
                      <tr>
                        <td>Address :</td>
                        <td><?php echo $row["Address"]?></td>
                      </tr>
                   
                         <tr>
                         <td>Account Number :</td>
                         <td><?php echo $row["AccountNo"]?></td>
                         </tr>
                             <tr>
                        <td>Wallet :</td>
                        <td>Rs <?php echo $row["Balance"]?></td>
                      
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                
            
          </div>
        </div>
      </div>
    </div>
</body>
</html>
 