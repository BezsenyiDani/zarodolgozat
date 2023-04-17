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
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow:hidden;
            background-color:rgb(220,204,182);
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Regisztráció</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/logo.jpg" alt="Admin Regisztárciós kép" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Felhasználónév</label>
                        <input type="text" id="admin_name" name="admin_name" placeholder="Írd be a felhasználóneved." required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" id="admin_email" name="admin_email" placeholder="Írd be az email címed." required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Jelszó</label>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Írd be a jelszavad." required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Jelszó Megerősítése</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Jelszó megerősítése" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-outline-dark" name="admin_registration" value="Regisztrálás">
                        <p class="small font-weight-bold mt-2 pt-1">Rendelkezel már admin fiókkal? <a href="admin_login.php" class="text-danger">Bejelentkezés</a></p>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
   //echo "$admin_name,$admin_email,$admin_password";
   

    $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('A felhasználónév már foglalt.')</script>";
    }
    else{
        
        $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) 
        values('$admin_name','$admin_email','$hash_password')";
        $sql_execute=mysqli_query($con,$insert_query);
        echo "<script>alert('Sikeres regisztráció')</script>";
     
    }

  
}


?>