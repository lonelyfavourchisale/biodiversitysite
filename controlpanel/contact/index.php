 <?php 
 error_reporting(0);
require_once "../../php/connect.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<title></title>
	<style type="text/css">
		label{
			text-transform: capitalize;
		}
	</style>
</head>
<body>
 <form action="index.php" method="post">
 	<h3 class="text-center font-weight-bold text-capitalize p-2">give feedback</h3>

  	 ?>
	<div class="form-group">
		<label>username</label>
		<input type="text" class="form-control" name="username" required>
	</div>
	<div class="form-group">
		<label>feedback</label>
		<input type="text" class="form-control" name="feedback" required>
	</div>
		<div class="form-group">
		<input type="submit" value="give feedback" class="form-control bg-dark col-4 text-white text-capitalize" name="submit">
	</div>
    </form>
</body>
</html> 
	
