<?php 
session_start();
$user=$_SESSION['login_user_id'];
$title=$_POST['title'];
$years=$_POST['years'];
$details=$_POST['details'];
$price=$_POST['price'];
$category=0;	
$category=$_POST['category'];

include_once("connect_to_mysql.php");
 $sql=mysqli_query($conn,"SELECT * from products");
 $productCount=mysqli_num_rows($sql);
 $productCount=$productCount+1;
 if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
	 // echo end();
	  $t=explode('.',$_FILES['image']['name']);
	  $t=end($t);
      $file_ext=strtolower($t);
      
      $expensions= array("jpg","jpeg","png","jpe");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPG  file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/store_images/".$productCount.".jpg");
        
         echo "Success";
      }
      else{
         print_r($errors);
      }
   }
   
date_default_timezone_set('Asia/Calcutta');
 $datetime =new datetime(date('Y/m/d H:i:s'));
$datetime->modify('+1 day');
$enddate=$datetime->format('Y-m-d H:i:s');

$sq="INSERT INTO products(ProductID,Pname,StartingPrice,SellerID,CategoryID,YearsofUsage,Details) values('".$productCount."','".$title."','".$price."','".$user."','".$category."','".$years."','".$details."')";
$sq2="INSERT INTO auction(ProductID,EndTime,CurrentPrice) values('".$productCount."','".$enddate."','".$price."')";
if ($conn->query($sq) === TRUE && $conn->query($sq2) === TRUE) {
    echo "New record created successfully";
	header("location: index.php");
} else {
    echo "Error: " . $sq . "<br>" . $conn->error;
}

$conn->close();

?>
