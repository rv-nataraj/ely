<?php 
  include('header.php');
  include('sidebar.php');
  include('includes/logout.php');
  ?>
  <?php
// include database connection file
require_once'dbconfig.php';
if(isset($_POST['insert']))
{

// Posted Values  
$stname=($_POST['stname']);
$stid=($_POST['stid']);
$passwd1=($_POST['password']);
$contact=($_POST['contact']);
$email=($_POST['email']);
$address=($_POST['address']);
$district=($_POST['district']);
$state=($_POST['state']);
$pincode=($_POST['pincode']);

///$passwd1=md5($passwd);
// Query for Insertion
$sql="INSERT INTO police_details(`station_name`, `station_id`, `P_password`, `P_email`, `P_contact`, `P_address`,`P_district`,`P_state`,`P_pincode` ) VALUES('$stname','$stid','$passwd1','$email','$contact','$address','$district','$state','$pincode');";
$sql1="INSERT INTO users( `name`, `username`, `password`, `user_type`) VALUES('$stname','$stid','$passwd1','police')";
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
echo "<script>window.location.href='police_users.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='police_users.php'</script>"; 
}
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>admin police insert</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body id="page-top">

  <div id="wrapper">
  
      <div id="content-wrapper">
      <div class="container">
      <div class="page-header">
    <h1 class="text-center">Add Police user</h1>      
  </div>
              <div class="row">
                  <div class="col-md-3">
                  <form name="insertrecord" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Station Name</label>
      <input type="text" class="form-control"  name="stname" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Station ID</label>
      <input type="text" class="form-control"  name="stid" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Contact</label>
    <input type="text" class="form-control" id="inputAddress" name="contact" placeholder="" >
  </div>
  <div class="form-group">
  <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password"  >
  </div>
      <div class="form-group">
    <label for="inputAddress">Email</label>
    <input type="email" class="form-control"  name="email" placeholder="" >
    </div>
       
    <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control"  name="address" placeholder="" >
</div>
<div class="form-group">
    <label for="inputAddress">district</label>
    <input type="text" class="form-control"  name="district" placeholder="" >
</div>
<div class="form-group">
    <label for="inputAddress">State</label>
    <input type="text" class="form-control"  name="state" placeholder="" >
</div>
<div class="form-group">
    <label for="inputAddress">Pincode</label>
    <input type="text" class="form-control"  name="pincode" placeholder="" >
</div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck"  required>
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  
  <div class="text-center">
  <button type="submit" class="btn btn-primary" name="insert">Submit</button>
  <button type="reset" class="btn btn-secondary">Reset</button>
  
 
</div>
</form>
</div>
</div>
</div>
        <!-- /.container-fluid -->

       

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

       <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
