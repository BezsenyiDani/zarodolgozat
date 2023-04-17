<?php
include('./include/connect.php');
include('./function/common_function.php');
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
            height: 600px;
            margin:0%;
        }
        .logo2{
          width:150px;
          height:150px;
          margin:0%;
        }
   
       .kepek{
        width:200px;
        height:200px;
        margin:0%;
       }
       .conatiner-size{
        width:100%;
        height:10%;
       }
       .behuz{
        margin:0%;
       }
       .logo3{
        width:500px;
          height:500px;
          margin-top:5%;
          margin-left:25%;
          
       }
 
      
    </style>
</head>
<body>
    <!--navbar -->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-color2 text-secondary">
  <a class="navbar-brand"><img src="./images/logo.jpg" alt="logo" class="logo"></a>
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
        <a class="nav-link" href="#">Kontakt</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item();?></sup></a>
      </li>
     
    </ul>
    <form class="d-flex" action="search_product.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      <!--<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>-->
      <input type="submit" value="Search" class="btn btn-outline-secondary" name="search_data_product">
    </form>
  </div>
</nav>
<?php
cart();
?>

 <div>
    <h3 class="text-center">Emke home & dekor</h3>
    
 </div>

      <div class="row col-md-12">
        <div class="my-3 col-md-6 container-keret">
        <h3> Ha egyedi termékeket szeretnél kérni vagy esetleg nagyobb rendezvény díszletének megrendezésére kérlek keress fel E-mail-ben.</h3>
        <br>
        <h3>Az Email-cím amin tudunk egyeztetni: bezsem@gmail.com</h3>
        <br>
        <h3>Máshol nem fogadok megrendelést csak Email-ben.</h3>
        <br>
        <h3>A rendezvény nagyságától függően vannak idő határok, Például: 10 díszt szeretnél minimum egy héttel előtte meg kell rendeld.</h3>
        <br>
        <h3> Köszönöm ha engem választasz és további szép napot kívánok!
        </h3>
        <br>
        <h5 class="text-center">Üdvözlettel: Emke home & dekor</h5>
        </div>
         <div class="col-md-6">
            <img src="./images/logo.jpg" alt="asd" class="logo3">
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