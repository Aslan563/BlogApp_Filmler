<style>
  .navbar {
    transition: top 0.3s;
    /* Geçiş animasyonu */
  }
  a:hover{
    background-color: rgba(0, 0, 0, 0.4);
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbar">
  <a class="navbar-brand" href="index6_anasayfa.php">Anasayfa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"> 
      <li  class="nav-item active">
        <a href="index6_layout_uygulama.php" class="nav-link" href="#">filmler</a>
      </li>

      <?php if(isset($_COOKIE["login"])): ?>
      <li class="nav-item active">
        <a class="nav-link" href="index6_blob.php">Blob filmler<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index6_blobcategories.php">Blob kategoriler<span class="sr-only">(current)</span></a>
      </li>
     
        <?php endif; ?>

     
      <?php if(isset($_COOKIE["login"])): ?>
        <li style="margin-left: 20px;" class="nav-item">
        <a href="index6_2.sayfa.php" class="nav-link ">film ekle</a>
      </li>
        <?php endif; ?>
        <?php if(isset($_COOKIE["login"])): ?>
        <li style="margin-left: 20px;" class="nav-item">
        <a href="index6_create_catgory.php" class="nav-link ">kategori ekle</a>
      </li>
        <?php endif; ?>
    </ul>
    <ul class="navbar-nav ">
      <?php if(isset($_COOKIE["login"])): ?>
        <li class="nav-item active">
        <a class="nav-link" href="lagout.php">lagout <span class="sr-only">(current)</span></a>
      </li>
        <li style="margin-left: 20px;" class="nav-item">
        <a href="index6_userprofile.php" class="nav-link ">Hoşgeldiniz , <?php  echo $_COOKIE["username"]?></a>
      </li>
       
      <?php else: ?>
        <li class="nav-item active">
        <a class="nav-link" href="login.php">login <span class="sr-only">(current)</span></a>
      </li>
      <li  class="nav-item">
        <a  class="nav-link" href="register.php">register</a>
      </li>
      <?php endif; ?>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="index6_layout_uygulama.php" method="GET">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

  </div>
</nav>

<script>
  

  let lastScrollTop = 0;
  const navbar = document.getElementById("navbar");

  window.addEventListener("scroll", function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
      
      navbar.style.top = "-56px"; 
    } else {
     
      navbar.style.top = "0";
    }
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; 
  });
</script>