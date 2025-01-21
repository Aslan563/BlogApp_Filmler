<?php require "index6_header_kisim.php";
  include "index2_baglanti_kontrol.php";  ?>

<?php
    $username_err=$password_err =$name_err =$email_err="";
    $username=$password =$name =$email="";
if (isset($_POST["register"])) {

    if(mb_strlen(trim($_POST["username"]))>20){
        $username_err="username 20 karakterden fazla olamaz";
    }
    else if(empty(trim($_POST["username"]))){
        $username_err="username boş bırakılamaz";
    }
    else if(!preg_match('/^[a-zA-Z0-9_-]{3,20}$/', trim($_POST["username"]))){
        $username_err="username içinde özel karakter bulundurulamaz";
    }
    else{
        $username=trim($_POST["username"]);
    $query="SELECT * FROM users where  username='$username'" ;
    $result=mysqli_query($baglanti,$query);
   
    if(mysqli_num_rows($result)>0){
        $username_err="bu kullanıcı adı daha önce kullanılmış";
    }
    else{
        
    }
   
      
    }

     if(mb_strlen(trim($_POST["email"]))>20){
        $email_err="email 20 karakterden fazla olamaz";
    }
    else if(empty(trim($_POST["email"]))){
        $email_err="email boş bırakılamaz";
    }
    else if(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
        $email_err = "Geçerli bir email adresi giriniz";
    }
    
    else{
        $email=trim($_POST["email"]);
        $queryemail="SELECT * FROM users where  email='$email'" ;
        $resultemail=mysqli_query($baglanti,$queryemail);
       
        if(mysqli_num_rows($resultemail)>0){
            $email_err="bu  email daha önce kullanılmış";
        }
        else{
         
        }
        
          
       
    }

    if(mb_strlen(trim($_POST["name"]))>20){
        $name_err="name 20 karakterden fazla olamaz";
    }
    else if(empty(trim($_POST["name"]))){
        $name_err="name boş bırakılamaz";
    }
    else{
        $name=trim($_POST["name"]);
    }

    if(mb_strlen(trim($_POST["password"]))>20){
        $password_err="password 20 karakterden fazla olamaz";
    }
    else if(empty(trim($_POST["password"]))){
        $password_err="password boş bırakılamaz";
    }
    else{
        $password=trim($_POST["password"]);
    }

   
   if(empty($username_err) and empty($email_err) and empty($name_err) and empty($password_err) ){
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $kontrol=true;
    if (empty($username) || empty($password) || empty($name) || empty($email) || empty($password)) {
        echo "<div class=\"alert alert-danger mb-0 mt-1\" role=\"alert\">
          zorunlu alanları doldurunuz
       </div>";
    } else {
      
        $query="INSERT INTO users(`username`, `name`,`email`, `pssword`) VALUES(?,?,?,?)";
        $result=mysqli_prepare($baglanti,$query);
        mysqli_stmt_bind_param($result,'ssss',$username,$name,$email,$password);
        mysqli_stmt_execute($result);
        if(mysqli_close($baglanti)){
             header("Location:login.php");
        }
        else{
            echo mysqli_error($baglanti);
        }
       
          
          
    }
   }
    
}

?>



<div class="contane m-3">
    <div class="row">

        <div class="col-lg-9">
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" value=" <?php  if(!empty($username)){echo $username;} else{} ?>" class="form-control <?php  if(!empty($username_err)){echo "is-invalid";} else{} ?>" id="username" aria-describedby="username">
                    <span style="color:red"><?php  if(!empty($username_err)){echo $username_err;} else{} ?></span> <br>


                </div>

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" value=" <?php  if(!empty($name)){echo $name;} else{} ?>" class="form-control <?php  if(!empty($name_err)){echo "is-invalid";} else{} ?>" id="name" aria-describedby="name">
                    <span style="color:red"><?php  if(!empty($name_err)){echo $name_err;} else{} ?></span> <br>

                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" value=" <?php  if(!empty($email)){echo $email;} else{} ?>" class="form-control <?php  if(!empty($email_err)){echo "is-invalid";} else{} ?>" id="email" aria-describedby="email">
                    <span style="color:red"><?php  if(!empty($email_err)){echo $email_err;} else{} ?></span> <br>

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password"  class="form-control <?php  if(!empty($password_err)){echo "is-invalid";} else{} ?>" id="password">
                    <span style="color:red"><?php  if(!empty($password_err)){echo $password_err;} else{} ?></span> <br>
                </div>

                <button type="submit" name="register" class="btn btn-primary">register</button>
            </form>
        </div>

    </div>
</div>
<?php require "index6_footer_kisim.php" ?>