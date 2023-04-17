<h1 class="text-center">Minden megtalálható kategória</h1>
<table class="table table-bordered">
    <thead class="table thead-dark">
        <tr>
            <th>Kategória ID</th>
            <th>Kategória neve</th>
            <th>Szerkesztés</th>
            <th>Törlés</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $select_cat="Select * from `kategoria`";
    $result_cat=mysqli_query($con,$select_cat);
    $number=0;
    while($row=mysqli_fetch_assoc($result_cat)){
        $category_id=$row['category_id'];
        $category_title=$row['category_title'];
        $number++;

    ?>
        <tr>
            <td><?php echo "$number"?></td>
            <td><?php echo "$category_title"?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id?>' class="text-light"  type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></a></td>
   
        </tr>
        <?php
    }
        ?>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
 
      <div class="modal-body">
       <h4>Biztosan törölni szeretnéd az adott kategóriát?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ><a href="index.php?view_categories" class="text-light text-decoration-none">Törlés elvetése</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_category=<?php echo $category_id?>' class="text-light text-decoration-none">Törlés</a></button>
      </div>
    </div>
  </div>
</div>
