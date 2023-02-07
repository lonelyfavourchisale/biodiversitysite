<?php 

require_once "php/connect.php";
include_once "php/signin.php";
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>biodiversity equipment management system</title>
   <link rel="icon" href="https://elearning.must.ac.mw/pluginfile.php/1/theme_adaptable/favicon/1637674629/must-logo.png" />
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script  src="js/jquery-3.6.0.min.js"></script>
    <!-- ✅ Load your JS file ✅ -->
    <script src="index.js"></script>
    <style type="text/css">
      *{
        outline: none;
        border:none;
        box-shadow: unset;
        box-sizing: border-box;
        padding: 0;
        margin: 0
      }
      body{
        scroll-behavior: smooth;
      }
      .nav-link{
        color: var(--primary)
      }
      .carousel-caption{
        height: 300px;
       
      }
@media screen and (max-height: 360px){
  .carousel-caption{
        height: 200px;
       
      }
  header{
    height: 300px
  }
}

      .overflow{
        overflow-x: hidden;
      } .nav-item{
        cursor: pointer;
      } 
      header .nav-item:nth-child(4) .nav-link:hover{
        border: none;
        
      }
      header .nav-item:nth-child(6) .nav-link:hover{
        border: none;
        
      }
      .nav-item .nav-link.btn{
        padding: 0;
      }
       .navbar-nav{
        
        margin-top: 10px
      }
      #logo{
        width: 80px
      }
      .brand a{
       word-spacing: -2px !important
      }
      
      }
      
       @media screen and (max-width: 850px){
         .brand a{
       word-spacing: -2px !important;
       font-size: 15px
      }
       #logo{
        width: 60px
      }
      .navbar-nav{
        
        margin-top: 10px
      }
     
       }
      }      
     @media screen and (max-width: 449px){
      .brand a{
       word-spacing: -2px !important;
       font-size: 15px
      }
       #logo{
        width: 60px
      }
      }
     @media screen and (max-width: 363px){
        .brand a{
       word-spacing: -2px !important;
       font-size: 10px
      }
       #logo{
        width: 40px
      }
      }
    }      
            
       @media screen and (max-width: 275px){
        .brand a{
       word-spacing: -2px !important;
       font-size: 8px
      }
       #logo{
        width: 30px
      }
      }


     .header-nav,
     header .navbar{
        position: relative;
        background: red;
        width: 100%;
        height: 100px;
        z-index: 2000
      }
      .header-top {
        position: relative;
        width: 100%;
        left: 0;
        top: 0;
        height: 12.5vh;
        z-index: 3000;
        background: #fff;
        padding: 0;margin: 0;
      }
       .animate-on-scroll{
        box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.5);
        display: none
      }
    </style>
</head>
<body>

  <div class="header-top">
    
  </div>
 

<style type="text/css">
  .header-section{
     position: fixed;
        width: 100vw;
        left: 0;
        top: 0;
        height: 12.5vh;
        z-index: 3000;
        background: #fff;
        padding: 0;margin: 0;
        display: flex;
        justify-content: space-between;
        transition: all 3s ease;
        box-shadow: 0px 5px 7px 0px rgba(0,0,0,0.3);
  }
/*  .header-section.animate-on-scroll{
   top: -70px;
   position: fixed;
   box-shadow: 0px 5px 7px 0px rgba(0,0,0,0.3);
  }
  .header-section.animate-on-scroll.show{
    top: 0;
    box-shadow: 0px 5px 7px 0px rgba(0,0,0,0.3);
  }*/
  .header-section .header-brand{
    display: flex;
    justify-content: flex-start; 
    min-width: 100%;
    column-gap: 5px

    }
  .header-brand .text-header{
    padding-top: 25px;
    font-size: 20px; 
    text-transform: capitalize;
  }
  .header-brand img{
    height: 80px;
    min-height: 80px;
    width: 80px;
    min-width: 80px;
    margin-top: -4px;
    object-fit: contain;
  }

  .right-section .nav-items-lists{ 
    position: relative;
    z-index: 4000;
    backface-visibility: hidden; 
     list-style-type: none;     
     margin-top: 20px;
     padding-right: 20px;
    width: 100%;
  } 
  .right-section .nav-items-lists .nav-list-item .nav-link{ 
    text-align: left;
    padding: 0; 
    margin-right: 20px;
    position: relative;
  }
  .right-section .nav-items-lists .nav-list-item .nav-link:hover{
     color:  var(--orange)
  }
    .right-section .nav-items-lists .nav-list-item .nav-link::after{ 
        position: absolute;
        content: " "; 
        height: 2px;
        width: 0;
        bottom: -2px;
*        background: var(--orange);
        opacity: 0.7;
        left: 0;
        transition: all 0.2s ease

    }
   .right-section .nav-items-lists .nav-list-item .nav-link:hover::after{ 
          width: 100%
    }
  .right-section .nav-items-lists .nav-list-item{
    display: inline-flex;
    position: relative;
    cursor: pointer;
    padding: 0
  } 

  .right-section   .nav-link{
    color: var(--dark);
    text-transform: capitalize;
  }
