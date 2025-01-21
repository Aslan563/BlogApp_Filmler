<?php 
 require "index6_header_kisim.php"; 
  

    $id = $_GET["id"];


  
  if (isset($_POST["categoriupluad"]) && $_POST["categoriupluad"] == "update") {
    
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
        if( updatecategories($id, $categoriname)){ 
            $_SESSION["message"]=$id." id numaralı kategori ismi güncellendi";
            $_SESSION["type"]="success";
           }
           else{
            $_SESSION["message"]="kategori ismi güncellenmedi";
            $_SESSION["type"]="danger";
           }
           header("Location:index6_blobcategories.php");
    }
           
      
    
}



?>

  
    <div class="contane m-3">
        <div class="row">
            <div class="col-lg-3 my-1">
                <ul class="list-group">
                    <?php $result=getcategories(); while ($kategori =mysqli_fetch_assoc($result)) {
                        echo "<li class=\"list-group-item\">{$kategori["name"]}</li><br>";
                    } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <form style="background-color: antiquewhite; padding:10px"  method="POST" >
                <input type="text" name="categoriname" placeholder="kategori isim" value=" <?php  if(!empty($categoriname)){echo $categoriname;} else{} ?>" class="form-control <?php  if(!empty($titleerr)){echo "is-invalid";} else{} ?>">
                <span style="color:red"><?php  if(!empty($categorinameerr)){echo $categorinameerr;} else{} ?></span> <br><br>
               
                <input type="submit" name="categoriupluad" value="update">
            </div>

        </div>
    </div>
   <?php require "index6_footer_kisim.php" ?>