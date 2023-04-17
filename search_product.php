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
       
        .container-keret{
            border-radius:25px;
          
            border: 2px solid black;
            padding: 20px;
             width: 1000px;
            height: 550px;
        }
        .behuz{
        margin:0%;
       }
       .logo2{
          width:150px;
          height:150px;
          margin:0%;
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
        <a class="nav-link" aria-current="page" href="index.html">Főoldal</a>
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
      <li class="nav-item">
        <a class="nav-link" href="#">Teljes összeg:<?php total_cart_price();?> Ft</a>
      </li>
    </ul>
    <form class="d-flex" action="search_product.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      <!--<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>-->
      <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
    </form>
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
 
 <div class="text-center">
  <h2>A keresésre a találatok az alábbi termékek</h2>
 </div>
 <div class="row">
    <div class="col md-10">
    <!-- Termékek-->
        <div class="row">
        <?php
        //getproducts();
        search_product();
        getuniquecategories();
         
         ?>
           <!-- <div class="col-md-4 mb-2">
              <div class="card">
                 <img src="./images/banan.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                 <h5 class="card-title">Card title</h5>
                 <p class="card-text">Leírás</p>
                 <a href="#" class="btn btn-primary">Hozzáadás a kosárhoz</a>
                 <a href="#" class="btn btn-secondary">Adatok</a>
                </div>
              </div>  
           </div>
        -->

<!--row end-->
     </div>
     <!--col end-->
    </div>
    <div class="col-md-2 container-keret p-0">
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item">
              <h4>Kategóriák</h4>
            </li>
        
            <?php
           getcategories();
            ?>
       
        </ul>


        <ul class="navbar-nav me-auto text-center">
        <li class="nav-item ">
                ><h4>Események</h4>
            </li>
        
            <?php
           getesemenyek();
            ?>
        </ul>

        <!--<ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
                <a href="" class="nav-link"><h4>Alapanyagok</h4></a>
            </li>
        
            <?php
           /* $select_alapanyag="Select * from `alapanyag`";
            $result_alapanyag=mysqli_query($con,$select_alapanyag);
           // echo $row_data['category_title'];
           while($row_data=mysqli_fetch_assoc($result_alapanyag)){
            $alapanyag_title=$row_data['alapanyag_title'];
            $alapanyag_id=$row_data['alapanyag_id'];
            echo "  <li class='nav-item'>
            <a href='index.php?alapanyag=$alapanyag_id' class='nav-link text-light'>$alapanyag_title</a>
        </li>";
           }*/
            ?>

            
        </ul>-->
    </div>
    
</div>
<div class="row col-md-12 bg-color2 text-center align-items-center behuz">
      <div class="col-md-4">
      <i class="fa fa-phone"></i>
          <span> +36/30 1322 4131</span>
          <br>
          <br>
          <i class="far fa-envelope"></i>
          <span>bezsem@gmail.com</span>

      </div>
      <div class="col-md-4">
      <img src="./images/logo.jpg" alt="logo" class="logo2">
      </div>
      <div class="col-md-4">
      <i class="fab fa-facebook"></i>
      <span>facebook.hu/emkehomedekor</span>
      <br>
      <br>
      <i class="fab fa-instagram"></i>
      <span>instagram.hu/emkehomedekor</span>
      </div>
    </div>
<div class="bg-color2 text-center behuz">
  <br>
  <p>Emke home & dekor | A weboldalt készítette:Bezsenyi Dániel</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>