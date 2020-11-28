<?php 
  include('../functions.php');
   if (!ispolice()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
  include('header.php');
  include('sidebar.php');
  include('includes/logout.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Police pwd change</title>
    
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">
  </head>
  <body id="page-top">
  <?php 
   require_once'../functions.php';
  require_once'dbconfig.php';
if(isset($_POST['update']))
{
  
    $user=$_SESSION['user']['username'];
    $name=$_SESSION['user']['name'];
    $oldpwd=$_POST['oldpwd'];
    $newpwd=$_POST['newpwd'];

    $result = mysqli_query($db,"SELECT * from users WHERE name='$name';");
    $row=mysqli_fetch_array($result);

    if($_POST["oldpwd"] == $row["password"])
    {

    $sql="UPDATE `users` SET `password`='$newpwd' WHERE username='$user' AND password='$oldpwd' and user_type='police';";

    $query = $dbh->prepare($sql);

    $query->execute();

    echo "<script>alert('password updated sucessfully');</script>";
    echo "<script>window.location.href='police.php'</script>"; 
    }
    else{
      echo "<script>alert('Old password dont match');</script>";
    }
}
?>

  <div id="wrapper">
  <div id="content-wrapper">
          <!-- Icon Cards-->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
              <div class="container">    
       
      <div class="card card-login mx-auto mt-5 border border-primary">
      <div class="card-header text-center">Password change</div>
        <div class="card-body">
        <?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>


        <form name="insertrecord" method="post">
            <div class="form-group  ">
            <div class="form-label-group">
                <input type="password" id="inputEmail" name="oldpwd" class="form-control" placeholder="Old Password" required="required" autofocus="autofocus">
                <label for="inputEmail">Old Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="newpwd" class="form-control" placeholder="New Password" required="required">
                <label for="inputPassword">New Password</label>
              </div>
            </div>
            <center>
            <input type="submit" class="btn btn-success" name="update" value="Update">
            <a href="police.php" type="button" class="btn btn-info text-white" name="update" >back</a></center>
          </form>
        </div>
      </div>
    </div>
          <!-- Icon Cards-->

          
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        

      
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
