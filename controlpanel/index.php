<?php
session_start();
error_reporting(0);
require_once "../php/connect.php";
$_SESSION['adminusername'];
$username;
$username=$_SESSION['adminusername'];

if (!isset($_SESSION['adminusername'])) {
	header("location:../index.php");
}

//selecting name of the login user from the database
$select="SELECT * FROM create_users WHERE username='$username'";
$sql=mysqli_query($connection,$select);
$fetch=mysqli_fetch_array($sql);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>controlpanell</title>
	<link rel="icon" type="text/css" href="../img/controlpanel.jpg">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script  src="../js/jquery-3.6.0.min.js" ></script>
	<style type="text/css">
		.row{
			height: 100vh
		}
		.list .nav .nav-item {
			margin-top: 10px;
		}
		.list .nav .nav-item .nav-link{
			color: white;
			text-transform: capitalize;
		}

		.list .nav .nav-item .dashbord{
			background: rgba(0, 0, 0, 0.3);
			border-left: 2px solid orange;	
		}
		
		.list .nav .nav-item .nav-link:hover{
			background: rgba(0, 0, 0, 0.3);
			border-left: 2px solid orange;
		}
		.heading{
			border-bottom: 2px solid rgba(0,0,0,0.6);
			font-size: 20px;
			display: flex;
			padding: 20px
		}
		.heading h1{
			font-size: 18px
		}
		.heading div{
			margin-left: 45%
		}
		.heading div h1:nth-child(1):after{
			content: ">";
			margin-left: 5px

		}
		@media screen and (max-width: 1230px){
			.heading h1{
			font-size: 15px
		}
		}
		@media screen and (max-width: 990px){
			.heading h1{
			font-size: 13px
		}
		}	</style>
</head>
<body>
<div class="row no-gutters">
	<div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 bg-dark">
		<div class="profile">
			<div class="">
  <iframe src="profile/index.php" id="profile" width="100%" height="80px" style="border: none;margin-top: 10px"></iframe><span class="fa fa-camera "  data-toggle="modal" data-target="#my" style="position: absolute;margin-left: -120px;display: none;margin-top: 55px"></span>
  <div class="media-body">
  
    <h4 class="text-capitalize text-white" style="font-size: 15px; margin-left: 20px;"><?php echo $fetch['fullname'] ?></h4>
  </div>
</div>
		</div>

		<div class="header" style="margin-top: 20px;">
			<h1 class="text-uppercase" style="background:rgba(0, 0, 0, 0.6);padding: 10px;font-size: 20px; text-align: center;color: wheat;">menu</h1>
		</div>
		<div class="list ">
		<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link dashboard text-white" href="#" id="dashboard">dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link member text-white" href="#"><span class="fa fa-users mr-1"></span>members</a>
    <ul style="display:none" class="member_menu">
    	<li class="list-unstyled text-capitalize text-white adduser"><span class="fa fa-plus-square mr-1"></span>add user</li>
    	<li class="list-unstyled text-capitalize text-white"><span class="fa fa-info-circle mr-1"></span><a href="members/view.php" class="text-white">view users</a></li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link iteml text-white" href="#"><span class="fa fa-folder mr-1"></span>items</a>
    <ul style="display:none" class="itemmenu">
    	<li class="list-unstyled text-capitalize text-white"><span class="fa fa-plus-square mr-1"></span><a href="items/view.php" class="text-white text-capitalize">uploaded items</a></li>
    	<li class="list-unstyled text-capitalize text-white"><span class="fa fa-info-circle mr-1"></span><a href="issued/view.php" class="text-white">issued items</a></li>
    	<li class="list-unstyled text-capitalize text-white"><span class="fa fa-rocket mr-1"></span><a href="overdue/index.php" class="text-white">overdue items</a></li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white uploaditems" href="#" ><span class=" 	fa fa-cloud-upload mr-1"></span>upload an item</a>
  </li>
   <li class="nav-item">
    <a class="nav-link  text-white" href="return/view.php"><span class="fa fa-folder-open mr-1"></span>return item</a>
  </li>
  
  
  <li class="nav-item ">
    <a class="nav-link security" href="#"><span class="fa fa-phone mr-1 "></span>view contacts</a>
    <ul class="securitymenu text-capitalize text-white" style="display:none;">
    	<li class="list-unstyled text-capitalize text-white"><a href="contact/view.php" class="text-white text-capitalize" style="text-decoration: none;">view system contacts</a></li>
    	<li class="list-unstyled text-capitalize text-white"><a href="general/index.php" class="text-white text-capitalize" style="text-decoration: none;">view general contacts</a></li>
    	
    </ul>
  </li>

   <li class="nav-item">
    <a class="nav-link text-white" href="../php/logout.php">sign out <span class="fa fa-sign-out ml-1"></span></a>
  </li>
