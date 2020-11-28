<?php
include('../functions.php');
if (!ispolice()) {
 $_SESSION['msg'] = "You must log in first";
 header('location: ../login.php');
}
?>

<?php 

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

    <title> Police - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/menu.css" rel="stylesheet" type="text/css">
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
  <div class="container">
              <div class="card mb-3 border-success">
            
            <div class="card-body">
  <center>
    
          <button  class="btn btn-success btn-circle btn-circle-lg m-1 text-white"><a class="fa fa-check text-white" href="complaint_main.php"></a></button>
          <button class="btn btn-primary btn-circle btn-circle-lg m-1"><a class="fa fa-shield text-white" href="rewards_add.php"></a></button>
          <button class="btn btn-info btn-circle btn-circle-lg m-1"><a class="fa fa-user text-white" href="police_profile.php"></a></button>
          <button class="btn btn-warning btn-circle btn-circle-lg m-1"><a class="fa fa-search text-white" href="complainant_search.php"></a></button>
</center>
        </div>
     


</div>
  </div>

  <?php 
require_once'../functions.php';
require_once'dbconfig.php';
  $name=$_SESSION['user']['name'];
  $result = mysqli_query($db,"SELECT * from police_details WHERE station_name='$name';");
  $row=mysqli_fetch_array($result);
  $id=$row["P_id"];



$sql = "SELECT COUNT(*) as cnt FROM `complaint` where police_id='$id' and status='finished';";
$sql1 = "SELECT COUNT(*) as de FROM `complaint` where police_id='$id' and status='decline';";
$sql2 = "SELECT COUNT(*) as total FROM `complaint` where police_id='$id';";
$sql3 = "SELECT MAX(amount) as marewards FROM `reward` where police_id='$id';";
$sql4 = "SELECT COUNT(*) as totalreward FROM `reward` where police_id='$id';";
$sql5 = "SELECT SUM(amount) as amo FROM `reward` where police_id='$id';";


$result1 = mysqli_query($db,$sql);
$result2 = mysqli_query($db,$sql1);
$result3 = mysqli_query($db,$sql2);
$result4 = mysqli_query($db,$sql3);
$result5 = mysqli_query($db,$sql4);
$result6 = mysqli_query($db,$sql5);

$row = mysqli_fetch_assoc($result1);
$row1 = mysqli_fetch_assoc($result2);
$row2 = mysqli_fetch_assoc($result3);
$row3 = mysqli_fetch_assoc($result4);
$row4 = mysqli_fetch_assoc($result5);
$row5 = mysqli_fetch_assoc($result6);

$row_comp = $row['cnt'];
$row_dec = $row1['de'];
$row_tot = $row2['total'];
$row_max = $row3['marewards'];
$row_totreward = $row4['totalreward'];
$row_amo = $row5['amo'];  


//<!-- /next percentage  -->

$sqlc = "SELECT * from complaint where  police_id='$id'  AND status<>'finished' AND status<>'decline' LIMIT 1;";
$query = $dbh->prepare($sqlc);
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
  <?php
       if(htmlentities($result->status_per)!=""){
         ?> 
  <div class="container">

          <div class="card mb-3 border-dark">
              
              <div class="card-body border">
            <div class="row">
      
    </div>
      
      <div class="row">
     
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="offer offer-success">
          <div class="shape">
            <div class="shape-text">
              <span class="fas fa-spinner"></span>							
            </div>
          </div>
          <div class="offer-content">
            <h3 class="lead">
               Complaint ID : <label class="label label-success"><?php echo htmlentities($result->id);?></label>
            </h3>
            <p>
              Progress
              <br> 
                          <div class="progress">
               <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo htmlentities($result->status_per);?>%" >
               <?php echo htmlentities($result->status_per);?>%
                          </div>
                     </div>
            </p>
          </div>
        </div>
      </div>
     
     
      </div>
      </div>
        </div>
        </div>
        <?php
       }
       ?>
        <?php
      
    } }?> 
                <!-- /.container-fluid -->
                               <!-- Icon Cards-->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
              <div class="container">
              <div class="card mb-3 border-danger">
            
            <div class="card-body">
              <div class="row">
                  <div class="col-md-3">
                    <div class="card-counter success">
                      <i class="far fa-check-circle"></i>
                      <span class="count-numbers"><?php echo $row_comp ?></span>
                      <span class="count-name"><b>Finished Complaint</b></span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="card-counter danger">
                    <i class="far fa-times-circle"></i>
                      
                      <span class="count-numbers"><?php echo $row_dec ?></span>
                      <span class="count-name"><b>Declined Complaint</b></span>
                    </div>
                  </div>

                  

                  <div class="col-md-3">
                    <div class="card-counter primary">
                    <i class="fas fa-clipboard-list"></i>                      
                      <span class="count-numbers"><?php echo $row_tot ?></span>
                      <span class="count-name"><b>Total Complaint</b</span>
                    </div>
                  </div>
                </div>
              </div>
          <!-- Icon Cards-->
          </div>
