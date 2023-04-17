<?php
include('../include/connect.php');
if(isset($_POST['termek_hozzaadas'])){
    $termek_title=$_POST['termek_title'];
    $termek_leiras=$_POST['termek_leiras'];
    $termek_kulcsszo=$_POST['termek_kulcsszo'];
    $termek_category=$_POST['termek_category'];
    $esemeny=$_POST['esemeny'];
    $termek_ar=$_POST['termek_ar'];
    $termek_status='true';

    // $termek_title=$_POST['termek_title'];


    $product_image1=$_FILES['product_image1']["name"];
    $product_image2=$_FILES['product_image2']["name"];
    $product_image3=$_FILES['product_image3']["name"];

    
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    if($termek_title=='' or $termek_leiras=='' or $termek_kulcsszo=='' or $termek_category=='' or $esemeny=='' or $termek_ar=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' ){
        echo "<script>alert('Kérem töltsön ki minden mezőt!')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./termek_images/$product_image1");
        move_uploaded_file($temp_image2,"./termek_images/$product_image2");
        move_uploaded_file($temp_image3,"./termek_images/$product_image3");

        $termek_hozzaadas="insert into `termekek` (termek_title,termek_description,termek_keywords,category_id,event_id,product_image1,product_image2,product_image3,termek_ar,datum,status)
        values ('$termek_title','$termek_leiras','$termek_kulcsszo','$termek_category','$esemeny','$product_image1','$product_image2','$product_image3','$termek_ar',NOW(),'$termek_status')";
        $result_query=mysqli_query($con,$termek_hozzaadas);
        if($result_query){
            echo"
            <div class='alert alert-success'>
            <strong>Sikeres hozzáadás!</strong> Az adott termék sikeresen hozzá lett adva a termékekhez.
          </div>";
        }
    }

   

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termékek hozzáaadása</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body{
            background-color:rgb(220,204,182);
        }
        .keret{
            border:none;
           
        }     
  </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-3">Termék hozzáadás</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="termek_title" class="form-label">Termék neve</label>
                <input type="text" name="termek_title" id="termek_title" class="form-control" placeholder="Írja be a termék nevét" autocomplete="off" required="required">
            </div>
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="termek_leiras" class="form-label">Termék Leírása</label>
                <input type="text" name="termek_leiras" id="termek_leiras" class="form-control" placeholder="Írja be a termék leírását" autocomplete="off" required="required">
            </div>
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="termek_kulcsszo" class="form-label">Termék Kulcsszava</label>
                <input type="text" name="termek_kulcsszo" id="termek_kulcsszo" class="form-control" placeholder="Írja be a termék kulcsszavát" autocomplete="off" required="required">
            </div>
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <select  class="custom-select" name="termek_category" id="">
                    <option value="">Kategória kiválasztása</option>
                    <?php
                    $select_query="Select * from `kategoria`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }

                    ?>

                  
                    
                    
                </select>
            </div>
            <br>


            <div class="form-outline mb-4 w-50 m-auto">
                <select name="esemeny" id="" class="custom-select">
                <option value="">Esemény kiválasztása</option>
                <?php
                    $select_query="Select * from `esemenyek`";
                    $result_query=mysqli_query($con,$select_query);
                    
                    while($row=mysqli_fetch_assoc($result_query)){
                        $event_title=$row['event_title'];
                        $event_id=$row['event_id'];
                        echo "<option value='$event_id'>$event_title</option>";
                    }

                    ?>
                    
                    
                </select>
            </div>
            <br>


            <!--<div class="form-outline mb-4 w-50 m-auto">
                <select name="termek_categories" id="" class="custom-select">
                    <option value="">Alapanyag(ok) kiválasztása</option>
                    <option value="">Kategória1</option>
                    <option value="">Kategória kiválasztása</option>
                    <option value="">Kategória kiválasztása</option>
                   
                    
                </select>
            </div>-->
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Termék kép 1 (Főkép)</label>
                <input type="file" name="product_image1" id="product_image1" class="input-group" required="required">
            </div>
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Termék kép 2</label>
                <input type="file" name="product_image2" id="product_image2" class="input-group" required="required">
            </div>
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Termék kép 3</label>
                <input type="file" name="product_image3" id="product_image3" class="input-group" required="required">
            </div>
            <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="termek_ar" class="form-label">Termék Ára</label>
                <input type="text" name="termek_ar" id="termek_ar" class="form-control" placeholder="Írja be a termék árát" autocomplete="off" required="required">
            </div>
            <br>


            <div class="form-outline mb-4 w-50 m-auto">
              <input type="submit" name="termek_hozzaadas" class="btn btn-outline-dark" value="Termék hozzáadás">
              <button class="keret"><a href="index.php" class="btn btn-secondary">Vissza az admin oldalra</a></button>
            </div>
            
            <!--
            <div class="form-outline mb-4 w-50 m-auto">
              <input href="http://localhost/BD/z%C3%A1r%C3%B3/admin_area/" type="button" name="adminoldal" class="btn btn-info mb-3 px-3" value="Vissza az admin oldalra">
            </div>-->

        </form>
    </div>
</body>
</html>