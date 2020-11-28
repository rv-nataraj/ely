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
$fname=$_POST['name'];
$lname=$_POST['username'];
$password=$_POST['password'];
$user_type=$_POST['user_type'];


// Query for Query for Updation
$sql="update users set name=:fn,username=:ln,password=:eml,user_type=:cno where id=:uid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':fn',$fname,PDO::PARAM_STR);
$query->bindParam(':ln',$lname,PDO::PARAM_STR);
$query->bindParam(':eml',$password,PDO::PARAM_STR);
$query->bindParam(':cno',$user_type,PDO::PARAM_STR);

$query->bindParam(':uid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='user.php'</script>"; 
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

    <title>SB Admin - Blank Page</title>

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
$sql = "SELECT name,username,password,user_type,id from users where id=:uid";
//Prepare the query:
$query = $dbh->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
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
<div class="col-md-4"><b>Name</b>
<input type="text" name="name" value="<?php echo htmlentities($result->name);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>User Name</b>
<input type="text" name="username" value="<?php echo htmlentities($result->username);?>" class="form-control" required>
</div>
</div>

<div class="row">
<div class="col-md-4"><b>Password</b>
<input type="text" name="password" value="<?php echo htmlentities($result->password);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>user_type</b>
<input type="text" name="user_type" value="<?php echo htmlentities($result->user_type);?>" class="form-control" maxlength="10" required>
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

</body>
</htm