<?php
$baglanti=mysqli_connect("localhost","root","","blobapps");
mysqli_set_charset($baglanti,"UTF8");
if(mysqli_connect_errno()>0){
 die("hata:".mysqli_connect_errno());
}

?>