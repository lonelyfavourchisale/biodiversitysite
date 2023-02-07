<?php 	
require_once "../../php/connect.php";

$select="SELECT * FROM allcontacts";
$sql=mysqli_query($connection,$select);
$fetch=mysqli_fetch_all($sql,MYSQLI_ASSOC);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>	GENERAL USERS</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container text-center">	
	<h1 class="text-capitalize">general contacts details</h1>
	<p>	This page shows all the contants from the home page of general users i.e even those that are not registered users.Must be responded by either using their phone number or email address given by them.</p>
	</div>
<table class="table" border="1px">	
<tr>
<th>full name</th>
<th>phone</th>
<th>email</th>
<th>location</th>
<th>message</th>
<th>status</th>	
<th colspan="2">action</th>
</tr>
<tr>
	<?php 	 
	foreach ($fetch as $key) {
	
	?>
<td><?php 	echo $key['fullname']; ?></td>
<td><?php 	echo $key['phone']; ?></td>
<td><?php 	echo $key['email']; ?></td>
<td><?php 	echo $key['location']; ?></td>
<td><?php 	echo $key['message']; ?></td>
<td><?php 	echo $key['status']; ?></td>
<td>
 <button class="btn btn-danger">
     <a href="delete.php?del=<?php echo $key['id']; ?>" style="color: #fff" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE?')">Delete</a>
  </button>
</td> 
<td>
   <button class="btn btn-primary">
      <a href="respond.php?del=<?php echo $key['id']; ?>" style="color: #fff" onclick="return confirm('RESPOND BY EITHER CALLING THEM USING THEIR PHONE NUMBERS GIVEN OR BY SENDING THEM EMAILS,,,ARE YOU READY TO RESPOND??')">respond</a>
  
  </button>
 </td> 
	
</tr>
<?php 	 

}?>
</table>
</body>
</html>