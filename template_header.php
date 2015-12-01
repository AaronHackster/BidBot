 <?php include_once("loggingin.php");?>
<!doctype html>
<html lang="en">
<head>
      <script src="js/jquery.min.js"></script>
<script>
function selectcategory(i)
{
	window.location="index.php?c="+i;
}

function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("sugg").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("sugg").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "suggest.php?q=" + str, true);
        xmlhttp.send();
    }
}



</script>


<script src="js/bootstrap.min.js"></script>
<link rel='stylesheet' href="css/bootstrap.min.css"/>  
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
 <!--<script>
  $(function() {
    var availableTags = [
   <?php/* $sq=mysqli_query($conn,"select Pname from products"); 
	 $productCount=mysqli_num_rows($sq);
	 $i=0;
	while($row=mysqli_fetch_array($sq,MYSQLI_ASSOC))
	{
		if($i==$productCount-1)
		echo '"'.$row["Pname"].'"';
	else
		echo '"'.$row["Pname"].'",';
		$i++;
	}*/
	?>
    ];
	console.log(availableTags);
    $( "#bar" ).autocomplete({
      source: availableTags
    });
  });
  </script>-->
</head><!--/head-->

<body style="background-color: rgb(241, 241, 241);">

		<div class="header-middle" ><!--header-middle-->
			<div class="container" >
				<div class="row">
					<div class="col-sm-6">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/logo.png" width="300" height="110" alt="Logo" /></a>
						</div>
						
					</div>
					
					<div class="col-sm-6">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user" id="User"></i>
								<?php if(isset($_SESSION["login_user_name"]))
								{echo 'Howdy '.$_SESSION["login_user_name"].' !';}?></a>
								</li>
								<li><a href=<?php if(isset($_SESSION["login_user_name"]))echo'"Account.php"';else echo'"Register.php"';?>><i class="fa fa-user" id="User"></i> 
								<?php if(isset($_SESSION["login_user_name"]))
								{echo 'Account';
							    }
								else
								{
									echo 'Register Now';
								}
								?></a>
								</li>
								
								<?php if(!isset($_SESSION["login_user_mail"])){
								 	echo '<li><a  data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i> Login</a></li>';}
								else{
									echo '<li><a href="logout.php" >LogOut </a></li>';}
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom" style="margin-top:0px;"><!--header-bottom-->
			<div class="container" style="margin-top:0px;">
				<div class="row" style="margin-top:0px;">
                 <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav js-nav-add-active-class">
            <li><a href="index.php">Home</a></li>
             <li class="dropdown">
              <a href="#"  data-toggle="dropdown">Category <b class="caret"></b></a>
              <ul  class="dropdown-menu" role="menu">
                <li onclick="selectcategory(1)">Electronics</li>	
                <li onclick="selectcategory(2)">Household</li>
                <li onclick="selectcategory(3)">Vehicles</li>
                <li onclick="selectcategory(4)">Other</li>
              </ul>
            </li>
           <li><a href="Post_ad.php">Post an Ad</a></li>
             <li><a href="Contact_us.php">Contact Us</a></li>
          </ul>
             <!--<div id="custom-search-input >
                            <div class="input-group col-lg-4">
                                <input type="text"id="searchbar" class=" search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>-->
<!-- CSS styles for standard search box -->
<style type="text/css">

#tfheader{
	background:linear-gradient(#686868 5%,black 50%, #686868 95%);
	margin-left:-16px;
	margin-right:-28px;
	margin-top:0px;
	margin-bottom:-100px;
	border:0px;
	border-color:#FFF;		
	padding-bottom:-2px;
	}

	#tfnewsearch{
		float:right;
		padding:10px;
	}
	.tftextinput{
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
	}
	.tfbutton {
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		outline: none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		border: solid 1px #0076a3; border-right:0px;
		background: #0095cd;
		background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
		background: -moz-linear-gradient(top,  #00adee,  #0078a5);
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;
	}
	.tfbutton:hover {
		text-decoration: none;
		background: #007ead;
		background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
		background: -moz-linear-gradient(top,  #0095cc,  #00678e);
	}
	/* Fixes submit button height problem in Firefox */
	.tfbutton::-moz-focus-inner {
	  border: 0;
	}
	.tfclear{
		clear:both;
	}
</style>

	<div id="tfheader">
		<form id="tfnewsearch" method="get" action="index.php" >
		       <input  list="sugg" oninput="showHint(this.value)" class="tftextinput" name="q" size="60" maxlength="120">
			   <datalist id='sugg'></datalist><input  type="submit" value="search" class="tfbutton">
		</form>
	<div class="tfclear"></div>
	</div>
        </div><!-- /.navbar-collapse -->
      
      </div>
    </nav>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

  	
<!-- Modal -->																						<!-- Modal Login -->
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">x</button>
            <h3>Login to Bidbot</h3>
      </div>
      
      <div class="modal-body">
        <form method="post" action="#" name="login_form" class="form-inline">
              <p>Email id :           <input type="text" class="form-control" name="email" id="email" placeholder="Email"></p>
              <p>Password :                   <input type="password" class="form-control" name="password" placeholder="Password"></p>
              <div class="checkbox">
  			<label><input type="checkbox" value=""> Remember me</label>
	</div>
              <br>
              <br>
              <p><button name="submit" type="submit" class="btn btn-primary">Sign in</button>
               </p>
            </form>
       	
      </div>
      
      <div class="modal-footer">
            New to Bidbot?
            <a href="Register.php" class="btn btn-primary">Register</a>
          </div>
    </div>

  </div>
</div>				
<script src="js/jquery.scrollUp.min.js"></script>																			<!-- Modal Login-->
	 <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/price-range.js"></script>
   
    <script src="js/main.js"></script>
</body>
</html>