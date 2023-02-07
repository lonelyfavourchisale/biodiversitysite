<?php 
error_reporting(0);
require_once "../../php/connect.php";

//getting the id and username of the clicked row
if(isset($_GET['del'])){
$user_id=$_GET['del'];
$select="SELECT * FROM contacts WHERE id='$user_id'";
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
 	<title>giving feedback</title>
 	<style type="text/css">
 		body{
 			background: silver;
 		}
 		form{
 			width: 500px;
 			max-width: 90%;
 			margin-left: 50%;
 			transform: translate(-50%,-50%);
 			margin-top: 25%;
 			background: white;
 			padding: 20px;
 		}
 	</style>
 </head>
 <body>
 <form action="update.php" method="post">
 	<h3 class="text-capitalize text-center text-dark font-weight-bold">give feedback</h3>
 	<div class="form-group">
 	    <input type="text" name="id" value="<?php echo $user_id; ?>" class='form-control' style='display: none;'>
 	</div>
 	<div class="form-group">
 		<label class="text-capitalize text-dark">username</label>
 	    <input type="text" name="username" value="<?php echo $fetch['username']; ?>" class='form-control'>
 	</div>
 	<div class="form-group">
 	     <label class="text-capitalize text-dark">message</label>
 	     <textarea class="form-control" name="message" > <?php echo $fetch['message'] ?></textarea>
 	</div>
   <div class="form-group">
        <label class="text-capitalize text-dark">feedback</label>
         <textarea name="feedback" class="form-control" required></textarea>
   </div>
 	<div class="form-group">
 		 <input type="submit" name="submit" value="give feedback" class="text-capitalize text-white bg-dark form-control col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4">
 	</div>
<?php 
if (isset($_POST['submit'])) {
$username=$_POST['username'];
$id=$_POST['id'];
$feedback=$_POST['feedback'];

$select="SELECT * FROM contacts WHERE username='$username' AND feedback!='' AND id='$id'";
$sqlselect=mysqli_query($connection,$select);

if (mysqli_num_rows($sqlselect)==0) {
      $insert="UPDATE contacts SET feedback='$feedback' WHERE username='$username' AND id='$id'";
        $sql=mysqli_query($connection,$insert);
       if ($sql) {
          echo "<script>
    window.location='view.php';
    </script>";       }
      else{
      echo "<p class='alert alert-warning'>failed to give feedback for $username</p>";
        }
      }
else{

   $update="UPDATE contacts SET feedback='$feedback' WHERE username='$username' AND id='$id'";
   $sql=mysqli_query($connection,$update);
   if ($sql) {
    echo "<script>
    window.location='view.php';
    </script>";
   }
   else{
      echo "<p class='alert alert-warning'>failed to update feedback for $username</p>";
   }
}



}
 ?>
 </form>
 </body>
 </html>