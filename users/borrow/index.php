<?php
session_start(); 
error_reporting(0);
require_once "../../php/connect.php";

$username;

 $_SESSION['studentusername'];
 $username=$_SESSION['studentusername'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<title>form for borrowing iterms</title>
	<style type="text/css">
		
		
		label{
			text-transform: capitalize;
			font-weight: 700;
		}
	</style>
</head>
<body>
<div class="form container">
		
					<form action="index.php" method="post" class="p-4">
									<?php 
					 
                   if (isset($_POST['submit'])) {
                   	$username=mysqli_escape_string($connection,$_POST['username']);
                   	$location=mysqli_escape_string($connection,$_POST['location']);
                   	$contact=mysqli_escape_string($connection,$_POST['contact']);
                   	$name=mysqli_escape_string($connection,$_POST['name']);
                    $date =date("Y-m-d");
                   	
                    
                    
         
                   	//working on getting the barcode from the item table
                   	$select="SELECT * FROM items WHERE barcode!='' AND name='$name'";
					$query=mysqli_query($connection,$select);
					$barcode=array();
					$fetch=mysqli_fetch_aLL($query,MYSQLI_ASSOC);
					foreach ($fetch as $key ) {
						$barcode[]=$key['barcode'];
					}
                    //creating random index of an array
					$index=array_rand($barcode);
                    $itembarcode=$barcode[$index];
                   

                   //getting the id of the barcode
                    $selectbarcodeid="SELECT * FROM items WHERE barcode='$barcode[$index]'";
					$querybarcodeid=mysqli_query($connection,$selectbarcodeid);
					$fetchbarcodeid=mysqli_fetch_aLL($querybarcodeid,MYSQLI_ASSOC);
					foreach ($fetchbarcodeid as $keybarcodeid) {
						
					}
					$barcodeid=$keybarcodeid['id'];

					//verrifying the availability of an item in the database

                if (sizeof($barcode)==0) {
                	echo "<p class='alert alert-warning '> the item is not available</p>";
                }
                else{

                	//checking if the user already borrowed the item
                   	$selectissued="SELECT * FROM issue_item WHERE username='$username' AND stataus='not returned'";
					$queryissued=mysqli_query($connection,$selectissued);

					//selecting items with overdues
                   	$selectoverdue="SELECT * FROM issue_item WHERE username='$username' AND stataus LIKE '%days overdue%'";
					$queryoverdue=mysqli_query($connection,$selectoverdue);
					
					
					//checking if the user already borrowed the item
					if (mysqli_num_rows($queryissued)>=3) {
						echo "<p class='alert alert-warning'>you have reached maximum items to be  borrowed</p>";
					}
					else{
					if (mysqli_num_rows($queryoverdue)>0) {
						echo "<p class='alert alert-warning'>clear your overdue first</p>";
					}
					else{
						 if (! preg_match('/^[0-9]{10}+$/', $contact)) {
                       echo "<p class='alert alert-success'>invalid format of phone number</p>";
                         }
                   else{

					//inserting client issuing details into the database
                   	$insert="INSERT INTO issue_item(username,location,contact,name,bacorde,barcode_id,issuedate,returndate,stataus)
                   	VALUES('$username','$location','$contact','$name','$itembarcode','$barcodeid','$date','','not returned')";

                   	$sql=mysqli_query($connection,$insert);
                   	if ($sql) {
                   		echo "<p class='alert alert-success'>successfully bollowed an item,item barcode is $itembarcode</p>";

                   		//updating the barcode of the item table
                   		$update="UPDATE items SET barcode ='' WHERE id='$barcodeid'";
                   		$queryupdate=mysqli_query($connection,$update);
                   	}
                   	else{
                   		echo "<p class='alert alert-warning'>failed to borrow the item</p>";
                   	}
                   }
               }
               }
           }
          }
					 ?>	
						<h2 class="text-center text-capitalize font-weight-bold">borrow an item</h2>
					
						<div class="form-group">
							<label>enter your username</label>
							<input type="text" name=" username" class="form-control" placeholder="please enter username........" required="" value="<?php echo $username; ?>">
						</div>
						<div class="form-group">
							<label>enter your location</label>
							<select name="location" class="form-control" required="">
				               <option value="Dedza">Dedza</option>
				               <option value="Dowa">dowa</option>
				               <option value="kasungu">kasungu</option>
				               <option value="lilongwe">lilongwe</option>
				               <option value="mchinji">mchinji</option>
				               <option value="nkhotakota">nkhotakota</option>
				               <option value="ntcheu">ntcheu</option>
				               <option value="ntchisi">ntchisi</option>
				               <option value="salima">salima</option>
				               <option value="chitipa">chitipa</option>
				               <option value="karonga">karonga</option>
				               <option value="likoma">likoma</option>
				               <option value="mzimba">mzimba</option>
				               <option value="nkhata bay">nkhata bay</option>
				               <option value="rumphi">rumphi</option>
				               <option value="balaka">balaka</option>
				               <option value="blantyre">blantyre</option>
				               <option value="chikwawa">chikwawa</option>
				               <option value="chirazulu">chirazulu</option>
				               <option value="machinga">machinga</option>
				               <option value="mangochi">mangochi</option>
				               <option value="mulanje">mulanje</option>
				               <option value="mawanza">mawanza</option>
				               <option value="nsanje">nsanje</option>
				               <option value="thyolo">thyolo</option>
				               <option value="phalombe">phalombe</option>
				               <option value="zomba">zomba</option>
				               <option value="neno">neno</option>
			</select>
						</div>
						<div class="form-group">
							<label>enter your contact</label>
							<input type="text" name="contact" placeholder="enter your location" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>choose an item
							</label>
							<select class="form-control" name="name" required="">
								<option>meeting owl</option>
								<option>marvic drone</option>
								<option>camera traps</option>
								<option>inception cameras</option>
								<option>binoculars</option>
								<option>samsung tablets</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="bg-dark text-white text-capitalize text-center form-control" value="borrow an item">
						</div>
					</form>
				</div></body>
</html>