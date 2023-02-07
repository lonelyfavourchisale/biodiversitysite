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
	<title>profile picture</title>
	<style type="text/css">
		body{
			overflow-x: hidden;
			background: transparent;
		}
		img{
			border-radius: 50%;
			width: 90px;
			height: 80px;
			margin-left: 30px;
		}
	</style>
</head>
<body>
	

	<?php 
$select="SELECT profile FROM create_users WHERE username='$username'";
$query=mysqli_query($connection,$select);

$fetch=mysqli_fetch_assoc($query);

	 ?>
	<img src="../uploads/<?php echo $fetch['proflie'] ?>" width="100px" height="90%">

	<script  src="../../js/jquery-3.6.0.min.js" ></script>
<script type="text/javascript">

	$(document).ready(function(){
		
		//image name
		const imagename='<?php echo $fetch['profile']; ?>';
		if (imagename=="") {
			$("img").attr({"src":"../../img/proofile2.png"})
		}
		else{
		$("img").attr({"src":"../uploads/<?php echo $fetch['profile']; ?>"})	
		}
	})
	
</script>
</body>
</html>