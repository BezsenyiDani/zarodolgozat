<?php
include('../include/connect.php');
include('../function/common_function.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználó regisztrálása</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
         body{
            overflow-x:hidden;
            
        }
        .logo{
          width:50px;
          height:50px;
          margin:0%;
        }
          
        
        .keret{
            border:none;
           
        }  

.bg-color2{
    background-color:rgb(220,204,182);  
}
    </style>
</head>
<body class="bg-color2">
    <div class="container-fluid m-3">
        <h2 class="text-center">  Új felhasználó regisztrálása</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Felhasználónév</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Írja be a felhasználónevét!" autocomplete="off" require="required" name="user_username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email-cím</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Írja be az Email-címét!" autocomplete="off" require="required" name="user_email">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Felhasználói kép</label>
                        <input type="file" id="user_image" class="input-group"  name="user_image">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Jelszó</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Írja be a jelszavát!" autocomplete="off" require="required" name="user_password">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Jelszó megerősítése</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Jelszó megerősítése!" autocomplete="off" require="required" name="conf_user_password">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Rendelés cím</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Írja be a rendelés címét!" autocomplete="off" require="required" name="user_address">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_mobile" class="form-label">Telefonszám</label>
                        <input type="text" id="user_mobile" class="form-control" placeholder="Írja be a telefonszámát!" autocomplete="off" require="required" name="user_mobile">
                    </div>

                    <div class="form-outline mt-6">
                        <input type="submit" value="Regisztrálás" class="btn btn-outline-dark" name="user_register">
                        <button class="keret bg-color2"><a href="../index.php" class="btn btn-secondary">Vissza a főoldalra</a></button>
                    </div>
                    
                    <p class="small font-weight-bold mt-2 pt-1">Van már felhasználói fiókod?<a href="user_login.php" class="text-danger"> Bejelentkezés</a></p>

                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

   

    $select_query="Select * from `felhasznalok` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('A felhasználónév már foglalt.')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('A jelszavak eltérnek egymástól.')</script>";

    }else{
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $insert_query="insert into `felhasznalok` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
        values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_mobile')";
        $sql_execute=mysqli_query($con,$insert_query);
        echo "<script>alert('Sikeres regisztráció')</script>";
     
    }

    $select_cart_items="Select * from `cart_details` where ip_adress='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('Találhatók termékek a kosaradban')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
 
}


?>