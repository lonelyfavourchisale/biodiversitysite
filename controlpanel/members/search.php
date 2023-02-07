<?php 
   error_reporting(0);
   require_once "../../php/connect.php";

   $keyword=$_POST['keywords'];
   

   $select="SELECT * FROM  create_users  WHERE username LIKE '%$keyword%'";
   $sql=mysqli_query($connection,$select);
   $fetch=mysqli_fetch_all($sql,MYSQLI_ASSOC);

   foreach ($fetch as $key ) {
      
   }
   if (mysqli_num_rows($sql)>0) {
      echo "<ul><li style='list-style-type:none'>the password of <span style='margin-left:10px'>   $key[username]</span><span style='margin-left:10px'>is  $key[password]</span></li></ul>";
   }
   else{
      die('<p style="margin-left:70px;text-transform:capitalize;color:darkred">no such user<p>');
   }
   
 ?>