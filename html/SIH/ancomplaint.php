<?php 
include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <style>
  *[role="form"] {
    max-width: 530px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
    background-color: #f2f2f2;
}

*[role="form"] h2 { 
    font-family: 'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 4px;
}
</style>
  

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> complaint - filling</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->

    <!-- Custom styles for this template-->
    <link href="complainant/css/sb-admin.css" rel="stylesheet">
    <link href="complainant/css/style.css" rel="stylesheet">
    <link href="complainant/css/card.css" rel="stylesheet">
  </head>
  <body id="page-top">

  <div id="wrapper">
  <div id="content-wrapper">



  <?php


require_once'functions.php';
require_once'complainant/dbconfig.php';

  if(isset($_POST['insert']))
{
   



$Usercat=($_POST['Usercat']);
$type=($_POST['type']);
$pname=($_POST['pname']);
$pbrand=($_POST['pbrand']);
$pmodel=($_POST['pmodel']);
$snumber=($_POST['snumber']);
$sprice=($_POST['sprice']);
$pdetails=($_POST['details']);
$mproduct=($_POST['mproduct']);
$bnum=($_POST['bnum']);
$date=($_POST['date']);
$address=($_POST['address']);
$district=($_POST['district']);
$state=($_POST['state']);
$pincode=($_POST['pincode']);
$vname=($_POST['vname']);
$vnum=($_POST['vnum']);
$cdisc=($_POST['cdisc']);


$imagename = $_FILES['image']['name'];
$imagetmpname = $_FILES['image']['tmp_name'];

$videoname = $_FILES['video']['name'];
$videotmpname = $_FILES['video']['tmp_name'];

$audioname = $_FILES['audio']['name'];
$audiotmpname = $_FILES['audio']['tmp_name'];

$filename = $_FILES['file']['name'];
$filetmpname = $_FILES['file']['tmp_name'];

move_uploaded_file($imagetmpname, '../proof/image/'.$imagename);

move_uploaded_file($audiotmpname, '../proof/audio/'.$audioname);
move_uploaded_file($filetmpname, '../proof/files/'.$filename);

    


$sql="INSERT INTO `complaint`(`user_cat`, `type`, `product`, `brand`, `model`, `serial_no`, `price`, `product_details`, `mode`, `billnumber`, `date`, `address`, `district`, `state`, `pincode`, `victim_name`, `victim_number`, `discription`,`reg_date`,`reg_time`,`Cu_id`,`status`,`image`,`video`,`audio`,`file`) VALUES ('$Usercat','$type','$pname','$pbrand','$pmodel','$snumber','$sprice','$pdetails','$mproduct','$bnum','$date','$address','$district','$state','$pincode','$vname','$vnum','$cdisc',CURDATE(),CURTIME(),'0','not accepted','$imagename','$videoname','$audioname','$filename')";


//Prepare Query for Execution
$query1 = $dbh->prepare($sql);


// Query Execution

$query1->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Complaint registered  successfully');</script>";
echo "<script>window.location.href='login.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='login.php'</script>"; 
}
}

?>

          <!-- Icon Cards-->
              
<div class="container">
<div class="card bg-light border border-success">
            <form class="form-horizontal" role="form" name="insertrecord" method="post" enctype="multipart/form-data">
            <div class="d-block p-2 bg-primary text-white h1 text-center" >
 Anonymous Complaint
