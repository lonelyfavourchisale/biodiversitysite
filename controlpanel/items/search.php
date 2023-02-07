<?php 
   error_reporting(0);
   require_once "../../php/connect.php";

   $barcode=$_POST['barcode'];
   

   $select="SELECT * FROM  items WHERE barcode LIKE '%$barcode%'";
   $sql=mysqli_query($connection,$select);
   $fetch=mysqli_fetch_all($sql,MYSQLI_ASSOC);

    $selectissued="SELECT * FROM issue_itemWHERE barcode LIKE '%$barcode%'";
   $sqlissued=mysqli_query($connection,$selectissued);
   $fetchissued=mysqli_fetch_all($sqlissued,MYSQLI_ASSOC);


   foreach ($fetch as $key ) {
      
   }
   if (mysqli_num_rows($sql)>0 || mysqli_num_rows($sqlissued)>0) {
      echo "<ul><li style='list-style-type:none;color:green'>the item with barcode<span style='margin-left:10px'>   $key[barcode]</span><span style='margin-left:10px'></span>is available in the system</li></ul>";
   }
   else{
      die('<p style="margin-left:70px;text-transform:capitalize;color:darkred">the item is not available the system<p>');
   }
   
 ?>