<?php 
error_reporting(0);
require_once "../../php/connect.php";

if(isset($_GET['del'])){
	$user_id=$_GET['del'];

	$delete=mysqli_query($connection,"DELETE FROM issue_item WHERE id='$user_id' ");

	if($delete){
		header('refresh:1,url=index.php');
	}
	else{
		echo "error".mysqli_error($connection);
	}
}
 ?>