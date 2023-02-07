<?php 
require_once "connect.php";



if (isset($_POST['submit'])) {
    $username=mysqli_escape_string($connection,$_POST['username']);
	$name=mysqli_escape_string($connection,$_POST['name']);
	$barcode=mysqli_escape_string($connection,$_POST['barcode']);
	$error;

//selecting data from the issue item table
$select="SELECT * FROM issue_item WHERE username='$username'";
$query=mysqli_query($connection,$select);
$fetch=mysqli_fetch_array($query,MYSQLI_ASSOC);


$barcode_id=$fetch['barcode_id'];
$barcode_item=$fetch['bacorde'];

	$insert="INSERT INTO return_items(usename,itemname,barcode)
	VALUES('$username','$name','$barcode')";

	$query=mysqli_query($connection,$insert);
	if ($query) {
		$error= "<p class='alert alert-success'>you have successfully inserted data to the database</p>";

        //updating the barcode of the item table
        $update="UPDATE items SET barcode ='$barcode_item' WHERE id='$barcode_id'";
        $queryupdate=mysqli_query($connection,$update);
	}
	else{
		$error="<p class='alert alert-warning'>failed to insert data to the database</p>";
	}
}

 ?>