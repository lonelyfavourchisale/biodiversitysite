<?php 
error_reporting(0);
require_once "../../php/connect.php";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>view items</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<script  src="../../js/jquery-3.6.0.min.js"></script>
</head>
<body>
	<h1 class="text-capitalize text-center font-weight-bold mt-2">all items uploaded to the database system</h1>
	<div class="header d-flex">
	
 <form action="view.php" method="post" class="container mt-3" style="margin-left: 400px;width: 110%;" id="search-form">
    <div class="form-group input-group">
      <input type="text" name="barcode" placeholder="search the item by entering its barcode number here............." class="form-control col-10" required>
      <input type="submit" value="search" class="text-uppercase text-white bg-warning form-control col-3 p-2" name="submit">
    </div>
    <div class="data-container"></div>
  </form>
</div>
<div class="">
	
	<?php 
$select="SELECT * FROM items ORDER BY time desc";
$sql=mysqli_query($connection,$select);

	 ?>
	<table class="table" border="1px" style="width: 98%;margin-left: 10px;">
		
		
		<tr class="text-capitalize">
			<th>item name</th>
			<th>item barcode</th>
			<th>time uploaded</th>
			<th >actions</th>
		</tr>
		<tr>
				<?php

while($data = mysqli_fetch_array($sql))
{
?>
			<td class='text-capitalize'><?php echo $data['name'] ?></td>
			
			<td><?php echo $data['barcode'] ?></td>
			
			<td><?php echo $data['time'] ?></td>
			<td><button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <a href="delete.php?del=<?php echo $data['id']; ?>" style="color: #fff" >Delete</a>
                          </button></td> 
		</tr>
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