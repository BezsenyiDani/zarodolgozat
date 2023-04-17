<h3 class="text-center">Az összes felhasználó:</h3>
<br>
<table class="table table-bordered">
    <thead class="table thead-dark">
        <?php
        $get_orders="Select * from `felhasznalok`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);
        echo "  <tr>
        <th>ID</th>
        <th>Felhasználónév</th>
        <th>Email</th>
        <th>Kép</th>
        <th>Lakcím</th>
        <th>Telefonszám</th>
        <th>Törlés</th>
    </tr>
</thead>
<tbody class='bg-secondary text-light'>";
        

if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>Nincs még felhasználó regisztrálva.</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $number++;
        echo " <tr>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img src='../users_area/user_images/$user_image' alt='$username' class='product_img'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='index.php?delete_users=<?php echo $user_id?>' class='text-light'  type='button' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></a></td>
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
       <h4>Biztosan törölni szeretnéd az adott felhasználót?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ><a href="index.php?list_users" class="text-light text-decoration-none">Törlés elvetése</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_users=<?php echo $user_id?>' class="text-light text-decoration-none">Törlés</a></button>
      </div>
    </div>
  </div>
</div>
