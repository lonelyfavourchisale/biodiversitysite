<?php 
session_start();
error_reporting(0);
require_once "../../php/connect.php";

$_SESSION['adminusername'];
$username;
$username=$_SESSION['adminusername'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<title>updating the profile pic</title>
	<style type="text/css">
		body{
			background: white;
		}
		img{
			border-radius: 50%;
			width: 90px;
			height: 80px;
		}
	</style>
</head>
<body>
<div class=" p-4  mt-2 ml-4">
	<?php 
$select="SELECT profile FROM create_users WHERE username='$username'";
$query=mysqli_query($connection,$select);

$fetch=mysqli_fetch_assoc($query);

	 ?>
<img src="../../img/index5.jpg" class="align-self-start mr-3 mr-3 mt-3 rounded-circle ml-3" style="width:100px;height: 90px" >

<form action="update.php" method="post" enctype="multipart/form-data">
	<h3>update your profile picture</h3>
	<div class="form-group">
		<input type="file" name="fileToUpload" class="form-control">
		
	</div>
	<div class="form-group">
		<input type="submit" name="submit" value="update">
	</div>

	<?php 

if (isset($_POST['submit'])) {
$target_dir = "../../controlpanel/uploads/";
$imagename=$_FILES["fileToUpload"]["name"];
$target_file = $target_dir . basename($imagename);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 echo "";

    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    //inserting the image to the database
   $sql = "UPDATE create_users SET  profile='$imagename' WHERE username='$username'";
   $query=mysqli_query($connection,$sql);
   if ($query) {
   echo "<p class='alert alert-success'>profile updated successfully,refresh your browser</p>";
  
 
   
}
   else{
   	 echo "<p class='alert alert-warning'>failed to uptade profile</p>";
   }
   }

}
	 ?>
</form>
</div>
<script  src="../../js/jquery-3.6.0.min.js" ></script>
<script type="text/javascript">
	<script  src="../../js/jquery-3.6.0.min.js" ></script>
<script type="text/javascript">

	$(document).ready(function(){
		
		//image name
		const imagename='<?php echo $fetch['profile']; ?>';
		if (imagename=="") {
			$("img").attr({"src":"../../proofile2.png"})
		}
		else{
		$("img").attr({"src":"../uploads/<?php echo $fetch['profile']; ?>"})	
		}
	})
	
</script>
	
</script>
</body>
</html>