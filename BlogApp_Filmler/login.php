<?php require "index6_header_kisim.php";
include "index2_baglanti_kontrol.php";
?>

<?php   

  if(isset($_POST["login"])){
   $username=trim($_POST["username"]);
    $password=trim($_POST["password"]);
  
    $kontrol=true;
  
        
        $queryemail="SELECT * FROM users where  pssword='$password' and username='$username'" ;
        $resultemail=mysqli_query($baglanti,$queryemail);
       
        if(mysqli_num_rows($resultemail)==1){
            $row=mysqli_fetch_assoc($resultemail);
           setcookie("username",$row["name"],time()+60*60);
        setcookie("login",true,time()+60*60);
        $kontrol=false;
        header("Location:index6_layout_uygulama.php");
        }
        else{
         
            echo"<div class=\"alert alert-danger mb-0 mt-1\" role=\"alert\">
          username veya password yanlış
       </div>";
        
        
       
    
    }
   
    
  }

?>



<div class="contane m-3">
    <div class="row">

        <div class="col-lg-9">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="name">


                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <button type="submit" name="login" class="btn btn-primary">login</button>
            </form>
        </div>

    </div>
</div>
<?php require "index6_footer_kisim.php" ?>
