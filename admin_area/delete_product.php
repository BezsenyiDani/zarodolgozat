<?php
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    //echo "$delete_id";



    $delete_product = "Delete from `termekek` where termek_id=".$delete_id;
    $result_product=mysqli_query($con,$delete_product);
    if($result_product){
        echo "<script>alert('A termék sikeresen törölve lett.')</script>";
        echo "<script>window.open('./index.php','_self')</script>";

    }
    
}


?>