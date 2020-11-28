<?php
require_once'police/dbconfig.php';
require_once'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USER ACCOUNT CREATE</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="police/css/sb-admin.css" rel="stylesheet">
    <link href="police/css/style.css" rel="stylesheet">
    <link href="police/css/card.css" rel="stylesheet">
  </head>
  <body id="page-top">

  <div id="wrapper">
  <div id="content-wrapper">

  <?php

  if(isset($_POST['insert']))
{

$name=($_POST['name']);
$username=($_POST['username']);
$DOB=($_POST['DOB']);
$gender=($_POST['gender']);
$phone=($_POST['phone']);
$email=($_POST['email']);
$aadhar=($_POST['aadhar']);
$address=($_POST['address']);
$pincode=($_POST['pincode']);
$district=($_POST['district']);
$state=($_POST['state']);
$passwd=($_POST['passwd']);

$result = mysqli_query($db,"SELECT * from users WHERE name='$name';");
    $row=mysqli_fetch_array($result);
    $names=$row["name"];

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $passwd);
$lowercase = preg_match('@[a-z]@', $passwd);
$number    = preg_match('@[0-9]@', $passwd);
$specialChars = preg_match('@[^\w]@', $passwd);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($passwd) < 8) {
  echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');</script>";
}
elseif(strtolower($names)==strtolower($name)){
  
  echo "<script>alert('Name already exist in database');</script>";

}
  else{
 

$profilename = $_FILES["image"]['name'];
$profiletmpname = $_FILES["image"]['tmp_name'];


move_uploaded_file($profiletmpname, 'profile/'.$profilename);

$sql="INSERT INTO `complainant`(`C_Name`, `C_Gender`, `C_DOB`, `C_Mobile`, `C_Email`, `C_aadhar`, `C_Address`, `C_Pincode`, `C_District`, `C_State`) values('$name','$gender','$DOB','$phone','$email','$aadhar','$address','$pincode','$district','$state')";
$sql1="INSERT INTO users( `name`, `username`, `password`, `user_type`,`profile`) VALUES('$name','$username','$passwd','complainant','$profilename')";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
$query1 = $dbh->prepare($sql1);

// Query Execution
$query->execute();
$query1->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='login.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('User name exist already');</script>";
echo "<script>window.location.href='login.php'</script>"; 
}
}

}
?>
          <!-- Icon Cards-->
          <div class="container">

<div class="card bg-light border border-primary">
<br>
<div class="text-center">
  <img class="w-100"  src="police/img/Security_Key.gif"
          data-holder-rendered="true">
  
  
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
  <br>
  

	<form name="insertrecord" method="post" role="form" enctype="multipart/form-data">
  <div class="form-group input-group">
		<div class="input-group-prepend">
    <span class="input-group-text"><i class="far fa-user-circle"></i></span>
    &nbsp;&nbsp; &nbsp;&nbsp; <input type="file"  name="image"> 
                    </div>
    </div>
    
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input  class="form-control" name="name" placeholder="Full name" type="text"required>
    </div> <!-- form-group// -->
    
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-users"></i> </span>
		 </div>
        <input  class="form-control" name="username" placeholder="username" type="text"required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <label>Gender</label><br>
    <div class="input-group-prepend">
                            <div class="form-check form-check-inline" >
                    <input class="form-check-input" type="radio"  name="gender" id="inlineRadio1" value="male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  name="gender" id="inlineRadio2" value="female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender"  id="inlineRadio3" value="other" >
                    <label class="form-check-label" for="inlineRadio3">other</label>
                    </div>
		 </div>
        
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-birthday-cake"></i> </span>
		 </div>
     <input type="date" id="birthDate" placeholder="yyyy-mm-dd" name="DOB" class="form-control" required>
    </div> <!-- form-group// -->
             <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" style="max-width: 80px;">
		    <option selected="">+91</option>
		    <option value="1">+972</option>
		    <option value="2">+198</option>
		    <option value="3">+701</option>
		</select>
    	<input  class="form-control" name="phone" placeholder="Phone number" type="text" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input  class="form-control" name="email" placeholder="Email address" type="email" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-id-badge"></i> </span>
		 </div>
        <input  class="form-control" name="aadhar" size="12" placeholder="aadhar card number" type="text" required>
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="far fa-address-card"></i> </span>
		 </div>
         <textarea class="form-control" name="address" placeholder="Address" id="exampleFormControlTextarea1" rows="2" required></textarea>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-map-pin"></i> </span>
		 </div>
        <input  class="form-control" name="pincode" placeholder="pincode" type="numbers" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
		 </div>
        <input  class="form-control" name="district" placeholder="district" type="text"required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-flag"></i> </span>
		 </div>
        <input  class="form-control" name="state" placeholder="state" type="text" required>
    </div> <!-- form-group// -->
    <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="passwd" size="12" placeholder="Create password" type="password" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  
    </div> <!-- form-group// -->
     <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" name="insert" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->
<a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    </div>
    </div>
</div> 
<!--container end.//-->



          <!-- Icon Cards-->


        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        

      
      <!-- /.content-wrapper -->

    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
   
    <!-- Logout Modal-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>



  </body>
 

</html>
