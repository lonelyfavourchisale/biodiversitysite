<?php 
error_reporting(0);
require_once "php/connect.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title>reset password</title>
	<style type="text/css">
		body{
			background:silver;
		}
		form{
			background: white;
			width: 500px;
			padding: 20px;
			margin-left: 50%;
			transform: translate(-50%,-50%);
			margin-top:300px;
			max-width: 90%;
		}
	</style>
</head>
<body>
<div class="form">
	<form action="reset.php" method="post">
			<?php 


if (isset($_POST['submit'])) {
	 $username=mysqli_escape_string($connection,$_POST['username']);
	 $previouspassword=mysqli_escape_string($connection,$_POST['previouspassword']);
     $password=mysqli_escape_string($connection,$_POST['password']);
     $confirmpassword=mysqli_escape_string($connection,$_POST['confirmpassword']);
     $number = preg_match('@[0-9]@', $password);
     $uppercase = preg_match('@[A-Z]@', $password);
     $lowercase = preg_match('@[a-z]@', $password);
     $specialChars = preg_match('@[^\w]@', $password);

     $select="SELECT * FROM create_users WHERE username='$username'";
     $sqlselect=mysqli_query($connection,$select);
     $fetch=mysqli_fetch_assoc($sqlselect);

     if (mysqli_num_rows($sqlselect)==0) {
        echo "<p class='alert alert-warning'>wrong username</p>";
     }
     else{
     	if ($previouspassword!=$fetch['password']) {
     		  echo "<p class='alert alert-warning'>the previous password is wrong</p>";
     	}
     	else{
     		 if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
    echo "<p class='alert alert-warning'>Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.</p>";
  
          }
          else{
          	if ($confirmpassword!=$password) {
          		echo "<p class='alert alert-warning'>passwords does not match</p>";
          	}
          	else{
          		$update="UPDATE create_users SET password='$password' WHERE username='$username'";
          		$sqlupdate=mysqli_query($connection,$update);

          		if ($sqlupdate) {
          			echo "<p class='alert alert-success'>password successfully updated</p>";
          		}
          		else{
          			die('failed to reset password');
          		}
          	}
          } 
     	}
     }

    
}
		 ?>
		<h3 class="text-capitalize font-weight-bold text-center p-3">reset password form</h3>
		<div class="form-group">
			<label>enter username</label>
			<input type="text" name="username" class="form-control" required>
		</div>
		<div class="form-group">
			<label>enter previous passowrd</label>
			<input type="password" name="previouspassword" class="form-control" required>
		</div>
		<div class="form-group">
			<label>enter new password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<label>confirm password</label>
			<input type="password" name="confirmpassword" class="form-control" required>
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" value="reset password"class="form-control text-white text-uppercase bg-dark">
		</div>
	</form>
</div>
</body>
</html>