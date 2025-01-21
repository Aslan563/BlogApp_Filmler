<?php require "index6_header_kisim.php";
$selectedmovie = array();
$id = null;
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $selectedmovie = getselectedmoviefilm($_GET["id"]);
}
if (isset($_POST["update"]) && $_POST["update"] == "update") {
    $filmname = $_POST["name"];
    $check = isset($_POST["isactive"]) ? 1 : 0;
    $categories = array();
    $shortaciklama=$_POST["short_aciklama"];
    $ishome=isset($_POST["ishome"]) ? 1 : 0;
    if ($_POST["categories"] != null) {
        $categories = $_POST["categories"];
    }



    $filename = $_FILES["filetoupload"]["name"];
    $filepath = $_FILES["filetoupload"]["tmp_name"];
    $dosyauzantisiarray = explode(".", $filename);
    $dosyauzantisi = $dosyauzantisiarray[count($dosyauzantisiarray) - 1];
    $dosyauzantisiz = $dosyauzantisiarray[0];
    $filepath2 = md5(time() . $dosyauzantisiz) . $dosyauzantisi;
    $dest_path = "resimler2/" . $filepath2;
    $addfilmname = md5($dest_path) . "film";
    if (move_uploaded_file($filepath, $dest_path)) {

       $imagepath=$dest_path;
    }
    else{
        $imagepath=$selectedmovie["resimurl"];
    }

    if (updatemovie($id, htmlentities($filmname),htmlentities($shortaciklama), $imagepath, htmlentities($_POST["aciklama"]), $check,$ishome)) {
        if (clear_film_categori($id)) {
            if (count($categories) > 0) {
                if (add_film_kategori($id, $categories)) {
                    $_SESSION["message"] = $id . " id numaralı film bilgileri güncellendi";
                    $_SESSION["type"] = "success";
                } else {
                    $_SESSION["message"] = "film kategori güncellenmedi";
                    $_SESSION["type"] = "danger";
                }
            } else {
                $_SESSION["message"] = $id . " id numaralı film bilgileri güncellendi";
                $_SESSION["type"] = "success";
            }
        };
    } else {
        $_SESSION["message"] = "film güncellenmedi";
        $_SESSION["type"] = "danger";
    }
    header("Location:index6_blob.php");
}

?>
<div class="contane m-3">



    <form class="form bg-success p-2" style=" padding:10px" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-8">
                <input type="text" name="name" placeholder="film isim" value="<?php echo $selectedmovie["name"]  ?>"> <br><br>
                <label for="fileUpload">Resim Yükle</label><br>
                <input type="file" name="filetoupload"> <br><br>
                <div >
                     <label for="short_aciklama">kısa açıklama</label><br>
                      <textarea class="form-control"  name="short_aciklama" id="" placeholder="film ile ilgili açıklama"><?php echo  $selectedmovie["shortozet"]  ?></textarea>
                </div>
              
                <div >
                    <label for="aciklama">açıklama</label>
                      <textarea  name="aciklama" id="" placeholder="film ile ilgili açıklama"><?php echo  $selectedmovie["filmozet"]  ?></textarea>
                </div>
                <br><br>
              

               
            </div>

            <div class="col-lg-4 my-1 ">
                <h6>kategori seçiniz</h6>
                <?php $result = getcategories();
                if ($result == null) {
                    return;
                } ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                    <div class="form-group form-check">
                        <input name="categories[]" value="<?php echo $row['id']; ?>"
                            type="checkbox"
                            class="form-check-input"
                            id="categori_<?php echo $row['id']; ?>"
                            <?php
                            $result2 = getblobfilmcategories($id);
                            $checked = false;
                            if ($result2) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    if ($row['id'] == $row2['kategori_id']) {
                                        $checked = true;
                                    }
                                }
                            }
                            if ($checked) {
                                echo 'checked';
                            }
                            ?>>
                        <label class="form-check-label" for="categori_<?php echo $row['id']; ?>">
                            <?php echo $row['name']; ?>
                        </label>
                    </div>

                <?php endwhile; ?>
                <hr style="height:2px; border: none; background-color: black;">
                <div class="form-group form-check">
                    <input type="checkbox" name="isactive" class="form-check-input" id="exampleCheck1" <?php if ($selectedmovie["isactive"]) {
                                                                                                            echo "checked";
                                                                                                        }   ?>>
                    <label class="form-check-label" for="exampleCheck1">is-active</label>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="ishome" class="form-check-input" id="ishome" <?php if ($selectedmovie["ishome"]) {
                                                                                                            echo "checked";
                                                                                                        }   ?>>
                    <label class="form-check-label" for="ishome">is-home</label>
                </div>

               <img class="image-fluid" src="<?php echo $selectedmovie["resimurl"]  ?>" alt="" width="200" height="350">

            </div>
            <input style="margin-left: 10px;" type="submit" name="update" value="update">
        </div>
    </form>





</div>
<?php
include "index6_ckeditor.php";
require "index6_footer_kisim.php" ?>