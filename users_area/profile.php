<?php
include('../include/connect.php');
include('../function/common_function.php');
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
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x:hidden;
        }
        .logo{
          width:35px;
          height:35px;
        }
        .profile_img{
    width: 75%;
    height: 75%;
    margin:auto;
    display:block;
}
.edit_image{
    width:100px;
    height:100px;
}

.container-keret{
            border-radius:25px;
          
            border: 2px solid black;
            padding: 20px;
             width: 1000px;
            height: 300px;
        }

    </style>
</head>
<body class="bg-color2">
    <!--navbar -->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-color2">
    <img src="../images/logo.jpg" alt="logo" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" aria-current="page" href="../index.php">Főoldal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../display_all.php">Termékek</a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Fiókom</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../contact.php">Kontakt</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item();?></sup></a>
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

      
      ?>
    
    </ul>
 </nav>
 <br>

 <div class="row">
    <div class="col-md-2 p-0 container-keret mx-4">
      <ul class="navbar-nav text-center">
      <br>
      <li class="nav-item">
        <h4 class="text-dark text-center">Fiókod</h4>
      </li>


      <?php
      /*  $username=$_SESSION['username'];
        $user_image="Select * from `felhasznalok` where username='$username'";*/
        /*$user_image=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($user_image);
        $user_image=$row_image['user_image'];
        echo "   <li class='nav-item'>
        <img src='./user_images/$user_image' class='profile_img my-4'>
       </li>";*/


      ?>

      <li class="nav-item">
        <a class="nav-link text-dark text-center " href="profile.php">Függőben Lévő Rendelések</a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link text-dark text-center" href="profile.php?edit_account">Profil Szerkesztése</a>
      </li>
     
      
      <li class="nav-item">
        <a class="nav-link text-dark text-center" href="profile.php?my_orders">Rendeléseim</a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link text-dark text-center" href="profile.php?delete_account">Profil Törlése</a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link text-dark text-center" href="logout.php">Kijelentkezés</a>
      </li>
    </ul>

    </div>
    <div class="col-md-9">
        <?php
        get_user_order_details();
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
          include('user_orders.php');
      }
      if(isset($_GET['delete_account'])){
        include('delete_account.php');
    }

        ?>
    </div>
 </div>
 

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>