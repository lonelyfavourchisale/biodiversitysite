<?php 
error_reporting(0);
require_once "../../php/create.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>adding user page</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<h3 class="text-capitalize text-center font-weight-bold">add the user in the system</h3>
	 
				<form action="index.php" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label class="text-capitalize">enter user full name</label>
						<input type="text" name="fullname" class="form-control">

						<span><?php
						 ?></span>
					</div>
					<div class="form-group">
						<label class="text-capitalize">category</label>
						<select class="form-control" name="category">

							<option>admin</option>
							<option>student</option>
							<span><?php 

							 ?></span>
						</select>
					</div>
					<div class="form-group">
						<label class="text-capitalize">enter the username</label>
						<input type="text" name="username" class="form-control">
						<span><?php 

						 ?></span>
					</div>
					<div class="form-group">
						<label class="text-capitalize">enter user password</label>
						<input type="password" name="password" class="form-control">
						<span><?php 

						 ?></span>
					</div>
					<div class="form-group">
						
						<input type="submit" name="submit" value="add the user" class="text-capitalize text-white bg-dark form-control col-4">
					</div>
				</form>
			
</body>
</html>