<?php
 require "index6_header_kisim.php" ;
   if(isset($_GET["id"])){
      $id = $_GET["id"];
     if( deletemovie($id)){
      $_SESSION["message"]=$_GET["id"]." id numaralı film silindi";
      $_SESSION["type"]="danger";
     }
   else{
      $_SESSION["message"]=" film silinmedi";
      $_SESSION["type"]="danger";
   }
      
     
   }
    header("Location:index6_blob.php");

?>