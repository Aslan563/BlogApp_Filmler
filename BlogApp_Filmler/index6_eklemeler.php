
<?php
 
  $titleerr=$aciklamaerr=$categori_err=$categori_err=$shortaciklamaerr="";
  $filmname=$filmaciklama=$shortaciklama="";
  $check_categories=array();
 
if (isset($_POST["upload"]) && $_POST["upload"] == "yukle") {
    $filmname = trim($_POST["name"]);
    $filmaciklama=trim($_POST["aciklama"]);
    $ishome=isset($_POST["ishome"])? 1 : 0;
    if(empty($filmname)){
        $titleerr="film başlık boş bırakılamaz";
    }
    elseif(strlen($filmname)>150){
        $titleerr="başlık uzunluğu 150 karakterden fazla olamaz";
    }
    else {
       
    }

    if(empty($filmaciklama)){
        $aciklamaerr="film açıklama boş bırakılamaz";
    }
    elseif(strlen($filmaciklama)>350){
        $aciklamaerr="açıklama uzunluğu 350 karakterden fazla olamaz";
    }
    else {
        
    }
    
    
    if (!empty($_POST["category"]) ){
        $check_categories = $_POST["category"];
    }
   else{
    $categori_err="lütfen en az bir kategori seçiniz";
   }
   
    $shortaciklama=$_POST["shortaciklama"];
    if(empty($shortaciklama)){
        $categori_err="kısa açıklama  giriniz";
    }
    elseif(strlen($shortaciklama)>350){
        $shortaciklamaerr="kısa açıklama uzunluğu 200 karakterden fazla olamaz";
    }
    else{
        $shortaciklama=$_POST["shortaciklama"];
    }

  if(empty($titleerr)&&empty($aciklamaerr)&&empty($categori_err)&&empty($shortaciklamaerr)){
    $check1=isset($_POST["check1"])?1:0;
    $filename = $_FILES["filetoupload"]["name"];
    $filepath = $_FILES["filetoupload"]["tmp_name"];
    $dosyauzantisiarray = explode(".", $filename);
    $dosyauzantisi = $dosyauzantisiarray[count($dosyauzantisiarray) - 1];
    $dosyauzantisiz = $dosyauzantisiarray[0];
    $filepath2 = md5(time() . $dosyauzantisiz) . $dosyauzantisi;
    $dest_path = "resimler2/" . $filepath2;
    $addfilmname = md5($dest_path) . "film";
    if (move_uploaded_file($filepath, $dest_path)) {
      

        
          
           if(addfilm( htmlentities($filmname),htmlentities($shortaciklama),$dest_path,0,0,0,htmlentities($filmaciklama),$check1,$ishome)){
           
            include "index2_baglanti_kontrol.php";
            $last_film_id = mysqli_insert_id($baglanti);
            
               
               if(add_film_kategori($last_film_id,$check_categories)) {
                 $_SESSION["message"]= $filmname." isimli yeni bir film eklendi";
                  $_SESSION["type"]="warning";
               
           }
             header("Location:index6_blob.php");
           
          
         }   
         else{
            $_SESSION["message"]="HATA";
            $_SESSION["type"]="danger";
             header("Location:index6_blob.php");
          
         }  
        }
        
        

    }
  
}






/*if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST["baslik"])&&!empty($_POST["aciklama"])&&!empty($_POST["resimurl"])){
       
        $film= array( "filmbaslik" => $_POST["baslik"],
        "filmresim" => $_POST["resimurl"],
        "filmbegenisayisi" => 0,
        "filmyorumsayisi" => 0,
        "filmpaylasimsayisi" => 0,
        "filmozet" => $_POST["aciklama"]);
      
    }
   array_push($filmler, $film);
}*/



?>