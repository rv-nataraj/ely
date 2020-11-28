
<?php 
  include('../functions.php');
   if (!iscomplainant()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
  include('header.php');
  include('sidebar.php');
  include('includes/logout.php');
?>
<?php

require_once'../functions.php';
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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="../police/css/sb-admin.css" rel="stylesheet">
    <link href="../police/css/style.css" rel="stylesheet">
    <link href="../police/css/card.css" rel="stylesheet">
  </head>
  <body id="page-top">

  <div id="wrapper">
  <div id="content-wrapper">

  <?php
require_once'dbconfig.php';
  if(isset($_POST['update']))
{
  $userid=intval($_GET['id']);
$DOB=($_POST['DOB']);
$phone=($_POST['phone']);
$email=($_POST['email']);
$aadhar=($_POST['aadhar']);
$address=($_POST['address']);
$pincode=($_POST['pincode']);
$district=($_POST['district']);
$state=($_POST['state']);
$id=$_SESSION['user']['id'];

$profilename = $_FILES["image"]['name'];
$profiletmpname = $_FILES["image"]['tmp_name'];
if(empty($profilename))
{

}
else{
  move_uploaded_file($profiletmpname, '../profile/'.$profilename);
  $sql1="update users set profile='$profilename' where id='$id';";
  $query1 = $dbh->prepare($sql1);
  $query1->execute();
  }
$sql="update complainant set C_DOB='$DOB',C_Mobile='$phone',C_Email='$email',C_aadhar='$aadhar',C_Address='$address',C_Pincode='$pincode',C_District='$district',C_State='$state' where id='$userid';";

//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Query Execution
$query->execute();
// Message for successfull insertion
echo "<script>alert('Record Updated successfully');</script>";
echo "<script>window.location.href='complainant_profile.php'</script>"; 

}
?>

<?php 

$userid=intval($_GET['id']);

$sql = "SELECT * from complainant where id='$userid' ;";
//Prepare the query:
$query = $dbh->prepare($sql);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{            
?>  
          <!-- Icon Cards-->
          <div class="container">

<div class="card bg-light border border-primary">
<br>

   
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Update Account Details</h4>
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
        <input type="text" class="form-control" name="name" value="<?php echo htmlentities($result->C_Name);?>" >
    </div> <!-- form-group// -->
    <!-- form-group// -->
    
        
     <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-birthday-cake"></i> </span>
		 </div>
     <input type="date" id="birthDate"  name="DOB" class="form-control" value="<?php echo htmlentities($result->C_DOB);?>" >
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
    	<input type="text" class="form-control" name="phone"   value="<?php echo htmlentities($result->C_Mobile);?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input type="email"  class="form-control" name="email"   value="<?php echo htmlentities($result->C_Email);?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-id-badge"></i> </span>
		 </div>
        <input type="text" class="form-control" name="aadhar"   value="<?php echo htmlentities($result->C_aadhar);?>">
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="far fa-address-card"></i> </span>
		 </div>
         <input type="text"  class="form-control" name="address"   value="<?php echo htmlentities($result->C_Address);?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-map-pin"></i> </span>
		 </div>
        <input type="numbers"  class="form-control" name="pincode"   value="<?php echo htmlentities($result->C_Pincode);?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
		 </div>
        <input type="text" class="form-control" name="district" value="<?php echo htmlentities($result->C_District);?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-flag"></i> </span>
		 </div>
        <input type="text"  class="form-control" name="state"  value="<?php echo htmlentities($result->C_State);?>">
    </div> <!-- form-group// -->
    <!-- form-group// -->
    <div class="form-group input-group">
    <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <?php
}}?>
    </div> <!-- form-group// -->
     <!-- form-group// -->                                      
    <div class="form-group">
    <center>
    <input type="submit" class="btn btn-success btn-block" name="update" value="Update">&nbsp;

</center>
    </div> <!-- form-group// -->      
                                                              
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


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>



  </body>

</html>
