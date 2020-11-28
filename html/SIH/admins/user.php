<!DOCTYPE html>
<html lang="en">
<?php
// include database connection file
require_once'dbconfig.php';

// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$uid=intval($_GET['del']);
//Qyery for deletion
$sql = "delete from users WHERE  id='$uid';";
// Prepare query for execution
$query = $dbh->prepare($sql);
// bind the parameters

// Query Execution
$query -> execute();
// Mesage after updation

// Code for redirection
echo "<script>window.location.href='user.php'</script>"; 

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
    
    <title>SB Admin - Blank Page</title>
  
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
          <center><b><h1>MANAGE ADMIN USER</h1></b></center>
          <div class="container">
<div class="table-responsive">
    <table class="table">
            <tr>
              <th>id</th>
              <th>NAME</th>
              <th>username</th>
              <th>password</th>
              <th>option</th>
            </tr>
          </thead>
          <tbody>
          <?php 
$sql = "SELECT * from users WHERE user_type='admin';";
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
    <td><?php echo htmlentities($result->id);?></td>
    <td><?php echo htmlentities($result->name);?></td>
    <td><?php echo htmlentities($result->username);?></td>
    <td><?php echo htmlentities($result->password);?></td>
 
              <td>
            
              <a href="user.php?del=<?php echo htmlentities($result->id);?>"><button type="button" class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');" ><span class="fa fa-trash"></span> delete</button></a>
              <a href="update.php?id=<?php echo htmlentities($result->id);?>"><button type="button" class="btn btn-primary btn-xs" ><span class="fa fa-pencil-square-o"></span>&nbsp;&nbsp;&nbsp;&nbsp;Edit</button></a>

    </td>
            </tr>
    <!-- /.delete -->

            <?php 
// for serial number increment
$cnt++;
}} ?>
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
<!-- textaddneww -->

  </body>

</html>
