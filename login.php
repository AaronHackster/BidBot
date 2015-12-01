<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="js/jquery.min.js"></script>
<link rel='stylesheet' href="css/bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<title>Sign In</title>
</head>

<body>

<div class="container">

 <!-- Trigger the modal with a button -->
 
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Login</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">x</button>
            <h3>Login to Bidbot</h3>
      </div>
      
      <div class="modal-body">
        <form method="post" action='' name="login_form" class="form-inline">
              <p>Email id :           <input type="text" class="form-control" name="eid" id="email" placeholder="Email"></p>
              <p>Password :                   <input type="password" class="form-control" name="passwd" placeholder="Password"></p>
              <div class="checkbox">
  			<label><input type="checkbox" value=""> Remember me</label>
	</div>
              <br>
              <br>
              <p><button type="submit" class="btn btn-primary">Sign in</button>
                <a href="#">Forgot Password?</a>
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
</div>


</body>
</html>
