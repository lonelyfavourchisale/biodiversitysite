<?php 
error_reporting(0);
require_once "../../php/item.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>upload books</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		label{
			text-transform: capitalize;
			font-weight: 600;
		}
		
		input[type='submit']{
			border: 2px solid grey;
			border-radius: 5px;
			width: 200px;
			padding: 5px;
			background: grey;
			text-transform: uppercase;
		}
		h1{
			font-size: 25px;
			font-weight: 700;
		}
	</style>
</head>
<body>
<h1 class="text-capitalize text-center">enter items details  to the database</h1>

<div class="form">
	<form action="index.php" method="post">
		<div class="form-group">
			<label>item name</label>
			<select class="form-control text-capitalize" name="name">
				<option>meeting owl</option>
				<option>marvic drone</option>
				<option>camera traps</option>
				<option>inception cameras</option>
				<option>binoculars</option>
				<option>samsung tablets</option>
			</select>
		</div>
		<div class="form-group">
			<label>enter item barcode number</label>
			<input type="text" name="barcode" class="form-control">
			
		</div>
		
		<div class="form-group">
			<input type="submit" name="submit" value="apload " class="bg-secondary">
		</div>

			</form>
</div>
</body>
</html>