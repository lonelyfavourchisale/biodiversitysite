<?php 
 
 require_once "php/connect.php";
     
            $fullname=mysqli_escape_string($connection,$_POST['fullname']);
            $phone=mysqli_escape_string($connection,$_POST['phone']);
            $email=mysqli_escape_string($connection,$_POST['email']);
            $location=mysqli_escape_string($connection,$_POST['location']);
            $message=mysqli_escape_string($connection,$_POST['message']);

            $select="SELECT * FROM allcontacts WHERE fullname='$fullname' AND phone='$phone' AND email='$email' AND location='$location' AND status=''";
            $sqlselect=mysqli_query($connection,$select);
            
if (! preg_match('/^[0-9]{10}+$/', $phone)) {
   echo "<p class='alert alert-success'>invalid format of phone number</p>";
}
else{
            if (mysqli_num_rows($sqlselect)>0) {
              $update="UPDATE allcontacts SET fullname='$fullname',phone='$phone',email='$email',location='$location',message='$message' WHERE fullname='$fullname' AND phone='$phone' AND email='$email' AND location='$location'";
              $sqlupdate=mysqli_query($connection,$update);

              if ($sqlupdate) {
                echo "<p class='alert alert-success'>your message successfully updated,wait for your feedback</p>";
              }
              else{
                echo "<p class='alert alert-warning'>failed to update the message</p>";
              }
            
          }
            else{
            $insert="INSERT INTO allcontacts (fullname,phone,email,location,message,status)
            VALUES('$fullname','$phone','$email','$location','$message','')";

            $sql=mysqli_query($connection,$insert);
            if ($sql) {
              echo "<p class='alert alert-success text-lowercase'>your message successfully sent,wait for your feedback</p>";
            }
            else{
              echo "<p class='alert alert-warning'>failed to send the message,contact administrator</p>";
            
          }
        }
      }
      
 ?>