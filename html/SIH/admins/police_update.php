<?php 
  include('header.php');
  include('sidebar.php');
  ?>
<?php
// include database connection file
require_once'dbconfig.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  
$stname=$_POST['stname'];
$stid=$_POST['stid'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$address=$_POST['address'];
$state=$_POST['state'];
$district=$_POST['district'];
$pincode=$_POST['pincode'];

// Query for Query for Updation
$sql="UPDATE `police_details` SET `station_name`='$stname',`station_id`='$stid',`P_email`='$email',`P_contact`='$contact',`P_address`='$address',`P_district`='$district',`P_state`='$state',`P_pincode`='$pincode' where P_id='$userid';";
//Prepare Query for Execution
$query = $dbh->prepare($sql);

$query->execute();

echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='police_users.php'</script>"; 
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

    <title>Admin Police Update</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body id="page-top">

  <div id="wrapper">
     
      
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="admin.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add user</li>
          </ol>

          <!-- Page Content -->
          <h1>Add User</h1>
         <hr>
     
<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT * FROM `police_details` where P_id='$userid';";
//Prepare the query:
$query = $dbh->prepare($sql);
//Bind the parameters

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
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Station name</b>
<input type="text" name="stname" value="<?php echo htmlentities($result->station_name);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Station ID</b>
<input type="text" name="stid" value="<?php echo htmlentities($result->station_id);?>" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-4"><b>Contact</b>
<input type="text" name="contact" value="<?php echo htmlentities($result->P_contact);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Email</b>
<input type="text" name="email" value="<?php echo htmlentities($result->P_email);?>" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-4"><b>Address</b>
<input type="text" name="address" value="<?php echo htmlentities($result->P_address);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>District</b>
<input type="text" name="district" value="<?php echo htmlentities($result->P_district);?>" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-4"><b>State</b>
<input type="text" name="state" value="<?php echo htmlentities($result->P_state);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Pincode</b>
<input type="text" name="pincode" value="<?php echo htmlentities($result->P_pincode);?>" class="form-control" required>
</div>
</div>  

 
<?php }} ?>

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<br>
<input type="submit" class="btn btn-info" name="update" value="Update">
</div>
</div> 
     </form>
            
      
	</div>
</div>
 

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="admin.php?logout='1'">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- textaddneww -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:15px"
     data-ad-client="ca-pub-8906663933481361"
     data-ad-slot="3318815534"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>
</htm