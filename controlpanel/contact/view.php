<?php 
error_reporting(0);
require_once "../../php/connect.php";
$select="SELECT * FROM contacts";
$sql=mysqli_query($connection,$select);



if(isset($_POST['edit']))
{
    $row = $_POST['edit'];
//     ....have form to edit this row
//     ....update row $i in database
//     ....submit button
 }
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
 		<script  src="../../js/jquery-3.6.0.min.js" ></script>
 	<title>view contacts</title>
 	<style type="text/css">
 		table{
 			width: 90%;
 			margin-left: 2px;
 		}
 	</style>
 </head>
 <body>
 	<h1 class="text-center text-capitalize">view contacts inforamation</h1>
 	<div class="d-flex justify-content-center">	
 <table class="table" border="1px" style="width:1400px;margin-top: 5px;max-width: 98%">
	<tr class="text-capitalize">
		<th>fullname</th>
		<th>username</th>
		<th>location</th>
		<th>message</th>
		<th>feedback</th>
		<th colspan="2">action</th>
	</tr>
		<?php

while($data = mysqli_fetch_array($sql))
{
?>
		
	<form action="view.php" method="post">
	<tr>
		<td><?php echo $data['fullname'] ?></td>
		<td><?php echo $data['username'] ?></td>
		<td><?php echo $data['location'] ?></td>
		<td><?php echo $data['message'] ?></td>
		<td><?php echo $data['feedback'] ?></td>
		<td>
		    <button class="btn btn-danger">
            <a href="delete.php?del=<?php echo $data['id']; ?>" style="color: #fff" onclick="return confirm('Are you sure?')">Delete</a>
        </button>
    </td> 
    <td>
			 <button class="btn btn-primary">
                <a href="update.php?del=<?php echo $data['id']; ?>" style="color: #fff" onclick="return confirm('do want to give feedback or edit?')">respond</a>
       </button>
    </td> 
	
	
		<?php 
      if (isset($_POST['edit'])) {
      $regnumber=$_POST['username'];
      $feedback=$_POST['feedback'];

      $update="UPDATE contacts SET feedback='$feedback' WHERE username='$regnumber'";
      $sqlupdate=mysqli_query($connection,$update);
      if ($sqlupdate) {
      	echo "";
      }
      else{
      	  	echo "<script>
alert('failed to update data')
      	</script>";
      }
      
      }
		 ?>
    </form>
</td>

  </tr>	
	</tr>
<?php
}
?>
</table>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">give the user feedback</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="index.php" method="post">
	<div class="form-group">
		<label>username</label>
		<input type="text" class="form-control" name="">
	</div>
	<div class="form-group">
		<label>feedback</label>
		<input type="text" class="form-control" name="">
	</div>
	<div class="form-group">
		<label>edit</label>
		<input type="text" class="form-control" name="edit">
	</div>
    </form>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".reply").click(function(){
			$('.modal').show("slow");
			$('.close').click(function(){
				$('.modal').hide("slow");
			})
		})

		//
	})
</script>
 </body>
 </html>