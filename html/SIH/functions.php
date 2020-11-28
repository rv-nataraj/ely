<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('121.200.55.42:4061', 'root', 'root', 'sih');

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	
	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		
		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);
		
		// make sure form is filled properly
		if (empty($username)) {
			 	
		}
		if (empty($password)) {
			
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			//$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user founds
             $logged_in_user = mysqli_fetch_assoc($results);
			 $user=$logged_in_user['user_type'];
		

			$insert="INSERT INTO login_record (`username`, `user_type`, `date`, `time`) 
			         VALUES ('$username','$user',CURDATE(),CURTIME())";
            $results = mysqli_query($db, $insert);
				
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					display_error("succesfull login");
					echo "<script>window.location.href='admins/admin.php'</script>"; 		  
				}else if ($logged_in_user['user_type'] == 'police'){
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					display_error("succesfull login");
					echo "<script>window.location.href='police/police.php'</script>"; 	
					
				}
				else if ($logged_in_user['user_type'] == 'complainant'){
					$_SESSION['user'] = $logged_in_user;					
					$_SESSION['success']  = "You are now logged in";
					display_error("succesfull login");
					echo "<script>window.location.href='complainant/complainant.php'</script>"; 	
					
				}
			}else {
				
				display_error("User name and password are wrong");

			
			}
		}
	}



	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}
	function ispolice()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'police' ) {
			return true;
		}else{
			return false;
		}
	}
	function iscomplainant()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'complainant' ) {
			return true;
		}else{
			return false;
		}
	}
	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error($msg) {
		
			echo "<script type='text/javascript'>alert('$msg');</script>";
		
	
		}


?>
