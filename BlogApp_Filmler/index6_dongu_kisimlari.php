<?php

 $result=getblobfilm($aranacakkelime);
 if($result==null){
    return;
 }
 while($film=mysqli_fetch_assoc($result))
   {
    $filmozet="";
    $decodedfilmozet=htmlspecialchars_decode($film["shortozet"]);
    
    // HTML etiketlerini temizleyerek sadece metin kısımlarını alıyoruz
    $cleanfilmozet = strip_tags($decodedfilmozet);
    if(mb_strlen($film["shortozet"])>100){
        $filmozet=mb_substr($cleanfilmozet,0,100)."..."; 
    }
    else{
        $filmozet=htmlspecialchars_decode($film["shortozet"]);
    }
    echo "

<div id=\"card1\" class=\"row mb-4\">

<div class=\"col-sm-7\">
<div class=\"card\">
    <img src=\"{$film['resimurl']}\" class=\"card-img-top\"  alt=\"...\" width=\"200\" height=\"350\">
    <div class=\"card-body\" >
        <a href=\"index6_film_details.php?id={$film['id']}\" class=\"card-title\">{$film['name']}</a>
    </div>
</div>
</div>
<div class=\"col-lg-5\">
<h1>{$film['name']}</h1>
<p>{$filmozet}</p>
<span class=\"badge bg-primary mx-2\">{$film['yorumsayisi']}<br>yorum</span>
<span class=\"badge bg-primary mx-2\">{$film['begeniimsayisi']}<br>beğeni</span>
<span class=\"badge bg-warning mx-2\">{$film['paylasimsayisi']}<br>paylaşım</span>
</div>
</div>
";
};

?>