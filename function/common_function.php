<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body{
            overflow-x:hidden;
            background-color:rgb(220,204,182);
        }
        .logo{
          width:4%;
          height:4%;
          margin:0%;
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
        .keret2{
          text-decoration:underline;
        }
        .keret3{
            border:1px solid black;
        }
        .container-keret{
            border-radius:25px;
          
            border: 2px solid black;
            padding: 20px;
             width: 850px;
            height: 350px;
        }

        
    </style>
</head>
<body>
    
</body>
</html>

<?php
//include('./include/connect.php');

function getproducts(){
    global $con;

    if(!isset($_GET['kategoria'])){
        if(!isset($_GET['esemeny'])){

       

    $select_query="Select * from `termekek`";
    $result_query=mysqli_query($con,$select_query);
   // $row=mysqli_fetch_assoc($result_query);
   // echo $row['termek_title'];
    while($row=mysqli_fetch_assoc($result_query)){
     $termek_id=$row['termek_id'];
     $termek_title=$row['termek_title'];
     $termek_description=$row['termek_description'];
     $product_image1=$row['product_image1'];
     $termek_ar=$row['termek_ar'];
     $category_id=$row['category_id'];
     $event_id=$row['event_id'];

     echo "<div class='col-md-4 mb-2'>
     <div class='card'>
        <img src='./admin_area/termek_images/$product_image1' class='card-img-top' alt='$termek_title'>
         <div class='card-body'>
        <h5 class='card-title'>$termek_title</h5>
        <p class='card-text'>Ára: $termek_ar Ft</p>
        <a href='index.php?add_to_cart=$termek_id' class='btn btn-outline-success'>Hozzáadás a kosárhoz</a>
        <a href='product_details.php?termek_id=$termek_id' class='btn btn-secondary'>Adatok</a>
       </div>
     </div>  
  </div>";
    }
}
}
}

function getuniquecategories(){
    global $con;

    if(isset($_GET['category'])){
        $category_id=$_GET['category'];

       

    $select_query="Select * from `termekek` where category_id='$category_id'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "
        <script>
            document.getElementById('pd-con').innerHTML = ``;
        </script>
        ";
        echo "<h2 class='text-center'>Nincs termék ehhez a kategóriához</h2>";
    }else{
        while($row=mysqli_fetch_assoc($result_query)){
            $termek_id=$row['termek_id'];
            $termek_title=$row['termek_title'];
            $termek_description=$row['termek_description'];
            $product_image1=$row['product_image1'];
            $termek_ar=$row['termek_ar'];
            $category_id=$row['category_id'];
            $event_id=$row['event_id'];
       
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
               <img src='./admin_area/termek_images/$product_image1' class='card-img-top' alt='$termek_title'>
                <div class='card-body'>
               <h5 class='card-title'>$termek_title</h5>
             
               <p class='card-text'>Ára: $termek_ar Ft</p>
               <a href='index.php?add_to_cart=$termek_id' class='btn btn-outline-success'>Hozzáadás a kosárhoz</a>
               <a href='product_details.php?termek_id=$termek_id' class='btn btn-secondary'>Adatok</a>
              </div>
            </div>  
         </div>";
           }
    }
   // $row=mysqli_fetch_assoc($result_query);
   // echo $row['termek_title'];
    
}
}

function getuniqueevent(){
    global $con;

    if(isset($_GET['event'])){
        $event_id=$_GET['event'];

    $select_query="Select * from `termekek` where event_id='$event_id'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "
        <script>
            document.getElementById('pd-con').innerHTML = ``;
        </script>
        ";
        echo "<h2 class='text-center'>Nincs termék ehhez a kategóriához</h2>";
    } else {
            while($row=mysqli_fetch_assoc($result_query)){
         $termek_id=$row['termek_id'];
         $termek_title=$row['termek_title'];
         $termek_description=$row['termek_description'];
         $product_image1=$row['product_image1'];
         $termek_ar=$row['termek_ar'];
         $category_id=$row['category_id'];
         $event_id=$row['event_id'];
     
         echo "<div class='col-md-4 mb-2'>
            <div class='card'>
               <img src='./admin_area/termek_images/$product_image1' class='card-img-top' alt='$termek_title'>
                <div class='card-body'>
               <h5 class='card-title'>$termek_title</h5>
               
               <p class='card-text'>Ára: $termek_ar Ft</p>
               <a href='index.php?add_to_cart=$termek_id' class='btn btn-outline-success'>Hozzáadás a kosárhoz</a>
               <a href='product_details.php?termek_id=$termek_id' class='btn btn-secondary'>Adatok</a>
              </div>
            </div>  
         </div>";
        }
    }
   // $row=mysqli_fetch_assoc($result_query);
   // echo $row['termek_title'];
}
}





function getcategories(){
    global $con;
    $select_category="Select * from `kategoria`";
    $result_category=mysqli_query($con,$select_category);
   // echo $row_data['category_title'];
   while($row_data=mysqli_fetch_assoc($result_category)){
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];
    echo "  <li class='nav-item'>
    <a href='display_all.php?category=$category_id' class='nav-link text-dark'>$category_title</a>
</li>";
   }
}

