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
	<script  src="../../js/jquery-3.6.0.min.js" ></script>
	<title>view users</title>
</head>
<body>
<?php 

$select="SELECT * FROM create_users ORDER BY id desc";
$query=mysqli_query($connection,$select);



 ?>
<div class="header d-flex">
	<h1 class="text-capitalize text-center " style="width:500px;font-size: 30px;margin-left: 40px;margin-top: 40px;">system users</h1>
 <form action="view.php" method="post" class="container mt-5" style="margin-left: 400px;width: 110%;">
    <div class="form-group input-group">
      <input type="text" name="keywords" placeholder="search the user............." class="form-control col-10" required>
      <input type="submit" value="search" class="text-uppercase text-white bg-warning form-control col-3 p-2" name="submit">
    </div>
    <div class="data-container"></div>
  </form>
</div>

<div class="">
	<table class="table " border="1px" style="width:98%;margin-left: 10px;">
   
    
		<tr class="text-uppercase">
      
			<th>user profile</th>
			<th>full name</th>
			<th>username</th>
			<th>category</th>
			<th>password</th>
			<th>action</th>

		</tr>
		<?php

while($data = mysqli_fetch_array($query))
{
?>
  <tr>
    <td><img src="../uploads/<?php  echo $data['profile'];?>" width="100px"></td>
    <td class='text-capitalize'><?php echo $data['fullname']; ?></td>
    <td><?php echo$data['username']; ?></td>
    <td class='text-capitalize'><?php echo $data['category']; ?></td>
    <td><?php echo $data['password'] ?></td>
    <td><button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <a href="delete.php?del=<?php echo $data['id']; ?>" style="color: #fff" >Delete</a>
                          </button></td> 
			
  </tr>	
<?php
}
?>
		<div class="modal " id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body">
       
          <button type="button" class="close" data-dismiss="modal">&times;</button>

             <form action="index.php" method="post" class="p-3">
              <h3 class="text-center text-uppercase ">edit the user</h3>
          <div class="form-group mt-2">
            <label class="text-capitalize ">username</label>
            <input type="text" name="username" class="form-control" placeholder="enter the usename of the user you want to edit">
          </div>
          <div class="form-group mt-2">
            <label class="text-capitalize ">fullname</label>
            <input type="text" name="username" class="form-control">
          </div>
          <div class="form-group mt-2">
            <label class="text-capitalize ">category</label>
            <select class="form-control" name="category">
            	<option>admin</option>
            	<option>student</option>
            </select>
          </div>
          <div class="form-group">
            <label class="text-capitalize ">password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" value="signin" name="submit" class="form-control bg-dark col-3 text-uppercase text-white">
          </div>
         

        </form>
      </div>
  </div>
</div>

	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
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