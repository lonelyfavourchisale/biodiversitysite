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
</head>
<body>
<h1 class="text-capitalize text-center font-weight-bold">return items</h1>
<p class="text-center">	Return items in the table below using the return button given.You can also edit the issued date using the edit button</p>
<div class="">
<table class="table" border="2px" style="width: 99%;margin-left: 5px;">
						<?php 
$select="SELECT * FROM issue_item WHERE stataus='not returned'  ORDER BY id desc";
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
						<th class="ml-3" colspan="3">action</th>
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
						<td ><?php echo $data['username']; ?></td>
						<td><?php echo $data['location']; ?></td>
						<td><?php echo $data['contact']; ?></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['bacorde']; ?></td>
						<td><?php echo $data['issuedate']; ?></td>
						<td><?php echo $data['returndate']; ?></td>
						<td><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">
                            <a href="delete.php?del=<?php echo $data['id']; ?>" style="color: #fff" >delete
                            </a>
                            </button>
                        </td>
						<td><button class="btn btn-primary" onclick="return confirm('Are you sure you want to edit?')">
                            <a href="update.php?del=<?php echo $data['id']; ?>" style="color: #fff">edit</a>
                           </button>
                        </td>
                        <td><button class="btn btn-success" onclick="return confirm('Are you sure you want to return the item ?')">
                            <a href="return.php?del=<?php echo $data['id']; ?>" style="color: #fff">return</a>
                           </button>
                        </td>
                        <td><?php echo $data['stataus']; ?></td>
					</tr>
					</form>
									<?php
}
?>
				</table>
	</div>
				

</body>
</html>