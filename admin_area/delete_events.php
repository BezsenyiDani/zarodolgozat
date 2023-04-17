<?php
if(isset($_GET['delete_events'])){
    $delete_events=$_GET['delete_events'];
    //echo "$delete_category";

    $delete_query="Delete from `esemenyek` where event_id=$delete_events";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Az esemény sikeresen törölve lett.')</script>";
        echo "<script>window.open('./index.php?view_events','_self')</script>";
        
    }
}

?>