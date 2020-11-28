<!DOCTYPE html>
<html lang="en">
<?php
include('../functions.php');
if (!ispolice()) {
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

<?php
// include database connection file
require_once'dbconfig.php';
if(isset($_POST['update']))
{
$userid=intval($_GET['id']);

$amount=$_POST['amount'];
$desc=$_POST['desc'];

$name=$_SESSION['user']['name'];

$result = mysqli_query($db,"SELECT * from police_details WHERE station_name='$name';");
$row=mysqli_fetch_array($result);
$pid=$row["P_id"];

$results = mysqli_query($db,"SELECT * from complaint WHERE id='$userid';");
$rows=mysqli_fetch_array($results);
$uid=$rows["Cu_id"];

$sql="insert into reward(`Complainant_id`,`complaint_id`,`police_id`,`amount`,`des`,`reward_status`,`date`,`time`) values ('$uid','$userid','$pid','$amount','$desc','allocated',CURDATE(),CURTIME());";

$query = $dbh->prepare($sql);


$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
$sql1="update complaint set reward_id='$lastInsertId' where id='$userid'";
$query1 = $dbh->prepare($sql1);
$query1->execute();
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='rewards_add.php'</script>"; 
}
else 
{
echo "<script>alert('Already rewards updated');</script>";
echo "<script>window.location.href='rewards_add.php'</script>"; 

}

}
?>

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Police - Add rewards</title>

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



<div class="container">
<div class="card bg-light border border-danger">
<br>
<div class="text-center">
<center><h3 style="color:white;background-color:blue;font-size:150%;"><b>ADD REWARDS</b></h3></center>
           <br>
  
<article class="card-body " style="max-width: 400px;">
            <form class="form-horizontal" name="insertrecord" method="post">
            <div class="form-group">
                    <label for="password" class="col control-label">Amount</label>
                    <div class="col">
                        <input type="numbers"  name="amount" class="form-control" required>
                    </div>
                </div>     
                <div class="form-group">
                    <label for="password" class="col">Rewards description</label>
                    <div class="col">
                        <input type="text"  name="desc" class="form-control" required>
                    </div>
                </div>
                                                        
                </div>
               
                <center>
                <input type="submit" class="btn btn-primary btn-success" name="update" value="Add" ></a>
                <a href="complaint_status.php" class="btn btn-primary btn-danger"> Back</a>
                </center>
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
