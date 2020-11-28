<?php 
  include('../functions.php');
  include('header.php');
  include('sidebar.php');
  include('includes/logout.php');
  if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
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
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <title> Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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

require_once'../functions.php';

$sql = "SELECT COUNT(*) as cnt FROM `users` where user_type='admin';";
$sql1 = "SELECT COUNT(*) as pol FROM `users` where user_type='police';";
$sql2 = "SELECT COUNT(*) as com FROM `users` where user_type='complainant';";
$sql4 = "SELECT SUM(amount) as totalreward FROM `reward`;";
$sql5 = "SELECT COUNT(*) as recount FROM `reward`;";

$result1 = mysqli_query($db,$sql);
$result2 = mysqli_query($db,$sql1);
$result3 = mysqli_query($db,$sql2);
$result4 = mysqli_query($db,$sql4);
$result5 = mysqli_query($db,$sql5);

$row = mysqli_fetch_assoc($result1);
$row1 = mysqli_fetch_assoc($result2);
$row2 = mysqli_fetch_assoc($result3);
$row4 = mysqli_fetch_assoc($result4);
$row5 = mysqli_fetch_assoc($result5);

$row_admin = $row['cnt'];
$row_pol = $row1['pol'];
$row_com = $row2['com'];
$rew_tot= $row4['totalreward'];
$rew_cnt= $row5['recount'];
  
?>     
 <div class="container">
              <div class="card mb-3 border-success">
            
            <div class="card-body">
  <center>
    
          <button  class="btn btn-success btn-lg m-1 text-white"><a class="fas fa-users-cog text-white" href="user.php"></a></button>
          <button class="btn btn-primary btn-lg m-1"><a class="fa fa-shield text-white" href="police_users.php"></a></button>
          <button class="btn btn-info btn-lg m-1"><a class="fa fa-user text-white" href="police_users.php"></a></button>
          <button class="btn btn-warning btn-lg m-1"><a class="fa fa-search text-white" href="complaint_search.php"></a></button>
</center>
        </div>
     


</div>
  </div>



          <!-- Icon Cards-->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
              <div class="container ">
              <div class="card mb-3 border-dark">
              
              <div class="card-body border">
              <div class="row">
                  <div class="col-md-3 ">
                    <div class="card-counter primary">
                      <i class="fa fa-user"></i>
                      <span class="count-numbers"><?php echo $row_admin ?></span>
                      <span class="count-name text-white">Admin users</span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="card-counter danger">
                      <i class="fa fa-shield"></i>
                      
                      <span class="count-numbers"><?php echo $row_pol ?></span>
                      <span class="count-name">Police Users</span>
                    </div>
                  </div>

                  

                  <div class="col-md-3">
                    <div class="card-counter info">
                      <i class="fa fa-male"></i>
                      <span class="count-numbers"><?php echo $row_com ?></span>
                      <span class="count-name">Complainant Users</span>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              </div>
        <!-- /.container-fluid -->
        <div class="container">

<div class="card mb-3 border-warning">
    
    <div class="card-body">
      
  <div class="row" >
 
  </div>
  
     
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="#">
                        <div class="circle-tile-heading red">
                            <i class="fa fa-trophy fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content blue">
                        <div class="circle-tile-description text-faded">
                            TOTAL REWARDS AMOUNT
                                                    </div>
                        <div class="circle-tile-number text-faded">
                        <?php echo $rew_tot ?>
                            <span id="sparklineC"></span>
                        </div>
                        <a href="rewards.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
</div>
                <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="#">
                        <div class="circle-tile-heading orange">
                            <i class="fa fa-trophy fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content dark-gray">
                        <div class="circle-tile-description text-faded">
                           TOTAL REWARD ALLOCATED
                        </div>
                        <div class="circle-tile-number text-faded">
                        <?php echo $rew_cnt ?>
                            <span id="sparklineC"></span>
                        </div>
                        <a href="rewards.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
        </div>
        
        </div>
        </div>
        
         
        </div>
        </div> 
        </div>

  </div >
  </div>
        <!-- Sticky Footer -->
        

      
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

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>




  </body>

</html>
