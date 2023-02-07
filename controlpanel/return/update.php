<?php 
error_reporting(0);
require_once "../../php/connect.php";

//getting the id and username of the clicked row
if(isset($_GET['del'])){
$user_id=$_GET['del'];
$select="SELECT * FROM issue_item WHERE id='$user_id'";
$sqlselect=mysqli_query($connection,$select);
$fetch=mysqli_fetch_assoc($sqlselect);

}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
 	<title>updating data</title>
 	<style type="text/css">
 		body{
 			background: silver;
 		}
 		form{
 			width: 400px;
 			max-width: 90%;
 			margin-left: 50%;
 			transform: translate(-50%,-50%);
 			margin-top: 15%;
 			background: white;
 			padding: 20px;
 		}
 	</style>
 </head>
 <body>
 <form action="update.php" method="post">
 	<h3 class="text-capitalize text-center text-dark font-weight-bold">edit issued date</h3>
 	<div class="form-group">
 	    <input type="text" name="id" value="<?php echo $user_id; ?>" class='form-control' style='display: none;'>
 	</div>
 	<div class="form-group">
 		<label class="text-capitalize text-dark">username</label>
 	    <input type="text" name="username" value="<?php echo $fetch['username']; ?>" class='form-control'>
 	</div>
 	<div class="form-group">
 	     <label class="text-capitalize text-dark">issued date</label>
 	     <input type="date" name="date" class="form-control" required>
 	</div>
 	<div class="form-group">
 		 <input type="submit" name="submit" value="update" class="text-uppercase text-white bg-dark form-control col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
 	</div>
<?php 
if (isset($_POST['submit'])) {
$username=$_POST['username'];
$id=$_POST['id'];
$date=$_POST['date']; 

//updating date
$update="UPDATE issue_item SET issuedate='$date' WHERE  id='$id' AND username='$username'";
$sqlupdate=mysqli_query($connection,$update);

if ($sqlupdate) {
   header("location:view.php");
}
else{
	echo "failed";
}
}
 ?>
 </form>
 </body>
 </html>