<?php   
session_start();
error_reporting(0);
require_once "../php/connect.php";
$username;

 $_SESSION['studentusername'];
 $username=$_SESSION['studentusername'];


 if (!isset( $_SESSION['studentusername'])) {
  header("location:../index.php");
 }

 //selecting name for the user from the database
 $select="SELECT * FROM create_users WHERE username='$username' ";
 $sql=mysqli_query($connection,$select);
 $fetch=mysqli_fetch_array($sql);


 //selcting issued data
 $selectIsusued="SELECT * FROM issue_item  WHERE username='$username'";
$sqlissued=mysqli_query($connection,$selectIsusued);
$fetchissued=mysqli_fetch_assoc($sqlissued);
$issuedate=$fetchissued['issuedate'];
$barcodeissue;
$barcordreturn;



//selecting the issued items with due date
 $selectdue="SELECT * FROM issue_item  WHERE stataus LIKE '%days overdue%' AND username='$username'";
 $sqloverdue=mysqli_query($connection,$selectdue);
 $fetchoverdue=mysqli_fetch_all($sqloverdue,MYSQLI_ASSOC);
 foreach ($fetchoverdue as $key) {
  $status=$key['stataus'];
 }


if(mysqli_num_rows($sqlissued)==0){
    $status='no item borrowed';
}
else{
if (mysqli_num_rows($sqloverdue)==0) {
  $status='no overdue';
}
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>user page</title>
  <link rel="icon" type="text/css" href="../img/userpage.jpg">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/users.css">
  <script  src="../js/jquery-3.6.0.min.js" ></script>
  <style type="text/css">
    body{
      margin: 0;
      background: whitesmoke;
      scroll-behavior: smooth;
      overflow-x: hidden;
    }
    .row{
    width: 100vw;
    height: 100vh
    }
    .profile iframe{
    max-width: 90%;
    border: none;
    height: 100px;  
    }
    .profile button span{
      font-size:30px
    }
    .media-body h4{
      text-decoration: ;
      margin-top: -35px;
      margin-left: -20px;
       color: orange; 
       font-size: 15px
    }
    .btn{
      margin-top:-75px;
      margin-left: 40px;
      font-size: 10px;
      border: none;
      box-shadow: unset;
      display: none;
      position: absolute;

    }
    .btn:focus{
      box-shadow: unset;
    }
    .list .nav .nav-item {
      margin-top: 5px;
    }
    .list .nav .nav-item .nav-link{
      color: white;
      text-transform: capitalize;
    }
    .list .nav #dashboard{
      background: rgba(0, 0, 0, 0.3);
      border-left: 2px solid orange;
      
    }
    .list .nav .nav-item .nav-link:hover{
      background: rgba(0, 0, 0, 0.3);
      border-left: 2px solid orange;
    }
    .dashboardinfo{
      margin-top: 100px;
      margin-bottom: 100px
    }
    .dashboardinfo .statistics{
      display: flex;
    }
    .dashboardinfo .statistics .item{
    width: 400px;max-width: 90%;  
    }
    .dashboardinfo .statistics .item h2{
    margin-left:90%;
    margin-top: 10px; 
    }
    .dashboardinfo .statistics .item h3{
    margin-top:30px
    }
    .dashboardinfo .statistics .status{
    width: 400px;
    max-width: 90%;
    margin-left: 30px;
    height: 200px;
    padding: 5px
    }
    .function{
      display: none;
    }
    .unfunction{
      display: block;
    }
    .borrow{
      display: none;
    }
    .borrow .justify-content-center{
      display: flex;
    }
    .feedback{
      display: none;
    }
    .contact{
      display: none;
    }
    .contact .justify-content-center{
      display: flex;
    }
    .resetdiv{
      display: none;
    }
    .resetdiv .justify-content-center{
      display: flex;
    }
    .items-div{
       height: auto;
       margin-top: 20px;
      display: none;
    }
    .lowerdiv{
        display: flex;
      }
      .lowerdiv h2{
        font-size: 20px
      }
      .lowerdiv .rightside{
                margin-left: 50%;display: flex;
      }
      .lowerdiv .rightside h3{
        font-size: 20px;
      }
      .lowerdiv .rightside h3:nth-child(2){
        margin-left: 50px;
      }
    footer{
      height: 50px;
      border:none;
      border-radius: 0px;
      position: absolute;
      bottom: 0;
        width: 100%;
        
    }
  @media screen and (max-width: 1100px){
      
     .lowerdiv .rightside h3{
        font-size: 18px;
      }
    }
    @media screen and (max-width: 1051px){
      .lowerdiv .rightside h3{
        font-size: 16px;
      }
    }
      @media screen and (max-width: 999px){
      .lowerdiv .rightside h3{
        font-size: 15px;
      }
    }
      @media screen and (max-width: 990px){
      .lowerdiv .rightside h3{
        font-size: 20px;
      }
      .dashboardinfo .statistics{
      display: block;
      justify-content: center;
    }
        .dashboardinfo{
      margin-bottom: 0px;
    }
    .dashboardinfo .statistics .item{
      margin-left: 50px;
      width: 870px;
      height: 250px;
      max-width: 95%
    }
    .dashboardinfo .statistics .item h3{
      margin-top: 100px;
     

    }
    .dashboardinfo .statistics .status{
      margin-left: 50px;
      width: 870px;
      height: 250px;
      max-width: 90%;
      margin-top:100px
    }
    .firstdiv{
            display: none;
            position: absolute;
            z-index: 1300;
            top: 2.7%;
       }
      .unfunction{
            display: none;
       }
      .function{
            display: block;
       }
    footer{
      position: absolute;
      display: none;

    }
    #footer{
    bottom: 0;
      height: 100px;
      display: none;
      
    }
    .items-div{
      display: block;
      margin-top: 100px;
      max-width: 95%;
      margin-left: 20px
    }
    .feedback{
            display: block;
            margin-top: 80px

      }
      .borrow{
        margin-left: 10px;
        margin-top: 80px;
        justify-content: center;
        align-items: center;

      }
      .borrow .justify-content-center{
      display: block;
    }
    .borrow{
        margin-left: 10px;
        margin-top: 80px;
        justify-content: center;
        align-items: center;

      }
    .borrow .justify-content-center div{
            
            width: 900px;
            margin-left: 20px;
    }
    .borrow .justify-content-center div:nth-child(2){
      margin-left: -20px
    }
    .contact{
      margin-left: 10px;
        margin-top: 80px;
        justify-content: center;
        align-items: center;
    }
    .contact .justify-content-center{
      display: block;
    }
    .contact .justify-content-center div{
            
            width: 900px;
            margin-left: 20px;
    }
    .contact .justify-content-center div:nth-child(2){
      margin-left: -20px
    }
    .resetdiv{
      margin-left: 10px;
        margin-top: 80px;
        justify-content: center;
        align-items: center;
    }
    .resetdiv .justify-content-center{
      display: block;
    }
    .resetdiv .justify-content-center div{
            
            width: 900px;
            margin-left: 20px;
    }
    .resetdiv .justify-content-center div:nth-child(2){
      margin-left: -20px
    }
    .modal.status{
      z-index: 1500
    }
    .modal.helpdiv{
      z-index: 1500;
    }
    }
    
    
  </style>
