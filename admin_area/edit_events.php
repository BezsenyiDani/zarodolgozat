<?php
if(isset($_GET['edit_events'])){
    $edit_event=$_GET['edit_events'];
   //echo $edit_event;

    $get_events="Select * from `esemenyek` where event_id='$edit_event'";
    $result=mysqli_query($con,$get_events);
    $row=mysqli_fetch_assoc($result);
    $event_title=$row['event_title'];
   // echo "$event_title";
    
}
if(isset($_POST['edit_event'])){
    $event_title=$_POST['event_title'];
    $update_query="update `esemenyek` set event_title='$event_title' where event_id=$edit_event";
    $result_event=mysqli_query($con,$update_query);
    if($result_event){
        echo "<script>alert('Az esemény sikeresen módosítva lett.')</script>";
        echo "<script>window.open('./index.php?view_events','_self')</script>";
        
    }

}

?>




<div class="container mt-5">
    <h1 class="text-center">
        Esemény Módosítása
    </h1>
    <br>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="event_title" class="form-label">Esemény neve</label>
            <input type="text" name="event_title" id="event_title" class="form-control" required="required" value="<?php echo $event_title?>">
        </div>
        <br>
        <input type="submit" value="Módosítás" class="btn btn-info px-3 mb-3 align-center" name="edit_event">
    </form>
</div>