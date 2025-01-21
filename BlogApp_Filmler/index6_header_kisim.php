<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.css">  <!-- html editor-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
   <title>Document</title>
</head>
<style>
   body{ padding-top: 56px;}
</style>

<body>
   <script>

   </script>
    <?php 
   
      require "index6_hatamesajlari.php";
    require "index6_navbar.php";
    session_start();
   // kategoriler dizsinin sonuna kurgusal ekle
   // kategoriler dizisini alfabetik olarak sırala
   //filmler dizisinin başına bir film ekle
   //filmleri rastgele sıralayınız
   //h1 etiketinin altına kaç kategoride kaç dizi sıralandığını yazınız

   require "index6_degiskenler(values).php";
   require "index6_eklemeler.php";
   require "index6_addcategories.php";
   include "index6_ckeditor.php"; 
    $kategorisayisi=getcategoriessayisi();
   


    ?>