/*.nav-list-item .btn{
    background: var(--primary);
    padding: 20px 19px;
    color: #fff;
    font-size: 14px;
    transform: unset;
    transition: unset;
    position: relative;
    z-index: 3000;
    min-height: 30px
  }

  /*extended links*/
  .nav-list-item ul{
    position: absolute;
    min-width: 200px;
    background: #fff;
    top: 50px;
    left: 0;
    padding-left: 10px;
    padding-bottom: 10px;
    transform: translateX(0px) translateY(60px);
    transition: all 0.3s ease;
    opacity: 0;
    box-shadow: 0px 8px 4px 0px rgba(0,0,0,0.5);
  } 
  .animate-ext-lists,
  .animate-ext-lists{
    transform: translateX(0) translateY(0);
    opacity: 1;
  }

  .nav-list-item ul .ext-nav-items{
    border: none;
    color: var(--dark)
  }
  .nav-list-item ul .ext-nav-items a{
    padding-bottom: 7px;
    text-decoration: none;
    border:none;
    text-transform: capitalize;
    position: relative;
    color: inherit;
    cursor: pointer;
  }
  
  .nav-list-item ul .ext-nav-items a::after{
        position: absolute;
        content: " "; 
        height: 2px;
        width: 0;
        bottom: -2px;
        background: var(--orange);
        opacity: 0.7;
        left: 0;
        transition: all 0.2s ease

  }
  .nav-list-item ul .ext-nav-items a:hover::after{
     width: 100%;
  }
  .nav-list-item ul .ext-nav-items:hover{
    color: var(--orange)
  }







  /*QUERIES*/
  
    @media screen and (min-height:1024px){
    .carousel-caption{
      height: 400px
    }
   }
    @media screen and (min-height:1280px){
    .carousel-caption{
      height: 500px;
      
    }
   }
    @media screen and (max-height:640px){
    .header-section{
      height: 14vh
    }
  }
  @media screen and (max-height:360px){
    .header-section{
      height: 25vh
    }
  }
  @media screen and (max-width: 970px){
    /*HEADER LEFT SECTION*/
      .header-section .header-brand{ 
        column-gap: 0px /*unset col gap to redc speca btwen elements*/

      }
    .header-brand .text-header{
      padding-top: 25px;
      font-size: 19px; 
      margin-left: -5px;  
    }

    /*links header right section 
    reduce margin right
    */
     .right-section .nav-items-lists .nav-list-item .nav-link{  
          margin-right: 10px; 
        }

        /*reduce font extended links*/
        .nav-list-item ul .ext-nav-items a{
            font-size: 13px
        } 
        /*extended links reduce min width*/
  .nav-list-item ul{
    position: absolute;
    min-width: 190px;
  }


  }

  /*MOBILE MENU ICON HEADER*/
  .icon-bar{
  position: absolute;
   right: 20px;
   top: 20px;
   font-size: 24px;
   display: none;
   cursor: pointer;
 }

 .right-section .header-btn-close{
  cursor: pointer;
   position: absolute;
  right: 10px; 
  cursor: pointer;
  color: #777;
  z-index: 300;
  font-size: 2rem;
  display: none;
  z-index: 4000;
}
.right-section .btn-close{ 
  background: none;
  color: inherit;
  border: none;
  outline: none;
  margin-top: 10px;
  margin-right: 27px;
  z-index: 4000;
}


   @media screen and (max-width: 860px){ 
     .icon-bar{
      position: fixed;
       right: 20px;
       top: 20px;
       font-size: 24px;
       display: block;
     }
     .carousel-item img{
      width:
     }

     .right-section .header-btn-close{ 
      display: none;
      z-index:5000; 
    }
    
     .right-section{
       position: fixed;
       height: 0vh;
       overflow: hidden;
       top: 0;
       left: 0;
       width: 100vw;
       background: #fff;
       transition: all 0.3s ease;
     }
     .right-section.slide-menu-down{
      height: 100vh;
      transition: all 0.3s ease;
     }
       .right-section .nav-items-lists{
        padding-left: 20px;
       }
       .right-section .nav-items-lists .nav-list-item{
        display: block; 
        margin-bottom: 1.1rem;
      } 
      .right-section .nav-items-lists .nav-list-item .nav-link:hover::after,
      .nav-list-item ul .ext-nav-items a:hover::after{
         width: 0;
      }
       .right-section .nav-items-lists .nav-list-item .nav-link:hover{
       color:  var(--blue)
      }

        /*extended links mobile view*/
      .nav-list-item ul{
        position: relative;
        min-width: 150px;
        background: unset;
        top: 0px;
        left: 0;
        padding-left: 10px;
        padding-bottom: 10px;
        transform: translateX(0) translateY(0px); 
        opacity: 1;
        box-shadow: unset;
        height: 0;
        overflow: hidden;
      } 

  }


  @media screen and (max-width: 480px){
    .header-brand .text-header {
    padding-top: 28px;
      font-size: 15px;
    }
    .carousel-caption h3,.carousel-caption h2{
      font-size: 18px
    }
  }


    @media screen and (max-width: 365px){
    .header-brand .text-header {
      padding-top: 32px;
      font-size: 13.4px;
    }
  }

 
   @media screen and (max-width: 324px){
    .header-brand .text-header { 
      word-break: break-all;
      margin-left: -10px
    }
  }

 