</head>
<body>
<div class="row no-gutters">
  <div class="col-12 col-sm-12 bg-dark col-lg-2 col-xl-2 firstdiv" >
    <div class="profile p-4 border-bottom">
      <div class="">
  <iframe src="profile/index.php" width="800px" class="profileiframe"></iframe>
<!-- Button to Open the Modal -->
  <button type="button" class="btn " data-toggle="modal" data-target="#my">
    <span class="fa fa-camera font-large"></span>
  </button>

  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <iframe src="profile/update.php" width="100%" height="500px" style="border:none;height: 500px"></iframe>
      </div>

      

    </div>
  </div>
</div><div class="media-body mt-4 ml-3">
    <h4 class="text-capitalize text-white"><?php echo $fetch['fullname']; ?></h4>
  </div>
</div>
    </div>
    
    <div class="list ">
    <ul class="nav flex-column">
  <li class="nav-item" id="dashboard">
    <a class="nav-link text-white dashboard" href="#">dashboard</a>
  </li>
 <li class="nav-item mt-3">
    <a class="nav-link book text-white" href="#" id="items" ><span class="fa fa-suitcase mr-1"></span>iterms</a>
    <ul class="itemsmenu" style="display:none">
  </ul>
  </li>
   <li class="nav-item mt-3">
    <a class="nav-link overduelink text-white" href="#" data-toggle="modal" data-target="#my"><span class="fa fa-thumbs-down mr-1" ></span>overdue status</a>
  </li>

 <!-- The Modal -->
