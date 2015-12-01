<?php include_once("connect_to_mysql.php")?> 
 <?php
 $dynamicList="";
 $sql=mysqli_query($conn,"SELECT * from products ORDER BY ProductID");
 $productCount=mysqli_num_rows($sql);
 if($productCount>0)
 {
	 $i=0;
	 while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))
	 {
		 $pname=$row["Pname"];
		$price=$row["StartingPrice"];
		$pid=$row["ProductID"];
		  $dynamicList.='   <div class="col-md-2 column productbox"	style="text-align:center">
    <img src="images/store_images/'.$pid.'.jpg"  height="100" width="100" style=" margin-left: auto;margin-right: auto;">
    <div class="producttitle">'.$pname.'</div>
	<div class="hidden">'.$pid.'</div>
	<div class=""><div class="producttitle">Time</div></div>
    <div class="productprice"><div class="pricetext">Rs '.$price.'</div>
	
	
	<div class=""><a href="#" class="btn btn-danger btn-sm" role="button">BID NOW</a></div>
	</div>
</div>
';
$i++;
if($i%3==0)
$dynamicList.='</div><div class="row">';
	 }
	
 }
 else
 {
	  $dynamicList="Be our First Seller";
 }
mysqli_close($conn);
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.productbox {
    background-color:#ffffff;
	padding:10px;
	margin-bottom:10px;
	-webkit-box-shadow: 0 8px 6px -6px  #999;
	   -moz-box-shadow: 0 8px 6px -6px  #999;
	        box-shadow: 0 8px 6px -6px #999;
}

.producttitle {
    font-weight:bold;
	padding:5px 0 5px 0;
	text-align:center;
}

.productprice {
	border-top:1px solid #dadada;
	padding-top:5px;
}

.pricetext {
	font-weight:bold;
	font-size:1.4em;
}

</style>

</head>

<body>

<!--
<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/store_images/product1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>-->
						



<div class="container">
<div class="row">

  <!--
   <div class="col-md-2 column productbox"   style="background-color:black ; text-align:center;color:white;">
  <div class="producttitle">Belt</div>
  <br></br>
<img src="images/store_images/1.jpg" class="img-responsive"  align="middle" style=" margin-left: auto;margin-right: auto;width:13em">
<br></br>
<p>Time</p>
<p>Price</p>
		<a href="#" class="btn btn-primary btn-default " >Bid Now</a>
</div>
</div>-->

<?php echo $dynamicList;?>
</div>
</div>
</body>
</html>
