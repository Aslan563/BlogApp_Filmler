<?php require "index6_header_kisim.php" ;
  require "index6_hatamesajlari.php";
 
?>

   <div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <table class="table table-bordered">
        <tr>
            <th style="width: 100px;">id </th>
            <th style="width: 150px;">kategori adı</th>
           
        </tr>
       
            <?php $result=getcategories();
         while($categori=mysqli_fetch_assoc($result)): ?>
             <tr> 
             <td><?php echo $categori["id"] ?></td>
            <td><?php echo $categori["name"] ?></td>
            <td> <a class="btn btn-primary btn-sm" href="index6_updatecategories.php?id=<?php echo $categori["id"]?>">güncelle</a>
            <a class="btn btn-danger btn-sm"  href="index6_delete_categories.php?id=<?php echo $categori["id"]  ?>">sil</a>
            </td>
            </tr>
            
            <?php endwhile; ?>
        
    </table>
  


  </div>
  <div class="col-2"></div>
</div>
  
<?php require "index6_footer_kisim.php" ?>