<div class="modal status" id="my" style="margin-top: 20%">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
         <h3 ><span class="fa fa-thumbs-down"></span>overdue status</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>

      <!-- Modal body -->
      <div class="modal-body p-4">
      <h5 class="text-center"><?php echo "<p class='text-danger'>$status <span class='fa fa-warning'></span></p>" ?></h5>
      </div>

      

    </div>
</div>
</div>
  
  
   <li class="nav-item mt-3">
    <a class="nav-link borrowitem text-white" href="#"><span class="fa fa-folder-open-o mr-1 "></span>borrow an iterm</a>
  </li>
  <li class="nav-item mt-3">
    <a class="nav-link help text-white" href="#"  ><span class="fa fa-question-circle-o mr-1 "></span>help</a>
    <ul class="helpmenu" style="display:none">
      <li class="list-unstyled text-capitalize text-white helplink" data-toggle="modal" data-target="#myhelp"><span class="   fa fa-sticky-note-o mr-1"></span>manual script</li>
      <li class="list-unstyled text-capitalize text-white contact-link"><span class="   fa fa-handshake-o mr-1"></span>contact</li>
      <li class="list-unstyled text-capitalize text-white feedback-link"><span class="fa fa-comments-o mr-1"></span>view feedback</li>
    </ul>
  </li>
  <li class="nav-item mt-3">
    <a class="nav-link security text-white" href="#"><span class="fa fa-lock mr-1 "></span>security</a>
    <ul class="securitymenu" style="display:none;">
      <li class="list-unstyled text-capitalize text-white securitycaption" data-toggle="modal" data-target="#mysecurity"><span class="fa fa-warning mr-1"></span>caution</li>
      <li class="list-unstyled text-capitalize text-white reset"><span class="fa fa-key"></span>reset password</li>
    </ul>
  </li>
   <li class="nav-item mt-3">
    <a class="nav-link  text-white" href="../php/logout.php">sign out <span class="fa fa-sign-out ml-1"></span></a>
  </li>