</style>

<div class="header-section">
  <div class="left-section">

     <div class="header-brand">
       <div class="img-brand">
        <img src="img/logo.png"  id="logo" >
       </div>
        <h3 class="text-header">mSc biodiversity informatics</h3>
      </div>

  </div>

  <div class="icon-bar" id="mobile-menu">
    <span class="icon"><i class="fa fa-bars"></i></span>
  </div>

  <div class="right-section">
    <div class="header-btn-close"><button class="btn-close">&times;</button></div>
    <ul class="nav-items-lists">
      <li class="nav-list-item active ">
        <a class="nav-link home" href="#"><span class="fa fa-home mr-1"></span>home</a>
      </li>
       <li class="nav-list-item ">
        <a class="nav-link about" href="#about">about</a>
      </li>
      <li class="nav-list-item statistics">
        <a class="nav-link" href="#statistics"> statistics</a>
      </li>
      
      <li class="nav-list-item ">
        <a class="nav-link extended-link" >items</a>
        <ul class="catalogmenu list-unstyled">
           <li class="ext-nav-items"><a href="#">meeting owl</a></li>
           <li class="ext-nav-items"><a href="#">marvic drone</a></li>
           <li class="ext-nav-items"><a href="#">camera traps</a></li>
           <li class="ext-nav-items"><a href="#">inception cameras</a></li>
           <li class="ext-nav-items"><a href="#">binoculars</a></li>
           <li class="ext-nav-items"><a href="#">samsung tablets</a></li>
        </ul>
    </li>
    <li class="nav-list-item search">
       <a class="nav-link" href="#catalog">search</a>
    </li>

    <li class="nav-list-item mr-3 contact">
       <a class="nav-link" href="#contact">contact</a>
    </li>
    
    <li class="nav-list-item nav-link bg-primary p-2 login">
      <a  class="text-uppercase btn text-white signin" data-toggle="modal" data-target="#myModal" style="">
       login<span class="fa fa-lock ml-2"></span>
     </a>
<!-- The Modal -->
<div class="modal flow" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body">
        
       
          <button type="button" class="close " data-dismiss="modal">&times;</button>

             <form action="index.php" method="post" class="p-3 signin-form" style="display: block;">
              <h3 class="text-center text-uppercase ">sign in</h3>
          <div class="form-group mt-2">
            <label class="text-capitalize ">username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="text-capitalize ">password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group">
            <input type="submit" value="sign in" name="submit" class="form-control bg-dark col-4  text-uppercase text-white">
          </div>
          <div class="new d-flex">
            <a href="reset.php" class="ml-3  ">reset password</a>
          </div>
         
        </form>
        <div class="signin-container"></div>
      </div>
  </div>
