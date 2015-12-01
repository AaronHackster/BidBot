
<?php 
 session_start();
// include_once("loggingin.php");
if(!isset($_SESSION['login_user_name']))
{
	
	header("location: Register.php");
//	header('Location: http://localhost/Happy2Help/BidBot/Register.php');

}
include_once("template_header_logged_in.php");?> 
<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Post Ad</title>
<script src="js/jquery.min.js"></script>
<link rel='stylesheet' href="css/bootstrap.min.css"/>
<script src="js/bootstrap.min.js"></script>
<!--<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-theme.min.css">-->

<script>
function show( t)
{

var th=document.getElementById("showfile");
	th.value=t.value.split("fakepath\\")[1];
	
	
}

function validateProductForm()
{
	console.log('asd');
	var title=document.getElementById("element-1").value;
	var years=document.getElementById("element-2").value;
	var category=document.getElementById("element-5").value;
	var startingprice=document.getElementById("element-5").value;
	var Details=document.getElementById("element-3").value;

if ((title==null || title=="") && (years==null || years=="") && (category==null || category=="")&& (Details==null || Details)&& (startingprice==null || startingprice=="") )
  {
  alert("All Field must be filled out");
  return false;
  }
if (title==null || title=="")
  {
  alert("Title must be filled out");
  return false;
  }
  if (startingprice==null || startingprice=="")
  {
  alert("Starting price must be filled out");
  return false;
  }
if (years==null || years=="")
  {
  alert("Years Of Usage must be filled out");
  return false;
  }
if (category==null || category=="")
  {
  alert("category must be filled out");
  return false;
  }
if (Details==null || Details=="")
  {
  alert("Details must be filled out");
  return false;
  }
  if(Details.length>100)
  {
	  alert("Details can't be that large ");
	  return false;
  } 
  if(years<0)
  {
	  alert("Years Of Usage can't be that large ");
	  return false;
  }
  if(Details.length<5)
  {
	   alert("Details can't be that small");
	  return false; 
  }
}
</script>
<style>
/*table layout - last column*/
table tr td:last-child {
    white-space: nowrap;
    width: 1px;
    text-align:right;
}

/* layout.css Style */
.upload-drop-zone {
	height: 200px;
	border-width: 2px;
	margin-bottom: 20px;
	}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
}



.image-preview-input {
    position: relative;
    overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
</style>
</head>

<body>
<!--<script src="bootstrap.js"></script>
<script src="bootstrap.min.js"></script>-->

<div class="container">
<div class="col-lg-3">
</div>
<div class="col-lg-5">
<h1>Post your Free Ad</h1>
</div>
</div>



<div class="container">
	<div class="col-lg-3">
    </div>
	<div class="col-lg-5">
    <br>
	<form  class=" cm" method="post" action="addingproduct.php" enctype="multipart/form-data" onsubmit="return validateProductForm();">
    	<label for="element-1">Ad Title :</label>
        <input type="text" class="form-control" name="title" id="element-1" placeholder="Enter Title for your Ad">
   
    <br>
   <label for="element-2"> Years of Usage :</label>
        <input type='number' class="form-control" name="years" id="element-2" placeholder="Enter years used">
        
        <br>
        <div class="row">    	
        <div class="col-md-12">
        	<label for="element-3"  >Category:</label>
            <select type="text" class="form-control multiselect multiselect-icon" id="element-5" name="category" role="multiselect" >          
              <option value="1">Electronics</option>          
              <option value="2">Household</option>
              <option value="3">Vehicles</option>
              <option value="4">Other</option>
            </select> 
        </div>        
	</div>
        <br>
   <label for="element-4">Ad Details :</label>
        <textarea type="text" class=" form-control-lgg" id="element-3" name=" details" placeholder="Enter Details of the product"  style="margin: 0px -2px 0px 0px;height:116px;width:445px;"></textarea>
        
        <br>
        <br> 
     <div class="row">
    	<div class="col-md-12">
        	<label for="element-5">Upload Photos :</label>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="input-group image-preview">
						<input placeholder="" type="text" class="form-control image-preview-filename" id="showfile" disabled="disabled">
						<!-- don't give a name === doesn't send on POST/GET --> 
						<span class="input-group-btn"> 
						<!-- image-preview-clear button -->
						<button type="button" class="btn btn-default image-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
						<!-- image-preview-input -->
						<div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
							<input type="file" accept="image/png, image/jpeg, image/gif" name="image" onchange="show(this);"/>
							<!-- rename it --> 
						</div>
						</span> </div>
					<!-- /input-group image-preview [TO HERE]--> 
					
					<br />
					
					<!-- Drop Zone -->
					
					<br />
					
					
				</div>
			</div>
		</div>
        </div>

<br>
   <label for="element-4">Starting Price :</label>
        <input type="text" class="form-control" id="element-4" name="price" placeholder="Enter your Base Price">
        


<p> <br></p>  
    
</div>

<div class="container">
<div class="row">
<div class="col-lg-5">
</div>
<div class="col-lg-5">
<button type="submit" class="btn btn-info">Submit</button>
</div>
</div>
</div>
</form>

</div>
        
       
</body>
</html>
