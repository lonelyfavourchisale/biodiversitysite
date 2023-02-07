<?php 
error_reporting(0);
require_once "../../php/connect.php";

if(isset($_GET['del'])){
	$user_id=$_GET['del'];
	$status="responded";

	$update=mysqli_query($connection,"UPDATE allcontacts SET status='$status' WHERE id='$user_id' ");

	if($update){
		header('refresh:1,url=index.php');
	}
	else{
		echo "error".mysqli_error($connection);
	}
}
 ?>