</div>
    </li>
  </div>

</div>




<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active" id="one"></li>
    <li data-target="#myCarousel" data-slide-to="1" id="two"></li>
    <li data-target="#myCarousel" data-slide-to="2" id="three"></li>
  </ul>
  
 <!-- 👇️ Example carousel  -->
    <div
      id="carouselExampleControls"
      class="carousel slide"
      data-ride="carousel"
    >
    
      <div class="carousel-inner">
        <div class="carousel-item active">
          
           
        <img src="img/binocular.jpg" alt="Los Angeles"  id="image1" style="width: 100vw;height:80vh">

      <div class="container">
         <div class="carousel-caption text-capitalize font-weight-bold">
            <h3><span class="text-uppercase">Must</span> biodiversity equipment management system</h3>
              <h2 class="text-wahite">Access resources anytime ,anywhere!</h2>       
            </div>
       </div>
          
        </div>
        <div class="carousel-item">
          <img src="img/hh.jpg" alt="Los Angeles"  id="image1" style="width: 100vw;height:80vh">

      <div class="container">
         <div class="carousel-caption text-capitalize font-weight-bold">
            <h3><span class="text-uppercase">Must</span> biodiversity equipment management system</h3>
              <h2 class="text-wahite">Access resources anytime ,anywhere!</h2>       
            </div>
       </div>
        </div>
        <div class="carousel-item">
          <img src="img/ggg.jpg" alt="Los Angeles"  id="image1" style="width: 100vw;height:80vh">

      <div class="container">
         <div class="carousel-caption text-capitalize font-weight-bold">
            <h3><span class="text-uppercase">Must</span> biodiversity equipment management system</h3>
              <h2 class="text-wahite">Access resources anytime ,anywhere!</h2>       
            </div>
       </div>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleControls"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleControls"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

   
    
   
</div>
<style type="text/css">
  .overlay{
     background: rgba(0,0,0,0.5);
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
    height:92.5vh;
  
  }
</style>
<div class="overlay"></div>

