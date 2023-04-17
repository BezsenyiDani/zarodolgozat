<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;
    $get_data="Select * from `termekek` where termek_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['termek_title'];
    //echo $product_title;
    $product_description=$row['termek_description'];
    $product_keywords=$row['termek_keywords'];
    $product_category=$row['category_id'];
    $product_event=$row['event_id'];
   // echo $product_event;
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['termek_ar'];
    
    $select_category="Select * from `kategoria` where category_id=$product_category";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
   // echo $category_title;



    $select_event="Select * from `esemenyek` where event_id=$product_event";
    $result_event=mysqli_query($con,$select_event);
    $row_event=mysqli_fetch_assoc($result_event);
    $event_title=$row_event['event_title'];
    //echo $event_title;
    
}


?>


<div class="container mt-5">
    <h1 class="text-center">Termék módosítása</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Termék Neve</label>
            <input type="text" id="product_title" value="<?php echo $product_title?>" name="product_title" class="form-control" required="required">
        </div>
        <br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Termék Leírása</label>
            <input type="text" id="product_description" value="<?php echo $product_description?>" name="product_description" class="form-control" required="required">
        </div>
        <br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Termék Kulcsszavai</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords?>" name="product_keywords" class="form-control" required="required">
        </div>
        <br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Termék Kategóriája</label>
            <br>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
                <?php
                
                $select_category_all="Select * from `kategoria`";
    $result_category_all=mysqli_query($con,$select_category_all);
    while($row_category_all=mysqli_fetch_assoc($result_category_all)){
        $category_title=$row_category_all['category_title'];
        $category_id=$row_category_all['category_id'];
        echo "<option value='$category_id'>$category_title</option>";
    };
   
                
                ?>
                
            </select>
        </div>
        <br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_events" class="form-label">Termék Eseménye</label>
            <br>
            <select name="product_events" class="form-select">
                <option value="<?php echo $event_title?>"><?php echo $event_title?></option>
                <?php
                
                $select_event_all="Select * from `esemenyek`";
    $result_event_all=mysqli_query($con,$select_event_all);
    while($row_event_all=mysqli_fetch_assoc($result_event_all)){
        $event_title=$row_event_all['event_title'];
        $event_id=$row_event_all['event_id'];
        echo "<option value='$event_id'>$event_title</option>";
    };
   
                
                ?>
            </select>
        </div>

        <br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Első kép</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="input-group" required="required">
            <img src="./termek_images/<?php echo $product_image1?>" alt="" class="product_img">

            </div>
        </div>
        <br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Második kép</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="input-group" required="required">
            <img src="./termek_images/<?php echo $product_image2?>" alt="" class="product_img">

            </div>
        </div>
        <br>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Harmadik kép</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="input-group" required="required">
            <img src="./termek_images/<?php echo $product_image3?>" alt="" class="product_img">

            </div>
        </div>
        <br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Termék Ára</label>
            <input type="text" id="product_price" value="<?php echo $product_price?>" name="product_price" class="form-control" required="required">
        </div>
        <br>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Termék módosítása" class="btn btn-outline-success px-3 mb-3">
        </div>
        
    </form>
</div>

<?php 

if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_events=$_POST['product_events'];
    $product_price=$_POST['product_price'];
    


    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_events==''
    or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_price==''){
       echo "<script>alert('Töltsd ki az összes mezőt!')</script>";
    }else{
        move_uploaded_file($temp_image1,"./termek_images/$product_image1");
        move_uploaded_file($temp_image2,"./termek_images/$product_image2");
        move_uploaded_file($temp_image3,"./termek_images/$product_image3");

        $update_product="update `termekek` set termek_title='$product_title',termek_description='$product_description',
        termek_keywords='$product_keywords',category_id='$product_category',event_id='$product_events',
        product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3'
        ,termek_ar='$product_price',datum=NOW() where termek_id=$edit_id";
        
        //echo $update_product;
        
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('A termék sikeresen frissítve lett.')</script>";
            echo "<script>window.open('./index.php','_self')</script>";

        }

    }
}

?>