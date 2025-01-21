<?php require "index6_header_kisim.php"  ?>
  
  <div class="contane m-3">
      <div class="row">
     
          <div class="col-lg-12">
              <p><?php
              
               if($_COOKIE["login"]){
                echo "HOŞGELDİNİZ , ".$_COOKIE["username"];
                
              } 
              else{
                header("Location:login.php");
              }
            
                ?>
                </p>
                <a href="lagout.php" class="badge badge-danger">Lagout</a>
          </div>

      </div>
  </div>
 <?php

 require "index6_footer_kisim.php" ?>