<!-- Start: Search Section -->
        <section class="search-filters" id="catalog" style='height:auto'>
            <div class="container">
                <div class="filter-box">
                    <h3 style="border-bottom: ;">What are you looking for?</h3>
                    <p >If you are in need of any item from the sytem,search through the form below for clariffication on availability of item in the system.you will be notifified if the searched item is among the list of available items in the database of the system</p>
                       <form action="index.php" method="post" id="search-form" style="margin-left: -10px">
            <div class="form-group input-group">
            <input type="text" name="keywords" placeholder="search an item here.............." class="form-control col-8 col-lg-8 col-sm-8 col-md-8 col-lg-10 col-xl-10 " required>
            <input type="submit" value="search" class="text-uppercase text-white bg-warning form-control col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2" name="submit">
        </div>
        </form>
                
          <div class="data-container"></div>
                </div>
            </div>
        </section>

        <!-- Start: Welcome Section -->
        <section class="welcome-section" id="about" style="background: rgba(0,0,0,0.2);padding: 20px;padding-top: 40px;padding-bottom: 40px;margin-top:150px">
            <div class="container">
                <div class="row" style="overflow-x: hidden;">
                    <div class="col-md-6">
                        <div class="welcome-wrap">
                            <div class="welcome-text">
                                <h2 class="section-title text-capitalize" style="">Welcome to biodiversity equipment management system</h2>
                                <span class="underline left"></span>
                                <p class="lead text-capitalize">access items remotely</p>
                                <p>This system has been designed to ensure availability of resources at any time. This is achieved in a way that the system is always on at any time to allow the user and admin to work on different services such as borrowing items ,uploading items  and returning items hence available to the user at any time.<span id="flow" style="display: none;">  This system is also efficient.This is achieved in a away that it always let the user stay with  an item within agreed time otherwise it alert the user of the overdue time to the agreed time and it also notifies the user the limit of item the user is suppose to borrow hence its efficience to the user and admin<span></p>
                                <button class="btn btn-primary">Read More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="facts-counter">
                        <style type="text/css">
                            .facts-counter ul li{
                                width: 200px;
                                height: 200px;
                                list-style-type: none;
                            }
                            .facts-counter ul li .fact-item span{
                                margin-top: 30px;
                            }
                        </style>
                        
       <div
           id="carouselExampleControls"
           class="carousel slide"
           data-ride="carousel"
       >

      <div class="carousel-inner" id="img">
        <div class="carousel-item active">
        <img src="img/download 6.jpg" alt="Los Angeles"  id="image1" style="background-size: contain;object-fit: cover;height: 80vh">
        </div>

        <div class="carousel-item" id="img">
          <img src="img/download3.jpg" alt="Los Angeles"  id="image1" style="background-size: contain;object-fit: cover;height: 80vh">
        </div>
        
        <div class="carousel-item" id="img">
          <img src="img/download5.jpg" alt="Los Angeles"  id="image1" style="background-size: contain;object-fit: cover;height: 80vh">
        </div>
        <div class="carousel-item" id="img">
          <img src="img/download 4.jpg" alt="Los Angeles"  id="image1" style="background-size: contain;object-fit: cover;height: 80vh">
        </div>
      </div>
      
    </div>
                    </div>
                    
                </div>
            </div>

        </section>

        <!-- div for statistics-->
        <div style="overflow-x: hidden;background-color: ghostwhite;margin-top: 150px;padding: 30px">
        <div class="statistics" style="margin-left: 30px;" id="statistics">
          <h1 style="text-align: center;text-transform: capitalize;">system statistics</h1>
            <p style="text-align: center;">This area notifies the user the number of of users that are registered to access the services provided by the system.The number of system users is given on the system users statistics.this area also shows the total number items that are available in the system for accessibiity by users.Total number of items is shown on systems items statistics</p>
          <style type="text/css">
            #footer-list li:hover{
              color: var(--orange)
            }
            #footer-list li a:hover{
              text-decoration: none;
              color: var(--orange)
            }
            .statistics .row .col-12 div{
              width: 500px;
              height: 200px;
              margin-top:10px;
              background: red
            }
            #hie{
              background: ;
             margin-left: -70px
             }
              #hello h3{
              margin-left: 80%
            }
            #img:hover{
              opacity: 0.5
            }
            #image3{
              object-position: right;
              object-fit: cover;
            }
            #image2{
              object-position: top;
            }

              @media screen and (max-width:1269px){
             #hie{
              background: ;
             padding-left: 70px;
             margin-left: 0px

             }
            @media screen and (max-width:1111px){
             #hie{
              background: ;
             padding-left: 70px;
             margin-left: 0px

             }
            }
              @media screen and (max-width:986px){
             #hie{
              background: ;
             padding-left: 20px;
             margin-top: 20px
             }

    
      
      .statistics .row .col div{
          width: 100%
        }
            }
            @media screen and (max-width: 860px){
              .pull-right ul{
              
               
              }
             
              .pull-right ul li:nth-child(6),.pull-right ul li:last-child{
                background-color: blue;
                margin-left: -400px;
                font-size: 15px;
                margin-top: 40px;
                display: none
              }
            }
              @media screen and (max-width:765px){
             #img{
             margin-top: 30px
            
             
             }
            }
           
              @media screen and (max-width:612px){
             #hello{
              background: ;
             padding-left: -200px;
             font-size: 10px;
            
             
             }
               #hello h3{
              margin-left: 50%
            }
            }
             @media screen and (max-width:612px){
             #hello{
              background: ;
             padding-left: -200px;
             font-size: 10px;
            
             
             }
               #hello h2{
              margin-left: -10px;
             
            }
            }
            @media screen and (max-width: 400px){
               .statistics .row .col h4{
              font-size: 15px;
            
             
            }
            }


          </style>
          <div class="row justify-content-center" style="overflow-x: hidden;">
               <?php 
                  $select="SELECT * FROM items";
                  $sqlitems=mysqli_query($connection,$select);

                  $selectmembers="SELECT * FROM create_users";
                  $sqlmebers=mysqli_query($connection,$selectmembers);
               ?>
             <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-lx-6 col">
             <div class="bg-success" style="padding-top: 30px" id="hello">
               <h3 ><?php echo mysqli_num_rows($sqlmebers); ?></h3>
               <h4 class="text-center text-capitalize" id="h4"> <span class="fa fa-users mr-1"></span>system users statistic </h4>
             </div>
            
           </div>
          
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-lx-6  col " id="hie">
              
              <div class="bg-warning" style="padding-top: 30px" id="hello">
                 <h3 ><?php echo mysqli_num_rows($sqlitems); ?></h3>
               <h4 class="text-center text-capitalize"> <span class="fa fa-users mr-1"></span>system items statistic </h4>
             </div>
            </div>
             
          </div>
        </div>
        </div>  
 

        <!--contacts form-->
        <div class="contact " id="contact" style="margin-top: 150px">
          <div class="container justify-content-center">
  <form class="p-3" action="index.php" method="post" style="display: block;text-transform: capitalize;" id="contact-form">
     
    <h3 class="text-center text-capitalize p-3 font-weight-bold ">contact us</h3>
  
    <div class="form-group">
      <label>full name</label>
      <input type="text" name="fullname" class="form-control" required>
    </div>
    <div class="form-group">
      <label>phone number</label>
      <input type="tel" name="phone" class="form-control" value="<?php echo  $_SESSION['studentusername']; ?>" required>
    </div>
    <div class="form-group">
      <label>email adress</label>
      <input type="email" name="email" class="form-control"  required>
    </div>
    <div class="form-group">
      <label>location</label>
     <select name="location" class="form-control" required="">
        <option value="Dedza">Dedza</option>
        <option value="Dowa">dowa</option>
        <option value="kasungu">kasungu</option>
        <option value="lilongwe">lilongwe</option>
        <option value="mchinji">mchinji</option>
        <option value="nkhotakota">nkhotakota</option>
        <option value="ntcheu">ntcheu</option>
        <option value="ntchisi">ntchisi</option>
        <option value="salima">salima</option>
        <option value="chitipa">chitipa</option>
        <option value="karonga">karonga</option>
        <option value="likoma">likoma</option>
        <option value="mzimba">mzimba</option>
        <option value="nkhata bay">nkhata bay</option>
        <option value="rumphi">rumphi</option>
        <option value="balaka">balaka</option>
        <option value="blantyre">blantyre</option>
        <option value="chikwawa">chikwawa</option>
        <option value="chirazulu">chirazulu</option>
        <option value="machinga">machinga</option>
        <option value="mangochi">mangochi</option>
        <option value="mulanje">mulanje</option>
        <option value="mawanza">mawanza</option>
        <option value="nsanje">nsanje</option>
        <option value="thyolo">thyolo</option>
        <option value="phalombe">phalombe</option>
        <option value="zomba">zomba</option>
        <option value="neno">neno</option>
      </select>

    </div>
    <div class="form-group">
      <label>message</label>
      <textarea class="form-control" name="message" required></textarea>
    </div>
    <div class="form-group">
      <input type="submit" class="form-control col-4 bg-warning text-white text-center text-capitalize" value="contact us" name="submit">
    </div>
     <div class="contact-container"></div>
  </form>
