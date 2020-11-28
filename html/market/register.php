<?php
$con = mysqli_connect('121.200.55.42:4061','root','root','test');
//$name = $_POST["user"];
//$user_name= $_POST["user_name"];
//$user_pass = $_POST["user_pass"];
//echo $name;
$sql_query = "insert into user_info values('Vishwa', 'jith', '1234')";
$results = mysqli_query($con,$sql_query);
?>
