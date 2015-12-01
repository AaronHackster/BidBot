<?php include_once("connect_to_mysql.php")?> 

 <?php

	
 //$date=$date+1;
 //echo $enddate;
 $dynamicList="";
 if(isset($_REQUEST['r']))
 {
	$oid=$_REQUEST['r'];
	
	 $sq=mysqli_query($conn,"select status from auction where ProductID=".$oid);
	$row=mysqli_fetch_array($sq,MYSQLI_ASSOC);
	 if($row["status"]=="NOT OVER")
	 {
		 $sq=mysqli_query($conn,"UPDATE AUCTION SET status='OVER' where ProductID=".$oid);
		
		 $sqb=mysqli_query($conn,"select BuyerID,SellerID,CurrentPrice from auction,products where auction.ProductID=products.ProductID and products.ProductID=".$oid);
		 $rowb=mysqli_fetch_array($sqb,MYSQLI_ASSOC);
		if($rowb["BuyerID"]!=null)
		{
			$amt=$rowb["CurrentPrice"];
			 $sqs=mysqli_query($conn,"UPDATE products SET status='Sold' where ProductID=".$oid);
			$sqbuy=mysqli_query($conn,"update account set balance=balance-".$amt." where UserID=".$rowb["BuyerID"]);
			$sqsel=mysqli_query($conn,"update account set balance=balance+".$amt." where UserID=".$rowb["SellerID"]);
		}
	 }
 }
 
  if(isset($_REQUEST['q']))	    
	 $sql=mysqli_query($conn,"SELECT * from products,auction where products.ProductID=auction.ProductID and auction.status='NOT OVER' and Pname like '%".$_REQUEST['q']."%' ORDER BY products.ProductID" );		
elseif (isset($_REQUEST['c'])) 
	 $sql=mysqli_query($conn,"SELECT * from products,auction where products.ProductID=auction.ProductID and auction.status='NOT OVER' and CategoryID=".$_REQUEST['c']." ORDER BY products.ProductID" );		
 else
		 $sql=mysqli_query($conn,"SELECT * from products,auction where products.ProductID=auction.ProductID and auction.status='NOT OVER' ORDER BY products.ProductID");
 $productCount=mysqli_num_rows($sql);
 if($productCount>0)
 {
	 $i=0;
	 while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))
	 {
		 $pname=$row["Pname"];
		$price=$row["CurrentPrice"];
		$pid=$row["ProductID"];
		$enddate=$row["EndTime"];
		  $dynamicList.=' <form action="product_bidded_details.php" method="post"> 
      <div class="col-lg-3 col-md-4 col-xs-6 thumb" onclick="details_only('.$pid.');" style="text-align:center;">
	 <div class="box-header" style="color:#0000FF;">
            <b> '.$pname.'</b>
        	</div>
	 <div class="thumbnail"><a>
	 <div style="height:225px; width:225px;">
	<img src="images/store_images/'.$pid.'.jpg"  height="250" width="250" ">
	</div>
	</a>
     <hr>
    <input type="hidden" name="productid" value='.$pid.'>
		<div  id="'.$pid.'">
    <span class="hours"></span>: 
    <span class="minutes"></span>:
    <span class="seconds"></span>
  </div>
  <hr>
    <div class="productprice"><div id='.$pid.' class="pricetext">Rs '.$price.'</div>
	<hr>
	<div class=""><button class="btn btn-danger btn-sm" type="submit" role="button" >BID NOW</button></div>
	</div>
	</div>
</div>
</form>
<script> initializeClock("'.$pid.'","'.$enddate.'"); </script>
';
$i++;
if($i%3==0)
$dynamicList.='</div><div class="row">';
	 }
	
 }
 else
 {
	   if(isset($_REQUEST['q']))
	$dynamicList="Search Results Did Not Match Any Product!!!"	;
	else		   
	  $dynamicList="Be our First Seller";
 }
//mysqli_close($conn);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
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
	
	<script>
	function details_only(pid)
	{
		
		window.location="product_details.php?q="+pid;
	}
	
	function getTimeRemaining(endtime){
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor( (t/1000) % 60 );
  var minutes = Math.floor( (t/1000/60) % 60 );
  var hours = Math.floor( (t/(1000*60*60)) % 24 );
  var days = Math.floor( t/(1000*60*60*24) );
  hours=hours+days*24;
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime){
  var clock = document.getElementById(""+id);
  //var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock(){
    var t = getTimeRemaining(endtime);

   // daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if(t.total<=0){
      clearInterval(timeinterval);
	  window.location="index.php?r="+id;
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock,1000);
}
	
	
	
	</script>
	<style>
	.thumbnail p{
	margin-left:7%;

}
.box-header {
   
    background-color:#FFF;
    text-align: center;
	 font-size:25px;
	 font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif; 
	  line-height: 2;
	  border-radius:10px;
	}
.bid_btn{
	margin-left:6%;
	color:#FFFBF0;
}
	</style>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script>
	function createlink()
{
	  var b=$(".pricetext").each(function(){
		  var c=$(this).attr('id');
	var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     // var a= document.getElementById('two');
	alert(xmlhttp.responseText);
		 
  }}
	  
    
  });
  xhttp.open("GET", "updateindex.php?p="+c, true);
  xhttp.send();
}
	</script
</head><!--/head-->

<body style="background-color: rgb(241, 241, 241);">


	<script>
	function details_only(pid)
	{
		
		window.location="product_details.php?q="+pid;
	}
	
	function makebid()
	{
		
	
	}
	</script>
	
		
		<?php include_once("template_header.php")?> 
	
	
	<section id="slider"><!--slider-->
		<div class="thumbnail" style="margin-left:10%; margin-right:18%;"> 	
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									
								</div>
								<div class="col-sm-12">
									<img src="images/home/image1.jpg" style="height:350px;width:950px; margin-left:-150px; class="girl img-responsive" alt="Something Cool" />
									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									
								</div>
								<div class="col-sm-12">
									<img src="images/home/image2.jpg" style="height:350px;width:950px; margin-left:-150px; class="girl img-responsive" alt="Something Cool" />
									
								</div>
							</div>
							
							<div class="item">
							
								<div class="col-sm-12">
									<img src="images/home/image3.jpg" style="height:350px;width:950px; margin-left:-150px; margin-right:3px;" class="girl img-responsive" alt="Something Cool" />									
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" style="margin-top:-20px;" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" style="margin-right:235px; margin-top:-20px;" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
		</div>
	</section><!--/slider-->
	

	
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-1">
					
				</div>
				
				<div class="col-sm-10 padding-right">
					<div class="features_items"><!--features_items-->
							<div class="thumbnail" style="margin-left:3%; margin-right:3%;">
					<br>
					<h2 class="title text-center">Latest Items</h2>
					 	
							<div class="container">
								<div class="row">
								<?php echo $dynamicList;?>
                                </div>
                                </div>
								</div>
						
						
					</div><!--features_items-->
					
				</div>	
				</div>
			</div>
	</section>
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 BidBot </p>
					<p style="text-align:center;"> <b> All rights sold at reasonable rate </b></p>
					<p class="pull-right">Designed by <span><a target="_blank" href="Contact_us.php">Team BidBot</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>