</div>
         </div> 
        <!-- Start: Footer--> 
        <div class="footer bg-dark ">
        <footer class="site-footer bg-dark" style="height: 500px;">
            <div class="container" style="padding: 50px;">
                <div id="footer-widgets ">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 widget-container">
                            <div id="text-2" class="widget widget_text">
                                <h3 class="footer-widget-title text-white">About the system</h3>
                                <span class="underline left"></span>
                                <div class="textwidget text-white ">
                                 <p>This is an equipment database system that allows remote accessibility when borrowing</p>
                                 
                                </div>
                                <address>
                                    <div class="info text-light mt-3">
                                        <i class="fa fa-location-arrow text-white"></i>
                                        <span class='text-capitalize'>malawi university of science and technology,box 5196,Limbe</span>
                                    </div>
                                    <div class="info text-white mt-3">
                                        <i class="fa fa-envelope text-white"></i>
                                        <span><a href="" class="text-white">must.ac.mw</a></span>
                                    </div>
                                    <div class="info text-white mt-3">
                                        <i class="fa fa-phone text-white"></i>
                                        <span><a href="" class="text-white">+ 265 884388 7667</a></span>
                                    </div>
                                </address>
                            </div>
                        </div>
                        
                        <div class="clearfix hidden-lg hidden-md hidden-xs tablet-margin-bottom"></div>
                        <div class="col-md-6 col-sm-6 widget-container " style="margin-left: 5%;">
                            <div id="text-4" class="widget widget_text">
                                <h3 class="footer-widget-title text-white">Timing</h3>
                                <span class="underline left"></span>
                                <div class="timming-text-widget text-light">
                                    <time datetime="2017-02-13">Mon - Thu: 9 am - 9 pm</time><br>
                                    <time datetime="2017-02-13">Fri: 9 am - 6 pm</time><br>
                                    <time datetime="2017-02-13">Sat: 9 am - 5 pm</time><br>
                                    <time datetime="2017-02-13">Sun: 1 pm - 6 pm</time>
                                    <ul>
                                       
                                    </ul>
                                </div>
                            </div>      
                        </div>
                          </div>
                </div>                
            </div>
            <style type="text/css">
               @media screen and (max-width: 400px){
                .sub-footer{
                  margin-top: -50px
                }
                .sub-footer p{
                  background:;
                  margin-left: 20px;
                  font-size: 18px
                }
                .sub-footer ul li{
                  font-size: 10px
                }
              
            }
            </style>
            <div class="sub-footer border-top bg-dark">
                <div class="container">
                    <div class="row mt-5">
                        <div class="footer-text col-md-3">
                            <p class="text-capitalize text-white "><span class="text-uppercase"> must</span> biodiversity program</p>
                        </div>
                        <div class="col-md-9 pull-right">
                            <ul class="text-capitalize" id="footer-list">
                                <h3 class="text-capitalize text-warning">menu</h3>
                                <li class="list-unstyled"><a href="#">Home</a></li>
                                <li class="list-unstyled "> <a  href="#about">about</a> </li>
                                <li class="list-unstyled "><a  href="#statistics">  statistics</a>
                                <li class="list-unstyled"><a href="#catalog">Search</a></li>
                                <li class="list-unstyled resources">resources
                                  <ul class="itemsmenu">
                                    <li class="list-unstyled">meeting owl</li>
                                    <li class="list-unstyled">marvic drone</li>
                                    <li class="list-unstyled">camera traps</li>
                                    <li class="list-unstyled">inception cameras</li>
                                      <li class="list-unstyled">binoculars</li>
                                    <li class="list-unstyled">samsung tables</li>
                                 </ul>  
                               </li>
                               <li class="list-unstyled "> <a  href="#contact"> contact</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
         <!--End: Footer -->

        
     <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>  
    <script type="text/javascript">
      $(document).ready(function () {
  $('#mycarousel').carousel({
    interval: 350 * 10,
  });
});
    </script>

