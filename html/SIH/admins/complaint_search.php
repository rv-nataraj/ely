<!DOCTYPE html>
<html lang="en">
<?php
include('../functions.php');
if (!isadmin()) {
 $_SESSION['msg'] = "You must log in first";
 header('location: ../login.php');
}
?>
<?php
require_once'dbconfig.php';
require_once'../functions.php';
include("header.php");
include("sidebar.php");
include("includes/logout.php");

?>

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  
    <link href="css/menu.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">
  </head>
  <body id="page-top">

  <div id="wrapper">
  <div id="content-wrapper">




          <!-- Icon Cards-->
          <div class="container">
          <center><h3 style="color:white;background-color:blue;font-size:200%;"><b>COMPLAINT SEARCH DETAILS</b></h3></center>
           <br>
           
          <div class="card mb-3">
          <div class="container border border-primary">
          
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered border border-success " style="width:100%">
        <thead>
            <tr>
                <th>Complaint ID</th>
                <th>user_cat</th>
                <th>type</th>
                <th>product</th>
                <th>Status</th>
                <th>View Details</th>                              
            </tr>
        </thead>

        <?php 
    

$sql = "SELECT * from complaint";
//Prepare the query:
$query = $dbh->prepare($sql);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization

if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{              
   
?>  


        <tbody>
            <tr>
                <td><?php echo htmlentities($result->id);?></td>
                <td><?php echo htmlentities($result->user_cat);?></td>
                <td><?php echo htmlentities($result->type);?></td>
                <td><?php echo htmlentities($result->product);?></td>
                <td><?php echo htmlentities($result->status);?></td>
                <td><a href="complaint_view.php?id=<?php echo htmlentities($result->id);?>"><button type="button" class="btn btn-primary btn-xs" ><span class="fa fa-eye"></span></button></a></td>
                
            </tr>
            <?php 
// for serial number increment

}} ?>
        </tbody>
        
    </table>
    </div>
    </div>
    </div>
    </div>

          
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  </body>

</html>