</ul>
  </div>


  </div>
  <div class="col-12 col-sm-12 col-lg-10 col-xl-10 " style="background-color: ">
    <header class="bg-info sticky-top">
    <div class="bars border-bottom p-1" style="font-size: 30px">
      <span class="fa fa-bars ml-3 unfunction"> </span>
      <span class="fa fa-bars function" style="margin-left: 93%;">  </span>
    </div>
    
    <div class="lowerdiv p-3 text-capitalize text-white">
      <h2 class="text-capitalize text-white"><span  class="text-uppercase"> must</span> biodiversity</h2>
      <div class="rightside" >  
            <h3 ><span class="fa fa-user mr-1" ></span>user page</h3>
      <h3 ><span class="fa fa-dashboard mr-1"></span>dashboard</h3>
      </div>
    </div>      
    </header>
      <div class="search container col-12 col-sm-10 col-md-10 col-lg-8 col-xl-8" style="margin-top: 2px">
          <form action="index.php" method="post" class="search-form">
             <div class="form-group input-group">
                 <input type="text" name="keywords" placeholder="search an item here.............." class="form-control " required>
                 <input type="submit" value="search" class="text-uppercase text-white bg-warning form-control col-3" name="submit">
             </div>
          </form>       
          <div class="data-container"></div>            
    </div>

    <div class="dashboardinfo ">
    <div class="statistics justify-content-center">
      <?php 
                   $select="SELECT * FROM items WHERE  barcode!=''";
                  $sqlquery=mysqli_query($connection,$select);



         ?>
      <div class="item bg-secondary">
        <h2 class="text-white mt-4"><?php echo mysqli_num_rows($sqlquery); ?></h2>
        <h3  class="text-white ml-3"><span class="  fa fa-paw"></span>items availabe statistics</h3>
      </div>
      <div class="status card" >
        <h3 class="border-bottom p-3 text-dark"><span class="fa fa-thumbs-down"></span>overdue status</h3>
          <h5 class="text-center text-danger"><?php echo "<p>$status <span class='fa fa-warning'></span></p>" ?></h5> 
      </div>

    </div>

      <!--div for showing user borrowed books-->
      <div style="width: 1100px;max-width: 97%;margin-top: 100px">
        <?php 
                     $select="SELECT * FROM issue_item WHERE username='$username' ORDER BY id desc limit 3";
                     $sql=mysqli_query($connection,$select);
         ?>
        <div class="info container">
          <h1 class="text-center text-capitalize">item borrowed information</h1>
         
          <table class="table">
  
            <tr class='headingtable'>
              <th>item name</th>
              <th>barcode</th>
              <th>issue date</th>
              <th>status</th>
            </tr>
             <?php 
          
          if(mysqli_num_rows($sql)==0){
              echo "<p class='alert alert-warning text-center text-capitalize'><span class='fa fa-warning mr-2 text-danger'></span>no item borrowed before</p>";
              echo "<script>
              const heading=document.querySelector('.headingtable');
              heading.style.display='none';
              </script>";
          }
          ?>
            <tr>
          <?php       
               while($data = mysqli_fetch_array($sql))
                {

                // $date = strtotime("+21 day", strtotime($data['time']));
                   //$returndate=date("y-m-d h:m:s", $date);
             ?>
              <td><?php echo $data['name']; ?></td>
              <td><?php echo $data['bacorde']; ?></td>
              <td><?php   echo $data['issuedate'] ?></td>
              <td><?php echo $data['stataus'] ?></td>
            </tr>
                <?php
             }
            ?>
          </table>

        </div>

    </div>
  </div>
  <!--div for displaying borrowing form-->
    <div class="borrow ">
       <div class="justify-content-center ">
        <div class="description " style="width: 500px;max-width: 90%">
        <h1 style="font-size:20px;text-transform: capitalize;font-weight: 600;"><span class="   fa fa-user-circle-o mr-1"></span>Borrow an item</h1>
        <p class="border-bottom">Fill out the form below to borrow an item .Abarcode will be given to you which is suppose to be kept so that you can have access to the requested item </p>
      </div>
       <div style="width: 500px;">
        <div class="card-body">
          <iframe src="borrow/index.php" style="width: 100%;border:none;height: 600px"></iframe>
        </div>
      </div>
      
      </div>
      </div>

       <!--div for displaying contact form-->
    <div class="contact ">
       <div class="justify-content-center">
        <div class="left" style="width: 400px;max-width: 90%">
        <h1 style="font-size:20px;text-transform: capitalize;font-weight: 600;">need help??</h1>
        <p class="border-bottom">Enter your location and the message you want to ask using the form given by filling all the fields</p>
      </div>
       <div style="width: 550px;">
        <div class="card-body">
          <iframe src="contacts/index.php" style="width: 100%;border:none;height: 700px"></iframe>
        </div>
      </div>
      
      </div>
      </div>

    <!-- div for help -->
    <div class="modal helpdiv" id="myhelp">
       <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                <h4 class="modal-title text-capitalize text-center">system manual script</h4>
                <button type="button" class="close closehelp" data-dismiss="modal">&times;</button>
             </div>

             <!-- Modal body -->
            <div class="modal-body">
              <ol>
                <li>dashboard
                    <p>this menu has four things:</p>
                       <ul>
                          <li>items available statistics
                             <p>this shows the number of items that are available in the database for someone to borrow</p>
                          </li>
                          <li>overdue status
                             <p>this shows the status of whether you returned the item or no and whether you returned the items late than the required date</p>
                          </li>
                         <li>item borrowed information
                           <p>this shows the item you borrowed ,its barcode,borrowed date and the return date</p>
                         </li>

                        </ul>
                </li>
                <li>items
                   <p>this menu contain three things:
                      <ul>
                        <li>borrowed items statistics
                          <p>this shows all the number of items that people have borrowed in the system</p>
                        </li>
                        <li>overdue status
                          <p>this shows the status of whether you returned the item or no and whether you returned the items late than the required date</p>
                        </li>
                        <li>frequently borrowed items
                          <p>this shows items that have been borrowed frequently</p>
                        </li>
                      </ul>
                   </p>
                </li>
                <li>borrow an item
                  <p>this menu is used to borrow the item of your prefference</p>
                </li>
                <li>security
                  <p>this menu has two sub menus:</p>
                     <ul>
                         <li>caution
                             <p>this instructs some things to be undertaken inorder to make sure your system login details are well secured</p>
                         </li>
                         <li>reset password
                             <p>this is used to change your login password</p>
                         </li>
                     </ul>
                </li>
                <li>search
                  <p>this is used to search whether the item you want to borrow is available or not</p>
                </li>
              </ol>
             </div>


           </div>
        </div>
      </div>
    
           <!-- div for feedback -->
        <div class="justify-content-center  d-flex" > 
      <div class="feedback" style="width:850px;max-width: 95%">
        <h3 class="font-weight-bold text-capitalize text-center" style="padding: 10px"><span class="fa fa-phone mr-1"></span>contact feedbacks</h2>
          
        <?php 
          $selectfeedback="SELECT * FROM contacts WHERE username='$username' ORDER BY id desc limit 5";
          $sqlfeedback=mysqli_query($connection,$selectfeedback);
          $fetch=mysqli_fetch_all($sqlfeedback,MYSQLI_ASSOC);

          if (mysqli_num_rows($sqlfeedback)==0) {
            echo "<p class='text-center alert bg-secondary text-white text-capitalize'><span class='fa fa-warning mr-2'></span>no any contact and feedback information</p>";
          }
          else{
            echo "";
          }
          foreach ($fetch as $key) {
         ?>


       
        <div class="card container" style="background: transparent;border: 1px solid silver;border-radius:5px;margin-top: 20px">
          
              <p style="margin-left: 10px"><span class="fa fa-comments mr-1 text-secondary"></span><?php echo $key['message']; ?></p>
              <p style="margin-left: 50px;"><?php echo$key['feedback']; ?></p>
            
        </div>
         <?php
        
         }
         ?>
      </div>
      </div>
       <!-- items div -->
      <div class="items-div">
        <h3 class="text-capitalize text-center ">recent borrowed items</h3>

      <?php 