</ul>
	</div>
</div>
	<div class="col-8 col-sm-8 col-md-9 col-lg-10 col-xl-10 ">
		<header class="sticky-top bg-warning p-2">
			<div class="fa fa-bars ml-2 text-white" style="font-size: 30px"></div>
		</header>
			<div class="heading ">
	<h1 class="text-capitalize">must biodiversity equipment system</h1>
	<div class="d-flex">	
	<h1><span class="fa fa-user "></span>admin</h1>
	<h1 style="margin-left: 30px;"><span class="fa fa-dashboard mr-1"></span>dashbord</h1>
	</div>

</div>
<div class="content">
<!-- dashboard div -->
	

	<!--recent issued div -->
	<div class="recentissued container" style="margin-top: 20px">
	<div class="card" style="background:;width: 1000px;max-width: 98%">
		<div class="card-body">
			<h3 class="text-capitalize p-3 border-bottom">top ten recent issued items</h3>
			<div class=" ">
				<table class="table">
					<?php 
$select="SELECT * FROM issue_item ORDER BY id desc limit 5";
$sql=mysqli_query($connection,$select);

					 ?>
					<tr class="text-capitalize font-weight-bold" style="height:50px">
						
						<th class="ml-3">username</th>
						<th class="ml-3">item name</th>
						<th class="ml-3">item barcode</th>
						<th class="ml-3">issued date</th>
						<th>status</th>
					
					</tr>
						<?php

while($data = mysqli_fetch_array($sql))
{
?>

					<tr style="height:">
						
						<style type="text/css">
							tr th{
								margin-left: 30px
							}
						</style>

						<td><?php echo $data['username']; ?></td>
						<td class='text-capitalize'><?php echo $data['name']; ?></td>
						<td><?php echo $data['bacorde']; ?></td>
						<td><?php echo $data['issuedate']; ?></td>
						<td class='text-capitalize'><?php echo $data['stataus']; ?></td>
						
					</tr>
					<?php
}
?>
				</table>
				
			</div>
			
			
		</div>
	</div>
</div>
</div>


		<div class="actions">
			<!-- add users div -->
			<div class="userdiv" style="display:none;">
			
			<div class="users d-flex container" hidden>

			<div class="container users card col-6 col-3 mt-5">
				<div class="card-body">
					<iframe src="members/index.php" width="100%" height="700px" style="border: none;"></iframe>
				</div>
			</div>
			<div class="description mt-5 p-5 ">
				<h1 style="font-size:20px;text-transform: capitalize;font-weight: 600;"><span class=" 	fa fa-user-circle-o mr-1"></span>add the user using  the form</h1>
				<p class="border-bottom">add the user of the system to the database using the form given </p>
			</div>
			</div>

      <!-- returb iterms div -->
			</div>
			 <div class="returnitems" style="display:none;">
			<div class="card cnotainer" style="border: none;">
				<iframe src="return/index.php" width="100%" height="900px" class="container" style="border:none;"></iframe>
			</div>
			</div>

			<!--modal for updating profile -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <iframe src="profile/update.php" width="100%" height="400px" style="border:none;"></iframe>
      </div>

    </div>
  </div>

    
