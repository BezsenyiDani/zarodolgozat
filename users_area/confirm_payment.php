<?php
include('../include/connect.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    //echo $order_id;
    $select_data="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];

}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode) 
    values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<h3 class='text-center text-light'>Sikeres fizetés</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='Készítjük' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
<style>
.bg-color{
    background-color:rgb(211,211,211);
}
.bg-color2{
    background-color:rgb(220,204,182);
}
.bg-color3{
    background-color:rgb(255,195,202);
}

</style>
</head>
<body class="bg-color2">
    
    <div class="container my-5">
    <h1 class="text-center text-dark">Fizetés megerősítése</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="text-dark">Rendelés azonosító:</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number?>">
            </div>
            <br>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-dark">Végösszeg:</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due?>">
            </div>
            <br>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-control w-50 m-auto mt-5">
                <option value="">Válassza ki a fizetési módot</option>
                <option value="">Internetbankon keresztül</option>
                <option value="">Utánvéttel</option>
                <option value="">Paypal utalás</option>
            </select>
            </div>
            <br>
            <div class="form-outline my-4 text-center w-50 m-auto">
                
                <input type="submit" class="btn btn-outline-success py-2 px-3" value="Jóváhagyás" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>