$select="SELECT * FROM issue_item ORDER BY id desc limit 8 ";
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
      <td class='text-capitalize'><?php echo $data['name'] ?></td>
      <td><?php echo $data['issuedate'] ?></td>
      </tr>
           <?php
}
?>
  
  </table>
      </div>

 
      <!--div for security caption -->
      <div class="modal securitydiv" id="mysecurity">
       <div class="modal-dialog">
          <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                <h4 class="modal-title text-capitalize text-center">system security cautions</h4>
                <button type="button" class="close closesecurity" data-dismiss="modal">&times;</button>
             </div>

             <!-- Modal body -->
            <div class="modal-body">
              <ol>
                <li>Make sure your password is kept secret from anyone</li>
                <li>Make sure you dont save your password when using public computers</li>
                <li>Make sure you change your password periodically</li>
              </ol>
             </div>


           </div>
        </div>
      </div>

       <!--div for displaying borrowing form-->
    <div class="resetdiv">
       <div class="justify-content-center ">
        <div class="left " style="width: 400px;max-width: 90%">
        <h1 style="font-size:20px;text-transform: capitalize;font-weight: 600;">reset your password</h1>
        <p class="border-bottom">Reset your password for security purpose periodically using the form given by filling all the fields</p>
      </div>
       <div style="width: 600px;">
        <div class="card-body">
          <iframe src="resetpassword/index.php" style="width: 100%;border:none;height: 600px"></iframe>
        </div>
      </div>
      
      </div>
      </div>

      
<footer class="card border-top " id="footer">
  <h5 class="text-warning" style="text-align: right;margin-right: 20px;margin-top: 10px;font-size: 10px">@<span class="text-capitalize">  must </span>biodiversity equpiment management system 2022</h5>
</footer>

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    //displaying update form
    $(".btn").click(function(){
      $("#myModal").show("slow");
      $(".close").click(function(){
        $("#myModal").hide("slow");
      })
      
    })

    //showing the camera image
    $(".profileiframe").mouseover(function(){
      $(".btn").css('display','block').css('padding','2px');
      
    })

       //displaying item menu
       $("#items").click(function(){
     $(".itemsmenu").toggle("slow");

  });

     //working on help menu
     $(".help").click(function(){
      $(".helpmenu").toggle("slow");
     })
      
      //showing security menu
      $(".security").click(function(){
        $(".securitymenu").toggle("slow");
      })

      //working fa-bars event
       $(".function").click(function(){
        $('.firstdiv').toggle('slow');

       // $('.firstdiv').css({'position':'absolute','z-index':'1000','top':'10%'});
       $('.nav-item .nav-link').click(function(){
        $('.firstdiv').hide();
       })

       $('.nav-item .contact-link').click(function(){
        $('.firstdiv').hide();
       })

       $('.nav-item .reset').click(function(){
        $('.firstdiv').hide();
       })

       $('.feedback-link').click(function(){
        $('.firstdiv').hide();
       })

       $('.overduelink').click(function(){
        $('.firstdiv').css('display','block');
       })

       $('.nav-item .help').click(function(){
        $('.firstdiv').css('display','block');
       })

       $('.nav-item .security').click(function(){
        $('.firstdiv').css('display','block');
       })
        })

     //displaying overdue modal
     $(".overduelink").click(function(){
      $("#my").show("slow");
      $(".close").click(function(){
        $("#my").hide("slow")
        $(".modal").hide();
      })
     })

