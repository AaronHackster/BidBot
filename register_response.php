<?php include_once("connect_to_mysql.php")?> 
<?php 
header('Content-Type:text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>'
echo'<response>';
$mail=GET['e-mail'];
 $sql=mysqli_query($conn,"SELECT * from users where UserID=".$mail);
 $productCount=mysqli_num_rows($sql);
 if($productCount>0)
	 echo 'There already exists a user with the given e-mail address';
 else
	 echo'';
echo'</response';
?>