<?php
if(isset($_GET['delete_orders'])){
    $delete_id=$_GET['delete_orders'];
    //echo "$delete_id";



    $delete_orders = "Delete from `user_orders` where order_id=$delete_id";
    $result_orders=mysqli_query($con,$delete_orders);
    if($result_orders){
        echo "<script>alert('A rendelés sikeresen törölve lett.')</script>";
        echo "<script>window.open('./index.php','_self')</script>";

    }
    
}


?>