<?php 
error_reporting(0);
require_once "../../php/connect.php";


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>view issued items</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script  src="../../js/jquery-3.6.0.min.js"></script>
</head>
<body>
	<h1 class="text-capitalize text-center font-weight-bold"> overdue iterms details</h1>
	<div class="header d-flex">
	
 <form action="view.php" method="post" class="container mt-3" style="margin-left: 400px;width: 110%;" id="search-form">
    <div class="form-group input-group">
      <input type="text" name="username" placeholder="search the items user borrowed by entering the username here............." class="form-control col-10" required>
      <input type="submit" value="search" class="text-uppercase text-white bg-warning form-control col-3 p-2" name="submit">
    </div>
    <div class="data-container"></div>
  </form>
</div>

<div class="">
<table class="table" border="2px" style="width: 99%;margin-left: 5px;">
						<?php 
$select="SELECT * FROM issue_item  WHERE stataus  LIKE '% days overdue%' ORDER BY id desc";
$sql=mysqli_query($connection,$select);



					 ?>
					<tr class="text-capitalize font-weight-bold">
						<th class="ml-3">username</th>
						<th class="ml-3">location</th>
						<th class="ml-3"> contact</th>
						<th class="ml-3">item name</th>
						<th class="ml-3">barcode</th>
						<th class="ml-3">issued date</th>
						<th class="ml-3">return date</th>
						<th class="ml-3">action</th>
						<th>status</th>
					</tr>
									<?php

while($data = mysqli_fetch_array($sql))
{


?>

					<tr style="height: 60px">
						<style type="text/css">
							tr th{
								margin-left: 30px
							}
						</style>
						<form action="view.php" method="post">
						<td  class='text-capitalize'><?php echo $data['username']; ?></td>
						<td><?php echo $data['location']; ?></td>
						<td><?php echo $data['contact']; ?></td>
						<td class='text-capitalize'><?php echo $data['name']; ?></td>
						<td><?php echo $data['bacorde']; ?></td>
						<td><?php echo $data['issuedate']; ?></td>
						<td><?php echo $data['returndate']; ?></td>
						<td><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">
                            <a href="delete.php?del=<?php echo $data['id']; ?>" style="color: #fff" >delete
                            </a>
                            </button>
                        </td>
					
                        <td class='text-capitalize'><?php echo $data['stataus']; ?></td>
					</tr>
					</form>
									<?php
}
?>
				</table>
	</div>
				

<script type="text/javascript">
	$(document).ready(function(){
		
//working on the search menu
     $("#search-form").submit(function(event){
                event.stopPropagation();
                event.preventDefault();


                    var request = $.ajax({
                        method: "post",
                        url:   "search.php",
                        data:  $("#search-form").serialize()
                    });

                    request.done(function(data){
                       $(".data-container").html(data)
                       document.querySelector('#search-form').reset();
                    });

                    request.fail(function(error){
                        alert(error);
                    });
            })
	})
</script>
</body>
</html>