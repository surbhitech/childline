<?php include('config.php');
if($_GET['id'] !=''){
      $id = $_GET['id']; 
	  $sql = "update child set status='0' where id='".$id."'"; 
	  $res = mysqli_query($conn,$sql); 
	  if($res==true){
		  header('location:home.php');
	  } 
}	  ?>