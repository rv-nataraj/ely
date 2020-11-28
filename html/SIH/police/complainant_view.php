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

    <title> Police - Complainant view</title>

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

  $result = mysqli_query($db,"SELECT * from complainant where id='$userid' ;");
  $row=mysqli_fetch_array($result);
  $name=$row["C_Name"]; 

  $res = mysqli_query($db,"SELECT * from users where name='$name' ;");
  $rows=mysqli_fetch_array($res);
  $profile=$rows["profile"]; 

$sql = "SELECT * from complainant where id='$userid' ;";
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
<div class="card bg-light border border-success">
<br>
<div class="text-center">
<center><mark style="color:white;background-color:#00cc00;font-size:140%;border: 3px solid #ffb31a;" ><b>COMPLAINANT DETAILS</b></mark></center>
           <br>
  </div>
  
<article class="card-body" style="max-width: 400px;">
            <form class="form-horizontal" name="insertrecord" method="post">
            <div class="form-group">                                       
            <center><img src="../profile/<?php echo $profile;?>" class="mx-auto border border-primary" alt="Cinque Terre" width="120" height="160"></center>
                </div>
            <div class="form-group">
                    <div class="col">Complainant ID</div>
                    
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->id);?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstName" class="col">Name</label>
                    
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->C_Name);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col">Gender</label>
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->C_Gender);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col">Date of Birth</label>
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->C_DOB);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Mobile</label>
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->C_Mobile);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Email ID:</label>
                    <div class="col">
                        <input type="text"  name="pmodel" value="<?php echo htmlentities($result->C_Email);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Aadhar ID:</label>
                    <div class="col">
                        <input type="text"  name="snumber" value="<?php echo htmlentities($result->C_aadhar);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Address</label>
                    <div class="col">
                        <input type="text"  name="sprice" value="<?php echo htmlentities($result->C_Address);?>" class="form-control">
                    </div>
                </div>
              
                <div class="form-group">
                    <label for="password" class="col">Pincode</label>
                    <div class="col">
                    <input type="text"  name="sprice" value="<?php echo htmlentities($result->C_Pincode);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">District</label>
                    <div class="col">
                    <input type="text"  name="bnum" value="<?php echo htmlentities($result->C_District);?>" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="birthDate" class="col">State</label>
                    <div class="col">
                    <input type="text"  name="bnum" value="<?php echo htmlentities($result->C_State);?>" class="form-control">
                    </div>
                </div>
               
                <?php }} ?>
                <center>
                <a href="police.php" class="btn btn-primary btn-danger">Back</a>
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

    <style>
* {
  box-sizing: border-box;
}

.zoom {
  padding: 40px;

  transition: transform .2s;
  width: 200px;
  height: 250px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
</style>

</script>
  </body>

</html>
