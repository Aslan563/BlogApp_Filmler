<?php
 require "index6_header_kisim.php" ;
   if(isset($_GET["id"])){
      $id = $_GET["id"];
     if( deletecategories($id)){
      $_SESSION["message"]=$_GET["id"]." id numaralı kategori silindi";
      $_SESSION["type"]="danger";
     }
   else{
      $_SESSION["message"]=" kategori silinmedi";
      $_SESSION["type"]="danger";
   }
      
     
   }
    header("Location:index6_blobcategories.php");

?>