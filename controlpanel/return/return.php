<?php 
error_reporting(0);
require_once "../../php/connect.php";

if(isset($_GET['del'])){
	$user_id=$_GET['del'];
	$return=date("Y-m-d");
	$status;

	$update=mysqli_query($connection,"UPDATE issue_item SET returndate='$return' WHERE id='$user_id' ");

	if($update){

		//selecting data of the user from the database
		$select="SELECT * FROM issue_item WHERE id='$user_id'";
		$sql=mysqli_query($connection,$select);
		$fetch=mysqli_fetch_assoc($sql);

		//getting the barcode is of the item and its barcode
		$barcodeid=$fetch['barcode_id'];
		$barcode=$fetch['bacorde'];

		//updating the barcode of the item
		$updateitem=mysqli_query($connection,"UPDATE items SET barcode='$barcode' WHERE id='$barcodeid' ");
		
		//getting the return time and issue time
		 $returndate=$fetch['returndate'];
         $issuedate=$fetch['issuedate'];
         $notreturned=$fetch['stataus'];

         //updating the staus    
            $date1=date_create("$issuedate");
            $date2=date_create("$returndate");
            $diff=date_diff($date1,$date2);

            $days=$diff->format("%R%a");


	
	         if ($diff->format("%R%a")<21) {
	                $updatestatus=mysqli_query($connection,"UPDATE issue_item SET stataus='no overdue' WHERE id='$user_id' ");

	          }
	          else{

	          	if ($diff->format("%R%a")>21) {
	          		
                      $updatestatus=mysqli_query($connection,"UPDATE issue_item SET stataus=' $days days overdue' WHERE id='$user_id' ");
	          	}
	          	else{
echo "failed";
	          	}
	          }
                     
	         
                  



 

		header('refresh:1,url=view.php');


	    
}
	else{
		echo "error".mysqli_error($connection);
	}
}
 ?>