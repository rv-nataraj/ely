<!DOCTYPE html>
<html lang="en">
<?php
include('../functions.php');
if (!isadmin()) {
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
<div class="card bg-light border border-success">
<br>
<div class="text-center">
<center><mark style="color:white;background-color:#00cc00;font-size:140%;border: 3px solid #ffb31a;" ><b>COMPLAINT DETAILS</b></mark></center>
           <br>
  </div>
  
<article class="card-body" style="max-width: 400px;">
            <form class="form-horizontal" name="insertrecord" method="post">
            <div class="form-group">
                    <div class="col">Complaint ID</div>
                    
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->id);?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstName" class="col">User category</label>
                    
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->user_cat);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col">Product type</label>
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->type);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col">Product Name</label>
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->product);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Product brand</label>
                    <div class="col">
                        <input type="text"  name="pbrand" value="<?php echo htmlentities($result->brand);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Product model</label>
                    <div class="col">
                        <input type="text"  name="pmodel" value="<?php echo htmlentities($result->model);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Serial Number</label>
                    <div class="col">
                        <input type="text"  name="snumber" value="<?php echo htmlentities($result->serial_no);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Sales price</label>
                    <div class="col">
                        <input type="text"  name="sprice" value="<?php echo htmlentities($result->price);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Product Details</label>
                    <div class="col">
                    <textarea class="form-control" name="details"  value="<?php echo htmlentities($result->product_details);?>"  rows="auto"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Mode of product</label>
                    <div class="col">
                    <input type="text"  name="sprice" value="<?php echo htmlentities($result->mode);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">invoice number / billnumber</label>
                    <div class="col">
                    <input type="text"  name="bnum" value="<?php echo htmlentities($result->billnumber);?>" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="birthDate" class="col">Date of occurence</label>
                    <div class="col">
                    <input type="text"  name="bnum" value="<?php echo htmlentities($result->date);?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="col">Address</label>
                    <div class="col">
                        <input type="text"  name="address" value="<?php echo htmlentities($result->address);?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">District</label>
                    <div class="col">
                        <input type="text"  name="district" value="<?php echo htmlentities($result->district);?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">State</label>
                    <div class="col">
                        <input type="text"  name="state" value="<?php echo htmlentities($result->state);?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Pincode</label>
                    <div class="col">
                        <input type="text"  name="pincode" value="<?php echo htmlentities($result->pincode);?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Victim name</label>
                    <div class="col">
                        <input type="text"  name="vname" value="<?php echo htmlentities($result->victim_name);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="">Victim number</label>
                    <div class="col">
                        <input type="phoneNumber"  name="vnum" value="<?php echo htmlentities($result->victim_number);?>" class="form-control">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col">Complaint Discription</label>
                    <div class="col">
                    <input type="phoneNumber"  name="vnum" value="<?php echo htmlentities($result->discription);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col control-label">User ID</label>
                    <div class="col">
                        <input type="text"  name="pmodel" value="<?php echo htmlentities($result->Cu_id);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col control-label">Complaint status</label>
                    <div class="col">
                        <input type="text"   value="<?php echo htmlentities($result->status);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col control-label">Complaint Status discription</label>
                    <div class="col">
                        <input type="text"   value="<?php echo htmlentities($result->status_des);?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col control-label">Complaint completion percentage</label>
                    <div class="col">
                        <input type="text"   value="<?php echo htmlentities($result->status_per);?>" class="form-control">
                    </div>
                </div>
                <?php
                if(htmlentities($result->image)==""){?>
                <div class="form-group">
                    <label for="phoneNumber" class="col">Image Proof</label>
                    <div class="col">
               <center><mark style="color:black;background-color:#00cc00;" ><b>NO IMAGE</b></mark></center>
                   
               </div>
                </div>  
                <?php
                }else{?>
                <div class="form-group">
                    <label for="phoneNumber" class="col">Image Proof</label>
                    <div class="col">
                    <img src="../proof/image/<?php echo htmlentities($result->image);?>"  alt="Snow" class="zoom">
                        
                    </div>
                </div>  
                <?PHP }?>
                <?php
                if(htmlentities($result->video)==""){?>
                <div class="form-group">
                    <label for="phoneNumber" class="col">Video Proof</label>
                    <div class="col">
               <center><mark style="color:black;background-color:#00cc00;" ><b>NO VIDEO</b></mark></center>
               </div>
                </div> 
                <?php
                }else{?>
                 <div class="form-group">
                    <label for="phoneNumber" class="col">Video Proof</label>
                    <div class="col">
                        <video width="320" height="240" controls>
                            <source src="../proof/video/<?php echo htmlentities($result->video);?>" type="video/mp4">                          
                            
                         </video>
                        
                    </div>
                </div> 
                
                <?PHP }?>

                <?php
                if(htmlentities($result->audio)==""){?>
                <div class="form-group">
                    <label for="phoneNumber" class="col">Audio Proof</label>
                    <div class="col">
               <center><mark style="color:black;background-color:#00cc00;" ><b>NO AUDIO</b></mark></center>
               </div>
                </div>  
                <?php
                }else{?>

                <div class="form-group">
                    <label for="phoneNumber" class="col">Audio Proof</label>
                    <div class="col">
                            <audio controls>
                                <source src="../proof/audio/<?php echo htmlentities($result->audio);?>" type="audio/mpeg">
                                
                              </audio>                        
                    </div>
                </div>  
                <?PHP }?>
                <?php
                if(htmlentities($result->file)==""){?>
                 <div class="form-group">
                    <label for="phoneNumber" class="col">File Proof</label>
                    <div class="col">
               <center><mark style="color:black;background-color:#00cc00;" ><b>NO AUDIO</b></mark></center>
               </div>
                </div>  
                <?php
                }else{?>

                <div class="form-group">
                    <label for="phoneNumber" class="col">File Proof</label>
                    <div class="col">
                    <a class="btn btn-primary" href="../proof/files/<?php echo htmlentities($result->file);?>" role="button" download><i class="fas fa-cloud-download-alt"></i>&nbsp;Download</a>         
                    </div>
                </div>          
                </div>
                <?PHP }?>
                <?php }} ?>
                <center>
                <a href="complaint_search.php" class="btn btn-primary btn-danger">Back</a>
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
