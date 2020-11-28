<!DOCTYPE html>
<html lang="en">
<?phpinclude('../functions.php');
  if (!isAdmin()) {
   $_SESSION['msg'] = "You must log in first";
   header('location: ../login.php');
 }
?>
<?php
require_once'dbconfig.php';
require_once'../functions.php';
if(isset($_REQUEST['del']))
{
$uid=intval($_GET['del']);

$result = mysqli_query($db,"SELECT * from police_details WHERE P_id='$uid';");
$row=mysqli_fetch_array($result);
$name=$row["station_name"];

$sql2 = "delete from  users WHERE  name='$name';";
$sql1 = "delete from  police_details WHERE  P_id='$uid';";
$query1 = $dbh->prepare($sql1);
$query3 = $dbh->prepare($sql2);
$query1 -> execute();
$query3 -> execute();

echo "<script>alert('Police user deleted sucessfully');</script>";
echo "<script>window.location.href='police_users.php'</script>"; 
}
include('includes/logout.php');
include('header.php');
include('sidebar.php');
?>
  <head>
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Admin - Police User</title>
  
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body id="page-top">

  <div id="wrapper">
  <div id="content-wrapper">
          <!-- Breadcrumbs-->
          <div class="container p-3 my-3 bg-primary text-white">
          <center><b><h4>MANAGE POLICE USER</h4></b></center>
          </div>
          <div class="container">
          <div class="container-fluid bg-light ">
          
                  </div>
                  <br>
                  <br>
<div class=" row table-responsive">
    <table class="table table-bordered">
    <thead class="thead-dark">
            <tr>
              <th>id</th>
              <th>Station Name</th>
              <th>Station ID</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Address</th>
              <th>District</th>
              <th>state</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
          <?php 

$sql = "SELECT * from police_details";
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
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($result->station_name);?></td>
    <td><?php echo htmlentities($result->station_id);?></td>
    <td><?php echo htmlentities($result->P_email);?></td>
    <td><?php echo htmlentities($result->P_contact);?></td>
    <td><?php echo htmlentities($result->P_address);?></td>
    <td><?php echo htmlentities($result->P_district);?></td>
    <td><?php echo htmlentities($result->P_state);?></td>

              <td>
              <a href="police_update.php?id=<?php echo htmlentities($result->P_id);?>"><button type="button" class="btn btn-primary btn-xs"><span class="fa fa-pencil-square-o"></span>&nbsp;&nbsp;&nbsp;&nbsp;Edit</button></a>
              <a href="police_users.php?del=<?php echo htmlentities($result->P_id);?>"><button type="button" class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');" ><span class="fa fa-trash"></span> delete</button></a>
              
              </td>
            </tr>



    <!-- /.delete -->
            <?php 
// for serial number increment
$cnt++;
}}?>
          </tbody>
        </table>
        </div>
</div>

     
           </div>

</div>
        <!-- /.container-fluid -->


      </div>
      <!-- /.content-wrapper -->

    </div>
    



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

<!-- textaddneww -->

  </body>

</html>
