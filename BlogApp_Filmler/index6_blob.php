<?php require "index6_header_kisim.php" ;
  require "index6_hatamesajlari.php";
 
?>

   <div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <table class="table table-bordered">
        <tr>
            <th style="width: 100px;">film resim</th>
            <th style="width: 150px;">film adı</th>
            <th style="width: 20px;">film beğeni sayısı</th>
            <th style="width: 20px;">film yorum sayısı</th>
            <th style="width: 20px;">film paylaşım sayısı</th>
            <th style="width: 100px;">kategori</th>
            <th style="width: 80px;">film vizyon durumu</th>
            <th style="width: 80px;">is home</th>
        </tr>
       
            <?php $result=getblobfilm();
            
         while($film=mysqli_fetch_assoc($result)): ?>
             <tr> 
            <td><img class="img-fluid" src="<?php echo $film["resimurl"] ?>" alt=""></td>
            <td><?php echo $film["name"] ?></td>
            <td><?php echo $film["begeniimsayisi"] ?></td>
            <td><?php echo $film["yorumsayisi"] ?></td>
            <td><?php echo $film["paylasimsayisi"] ?></td>
            <td>
              <?php $filmid=$film["id"]; $getcategories=getblobfilmcategories($filmid)?>
             <ul>
             <?php if($getcategories!=null): ?>
              <?php while($categori=mysqli_fetch_assoc($getcategories)): ?>
               <li><?php echo $categori["categoriname"]?></li>
              <?php endwhile ?>
              <?php else: ?>
                <li style="list-style-type: none;">kategori seçilmedi</li>
              <?php endif;?>
              
             </ul>
          
          </td>
            <td><?php if($film["isactive"]):?>
                <i class="fa fa-check" aria-hidden="true"></i>
             <?php else :?>
                <i class="fa fa-times" aria-hidden="true"></i>
              <?php endif  ?>
            </td>
            <td><?php if($film["ishome"]):?>
                <i class="fa fa-check" aria-hidden="true"></i>
             <?php else :?>
                <i class="fa fa-times" aria-hidden="true"></i>
              <?php endif  ?>
            </td>
            <td>
             <a class="btn btn-primary btn-sm" href="index6_film_edit.php?id=<?php echo $film["id"]  ?>">güncelle</a>
            <a class="btn btn-danger btn-sm"  href="index6_delete.php?id=<?php echo $film["id"]  ?>">sil</a>
            </td>
            
            </tr>
            
            <?php endwhile; ?>
        
    </table>
  


  </div>
  <div class="col-2"></div>
</div>
  
<?php require "index6_footer_kisim.php" ?>