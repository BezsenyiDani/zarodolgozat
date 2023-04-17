<h1 class="text-center">Az összes rendelés:</h1>
<br>
<table class="table table-bordered">
    <thead class="table thead-dark">
        <?php
        $get_orders="Select * from `user_orders`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);
        echo "  <tr>
        <th>ID</th>
        <th>Összeg</th>
        <th>Számlázási szám</th>
        <th>Termékek száma</th>
        <th>Rendelés dátuma</th>
        <th>Státusz</th>
        <th>Törlés</th>
    </tr>
</thead>
<tbody class='bg-secondary text-light'>";
        

if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>Nincs még rendelés.</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo " <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_orders=<?php echo $order_id?>' class='text-light'  type='button' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></a></td>
    </tr>";
    }
}
        
        ?>
      
       
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
 
      <div class="modal-body">
       <h4>Biztosan törölni szeretnéd az adott rendelést?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ><a href="index.php?list_orders" class="text-light text-decoration-none">Törlés elvetése</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_orders=<?php echo $order_id?>' class="text-light text-decoration-none">Törlés</a></button>
      </div>
    </div>
  </div>
</div>
