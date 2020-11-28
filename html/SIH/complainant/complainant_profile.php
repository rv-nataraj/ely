<?php 
include('../functions.php');
if (!iscomplainant()) {
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

    <title>Complainant - Complainant profile</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">
  </head>
  <body id="page-top">

  <div id="wrapper">
  <div id="content-wrapper">

  <?php 

  require_once'dbconfig.php';
  $user=$_SESSION['user']['name'];
  $profile=$_SESSION['user']['profile'];
$sql = "SELECT * FROM `complainant` where C_Name='$user';";

$query = $dbh->prepare($sql);


$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);


if($query->rowCount() > 0)
{

foreach($results as $result)
{   
?>              
<div class="container">
        <div class="row">
            <div class="col-12">
              

                    <div class="card-body border border-dark"style="background-color:#e6e6ff">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="../profile/<?php echo $profile?>" alt="<?php echo $profile?>"id="imgProfile" style="width: 170px; height: 200px" class="img-thumbnail" />
                                    </div>
                                <div class="userData ml-4"><br>
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><i class="far fa-user"></i>&nbsp;<?php echo strtoupper(htmlentities($result->C_Name));?></a></h2>
                                    <br>
                                    <div class="row">
                                    <center>
                                    <a href="complainant_proupdate.php?id=<?php echo htmlentities($result->id);?>" type="button w-50" class="btn btn-success text-white border border-white"><i class="far fa-id-badge"></i>&nbsp;&nbsp;Update Profile</a><br><br>
                                    <a href="complainant_pwd.php" type="button w-50" class="btn btn-primary text-white border border-white"><i class="fas fa-unlock-alt"></i>&nbsp;&nbsp;Reset Password</a></div>

                                    </center>
                                                                                                       
                                </div>
                                
                                </div>
                        </div>
                            </div>
<br><div class="card-body border border-primary" style="background-color:#ffffe6">
                        <div class="card-title mb-4">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4 " id="myTab" role="tablist">
                                    <li class="nav-item border border-primary">
                                        <a class="nav-link active border border-success" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content ml-1 " id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo htmlentities($result->C_Name);?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row ">
                                            <div class="col-sm-3 col-md-2 col-5 ">
                                                <label style="font-weight:bold;">Gender</label>
                                            </div>
                                            <div class="col">
                                            <?php echo htmlentities($result->C_Gender);?>
                                            </div>
                                        </div>
                                        <hr/>
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">DOB</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo htmlentities($result->C_DOB);?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Mobile</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo htmlentities($result->C_Mobile);?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo htmlentities($result->C_Email);?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Aadhar card</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo htmlentities($result->C_aadhar);?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Address</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo htmlentities($result->C_Address);?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">District</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo htmlentities($result->C_District);?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">State</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo htmlentities($result->C_State);?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Pincode</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?php echo htmlentities($result->C_Pincode);?>
                                            </div>
                                        </div>
                                        <hr />

                                        

                                    </div>
                                    
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

<?php }}?>
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

    <!-- Page level plugin JavaScript-->
    
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- profile script -->
    <script src="js/profile.js"></script>
  

  </body>

</html>
