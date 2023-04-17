<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
</head>
<body>
    <h1 class="text-center">Minden megtalálható termék</h1>
    <table class="table table-bordered">
        <thead class="table thead-dark">
            <tr>
                <th>Termék id-je</th>
                <th>Termék neve</th>
                <th>Termék kép</th>
                <th>Termék ár</th>
                <th>Összesen eladott</th>
                <th>Státusz</th>
                <th>Szerkesztés</th>
                <th>Törlés</th>
            </tr>

        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_products="Select * from `termekek`";
            $result=mysqli_query($con,$get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['termek_id'];
                $termek_title=$row['termek_title'];
                $product_image=$row['product_image1'];
                $termek_ar=$row['termek_ar'];
                $status=$row['status'];
                $number++;
                ?>
                <tr class='text-center'>
                <td> <?php echo $number;?></td>
                <td><?php echo $termek_title;?></td>
                <td><img src='./termek_images/<?php echo $product_image;?>' class='product_img'></td>
                <td><?php echo $termek_ar;?> Ft</td>
                <td><?php 
                $get_count="Select * from `orders_pending` where product_id=$product_id";
                $result_count=mysqli_query($con,$get_count);
                $rows_count=mysqli_num_rows($result_count);
                echo "$rows_count";
                ?></td>
                <td><?php echo $status;?></td>
                <td><a href='index.php?edit_products=<?php echo  $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></a></td>
                <td><a href='index.php?delete_product=<?php echo  $product_id?>' class='text-light'><i class='fa-solid fa-trash'></a></td>
                
            </tr>
            
            <?php
            }
            ?>

            

            
           
        </tbody>
    </table>
</body>
</html>