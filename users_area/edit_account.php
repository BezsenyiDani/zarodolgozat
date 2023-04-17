<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="Select * from `felhasznalok` where username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    //$user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}
    if(isset($_POST['user_update'])){

        $update_id=$user_id;
        $username=$_POST['user_username'];
        //$user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        //$user_image=$_FILES['user_image']['name'];
        //$user_image_tmp=$_FILES['user_image']['tmp_name'];
        //move_uploaded_file($user_image_tmp,"./user_images/$user_image");

        $update_data="Update `felhasznalok` set 
        username='$username',user_address='$user_address',user_mobile='$user_mobile' 
        where user_id=$update_id";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script>alert('Az adatok sikeresen módosítva lettek.')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop
    </title>
    <style>
              .container-keret3{
            border-radius:25px;
          
            border: 2px solid black;
            padding: 20px;
             width: 750px;
            height: 500px;
        }

    </style>
</head>
<body>
    <div class="container container-keret3">
    <h2 class="text-center text-dark mb-4 mt-5">Profil szerkesztése</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <p class="w-50 m-auto">Jelenlegi felhasználónév</p>
            <input type="text" class="form-control w-50 m-auto" value="<?php echo "$username"?>"name="user_username">
        </div>
        <!--<div class="form-outline mb-4 d-flex" >
        
            <input type="file" class="form-control  w-50 m-auto" name="user_image">
            <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_img">
        </div>-->
        <div class="form-outline mb-4">
            <p class="w-50 m-auto">Jelenlegi cím</p>
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo "$user_address"?>">
        </div>
        <div class="form-outline mb-4">
            <p class="w-50 m-auto">Jelenlegi telefonszám</p>
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo "$user_mobile"?>">
        </div>
        <div class="container text-center">
        <input type="submit" value="Frissít" class="btn btn-outline-dark" name="user_update">
        </div>
       
    </form>

    </div>
</body>
</html>