</div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">User category(*)</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="exampleFormControlSelect1"  name="Usercat" required>
                        <option value="Manufacturer">Manufacturer</option>
                        <option value="retailer">retailer</option>
                        <option value="consumer">consumer</option>                        
                        </select>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Product type(*)</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="exampleFormControlSelect1"  name="type" required>
                        <option value="electronics">Electronics</option>
                        <option value="cars">Cars</option>                      
                                             
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Product Name(*)</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="exampleFormControlSelect1"  name="pname">
                        <option value="mobile">Mobile</option>
                        <option value="gaming console">Gaming console</option>                      
                        <option value="TV">TV</option>                         
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Product brand</label>
                    <div class="col-sm-9">
                        <input type="text"  name="pbrand" placeholder="Product brand" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Product model</label>
                    <div class="col-sm-9">
                        <input type="text"  name="pmodel" placeholder="Product model" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Serial Number</label>
                    <div class="col-sm-9">
                        <input type="text"  name="snumber" placeholder="Serial Number" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Sales price</label>
                    <div class="col-sm-9">
                        <input type="text"  name="sprice" placeholder="sales price" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Product Details</label>
                    <div class="col-sm-9">
                    <textarea class="form-control" name="details"  placeholder="Product Details"  rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Mode of product(default online)(*)</label>
                    <div class="col-sm-9">
                               <div class="form-check form-check-inline" required>
                                    <input class="form-check-input" type="radio" name="mproduct" id="inlineRadio1" value="online" required>
                                    <label class="form-check-label" for="inlineRadio1" >Online</label>
                                    </div>
                                    <div class="form-check form-check-inline required">
                                    <input class="form-check-input" type="radio" name="mproduct" id="inlineRadio2" value="offline" >
                                    <label class="form-check-label" for="inlineRadio2" >Offline</label>
                            </div>
                       </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">invoice number / billnumber</label>
                    <div class="col-sm-9">
                    <input type="text"  name="bnum" placeholder="invoice number / billnumber" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Date of occurence(*)</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthDate" placeholder="yyyy-mm-dd" name="date" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text"  name="address" placeholder="Address" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">District(*)</label>
                    <div class="col-sm-9">
                        <input type="text" id="comment"required name="district" placeholder="District" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">State(*)</label>
                    <div class="col-sm-9">
                        <input type="text" required name="state" placeholder="state" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Pincode</label>
                    <div class="col-sm-9">
                        <input type="text"  name="pincode" placeholder="Pincode" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Victim name</label>
                    <div class="col-sm-9">
                        <input type="text"  name="vname" placeholder="Victim name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Victim number</label>
                    <div class="col-sm-9">
                        <input type="phoneNumber"  name="vnum" id="comment" placeholder="Victim number" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Complaint Discription(*)</label>
                    <div class="col-sm-9">
                    <textarea class="form-control" rows="5" placeholder="Complaint Discription" name="cdisc"id="comment" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label" >Upload image proof</label>
                    <div class="col-sm-9">
                    <input type="file" name="image" accept=".jpg,.png">
                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Upload video proof</label>
                    <div class="col-sm-9">
                    <input type="file" name="video" accept="..MP4, .M4P, .M4V,.MPG, .MP2, .MPEG, .MPE, .MPV">
 
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Upload audio proof</label>
                    <div class="col-sm-9">
                    <input type="file"  name="audio" accept=".MP3,.WMA">
 
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Upload file proof</label>
                    <div class="col-sm-9">
                    <input type="file"  name="file" accept=".pdf,.doc">
 
                    </div>
                </div>
                <br>    
                                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div id="uploadStatus"></div>
                <Br>
                <button type="submit" class="btn btn-primary btn-block" name="insert" >Register</button><br>
                <center>                
                <a href="login.php" class="btn btn-primary btn-secondary border border-danger">Back</a>
                </center>
            </form> <!-- /form -->
        </div> <!-- ./container -->
</article>
</div> <!-- card.// -->

</div> 
</div>


        
</div>
      
      <!-- /.content-wrapper -->
</div>
</div>

    <!-- /#wrapper -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Scroll to Top Button-->
   
 
 
<script>
(function(){
	$.validator.setDefaults({
		highlight: function(element){
			$(element)
			.closest('.form-group')
			.addClass('has-error')
		},
		unhighlight: function(element){
			$(element)
			.closest('.form-group')
			.removeClass('has-error')
		}
	});
	
	$.validate({
		rules:
		{	
		    password: "required",
			birthDate: "required",
			weight: {
			    required:true,
			    number:true
			},
			height:  {
			    required:true,
			    number:true
			},
			email: {
				required: true,
				email: true
			}
		},
			messages:{			
				email: {
				required: true,
				email: true
			}
		},
				password: {
					required: " Please enter password"
				},
				birthDate: {
					required: " Please enter birthdate"
				},
				email: {
					required: ' Please enter email',
					email: ' Please enter valid email'
				},
				weight: {
					required: " Please enter your weight",
					number: " Only numbers allowed"
				},
				height: {
					required: " Please enter your height",
					number: " Only numbers allowed"
				},
    
	});
});


</script>


  </body>

</html>
