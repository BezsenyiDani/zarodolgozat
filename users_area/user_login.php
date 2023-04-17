
<?php
include('../include/connect.php');
include('../function/common_function.php');
@session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-x:hidden;
        }
        
        .bg-color2{
    background-color:rgb(220,204,182);  
}
    </style>
</head>
<body class="bg-color2">

</body>
</html>

<div class="container-fluid m-3">
        <h2 class="text-center">  Bejelentkezés</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4 mt-5">
                        <label for="user_username" class="form-label">Felhasználónév</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Írja be a felhasználónevét!" autocomplete="off" require="required" name="user_username">
                    </div>
                  
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Jelszó</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Írja be a jelszavát!" autocomplete="off" require="required" name="user_password">
                    </div>
                    
                    <div class="mt-6">
                    <input type="submit" value="Bejelentkezés" class="btn btn-outline-dark" name="user_login">
                    <button class="keret bg-color2"><a href="../index.php" class="btn btn-secondary">Vissza a főoldalra</a></button>

                    </div>
                    <p class="small font-weight-bold mt-2 pt-1">Nincs még fiókod?<a href="user_registration.php" class="text-danger"> Regisztrálás</a></p>

                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    
    $select_query="Select * from `felhasznalok` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();


    $select_query_cart="Select * from `cart_details` where ip_adress='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);



    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            //echo "<script>alert('Sikeres bejelentkezés!')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Sikeres bejelentkezés!')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Sikeres bejelentkezés!')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Nem jó felhasználónév vagy jelszó!')</script>";
        }


    }else{
        echo "<script>alert('Nem jó felhasználónév vagy jelszó!')</script>";
    }

}



?>