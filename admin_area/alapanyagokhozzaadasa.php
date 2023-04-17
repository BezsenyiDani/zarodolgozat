<?php
include('../include/connect.php');

if(isset($_POST['insert_alapanyag'])){
    $alapanyag_title=$_POST['alapanyag_title'];

    $select_query="Select * from `alapanyag` where alapanyag_title='$alapanyag_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('Ez az alapanyag már hozzá lett adva.')</script>";
    }else{
        $insert_query="insert into `alapanyag` (alapanyag_title) values ('$alapanyag_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Az adott alapanyag sikeresen hozzá lett adva.')</script>";
        }
    }
    
}
?>

<h2 class="text-center">Alapanyagok Hozzáadása</h2>

<form action="" method="post" class="mb-2">

       
        <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="alapanyag_title" placeholder="Alapanyag neve" 
        aria-label="alapanyag" aria-describedby="basic-addon1">
        </div>
     
        <div class="input-group w-10 mb-2 m-auto">
       <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_alapanyag" value="Alapanyag Hozzáadás"
         placeholder="Alapanyag hozzáadás">
      
        </div>
     
</form>