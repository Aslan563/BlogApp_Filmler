

<?php
 
  $categorinameerr="";
  $categoriname="";
 
if (isset($_POST["categoriupluad"]) && $_POST["categoriupluad"] == "yukle") {
    $categoriname = trim($_POST["categoriname"]);
   
    if(empty($categoriname)){
        $categorinameerr="kategori adı  boş bırakılamaz";
    }
    elseif(strlen($categoriname)>150){
        $categorinameerr="kategori adı uzunluğu 150 karakterden fazla olamaz";
    }
    else {
       
    }


  
  
        if(empty($categorinameerr)){
        
           if(addcategories( htmlentities($categoriname))){
            $_SESSION["message"]= $categoriname." isimli yeni bir kategori eklendi";
            $_SESSION["type"]="warning";
            header("Location:index6_blobcategories.php");
         }   
         else{
            $_SESSION["message"]="HATA";
            $_SESSION["type"]="danger";
          
         }  
        }
        
        

  
}




?>