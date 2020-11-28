<!DOCTYPE html>
<html lang="en">
<?php
include('../functions.php');
if (!iscomplainant()) {
 $_SESSION['msg'] = "You must log in first";
 header('location: ../login.php');
}
?>
<?php
require_once'dbconfig.php';
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

    <title> Complainant - Rewards view</title>

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

  <?php 

  $userid=intval($_GET['id']);

$sql = "SELECT * from reward where R_id='$userid' ;";
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



<div class="container">
<div class="card bg-light border border-danger">
<br>
<div class="text-center">
<center><mark style="color:white;background-color:blue;font-size:150%;border: 3px solid #ffb31a;" ><b>REWARD DETAIL VIEW</b></mark></center>
           <br>
  </div>
<article class="card-body " style="max-width: 400px;">
            <form class="form-horizontal" name="insertrecord" method="post">
                 
                <div class="form-group">
                    <label for="password" class="col">Complaint ID</label>
                    <div class="col">
                        <input type="text"   value="<?php echo htmlentities($result->complaint_id);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col control-label">Police ID</label>
                    <div class="col">
                        <input type="text"  value="<?php echo htmlentities($result->police_id);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Amount</label>
                    <div class="col">
                        <input type="text"   value="<?php echo htmlentities($result->amount);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Description</label>
                    <div class="col">
                        <input type="text"   value="<?php echo htmlentities($result->des);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Rewards status</label>
                    <div class="col">
                        <input type="text"   value="<?php echo htmlentities($result->reward_status);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Rewards allocated Date</label>
                    <div class="col">
                        <input type="text"   value="<?php echo htmlentities($result->date);?>" class="form-control">
                    </div>
                </div>                                     
                
                <?php }} ?>
                <center>
                
                <a href="reward_history.php" class="btn btn-primary btn-dark">Back</a>
                </center>
                
                </div>
                

            </form> <!-- /form -->
        </div> <!-- ./container -->
</article>
</div> <!-- card.// -->
</div>
   

          
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>


</script>
  </body>

</html>
