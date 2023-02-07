<?php 
   error_reporting(0); 
   require_once "../../php/connect.php";

   $keyword=$_POST['name'];
   

   $select="SELECT * FROM items WHERE name LIKE '%$keyword%'";
   $sql=mysqli_query($connection,$select);
   $fetch=mysqli_fetch_all($sql,MYSQLI_ASSOC);

   foreach ($fetch as $key ) {
      
   }
   if (mysqli_num_rows($sql)>0) {
      echo "<ul><li style='list-style-type:none'><p style='margin-left:18px'>$key[name]</p></li></ul>";
   }
   else{
      die('<p style="margin-left:70px;text-transform:capitalize;color:darkred">the searched item is not available<p>');
   }
   
 ?>