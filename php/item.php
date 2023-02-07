<?php
error_reporting(0); 
require_once "connect.php";

if (isset($_POST['submit'])) {
       	$name=mysqli_escape_string($connection,$_POST['name']);
       	$barcode=mysqli_escape_string($connection,$_POST['barcode']);

              $select="SELECT * FROM items WHERE barcode='$barcode'";
              $sqlitems=mysqli_query($connection,$select);

              $selectissued="SELECT * FROM issue_item WHERE barcode='$barcode'";
              $sqliissued=mysqli_query($connection,$selectissued);

              if (mysqli_num_rows($sqlitems)>0 || mysqli_num_rows($sqliissued)>0) {
                   echo "<p class='text-center alert alert-warning'>item details already uploaded</p>";
              }
              else{
       	
       	$insert="INSERT INTO items(name,barcode)
       	VALUES('$name','$barcode')";
       	$sql=mysqli_query($connection,$insert);

       	if ($sql) {
       		echo "<p class='text-center alert alert-success'>successfully uploaded item details</p>";
       	}
       	else{
       		echo "<p class='text-center alert alert-warning'>failed to apload item detalis</p>";
       	}
       }
}

		
 ?>