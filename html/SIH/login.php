<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
    
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="alert/toastr.min.css">
	<script src="alert/toastr.js.map"></script>
<script src="alert/jquery-3.3.1.min.js"></script>
<script src="alert/toastr.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="main.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="admins/img/2.png" class="brand_logo" alt="Logo">
					</div>
					</div>
				
			<br>
				<div class="d-flex justify-content-center form_container">
				
					<form method="post" action="login.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user"  placeholder="username" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass"  id="myInput" placeholder="password" required>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input"  onclick="myFunction()" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">&nbsp;Show Password</label>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="login_btn" class="btn login_btn w-50 border border-success">Login</button>&nbsp;
					 <a href="create.php" class="btn btn-primary w-50 border border-danger">Sign Up</a>
				   </div>
					</form>
				</div>
				
				<div class="mt-2	">
					<div class="d-flex justify-content-center links">
					<center>                
                <a href="complaintterms.php" class="btn btn-success border border-danger">Anonymous Complaint</a>
                </center>
					</div>
					
					</div>
					
				<br>	
				
			</div>
		</div>
	</div>
	<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>
</html>
