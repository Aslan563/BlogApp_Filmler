<?php
 


  function getcategories(){
    include "index2_baglanti_kontrol.php";
    $query="SELECT * FROM kategoriler";
    $result=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    if(mysqli_num_rows($result)>0){
      return $result;
    }
 
      return null;
 
  }
  function getcategoriessayisi(){
    include "index2_baglanti_kontrol.php";
    $query="SELECT COUNT(*) as kategorisayisi FROM kategoriler";
    $result=mysqli_query($baglanti,$query);

    $row=mysqli_fetch_assoc($result);
    $categoriessayisi=$row['kategorisayisi'];
    mysqli_close($baglanti);

    return $categoriessayisi;

 
  }
  
  function addcategories($categoriname){
    include "index2_baglanti_kontrol.php";
    $query="INSERT INTO kategoriler(`name`) VALUES(?)";
    $result=mysqli_prepare($baglanti,$query);
    mysqli_stmt_bind_param($result,'s',$categoriname);
    mysqli_stmt_execute($result);
    mysqli_close($baglanti);
    return $result;
  }
  function deletecategories($categoriid){
    include "index2_baglanti_kontrol.php";
    $query="DELETE FROM kategoriler WHERE id =$categoriid";
    $result=mysqli_query($baglanti,$query);
    return $result;
  }
  function updatecategories(int $categoriid,string $categoriname){
    include "index2_baglanti_kontrol.php";
    $query="UPDATE kategoriler SET name='$categoriname' WHERE id=$categoriid ";
    $result=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $result;

   }

   function createusers(string $username,string $name,string $email,string $password) {  
   /* $db=jsondata();
    array_push($db["users"],array(
        "id"=> count( $db["users"] )+1,
        "name"=> $name,
        "username"=> $username,
        "email"=> $email,
        "password"=> $password,

    ));
    $myfilecreate=fopen("db.json","w");
    fwrite($myfilecreate,json_encode($db,JSON_PRETTY_PRINT));
    fclose($myfilecreate);*/

   }


   function addfilm(string $filmbaslik,string $shortaciklama,string $filmresim,int $filmbegenis,int $filmyorums,int $filmpaylasims,string $filmozet,int $check1,int $ishome)
   {
    include "index2_baglanti_kontrol.php";
    $query="INSERT INTO films(`name`,`shortozet`, `resimurl`, `begeniimsayisi`, `yorumsayisi`, `paylasimsayisi`, `filmozet`, `isactive`,`ishome`) VALUES(?,?,?,?,?,?,?,?,?)";
    $result=mysqli_prepare($baglanti,$query);
    mysqli_stmt_bind_param($result,'sssiiisii',$filmbaslik,$shortaciklama,$filmresim,$filmbegenis,$filmyorums,$filmpaylasims,$filmozet,$check1,$ishome);
    mysqli_stmt_execute($result);
    mysqli_close($baglanti);
    return $result;
   }

 
   
   function getblobfilm($searcword=""){
    include "index2_baglanti_kontrol.php";
    $query="SELECT * from films where name like '%$searcword%'";
    $result=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    if(mysqli_num_rows($result)>0){
      return $result;
    }
    else{
      $result=0;
    }
   }
   function   getblobhomefilm($searcword=""){
    include "index2_baglanti_kontrol.php";
    $query="SELECT * from films where (name like '%$searcword%') and (isactive=1 and ishome=1)  ORDER BY adddate desc LIMIT 3";
    $result=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
     return $result;
   }
 
   function getblobfilmcategories($filmid){
    include "index2_baglanti_kontrol.php";
    $query="SELECT fk.kategoriid as kategori_id,k.name as categoriname from  film_kategori fk inner join kategoriler k on fk.kategoriid=k.id WHERE fk.filmid=$filmid";
    $result=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    if(mysqli_num_rows($result)>0){
      return $result;
    }
    else{
      $result=null;
    }
   }
   function getblobfilmcategoriesfilm($categoriid,$pagenumber,$keywords){
    include "index2_baglanti_kontrol.php";
    $pagecount=2;
    $offset=($pagenumber-1)*$pagecount;
    $query="";
    if(!empty($categoriid)){
       $query="FROM film_kategori fk inner join films f on fk.filmid=f.id WHERE fk.kategoriid=$categoriid";
    }
    else{
      $query="FROM film_kategori fk inner join films f on fk.filmid=f.id  WHERE f.isactive=1";
    }
    if(!empty($keywords)){
      $query.="and fk.name LIKE '%$keywords%'";
   }
  $totalsql="SELECT COUNT(*) ".$query;

  $countdata=mysqli_query($baglanti,$totalsql);
  $count=mysqli_fetch_array($countdata)[0];
  $totalpage=ceil($count/$pagecount);

  $sql="SELECT * ".$query." LIMIT $offset,$pagecount";
  $result=mysqli_query($baglanti,$sql);
    mysqli_close($baglanti);
      return Array(
        "data"=>$result,
        "total"=>$totalpage
      );
    
    
   }

   function getblobfilmsayisi($searcword=""){
    include "index2_baglanti_kontrol.php";
    $query="SELECT COUNT(*) as filmsayisi FROM films WHERE name LIKE '%$searcword%'";
    $result=mysqli_query($baglanti,$query);
   
    $row=mysqli_fetch_assoc($result);
    $filmssayisi=$row['filmsayisi'];
     mysqli_close($baglanti);
      return $filmssayisi;
    
   
   }

  
   function getselectedmoviefilm(int $movieid){
    include "index2_baglanti_kontrol.php";
    $query="SELECT * FROM films  WHERE id='$movieid' ";
    $result=mysqli_query($baglanti,$query);
     mysqli_close($baglanti);
    if(mysqli_num_rows($result)>0){
       $row=mysqli_fetch_assoc($result);
       return $row;
    }
    else{
      return null;
    }
   
   
   }

   function updatemovie(int $movieid,string $filmbaslik,string $shortaciklama,string $filmresim,string $filmozet,$check,$ishome){
    include "index2_baglanti_kontrol.php";
    $query="UPDATE films SET name='$filmbaslik',shortozet='$shortaciklama',resimurl='$filmresim',filmozet='$filmozet',isactive=$check,ishome=$ishome  WHERE id=$movieid ";
    $result=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $result;

   }
   
   function clear_film_categori(int $movieid){
    include "index2_baglanti_kontrol.php";
    $query="DELETE FROM film_kateGori WHERE filmid =$movieid";
    $result=mysqli_query($baglanti,$query);
    return $result;
   }

   function add_film_kategori(int $movieid,array $categories){
    include "index2_baglanti_kontrol.php";
    $query="";
    foreach($categories as $categoriid){
      $query.="INSERT INTO film_kateGori(`filmid`,`kategoriid`) VALUES($movieid,$categoriid);";
    }
    
    $result=mysqli_multi_query($baglanti,$query);
    return $result;
   }



  function deletemovie(int $movieid){
    include "index2_baglanti_kontrol.php";
    $query="DELETE FROM films WHERE id =$movieid";
    $result=mysqli_query($baglanti,$query);
    return $result;
       
    }
   
    


 