<script type="text/javascript">
  const button=document.querySelector(".navbar-toggler");
  const menu=document.querySelector("#collapsibleNavbar");


    function animate_header_md_up(attr_value,event_name){
      $(".nav-link").each(function(){
      $(this).on(event_name,function(){ 
         if ($(this).hasClass("extended-link")) {
              if ($(this).hasClass("event_toogled")) {

                 $(".extended-link").next().removeAttr("style");
                 $(this).removeClass("event_toogled")

              }else{
                 $(this).next().attr("style",attr_value) //add animation 
                 $(this).addClass("event_toogled")
              }
         }else{
          //remove animation on hover other links != extended
             $(".extended-link").next().removeAttr("style");
             $(".extended-link").removeClass("event_toogled")
           }
         })
        })
      }  

    if (window.innerWidth>=831) {
      animate_header_md_up("transform:translateY(0) translateX(0);opacity:1","mouseenter") 
    }else{
      animate_header_md_up("height:unset","click") 
    }

    window.addEventListener("resize",function(){
      if (window.innerWidth>=831) { 
        animate_header_md_up("transform:translateY(0) translateX(0);opacity:1","mouseenter") 
        }else{
          animate_header_md_up("height:unset","click") 
        }
    })

    // ON CLICK THE MOBILE CLOSE MENU
    $(".right-section .header-btn-close").click(function(){ 
       $(".extended-link").next().removeAttr("style");
       $(".extended-link").removeClass("event_toogled");
       $(".right-section").removeClass("slide-menu-down");
        $(".right-section .header-btn-close").fadeOut(10)
        $(".icon-bar").removeClass("event-active");
    })
    
    

 

  $(".header-section").on("focusout",function(){
    //remove style extende link on mouse header out
    $(".extended-link").next().removeAttr("style");  
  })


  $(".icon-bar").click(function(){
    if ($(this).hasClass("event-active")) {

      $(this).removeClass("event-active");
      $(".right-section").addClass("slide-menu-down") //remove class animation
      $(".right-section .header-btn-close").fadeOut(10)



    }else{
      
      $(this).addClass("event-active")
      $(".right-section").addClass("slide-menu-down") //add class animation
      $(".right-section .header-btn-close").fadeIn(10)
    }
  })


 document.onscroll=function(){
  if(scrollY > 160){
    $(".header-section").addClass("show")
  }
  else  if(scrollY > 105){
    $(".header-section").addClass("animate-on-scroll")
  } else{
     $("header-section").removeClass("show")
     $("header-section").removeClass("animate-on-scroll")

  }
 }

 $(document).ready(function(){ 
    if(scrollY > 160){
      $(".header-section").addClass("show")
    }
    else  if(scrollY > 105){
      $(".header-section").addClass("animate-on-scroll")
    }else{
       $("header-section").removeClass("show")
       $("header-section").removeClass("animate-on-scroll")

    }
 })


  $(document).ready(function(){

    $(".catalog").hover(function(){
        $(".catalogmenu").css({'display':'block','transition':'0.7s'})
    })
     $(".catalog").mouseout(function(){
        $(".catalogmenu").css({'display':'none','transition':'0.7s'})
    })

    $(".container .carousel-caption h3,h2").slideDown("slow");
  $(".navbar-toggler").click(function(){
    $("#collapsibleNavbar").toggle("slow");
  });

  $(".signin").click(function(){
   $(".modal").show("slow");
   $(".close").click(function(){
    $(".modal").fadeOut("slow");
   })
  })

  $(".newuser").click(function(){
    $(".user").show("slow");
  })

  //displaying resources menu
  $(".resources").click(function(){
    $(".itemsmenu").toggle("slow")
    $(".site-footer").css('height','900px')
  })

 const windowwidth=window.innerWidth;
/* $(".carousel-inner .carousel-item img").css('margin-left','1000%');
$("#image2").css({'margin-left':'1000%','transition':'0.1s'});
  $("#image3").css({'margin-left':'1000%','transition':'0.1s'});
 

 function click_element(elements_exclude,tag_class_remove,element_active,exlude_animte){  
  element_active.click(function(){
  exlude_animte.attr("style","margin-left:0px;transition:0.1s")
   elements_exclude.forEach(element=>{
     element.attr("style","margin-left:1000%;transition:0.1s")
   })
    tag_class_remove.forEach(tag=>{ tag.removeClass("active") })
    element_active.addClass("active")
  })
  }
click_element([$("#image2"),$("#image3")], [$("#three"),$("#two")],  $("#one"), $("#image1") )
click_element([$("#image1"),$("#image3")], [$("#one"),$("#three")],  $("#two"), $("#image2") )
click_element([$("#image1"),$("#image2")], [$("#one"),$("#two")],  $("#three"), $("#image3") )
 
 */

//working on the search menu
     $("#search-form").submit(function(event){
                event.stopPropagation();
                event.preventDefault();


                    var request = $.ajax({
                        method: "post",
                        url:   "process.php",
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


     //working on contact form
      $("#contact-form").submit(function(event){
                event.stopPropagation();
                event.preventDefault();


                    var request = $.ajax({
                        method: "post",
                        url:   "contact.php",
                        data:  $("#contact-form").serialize()
                    });

                    request.done(function(data){
                       $(".contact-container").html(data)
                       document.querySelector('#contact-form').reset();
                    });

                    request.fail(function(error){
                        alert(error);
                    });
            })
            
     //display the who text of the system discription
     $("button").click(function(){
        $("#flow").toggle();
     })


if (innerWidth<=990){
  
  $(".fa-bars").click(function(){
    $(".right-section").show("slow");
  })
  $(".home").click(function(){
    $(".right-section").hide("slow");
  })
   $(".about").click(function(){
    $(".right-section").hide("slow");
  })
   $(".statistics").click(function(){
    $(".right-section").hide("slow");
  })
   $(".search").click(function(){
    $(".right-section").hide("slow");
  })
   $(".contact").click(function(){
    $(".right-section").hide("slow");
  })
  $(".signin").click(function(){
   $(".modal").show("slow");
   $(".close").click(function(){
    $(".modal").fadeOut("slow");
   })
  })

}

     
});
</script>	

</body>
</html>