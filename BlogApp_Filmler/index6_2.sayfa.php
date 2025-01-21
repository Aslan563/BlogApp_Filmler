


<?php require "index6_header_kisim.php";  ?>
    <div class="contane m-3">
       
            <form style="background-color: antiquewhite; padding:10px" action="index6_2.sayfa.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-lg-9">
               
                <label for="name">film isim</label><br>
                <input type="text" name="name" placeholder="film isim" value=" <?php  if(!empty($filmname)){echo $filmname;} else{} ?>" class="form-control <?php  if(!empty($titleerr)){echo "is-invalid";} else{} ?>">
                <span style="color:red"><?php  if(!empty($titleerr)){echo $titleerr;} else{} ?></span> <br>
              
                <label for="fileUpload">Resim Yükle</label><br>
                <input type="file" name="filetoupload"> <br>
               
                <div class="my-2"><label for="shortaciklama">kısa açıklama</label>
                <textarea name="shortaciklama" id="" placeholder="film ile ilgili açıklama" class="form-control <?php if(!empty($shortaciklamaerr)){echo 'is-invalid';} ?>"> <?php  if(!empty($shortaciklama)){echo $shortaciklama;} else{} ?></textarea>
                <span style="color:red"><?php  if(!empty($aciklamaerr)){echo $aciklamaerr;} else{} ?></span><br>
                </div>
              
                <div class="my-2"><label for="aciklama">açıklama</label>
                <textarea style="width: 100px;" name="aciklama" id="" placeholder="film ile ilgili açıklama" class="form-control <?php if(!empty($aciklamaerr)){echo 'is-invalid';} ?>"> <?php  if(!empty($filmaciklama)){echo $filmaciklama;} else{} ?></textarea>
                <span style="color:red"><?php  if(!empty($aciklamaerr)){echo $aciklamaerr;} else{} ?></span><br>
                </div>
               
                </div> 
                <div class="col-lg-3">
                <div class="col-lg ">
                <h6>kategori seçiniz</h6>
                <?php $result = getcategories();
                if ($result == null) {
                    return;
                } ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                    <div class="form-group form-check">
                        <input name="category[]" value="<?php echo $row['id']; ?>"
                            type="checkbox"
                            class="form-check-input"
                            id="categori_<?php echo $row['id']; ?>"
                            >
                        <label class="form-check-label" for="categori_<?php echo $row['id']; ?>">
                            <?php echo $row['name']; ?>
                        </label>
                    </div>
                    

                <?php endwhile; ?>
                <span style="color:red"><?php  if(!empty($categori_err)){echo $categori_err;} else{} ?></span><br>
                </div>
                <hr style="height:2px; border: none; background-color: black;">
                <div class="form-group form-check ml-3 ">
                    <input type="checkbox" name="check1" class="form-check-input" id="check1">
                    <label class="form-check-label"  for="check1">is-active</label>
                </div>
                <div class="form-group form-check ml-3">
                    <input type="checkbox" name="ishome" class="form-check-input" id="ishome" >
                    <label class="form-check-label" for="ishome">is-home</label>
                </div>
                </div>
                <input class="ml-4" type="submit" name="upload" value="yukle">
          
        </div>
            </form>

       
    </div>
   <?php
     include "index6_ckeditor.php"; 
   require "index6_footer_kisim.php" ?>