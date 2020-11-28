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

    <title> Complainanat pwd change</title>
    
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


  <div id="wrapper">
  <div id="content-wrapper">
          <!-- Icon Cards-->
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<section class="contact py-5 bg-light" id="contact">
<div class="container border border-danger">
	<div class="row">
	    <div class="col-md-12">
	        <h4>Get in touch</h4>
		    <hr>
	    </div>
		<div class="col-md-6">
		    <div class="address">
		        
		    <h5>Address:</h5>
		    <ul class="list-unstyled">
		        <li> T-Mobile Customer Relations</li>
		        <li> PO Box 37380</li>
		        <li> Albuquerque, NM 87176-7380</li>
		    </ul>
		    <p>Please don't send anything to this address.</p>
		    </div>
		    <div class="email">
		    <h5>Email:</h5>
		    <ul class="list-unstyled">
		        <li> info@email.com</li>
		        <li> info@email.com</li>
		    </ul>
		    </div>
		    <div class="phone">
		        <h5>Phone:</h5>
		        <ul class="list-unstyled">
		        <li> +91- 8800XXXXXX34</li>
		        <li> +91- 8800XXXXXX34</li>
		    </ul>
		    </div>
		    <hr>
		    <div class="social">
	        <ul class="list-inline list-unstyled">
	            <li class="list-inline-item">
	                <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
	            </li>
	            <li class="list-inline-item">
	                <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
	            </li>
	            <li class="list-inline-item">
	                <a href="#"><i class="fa fa-youtube-play fa-2x"></i></a>
	            </li>
	        </ul>
	    </div>
		</div>
		<div class="col-md-6">
		    <div class="card">
		        <div class="card-body">
		             <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <input id="Full Name" name="Full Name" placeholder="Full Name" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-6">
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="Mobile No." name="Mobile No." placeholder="Mobile No." class="form-control" required="required" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                      
                                      <select id="inputState" class="form-control">
                                        <option selected>Choose ...</option>
                                        <option> New Buyer</option>
                                        <option> Auction</option>
                                        <option> Complaint</option>
                                        <option> Feedback</option>
                                      </select>
                            </div>
                            <div class="form-group col-md-12">
                                      <textarea id="comment" name="comment" cols="40" rows="5" placeholder="Your Message"class="form-control"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <button type="button" class="btn btn-danger">Submit</button>
                        </div>
                    </form>
		        </div>
		    </div>
		</div>
	</div>
	
	
</div>
</section>
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
