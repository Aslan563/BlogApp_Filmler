  <?php require "index6_header_kisim.php"  ?>
  
    <div class="contane m-3">
        <div class="row">
        <div class="col-lg-3 my-1">
        <div class="list-group">
        <a href="index6_layout_uygulama.php" class="list-group-item list-group-item-action active">tüm katgoriler</a>
                    <?php $row=getcategories();
                     while ($kategori=mysqli_fetch_assoc($row)) {
                        echo "<a href=\"index6_blob_categori_films.php?categoriid={$kategori["id"]}\" class=\"list-group-item list-group-item-action\">{$kategori["name"]}</a>";
                    } ?>
                </div>
            </div>
            <div class="col-lg-9">
                <?php 
               
                
               
               $aranacakkelime="";
               if(!empty($_GET["search"])){
                  $keyword=trim($_GET["search"]);
                  $aranacakkelime=$keyword;
              
                 }
                 $filmsayisi=getblobfilmsayisi($aranacakkelime);
                require_once "index6_dongu_kisimlari.php";
               
                
             
                if($filmsayisi!=0){
                     echo"<br><h3 id=\"headerkategorifilms\">$kategorisayisi kategoride $filmsayisi film listelenmiştir</h3>";
                }
               else{
                echo"<br><h3 id=\"headerkategorifilms\">bu aramaya uygun film bulunamadı</h3>";
               }
                
                ?>
            </div>

        </div>
    </div>
   <?php
    include "index6_ckeditor.php"; 
   require "index6_footer_kisim.php" ?>


  
