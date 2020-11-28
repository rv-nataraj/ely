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
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  
$status=$_POST['status'];
$details=$_POST['details'];
$per=$_POST['per'];

$sql="update complaint set status='$status',status_des='$details',status_per='$per' where id='$userid'";
//Prepare Query for Execution
$query = $dbh->prepare($sql);

// Query Execution
$query->execute();
// Mesage after updation
echo "<script>window.location.href='complaint_status.php'</script>"; 
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection

}
?>




  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Police - Complaintview</title>

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

$sql = "SELECT * from complaint where id='$userid' ;";
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
<center><h3 style="color:white;background-color:blue;font-size:150%;"><b>COMPLAINT DETAILS UPDATE</b></h3></center>
           <br>
  
<article class="card-body " style="max-width: 400px;">
            <form class="form-horizontal" name="insertrecord" method="post">
            <div class="form-group">
                    <label for="password" class="col control-label">Complainant ID</label>
                    <div class="col">
                        <input type="text"  value="<?php echo htmlentities($result->Cu_id);?>" class="form-control">
                    </div>
                </div>     
                <div class="form-group">
                    <label for="password" class="col">Complaint ID</label>
                    <div class="col">
                        <input type="text"   value="<?php echo htmlentities($result->id);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Complaint status</label>
                    <div class="col">
                        <input type="text"  value="<?php echo htmlentities($result->status);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col control-label">Complaint status</label>
                    <div class="col">
                    <select class="form-control" id="exampleFormControlSelect1"  value="<?php echo htmlentities($result->status);?>" name="status" >
                        <option value="Progress">Progress</option>
                        <option value="FIRfilled">FIRfilled</option>
                        <option value="finished">finished</option>
                        <option value="decline">Decline</option>
                        
                        </select>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Complaint status Details</label>
                    <div class="col">
                    <textarea class="form-control" name="details"  value="<?php echo htmlentities($result->status_des);?>" required rows="auto"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">completion percentage(0-100)</label>
                    <div class="col">
                    
                <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="per">
              <i class="fas fa-minus"></i>
              </button>
          </span>
          <input type="text" name="per" class="form-control input-number"   value="<?php echo htmlentities($result->status_per);?>" min="1" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="per">
              <i class="fas fa-plus"></i>
              </button>
          </span>
      </div>       
      </div>                
      </div>
                </div>
                <?php }} ?>
                <center>
                <input type="submit" class="btn btn-primary btn-success" name="update" value=" Update status" ></a>
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
<script>
//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

</script>
  </body>

</html>
