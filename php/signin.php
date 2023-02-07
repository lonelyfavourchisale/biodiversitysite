<?php  session_start(); ?>  
<?php 
ob_start();
ob_end_clean() ;
require_once "connect.php";
 ?>
<?php 	

        
if (isset($_POST['submit'])) {
    $username=mysqli_escape_string($connection,$_POST['username']);
    $password=mysqli_escape_string($connection,$_POST['password']);
    $category;

//selecting data from the database of admin
    $selectadmin="SELECT * FROM create_users WHERE username='$username' AND password='$password' AND category='admin'";
    $queryadmin=mysqli_query($connection,$selectadmin);
    
//selecting data of student from the database
     $selectstudent="SELECT * FROM create_users WHERE username='$username' AND password='$password' AND category='student'";
    $querystudent=mysqli_query($connection,$selectstudent);
    

    
    

    if (mysqli_num_rows($queryadmin)>0) {
        echo "<script>
        window.location='../controlpanel/index.php'</script>";
        $_SESSION['adminusername']=$username;

        
    }
    else{
     if (mysqli_num_rows($querystudent)>0) {
         echo "<script>
        window.location='../users/index.php'</script>";
           $_SESSION['studentusername']=$username;

        
    }
     else{

            
           echo "<script>
        window.location='../index.php'</script>";
            
        }
    }
    
    
}

 ?>
