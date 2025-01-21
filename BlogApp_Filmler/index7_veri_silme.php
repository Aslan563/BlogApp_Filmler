<?php  

   include  "index2_baglanti_kontrol.php";
  
   $query="DELETE FROM films WHERE id=3";
   $result=mysqli_query($baglanti,$query);
   $count=mysqli_affected_rows($baglanti);
   if($result){
    echo $count." tane kayıt silindi";
   }
   else{
    echo "kayıt silinmedi";
   }
   mysqli_close($baglanti);
?>