function getesemenyek(){
    global $con;
    $select_event="Select * from `esemenyek`";
    $result_event=mysqli_query($con,$select_event);
   // echo $row_data['category_title'];
   while($row_data=mysqli_fetch_assoc($result_event)){
    $event_title=$row_data['event_title'];
    $event_id=$row_data['event_id'];
    echo "  <li class='nav-item'>
    <a href='display_all.php?event=$event_id' class='nav-link text-dark'>$event_title</a>
</li>";
   }
}

function search_product(){

        global $con;
        if(isset($_GET['search_data_product'])){
             $search_data_value=$_GET['search_data'];
       
        $search_query="Select * from `termekek` where termek_keywords like '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center'>Nincs termék a keresett elemhez.</h2>";
        }
       // $row=mysqli_fetch_assoc($result_query);
       // echo $row['termek_title'];
        while($row=mysqli_fetch_assoc($result_query)){
         $termek_id=$row['termek_id'];
         $termek_title=$row['termek_title'];
         $termek_description=$row['termek_description'];
         $product_image1=$row['product_image1'];
         $termek_ar=$row['termek_ar'];
         $category_id=$row['category_id'];
         $event_id=$row['event_id'];
    
         echo "<div class='col-md-4 mb-2'>
         <div class='card'>
            <img src='./admin_area/termek_images/$product_image1' class='card-img-top' alt='$termek_title'>
             <div class='card-body'>
            <h5 class='card-title'>$termek_title</h5>
            <p class='card-text'>Ára: $termek_ar Ft</p>
            <a href='index.php?add_to_cart=$termek_id' class='btn btn-outline-success'>Hozzáadás a kosárhoz</a>
            <a href='product_details.php?termek_id=$termek_id' class='btn btn-secondary'>Adatok</a>
            </div>
         </div>  
      </div>";
        }
    }
 
}
 

function view_details(){
    global $con;

    if(isset($_GET['termek_id'])){
    if(!isset($_GET['kategoria'])){
        if(!isset($_GET['esemeny'])){
            $termek_id=$_GET['termek_id'];
       

    $select_query="Select * from `termekek` where termek_id=$termek_id";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
     $termek_id=$row['termek_id'];
     $termek_title=$row['termek_title'];
     $termek_description=$row['termek_description'];
     $product_image1=$row['product_image1'];
     $product_image2=$row['product_image2'];
     $product_image3=$row['product_image3'];
     $termek_ar=$row['termek_ar'];
     $category_id=$row['category_id'];
     $event_id=$row['event_id'];

     echo "
     <div class='col-md-4 mb-2 my-3'>
     <div class='card'>
        <img src='./admin_area/termek_images/$product_image1' class='card-img-top' alt='$termek_title'>
         <div class='card-body'>
        <h5 class='card-title'>$termek_title</h5>
       
        <p class='card-text'>Ára: $termek_ar Ft</p>
        <a href='index.php?add_to_cart=$termek_id' class='btn btn-outline-success'>Hozzáadás a kosárhoz</a>
        <a href='display_all.php' class='btn btn-secondary'>Vissza a termékekhez</a>
        
       </div>
     </div>  
  </div>

  <div class='col-md-8'>
  <div class='row container-keret my-3'>
      <div class='col-md-12'>
          <h4 class='text-center mb-5'>
              Több kép a termékről:
          </h4>
      </div>
      <div class='col-md-6'>
      <img src='./admin_area/termek_images/$product_image2' class='card-img-top' alt='$termek_title'>
      </div>
      <div class='col-md-6'>
      <img src='./admin_area/termek_images/$product_image3' class='card-img-top' alt='$termek_title'>
      </div>
  </div>
  
  </div class=''>
<div class='container col-md-6'>
<h4 class=''>A(z) $termek_title:<br>
  $termek_description</h4>
</div>
  
  ";
    }
}
}
    }
}

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;



function cart(){
if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress(); 
    $get_termek_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_adress='$ip' and termek_id='$get_termek_id'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
        echo "<script>alert('Ez a termék már szerepel a kosárban.')</script>";
        echo "<script>window.open('display_all.php','_self')</script>";
    }else{
        $insert_query="insert into `cart_details` (termek_id,ip_adress,quantity) values('$get_termek_id','$ip',0)";
        $result_query=mysqli_query($con,$insert_query);
        echo "<script>alert('A termék hozzá lett adva a kosárhoz.')</script>";
        echo "<script>window.open('display_all.php','_self')</script>";
       

    }
}
}


function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress(); 
        
        $select_query="Select * from `cart_details` where ip_adress='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $con;
        $ip = getIPAddress(); 
        
        $select_query="Select * from `cart_details` where ip_adress='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }
  


function total_cart_price(){
    global $con;
    $ip = getIPAddress();
    $total=0;
    $cart_query="Select * from `cart_details` where ip_adress='$ip'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $termek_id=$row['termek_id'];
        $select_products="Select * from `termekek` where termek_id='$termek_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['termek_ar']);
        $product_values=array_sum($product_price);
        $total+=$product_values;
        }

    }
    echo  $total;
}



function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="Select * from `felhasznalok` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center mt-5 mb-2'>Összesen <span class='text-danger'>$row_count</span> függőben lévő rendelésed van.</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Rendelés(ek) részletei</a></p>";
                    }else{
                        echo "<h3 class='text-center mt-5 mb-2'>Összesen 0 függőben lévő rendelésed van.</h3>
                        <p class='text-center'><a href='../display_all.php' class='text-dark'>Vissza a termékekhez</a></p>";
                    }
                }
            }
        }
    }
}


?>