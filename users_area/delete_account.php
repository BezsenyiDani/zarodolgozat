<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
</head>
<body>
    <br>
    <h3 class="text-center text-danger mb-4">Felhasználó fiók törlése</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline text-center">
            <input type="submit" class="btn btn-outline-danger form-control w-50 m-auto" name="delete" value="Felhasználó törlése">
        </div>
        <br>
        <div class="form-outline text-center">
            <input type="submit" class="btn btn-outline-success form-control w-50 m-auto" name="dont_delete" value="Ne töröljük a felhasználói fiókot">
        </div>
    </form>
    <?php
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="Delete from `felhasznalok` where username='$username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Felhasználó törölve')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";

    }
    ?>
    
</body>
</html>

