<?php
include('include/connect.php');
include('function/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
.cart_img{
    width: 75px;
    height: 75px;
    object-fit:contain;
    }
    body{
            overflow-x:hidden;
            
        }
        .logo{
          width:50px;
          height:50px;
          margin:0%;
        }
          
        
        .keret{
            border:none;
           margin-top:4px;
        }    
        .keret2{
          border:solid 1px;
        }
       
    </style>
    
</head>
<body>
    <!--navbar -->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-color2">
   <img src="./images/logo.jpg" alt="logo" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" aria-current="page" href="index.php">Főoldal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display_all.php">Termékek</a>
      </li>
       
      <?php
       if(isset($_SESSION['username'])){
        echo"<li class='nav-item'>
        <a class='nav-link' href='./users_area/profile.php'>Profilom</a>
      </li>";
       }else{
        echo"<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_registration.php'>Regisztrálás</a>
      </li>";
       }
       
       ?>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Kontakt</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item();?></sup></a>
      </li>
     
    </ul>
  </div>
</nav>
<?php
cart();
?>

 <nav class="navbar navbar-eqpand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
   
      <?php

if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Üdvözöljük a weboldalunkon!</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Üdvözöljük, ".$_SESSION['username']."</a>
</li>";
}


      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Bejelentkezés</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Kijelentkezés</a>
      </li>";
      }
      
      ?>
    </ul>
 </nav>
<br>

 <div class="container">
    <div class="row">
        <table class="table table-bordered text-center">
            <form action="" method="post">
        
            
                <?php
                
                $ip = getIPAddress();
                $total=0;
                $cart_query="Select * from `cart_details` where ip_adress='$ip'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){

                  echo"
                  <thead>
                  <tr>
                      <th>Termék neve</th>
                      <th>Termék képe</th>
                      <th>Darabszám</th>
                      <th>Termék ára</th>
                      <th>Eltávolítás</th>
                      <th colspan='2'>Műveletek</th>
                  </tr>
              </thead>
              <tbody>
              ";
                
                while($row=mysqli_fetch_array($result)){
                    $termek_id=$row['termek_id'];
                    $select_products="Select * from `termekek` where termek_id='$termek_id'";
                    $result_products=mysqli_query($con,$select_products);
                    while($row_product_price=mysqli_fetch_array($result_products)){
                    $product_price=array($row_product_price['termek_ar']);
                    $price_table=$row_product_price['termek_ar'];
                    $termek_title=$row_product_price['termek_title'];
                    $product_image1=$row_product_price['product_image1'];
                    $product_values=array_sum($product_price);
                    $total+=$product_values;
                    
                    
                ?>
                <tr>
                    <td><?php echo $termek_title?></td>
                    <td><img src="./admin_area/termek_images/<?php echo $product_image1?>" id="" class="cart_img"></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                    <?php  $ip = getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="update `cart_details` set quantity='$quantities' where ip_adress='$ip'";
                        $result_products_quantity=mysqli_query($con,$update_cart);
                        $total=$total*$quantities;
                    }
                    ?>
                    <td><?php echo $price_table?> Ft</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $termek_id?>"></td>
                    <td>
                       <!-- <button class="bg-info px-3 border-0"> Update</button>-->
                       <input type="submit" value="Módosítás" class="btn btn-secondary px-3 border-0 mx-3" name="update_cart">
                       <!-- <button class="bg-secondary px-3 border-0 text-light">Remove</button>-->
                        <input type="submit" value="Törlés" class="btn btn-secondary px-3 border-0 mx-3" name="remove_cart">

                    </td>
                </tr>
                <?php
                    }
                }
            }
            else{
              echo "<h2 class='text-center text-danger'>A kosár üres.</h2>";
            }
                ?>
            </tbody>

        </table>
         
        <div class="d-flex">
          <?php 
          
          $ip = getIPAddress();
               
                $cart_query="Select * from `cart_details` where ip_adress='$ip'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                  echo " <h4 class='px-3'>Teljes összeg: <strong>$total Ft</strong></h4>
                  <input type='submit' value='Vásárlás folytatása' class='btn btn-success px-3 border-0 mx-2s' name='continue_shopping'>

                  </div>
              <div class='d-flex px-4'>
                 
                  <button class='btn btn-secondary px-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Tovább a fizetéshez</button>";
                }
                else{
                  echo"<input type='submit' value='Vásárlás folytatása' class='btn btn-secondary px-3 border-0 mx-3' name='continue_shopping'>

                  ";
                }

                if(isset($_POST['continue_shopping'])){
                  echo "<script>window.open('display_all.php','_self')</script>";
                }
          
          ?>
           
        </div>
    </div>
 </div>
 </form>
 
 <?php
 function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where termek_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }

 }

 echo $remove_item=remove_cart_item();
 
 
 ?>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>