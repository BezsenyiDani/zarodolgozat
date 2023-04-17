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
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .admin-image{
            width: 100px;
             object-fit: contain;
        }
        body{
            overflow-x:hidden;
            background-color:rgb(220,204,182);
        }
        .product_img{
            width:100px;
            object-fit:contain;
        }
        .logo2{
            width:20%;
            height:20%;
        }
        .logo{
    width:7%;
    height:7%;
}
         
        .bg-color{
            background-color:rgb(211,211,211);
        }
        .bg-color2{
            background-color:rgb(220,204,182);
        }
        .bg-color3{
            background-color:rgb(255,195,202);
        }
        .keret{
            border:none;
           margin-top:4px;
        }       
        .kozep{
            display:flex;
            justify-content:center;
            align-items:center;

        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-color2">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo keret">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class=nav-item>
                        <?php
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Bejelentkezve: ".$_SESSION['username']."</a>
                         </li>";
                        ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

  

    <div class="row">
        <div class="col-md-12 p-1 d-flex bg-color3 kozep">
           
            
            <div class="text-center">
                <button class="keret"><a href="termekhozzaadas.php" class="text-light btn btn-secondary">Termék hozzáadása</a></button>
                <button class="keret"><a href="index.php?view_products" class="text-light btn btn-secondary">Termékek megtekintése</a></button>
                <button class="keret"><a href="index.php?kategoriahozzaadas" class="text-light btn btn-secondary">Kategória hozzáadása</a></button>
                <button class="keret"><a href="index.php?view_categories" class="text-light btn btn-secondary">Kategóriák megtekintése</a></button>
                <!--<button><a href="index.php?alapanyagokhozzaadasa" class="nav-link text-light bg-info my-1">Alapanyagok hozzáadása</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">Alapanyagok megtekintése</a></button>-->
                <button class="keret"> <a href="index.php?esemenyhozzaadas" class="text-light btn btn-secondary">Esemény hozzáadása</a></button>
                <button class="keret"><a href="index.php?view_events" class="text-light btn btn-secondary">Események megtekintése</a></button>
                <button class="keret"><a href="index.php?list_orders" class="text-light btn btn-secondary">Rendelések</a></button>
                <button class="keret"><a href="index.php?list_users" class="text-light btn btn-secondary">Felhasználók</a></button>
                <button class="keret"><a href="logout2.php" class="text-light btn btn-secondary">Kijelentkezés</a></button>
            </div>
        </div>
    </div>


    <div class="container my-3">
        <?php
        if(isset($_GET['kategoriahozzaadas'])){
            include('kategoriahozzaadas.php');
        }
        if(isset($_GET['alapanyagokhozzaadasa'])){
            include('alapanyagokhozzaadasa.php');
        }
        if(isset($_GET['esemenyhozzaadas'])){
            include('esemenyhozzaadas.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_events'])){
            include('view_events.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_events'])){
            include('edit_events.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_events'])){
            include('delete_events.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['delete_orders'])){
            include('delete_orders.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        if(isset($_GET['delete_users'])){
            include('delete_users.php');
        }
        ?>
       
    </div>




    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>