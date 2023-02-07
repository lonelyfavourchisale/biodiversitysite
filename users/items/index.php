<?php 
session_start();
error_reporting(0); 
require_once "../../php/connect.php";
$username;
 $_SESSION['studentusername'];
 $username=$_SESSION['studentusername'];

//selcting issued data
 $selectIsusued="SELECT * FROM issue_item  WHERE username='$username'";
$sqlissued=mysqli_query($connection,$selectIsusued);
$fetchissued=mysqli_fetch_assoc($sqlissued);

$issuedtime=$fetchissued['issuedate'];



 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>	items</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<script  src="../../js/jquery-3.6.0.min.js" ></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<style type="text/css">
		body{
		;
			height: auto;
		}
	</style>
	
</head>
<body>

<header class="bg-primary">
	<nav class=" bg-info p-4" >
  <h1 class="text-capitalize text-center text-white">biodiversity system items infomation</h1>
</nav>
</header>
<div class="search" style="margin-top:5px;margin-left: 20%;">
	<form action="index.php" method="post">
		<div class="form-group input-group">
			<input type="text" name="name" placeholder="search an item here.............." class="form-control col-10 col-sm-10 col-md-7 col-lg-6 col-xl-5" required>
			<input type="submit" value="search" class="text-uppercase text-white bg-warning form-control col-4 col-sm-3 col-md-3 col-lg-2 col-xl-1" name="submit">
		</div>
		<div class="data-container"></div>
	</form>
</div>
<div class="galley">
	
</div>
<section>
	<style type="text/css">
		.section{
			margin-top: 100px;
			display: flex;
		}
		.section .card{
			width: 600px;
			height: 300px;
			margin-left: 30px;
		}
		.frequetlyitems{
       margin-top: 100px;
      
		}
		.frequetlyitems h1{
			 text-decoration: underline;
		}
		.frequetlyitems span{
			margin-left: 50px;
			text-transform: capitalize;
		}
	</style>

</section>

<section>
<div class="frequetlyitems">
	<h3 class="text-capitalize text-center ">frequently borrowed items</h3>

	    <?php 
$select="SELECT * FROM issue_item";
$query=mysqli_query($connection,$select);
      ?>
    
	<table class="table " style="width:98%;margin-left: 10px;margin-top: 20px;" border="1px">
		<tr class="bg-dark text-white text-capitalize">


			<th>item name</th>
			<th>borrowed date</th>
		</tr>
		<tr>
					   <?php       
while($data = mysqli_fetch_array($query))
{
?>
			<td><?php echo $data['name'] ?></td>
			<td><?php echo $data['issuedate'] ?></td>
			</tr>
					 <?php
}
?>
	
	</table>
				
	</div>

</div>
</section>

	

<script type="text/javascript">
	$(document).ready(function(){
		//working on the search bar
 $("form").submit(function(event){
                event.stopPropagation();
                event.preventDefault();


                    var request = $.ajax({
                        method: "post",
                        url:   "search.php",
                        data:  $("form").serialize()
                    });

                    request.done(function(data){
                       $(".data-container").html(data)
                       document.querySelector('form').reset();
                    });

                    request.fail(function(error){
                        alert(error);
                    });
            })
	})
</script>
</body>
</html>