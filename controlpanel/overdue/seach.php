<?php 
   error_reporting(0);
   require_once "../../php/connect.php";

   $username=$_POST['username'];
   


   $selectissued="SELECT * FROM issue_item WHERE username='$username' AND LIKE  ORDER BY id limit 3 ";
   $sqlissued=mysqli_query($connection,$selectissued);
   $fetchissued=mysqli_fetch_all($sqlissued,MYSQLI_ASSOC);


   foreach ($fetchissued as $key ) {
      
   
   if ( mysqli_num_rows($sqlissued)>0) {
      echo "<ul><li style='list-style-type:none;color:black;background:whitesmoke'><span style='margin-left:10px'> $key[name]</span><span style='margin-left:30px'>$key[bacorde]</span><span style='margin-left:30px'>$key[stataus]</span></li></ul>";
   }
   else{
      die('<p style="margin-left:70px;text-transform:capitalize;color:darkred"> no item for such user<p>');
   }
   }
   
 ?>