/*$film0 = array(
    "filmbaslik" => "yeşil yol",
    "filmresim" => "resimler2/yesilyol.jpg",
    "filmbegenisayisi" => "140",
    "filmyorumsayisi" => "160",
    "filmpaylasimsayisi" => "45",
    "filmozet" => "bir hapishane görevlisi ile bir mahkumun öyküsünü anlatıyor.Paul Edgecomb'un hapishanedeki görevi, idama mahkum edilen mahkumları son yolculuklarına uğurlamaktır. Çalıştığı yıllar içerisinde yüzlerce mahkumu idam etmiştir."
);

$film1 = array(
    "filmbaslik" => "dangal",
    "filmresim" => "resimler2/dangal.jpg",
    "filmbegenisayisi" => "300",
    "filmyorumsayisi" => "210",
    "filmpaylasimsayisi" => "140",
    "filmozet" => "Aamir Khan filmde Mahavir Singh isimli güreşçi olarak karşımıza çıkıyor. Filmin yapımcılığını Disney ile Aamir Khan üstleniyor. Khan hayranlarını yine büyülüyor. Bir rol için 28 kilo alınır mı demeyin söz konusu Aamir Khan ise bu sorgulanmaz bile. Filmde bir adamın 19, 29, 55 yaşlarındaki halini ayrı ayrı canlandıran Aamir Khan’ın çalışmaları gerçekleştirirken bir antrenör eşliğinde vücut geliştirdiği biliniyor. 98 kilo ile çekimleri bitince tekrar kilo veriyor. Dangal güreş yarışması anlamına gelir, zaten Dangal film konusu da güreşmeyi bırakan bir babanın kızlarını güreşçi olarak yetiştirmesini anlatıyor. Biyografik spor dram filmidir."
);

$filmler = array(
    "film1" =>
    array(
        "filmbaslik" => "hızlı ve öfkeli 5",
        "filmresim" => "resimler2/hizliveofkeli.jpg",
        "filmbegenisayisi" => "80",
        "filmyorumsayisi" => "90",
        "filmpaylasimsayisi" => "20",
        "filmozet" => "Brian ve Mia Toretto (Brewster), Dom’u özgürlüğüne kavuşturduktan sonra, yetkilileri atlatmak için sınırları geçtiler. Şimdi Rio de Janeiro’nun bir köşesinde ortaya çıkıyorlar. Özgürlüklerini kazanmak için son bir işe asılmak zorundalar. Alışılmadık müttefikler, en iyi yarışçılardan oluşan seçkin ekiplerini bir araya getirirken, onların ölmesini isteyen ahlaksız iş adamından kurtulmanın tek yolunun, onunla karşılaşmak olduğunu biliyorlar. Ama onların peşine düşen sadece bu iş adamı değil.İnatçı federal ajan Luke Hobbs (Johnson) asla hedefini kaçırmıyor. Dom ve Brian’ın izini sürmekle görevlendirilince, onları yakalamak için ekibiyle birlikte kapsamlı bir operasyon başlatıyor. Şimdi Hobbs, başka biri elini çabuk tutup onları yakalamadan önce, avını köşeye sıkıştırmak için içgüdülerine güvenmek zorunda."

    ),
    "film2" =>
    array(
        "filmbaslik" => "labirent",
        "filmresim" => "resimler2/labirent.jpg",
        "filmbegenisayisi" => "100",
        "filmyorumsayisi" => "100",
        "filmpaylasimsayisi" => "7",
        "filmozet" => "thomas bir anda uyanır ve yukarı doğru hareket halindeki bir asansörde olduğunu fark eder. Asansörün kapıları açılır ve karşısında kendi yaşlarında bir grup genci görür. Koloni gibi görünen bu grup onu bir kayranda karşılamıştır. Devasa büyüklükteki duvarlarla çevrelenen bu geniş alanda Thomas ne kendisini, ne ailesini ne de geçmişini hatırlayamaz. Dahası karşısındaki “Kayranlılar” da tıpkı kendisi gibi buraya nasıl ve neden getirildiklerini bilmemektedirler. Tek bildikleri şey ise her sabah labirente gidilen dev bir kapının açıldığıdır. Güneş batarken ise her akşam kapı kapanır. Üstelik her 30 günde bir asansörle gruba yeni bir genç gelmektedir. Thomas’ın ardındansa beklenmedik bir şekilde, bir hafta sonra asansör labirente Teresa adında bir genç kızı bırakır. Thomas şimdi hem kayran sakinlerinin hem de geçmişte bir yerlerden hatırladığı bu labirentin sırrını çözmeye çalışacaktır…"

    )
);*/
?>