</div>


                
        <div class="container">
        <div class="card mb-3 border-primary">
            
            <div class="card-body">
          <div class="row" >
         

                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-rupee-sign fa-fw fa-3x"></i>
                                </div>
                            </a>
                                 <div class="circle-tile-content purple">
                                <div class="circle-tile-description text-faded">
                                    MAX REWARDS
                                </div>
                                <div class="circle-tile-number text-faded">
                                <?php echo $row_max ?>
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="rewards_add.php" class="circle-tile-footer ">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading yellow">
                                    <i class="fa fa-trophy fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    TOTAL REWARDS
                                </div>
                                <div class="circle-tile-number text-faded">
                                <?php echo $row_totreward ?>
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="rewards_history.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-money-bill fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    TOTAL AMOUNT AWARDED
                                </div>
                                <div class="circle-tile-number text-faded">
                                <?php echo $row_amo ?>
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="rewards_history.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
</div>
</div>

                          
        
</div>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <style>
      .shape{    
    border-style: solid; border-width: 0 70px 40px 0; float:right; height: 0px; width: 0px;
	-ms-transform:rotate(360deg); /* IE 9 */
	-o-transform: rotate(360deg);  /* Opera 10.5 */
	-webkit-transform:rotate(360deg); /* Safari and Chrome */
	transform:rotate(360deg);
}
.offer{
	background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); margin: 15px 0; overflow:hidden;
}
.offer:hover {
    -webkit-transform: scale(1.1); 
    -moz-transform: scale(1.1); 
    -ms-transform: scale(1.1); 
    -o-transform: scale(1.1); 
    transform:rotate scale(1.1); 
    -webkit-transition: all 0.4s ease-in-out; 
-moz-transition: all 0.4s ease-in-out; 
-o-transition: all 0.4s ease-in-out;
transition: all 0.4s ease-in-out;
    }
.shape {
	border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-radius{
	border-radius:7px;
}
.offer-danger {	border-color: #d9534f; }
.offer-danger .shape{
	border-color: transparent #d9534f transparent transparent;
}
.offer-success {	border-color: #5cb85c; }
.offer-success .shape{
	border-color: transparent #5cb85c transparent transparent;
}
.offer-default {	border-color: #999999; }
.offer-default .shape{
	border-color: transparent #999999 transparent transparent;
}
.offer-primary {	border-color: #428bca; }
.offer-primary .shape{
	border-color: transparent #428bca transparent transparent;
}
.offer-info {	border-color: #5bc0de; }
.offer-info .shape{
	border-color: transparent #5bc0de transparent transparent;
}
.offer-warning {	border-color: #f0ad4e; }
.offer-warning .shape{
	border-color: transparent #f0ad4e transparent transparent;
}

.shape-text{
	color:#fff; font-size:12px; font-weight:bold; position:relative; right:-40px; top:2px; white-space: nowrap;
	-ms-transform:rotate(30deg); /* IE 9 */
	-o-transform: rotate(360deg);  /* Opera 10.5 */
	-webkit-transform:rotate(30deg); /* Safari and Chrome */
	transform:rotate(30deg);
}	
.offer-content{
	padding:0 20px 10px;
}
@media (min-width: 487px) {
  .container {
    max-width: 750px;
  }
  .col-sm-6 {
    width: 50%;
  }
}
@media (min-width: 900px) {
  .container {
    max-width: 970px;
  }
  .col-md-4 {
    width: 33.33333333333333%;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1170px;
  }
  .col-lg-3 {
    width: 25%;
  }
  }
</style>


<style>


.btn-circle {
  width: 45px;
  height: 45px;
  line-height: 45px;
  text-align: center;
  padding: 0;
  border-radius: 50%;
}

.btn-circle i {
  position: relative;
  top: -1px;
}

.btn-circle-sm {
  width: 35px;
  height: 35px;
  line-height: 35px;
  font-size: 0.9rem;
}

.btn-circle-lg {
  width: 55px;
  height: 55px;
  line-height: 55px;
  font-size: 1.1rem;
}

.btn-circle-xl {
  width: 70px;
  height: 70px;
  line-height: 70px;
  font-size: 1.3rem;
}


body {
  background: #f8f8fd;
  color: #514B64;
  min-height: 100vh;
}
</style>
  </body>

</html>
