<?php
   $base_url = "http://localhost/childline/";
   $conn = mysqli_connect('localhost','root','','childline');
   if($conn){
	   return true;
   }
 if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
 }
 ?>