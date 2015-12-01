
<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Register</title>
<script src="js/jquery.min.js"></script>
<link rel='stylesheet' href="css/bootstrap.min.css"/>
<script src="js/bootstrap.min.js"></script>
<script>
function validateForm()
{
	var nam=document.getElementById("element-1").value;
	var email=document.getElementById("element-2").value;
	var address=document.getElementById("element-3").value;
	var password=document.getElementById("element-5").value;
	var cpassword=document.getElementById("element-6").value;
	var acc=document.getElementById("element-7").value;

if ((nam==null || nam=="") && (email==null || email=="") && (cpassword==null || cpassword=="") && (address==null || address=="")&& (password==null || password=="") )
  {
  alert("All Field must be filled out");
  return false;
  }
if (nam==null || nam=="")
  {
  alert("Name must be filled out");
  return false;
  }
  if (acc==null || acc=="")
  {
  alert("Account No must be filled out");
  return false;
  }
if (email==null || email=="")
  {
  alert("Email-id must be filled out");
  return false;
  }
if (address==null || address=="")
  {
  alert("Address must be filled out");
  return false;
  }
if (password==null || password=="")
  {
  alert("password must be filled out");
  return false;
  }
  if (cpassword==null || cpassword=="" || password!=cpassword)
  {
  alert("Password doesnt match");
  return false;
  }
  if(password.length>40)
  {
	  alert("Password can't be that large ");
	  return false;
  }
  if(password.length<5)
  {
	   alert("Password can't be that small");
	  return false; 
  }
}
	
</script>
</head>

<body>

<br><?php session_start();
?>
<?php include_once("template_header.php")?>

<div class="container">
<div class="col-lg-3">
</div>
<div class="col-lg-5">
<h2>Get started with Bidbot</h2>
</div>
</div>


<div class="container">
	<div class="col-lg-3">
    </div>
	<div class="col-lg-5">
	<form class=" cm" method="post" action="registering.php" onsubmit="return validateForm()">
    	<label for="element-1">Name :</label>
        <input type="text" name="name"class="form-control" id="element-1" placeholder="Enter Name" required>
   
    <br>
    	<label for="element-2">Email-id :</label>
        <input type="email" name="mailid" class="form-control" id="element-2" placeholder="Enter your Email-id" required>
	<br>
		<label for="element-7">Account Number :</label>
        <input type="number" name="accnum" class="form-control"	 id="element-7" placeholder="Enter your Account number" required>
		
    <br>

    	<label for="element-3">Address :</label>
        <input type="text" name="address" class="form-control"	 id="element-3" placeholder="Enter your Address" required>

    <br>

    	<label for="element-5">Password :</label>
        <input type="password" name="password" class="form-control" id="element-5" placeholder="Enter Password" required>

    <br>

    	<label for="element-6">Confirm Password :</label>
        <input type="password" name="cpassword" class="form-control" id="element-6" placeholder="Retype the password" required>
		   <br>
		  
		   
		<div class="row">
<div class="col-lg-5">
</div>
<div class="col-lg-5">
<button type="submit"  class="btn btn-info"  >Sign-Up</button>
</div>
</div>
		
		
    </form>

<p> <br></p>
    

</div>



</div>
</body>
</html>