</div>
   <!-- upload items div -->
		<div class="uploaditemdiv" style="display:none;">
			
			<div class="upload d-flex container" style="display:none">

			<div class="container uplaods card col-6 col-3 mt-5">
				<div class="card-body">
					<iframe src="items/index.php" width="100%" height="500px" style="border: none;"></iframe>
				</div>
			</div>
			<div class="description mt-5 p-5 ">
				<h1 style="font-size:20px;text-transform: capitalize;font-weight: 600;"><span class="fa fa-cloud-upload mr-1"></span>appload item details to the database </h1>
				<p class="border-bottom">enter the details of all items in stalk to the database for accessibility to students to borrow</p>
			</div>
		</div>
		 </div>

		 <!--div for giving feedback-->
		 	<div class="feedbackdiv" style="display:none;">
			
			<div class=" d-flex container" style="display:">

			<div class="container uplaods card col-6 col-3 mt-5">
				<div class="card-body">
					<iframe src="contact/index.php" width="100%" height="500px" style="border: none;"></iframe>
				</div>
			</div>
			<div class="description mt-5 p-5 ">
				<h1 style="font-size:20px;text-transform: capitalize;font-weight: 600;">give feeback to contacted users using the form given</h1>
				<p class="border-bottom">make sure you enter all the details in the fields given,use the collect username the username given</p>
			</div>
		</div>
		 </div>
	</div>


	</div>

</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		//displaying members menu

		$(".member").click(function(){
      $(".member_menu").toggle("slow")
		})

		//displaying the link of items
		$(".iteml").click(function(){
			$(".itemmenu").toggle("slow");
		})

		//working on help menu
	   $(".help").click(function(){
	   	$(".helpmenu").toggle("slow");
	   })
      
      //showing security menu
      $(".security").click(function(){
      	$(".securitymenu").toggle("slow");
      })


		//showing adding the user form
		$(".adduser").click(function(){
		$(".userdiv").css('display','block');
		$(".content").css('display','none');
		$(".form").css('display','none');
		$(".returnitems").css('display','none');
		$(".feedbackdiv").css('display','none');
		$(".feedbackdiv").css('display','none');
		$(".uploaditemdiv").css('display','none');
		})


		//showing dashboard
		$(".dashboard").click(function(){
		$(".userdiv").css('display','none');
		$(".content").css('display','block');
		$(".form").css('display','none');
		$(".returnitems").css('display','none');
		$(".feedbackdiv").css('display','none');
		$(".uploaditemdiv").css('display','none');
		})
    
    //showing items upload div
    $(".uploaditems").click(function(){
    $(".userdiv").css('display','none');
		$(".content").css('display','none');
		$(".uploaditemdiv").css('display','block');
		$(".form").css('display','none');
		$(".returnitems").css('display','none');
		$(".feedbackdiv").css('display','none');
    })

		//showing the returning items
		$(".item").click(function(){
		$(".returnitems").css('display','block');
		$(".userdiv").css('display','none');
		$(".uploaditemdiv").css('display','none');
		$(".content").css('display','none');
		$(".feedbackdiv").css('display','none');
		});

		//working on profile update
		$("#profile").mouseover(function(){
		
			$(".fa-camera").show("slow");
         });

		//showing the modal for updaing profile form
		$(".fa-camera").click(function(){
			$(".modal").fadeIn("slow");

			//working on closing the modal
			$(".close").click(function(){
				$(".modal").hide("slow");
			})
		});

		//showing the feedbackdiv
		$(".feedback").click(function(){
			$(".feedbackdiv").css('display','block');
			$(".returnitems").css('display','none');
		$(".userdiv").css('display','none');
		$(".uploaditemdiv").css('display','none');
		$(".content").css('display','none');
		})
	})
</script>

</body>
</html>