<?php
if(isset($_GET['delete_users'])){
    $delete_id=$_GET['delete_users'];
    //echo "$delete_id";



    $delete_users = "Delete from `felhasznalok` where user_id=$delete_id";
    $result_users=mysqli_query($con,$delete_users);
    if($result_users){
        echo "<script>alert('A felhasználó sikeresen törölve lett.')</script>";
        echo "<script>window.open('./index.php','_self')</script>";

    }
    
}


?>