//displaying dashbord info
$(".dashboard").click(function(){
  $(".dashboardinfo").css('display','block');
  $(".borrow").css('display','none');
  $(".contact").css('display','none');
  $(".resetdiv").css('display','none');
  $(".feedback").css('display','none');
  $(".items-div").css('display','none');
  $("footer").css('display','block')
})

//displaying items div
$("#items").click(function(){
  $(".items-div").css('display','block');
  $(".dashboardinfo").css('display','none');
  $(".borrow").css('display','none');
  $(".contact").css('display','none');
  $(".resetdiv").css('display','none');
  $(".feedback").css('display','none');
  $("footer").css('display','none')
})

//displaying the borrowwing div
$('.borrowitem').click(function(){
  $(".dashboardinfo").css('display','none');
  $(".borrow").css('display','block');
  $(".contact").css('display','none');
  $(".resetdiv").css('display','none');
  $(".feedback").css('display','none');
  $(".items-div").css('display','none');
  $("footer").css('display','block')
})

//displaying the contact div
$(".contact-link").click(function(){
  $(".contact").css('display','block');
  $(".dashboardinfo").css('display','none');
  $(".borrow").css('display','none');
  $(".resetdiv").css('display','none');
  $(".feedback").css('display','none');
  $(".items-div").css('display','none');
  $("footer").css('display','block')
})

//displaing help div
$(".helplink").click(function(){
  $(".helpdiv").show("slow");
  $(".closehelp").click(function(){
    $(".helpdiv").hide("slow");
  })
})

//displaying the feedback div

$(".feedback-link").click(function(){
  $(".feedback").css('display','block')
  $(".contact").css('display','none');
  $(".dashboardinfo").css('display','none');
  $(".borrow").css('display','none');
  $(".resetdiv").css('display','none');
  $("footer").css('display','none');
  $(".items-div").css('display','none');
})

//displaying security caption
$(".securitycaption").click(function(){
  $(".securitydiv").show("slow");
  $(".closesecurity").click(function(){
    $(".securitydiv").hide("slow");
  })
})

//showing reset password div
$(".reset").click(function(){
  $(".resetdiv").css('display','block');
  $(".contact").css('display','none');
  $(".dashboardinfo").css('display','none');
  $(".borrow").css('display','none');
  $(".feedback").css('display','none');
  $(".items-div").css('display','none');
  $("footer").css('display','block');
})

//unfunction button
$('.unfunction').click(function(){
  $('.firstdiv .fa').toggle();    
})


//hiding the footer on small screens
if (window.innerWidth<=990) {
  //displaying dashbord info
$(".dashboard").click(function(){
  $("footer").css('display','none');
   $(".feedback").css('display','block');
  $(".items-div").css('display','block');
})

//displaying items div
$("#items").click(function(){
  $("footer").css('display','none')
})

//displaying the borrowwing div
$('.borrowitem').click(function(){
  $("footer").css('display','none')

})

//displaying the contact div
$(".contact-link").click(function(){
  $("footer").css('display','none')
})

//displaying the feedback div

$(".feedback").css({'background':'#6c757d','padding':'20px','color':'white'});

$(".feedback-link").click(function(){
 
  $("footer").css('display','none');
})

//showing reset password div
$(".reset").click(function(){
  $("footer").css('display','none');
})


}

//working on the search bar
 $(".search-form").submit(function(event){
                event.stopPropagation();
                event.preventDefault();


                    var request = $.ajax({
                        method: "post",
                        url:   "search/index.php",
                        data:  $(".search-form").serialize()
                    });

                    request.done(function(data){
                       $(".data-container").html(data)
                       //document.querySelector('.search-form').reset();
                    });

                    request.fail(function(error){
                        alert(error);
                    });
            })
});

</script> 

</body>
</html>