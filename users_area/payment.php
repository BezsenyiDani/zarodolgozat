<?php
include('../include/connect.php');
include('../function/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Webshop</title>
    <style>
        .container-keret{
            border-radius:25px;
          
            border: 2px solid black;
            padding: 20px;
             width: 500px;
            height: 350px;
        }
    </style>

<body class="bg-color2">
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from `felhasznalok` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
 
    
    ?>
        <br>
        <br>
         <div class="container text-center container-keret">
            <h2>Mielött a rendelésed rögzítenénk, tudd hogy személyre szabott díszeket is készítünk és ha ilyet szeretnél, kattints az egyedi díszek gombra.</h2>
          <br>
            <button class="btn btn-outline-success"><a href="order.php?user_id=<?php echo $user_id?>" class="text-decoration-none text-dark">Rendelés rögzítése</a></button>
          <button class="btn btn-outline-secondary"><a href="../contact.php" class="text-decoration-none text-dark">Egyedi díszek</a></button> 
        </div>
        </div>
    </div>
</body>
</html>