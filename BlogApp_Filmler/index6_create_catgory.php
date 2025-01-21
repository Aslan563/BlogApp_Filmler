

<?php require "index6_header_kisim.php";  ?>
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
                <form style="background-color: antiquewhite; padding:10px" action="index6_create_catgory.php" method="POST" >
                <input type="text" name="categoriname" placeholder="kategori isim" value=" <?php  if(!empty($categoriname)){echo $categoriname;} else{} ?>" class="form-control <?php  if(!empty($titleerr)){echo "is-invalid";} else{} ?>">
                <span style="color:red"><?php  if(!empty($categorinameerr)){echo $categorinameerr;} else{} ?></span> <br><br>
               
                <input type="submit" name="categoriupluad" value="yukle">
            </div>

        </div>
    </div>
   <?php require "index6_footer_kisim.php" ?>