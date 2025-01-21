
<style>
 body .navbar {
    display: none;
}

</style>
<?php 
 include "index6_header_kisim.php";

 if(isset($_GET["id"]) and is_numeric($_GET["id"])){
    $row=getselectedmoviefilm($_GET["id"]);
    if($row==null){
        return;
    }
    
    $vizyondurumu="";
    if($row["isactive"]){
        $vizyondurumu="vizyonda";
    }
    else{
        $vizyondurumu="vizyonda değil";
    }
  $filmozet=htmlspecialchars_decode($row["filmozet"]);
    echo "

    <div id=\"card\" class=\"row m-2  style=\"border:none\"\">
    
    <div class=\"col-sm-7\">
    <div class=\"card\">
        <img src=\"{$row["resimurl"]}\" class=\"card-img-top\"  alt=\"...\" width=\"100\" height=\"350\">
        <div class=\"card-body\" >
            <h3  class=\"card-title\">{$row["name"]}</h3>
        </div>
    </div>
    </div>
    <div class=\"col-lg-5\">
    <h1>{$row["name"]}</h1>
     <p>{$row["shortozet"]}</p><hr/>
    <p>{$filmozet}</p><br/>
    <p class=\"card-text mx-2\">yorum sayısı :{$row["yorumsayisi"]} </p>
    <p class=\"card-text mx-2\">beğeni sayısı :{$row["begeniimsayisi"]} </p>
    <p class=\"card-text mx-2\">paylaşım sayısı :{$row["paylasimsayisi"]} </p><br/>
     <p class=\"card-text\">vizyon durumu :$vizyondurumu</p>
    </div>
    </div>
    ";

 }
 else{
    header("location:index6_layout_uygulama.php");
 }


?>



