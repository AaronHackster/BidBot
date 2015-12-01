	
<?php session_start();include_once("template_header.php")?> 
<?php 
if (isset($_REQUEST['q'])) {
	
$pid=str_replace("#","",$_REQUEST['q']);


}
else
{
//	header('index.php');
}
if (isset($_SESSION["login_user_name"])) 
{

}else{
	//header('index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BidBot</title>
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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	
	
	<script>
	function changeprice(a)
	{
		var a1,a2;
		a1=a[0];
		a2=a[1];
		var id=<?php echo $pid; ?>;
		var c=document.getElementById(id+"p");
		//console.log();
		c.textContent="Rs "+a1;
		var d=document.getElementById(id+"b");
		initializeClock(id,a[2]+" "+a[3]);
		d.textContent=" "+a2;//console.log(d);
	}
	function createlink()
{
	var xhttp=0;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();	
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
       var b=xhttp.responseText;
	   var a=b.split(" ");
	   //console.log(b);
	   
	   changeprice(a);
	}
  }
  //var t=document.getElementById("secret");
  //console.log(t.value);
  xhttp.open("GET", "update_ajax_details.php?q="+"<?php echo $pid; ?>", true);
  xhttp.send();
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
		window.location="index.php?r="+id;
      clearInterval(timeinterval);
    }
  }

  updateClock();
  //var timeinterval = setInterval(updateClock,1000);
}

	</script>
	
	
	
	
	
	
	
	
	
	
	
	</head><!--/head-->

<style>
	
    #navbar
{
		background-color:#000;
}
#searchbar
{
padding:10px;
	
}
h2
{
	
	font-size:30px;
}
    </style>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/store_images/<?php echo $pid?>.jpg" alt="" />
								
							</div>
						

						</div>
											
						<?php  
						
						include_once("connect_to_mysql.php");						
						$sql=mysqli_query($conn,"SELECT * from auction,products where  products.ProductID=auction.ProductID and auction.ProductID=".$pid);
						$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
						$pname=$row["Pname"];
						$price=$row["CurrentPrice"];
						$status=$row["status"];
						$years=$row["YearsofUsage"];
						$details=$row["Details"];
						$category=$row["CategoryID"];
						$buyerId=$row["BuyerID"];
						$enddate=$row["EndTime"];
						$sellerid=$row["SellerID"];
						$bname="Be the First Bidder";
						
						$sqc=mysqli_query($conn,"SELECT * from category where  CategoryID= ".$category);
						$rowc=mysqli_fetch_array($sqc,MYSQLI_ASSOC);
						$categoryname=$rowc["CategoryName"];
						
						$sqb=mysqli_query($conn,"SELECT * from users where  UserID= ".$sellerid);
						$rowb=mysqli_fetch_array($sqb,MYSQLI_ASSOC);
						$seller=$rowb["Name"];
						
						
						if($buyerId!=null)
						{$sql2=mysqli_query($conn,"SELECT * from users where  UserID= ".$buyerId);
						
						if($sql2!=null)
						{$row2=mysqli_fetch_array($sql2,MYSQLI_ASSOC);
						$bname=$row2["Name"];
						}}
						$time='';$bnow='';
						
						if($status=="NOT OVER")
						{
							
							$time='<b><span class="hours"></span>: <span class="minutes"></span>:<span class="seconds"></span></b>';
							$bnow='<button class="btn btn-group-lg cart type="submit" role="button" >
										<i class="fa fa-shopping-cart"></i>
										Bid now
									</button>';
						}
						else{
							if($bname=="Be the First Bidder")
							{$bname='No Bidders';
						$bnow="<h2><b> UNSOLD</b></h2>	";
							}
							else
								$bnow="<h2><b> SOLD</b></h2>	";
							}
						echo '						<div class="col-sm-7">
						<form action="product_bidded_details.php" method="post">	
							<div class="product-information"><!--/product-information-->
								<input type="hidden" name="productid" value='.$pid.'>
								<h2 class="top">'.$pname.'</h2>
								<p>Product ID:'.$pid.'</p>
								<span>
									<span id="'.$pid.'p">Rs '.$price.'</span>
                                    </span><br>
									<div style="font-size:30px" id="'.$pid.'">
									'.$time.'
											</div>
											<span>
									'.$bnow.'
								</span>
								<br>
                                <br>
								<p ><b>Highest Bidder</b>:  <span id="'.$pid.'b">'.$bname.'</span></p
                                <p><b>Category:</b> '.$categoryname.'</p>
                                <p><b>Seller Name:</b> '.$seller.'</p>
								<p><b>Years of Usage:</b> '.$years.'</p>
								<p><b>Details:  </b>'.$details.'</p>	
                                </div><!--/product-information-->
								</form>
						</div>';
						if($status=="NOT OVER")
						{echo '<script> initializeClock("'.$pid.'","'.$enddate.'"); </script>';
						};
							?>
					</div><!--/product-details-->
					
					
					
					<script><?php if($status=="NOT OVER")
						{
							echo 'window.setInterval(createlink,1000);';
						}
						
							?> 
</script>
				</div>
			</div>
		</div>
	</section>
	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>