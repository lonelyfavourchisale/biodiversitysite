<?php 
session_start();
error_reporting(0); 
require_once "../../php/connect.php";
 $_SESSION['studentusername'];
 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>contact form</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		label{
			text-transform: capitalize;
			font-weight: 700;
		}
	</style>
</head>
<body>
<div class="container">
	<form class="p-3" action="index.php" method="post">
		<h3 class="text-center text-capitalize p-3 font-weight-bold">send help</h3>
		<div class="form-group">
			<label>full name</label>
			<input type="text" name="fullname" class="form-control" required>
		</div>
		<div class="form-group">
			<label>username</label>
			<input type="text" name="regnum" class="form-control" value="<?php echo  $_SESSION['studentusername']; ?>" required>
		</div>
		<div class="form-group">
			<label>location</label>
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
			<label>message</label>
			<textarea class="form-control" name="message" required></textarea>
		</div>
		<div class="form-group">
			<input type="submit" class="form-control col-4 bg-dark text-white text-center text-capitalize" value="send help" name="submit">
		</div>

		<?php 
          if (isset($_POST['submit'])) {
          	$fullname=$_POST['fullname'];
          	$username=$_POST['regnum'];
          	$location=$_POST['location'];
          	$message=$_POST['message'];

          	$select="SELECT * FROM contacts WHERE username='$username' AND feedback=''";
          	$sqlselect=mysqli_query($connection,$select);

          	if (mysqli_num_rows($sqlselect)>0) {
          		$update="UPDATE contacts SET fullname='$fullname',username='$username',location='$location',message='$message' WHERE username='$username' AND feedback=''";
            	$sqlupdate=mysqli_query($connection,$update);

            	if ($sqlupdate) {
            		echo "<p class='alert alert-success'>your message successfully updated,wait for your feedback</p>";
            	}
            	else{
            		echo "<p class='alert alert-warning'>failed to update the message</p>";
            	}
            
          }
            else{
          	$insert="INSERT INTO contacts (fullname,username,location,message,feedback)
            VALUES('$fullname','$username','$location','$message','')";

            $sql=mysqli_query($connection,$insert);
            if ($sql) {
            	echo "<p class='alert alert-success'>your message successfully sent,wait for your feedback</p>";
            }
            else{
            	echo "<p class='alert alert-warning'>failed to send the message,contact administrator</p>";
            
          }
      }
      }

		 ?>
	</form>
</div>
</body>
</html>