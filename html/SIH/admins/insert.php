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
$fname=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];



// Query for Insertion
$sql="INSERT INTO users(name,username,password,user_type) VALUES('$fname','$username','$password','admin')";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters

// Query Execution
$query->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion

echo "<script>alert('Record inserted successfully');</script>";

}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='user.php'</script>"; 
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

    <title>Admin add admin</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
          <div class="page-header">
    <h1 class="text-center">Add admin user</h1>      
  </div>
          <hr>
          <form name="insert" method="post">
<div class="row">
<div class="col-md-4"><b> Name</b>
<input type="text" name="name" class="form-control" required>
</div>
<div class="col-md-4"><b>User Name</b>
<input type="text" name="username" class="form-control" required>
</div>
</div>

<div class="row">
<div class="col-md-4"><b>password</b>
<input type="password" name="password" class="form-control" required>
</div>


        
 </select>
</div>
</div>  





<div class="row" style="margin-top:1%">
<div class="col-md-8">
  
<input type="submit" class="btn btn-info" name="insert" value="Submit">
</div>
</div> 
             

</form>

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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
