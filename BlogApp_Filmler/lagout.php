  

<?php 
  setcookie("username","", time() -60*60);
  setcookie("login","", time() -60*60);
  header("Location:login.php");
?>