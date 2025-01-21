<?php require "index6_header_kisim.php";  ?>

<div class="row m-3">
    <div class="col-lg-3 my-1">
        <div class="list-group">
            <a href="index6_layout_uygulama.php" class="list-group-item list-group-item-action ">tüm katgoriler</a>
            <?php $row = getcategories();
            while ($kategori = mysqli_fetch_assoc($row)) {
                if (isset($_GET["categoriid"]) and is_numeric($_GET["categoriid"])) {
                    if ($kategori["id"] == $_GET["categoriid"]) {
                        echo "<a href=\"index6_blob_categori_films.php?categoriid={$kategori["id"]}\" class=\"list-group-item list-group-item-action active\">{$kategori["name"]}</a>";
                    } else {
                        echo "<a href=\"index6_blob_categori_films.php?categoriid={$kategori["id"]}\" class=\"list-group-item list-group-item-action \">{$kategori["name"]}</a>";
                    }
                } else {
                    echo "<a href=\"index6_blob_categori_films.php?categoriid={$kategori["id"]}\" class=\"list-group-item list-group-item-action \">{$kategori["name"]}</a>";
                }
            } ?>
        </div>
    </div>
    <div  class="col-lg-9">


        <?php
        $categoriid = "";
        $pagenumber = 1;
        $keywords = "";
        if (isset($_GET["categoriid"])) {
            $categoriid = $_GET["categoriid"];
        }
        if (isset($_GET["keywords"])) {
            $keywords = $_GET["keywords"];
        }
        if (isset($_GET["pagenumber"])) {
            $pagenumber = $_GET["pagenumber"];
        }



        $result = getblobfilmcategoriesfilm($categoriid, $pagenumber, $keywords);
        if (mysqli_num_rows($result["data"]) > 0) {
            if ($result == null) {
                return;
            }
            while ($film = mysqli_fetch_assoc($result["data"])) {
                $filmozet = "";
                $decodedfilmozet = htmlspecialchars_decode($film["filmozet"]);

                // HTML etiketlerini temizleyerek sadece metin kısımlarını alıyoruz
                $cleanfilmozet = strip_tags($decodedfilmozet);
                if (mb_strlen($film["filmozet"]) > 100) {
                    $filmozet = mb_substr($cleanfilmozet, 0, 100) . "...";
                } else {
                    $filmozet = htmlspecialchars_decode($film["filmozet"]);
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
        } else {
            echo '<div class="alert alert-warning">
           bu kategoriye ait film bulunamadı
            </div>';
        }



        ?> 
        <?php if ($result["total"]>1):  ?>
        <nav  aria-label="Page navigation example">
        <ul class="pagination">

     
            <?php for ($i = 1; $i <= $result["total"]; $i++):  ?>

                <li class="page-item <?php if($pagenumber==$i) {echo "active" ;} ?>"><a class="page-link " href="
                <?php 
                $url="?pagenumber=".$i;
                if(!empty($categoriid)){
                    $url.="&categoriid=".$categoriid;
                }
                if(!empty($keywords)){
                   
                }

                echo $url;
                ?>
                "> <?php echo $i  ?></a></li>

            <?php endfor; ?>
       
        </ul>
        </nav> 
        <?php endif; ?>
    </div>

</div>