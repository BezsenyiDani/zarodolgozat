
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
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow:hidden;
            background-color:rgb(220,204,182);
        }
        .keret{
            border:none;
           margin-top:4px;
        }     
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Bejelentkezés</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/logo.jpg" alt="Admin Login Kép" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Felhasználónév</label>
                        <input type="text" id="username" name="username" placeholder="Írd be a felhasználóneved." required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Jelszó</label>
                        <input type="password" id="password" name="password" placeholder="Írd be a jelszavad." required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-outline-dark" name="admin_login" value="Bejelentkezés">
                        <button class="keret"><a href="../index.php" class="btn btn-secondary">Vissza a vásárlói oldalra</a></button>
                        <p class="small font-weight-bold mt-2 pt-1">Nem rendelkezel még admin fiókkal? <a href="admin_registration.php" class="text-danger">Regisztrálás</a></p>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>


<?php
if(isset($_POST['admin_login'])){
    $admin_username=$_POST['username'];
    $admin_password=$_POST['password'];
    
    $select_query="Select * from `admin_table` where admin_name='$admin_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    if($row_count>0){
        $_SESSION['username']=$admin_username;
        //echo "$admin_username";
        if(password_verify($admin_password,$row_data['admin_password'])){
            echo "<script>alert('Sikeres bejelentkezés!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
           
        }else{
            echo "<script>alert('Sikertelen bejelentkezés!')</script>";
        }
 

    }
}



?>