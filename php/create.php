<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script  src="../../js/jquery-3.6.0.min.js" ></script>
</head>
<body>

</body>
</html>
<?php 
require_once "connect.php";


if (isset($_POST['submit'])) {
  
  $fullname=mysqli_escape_string($connection,$_POST['fullname']);
  $category=mysqli_escape_string($connection,$_POST['category']);
  $username=mysqli_escape_string($connection,$_POST['username']);
  $password=mysqli_escape_string($connection,$_POST['password']);
  $number = preg_match('@[0-9]@', $password);
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $specialChars = preg_match('@[^\w]@', $password); 

  if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
    echo "<p class='alert alert-warning'>Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
  } else {
    

   $select="SELECT * FROM create_users WHERE username='$username'";
  $query=mysqli_query($connection,$select);
  if (mysqli_num_rows($query)>0) {
      echo "<p class='alert alert-warning text-capitalize'>the user already added";
  }
  else{
  

  $insert="INSERT INTO create_users (profile,fullname, category,username,password)
VALUES ('','$fullname', '$category','$username','$password')";
$sql=mysqli_query($connection,$insert);
  if ($sql) {
      echo "<p class='alert alert-success text-capitalize'>the user successesfully added to the system<p>";

  }
  else{
    echo "<p class='alert alert-warning text-capitalize'>failed to insert data to the database<p>";
  }
}
}

 

 
  
      

  

}
 ?>

