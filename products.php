<?php
    include "functions.php";
    // show the products on this page
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "mydatabase";
  
    $mysqli = new mysqli($servername, $username, $password, $dbname);
  
    $sql = "SELECT * FROM products";
    $result = $mysqli -> query($sql);
?>

<?= template_header("Products") ?>

<div class="container-fluid">
      <div class="row">
      <?php while($row = $result -> fetch_assoc()) : ?>
        <div class="col-sm-4 mt-5">
          <div class="card mx-auto" style="width: 18rem;">
            <img src="<?= $row["image"]; ?>" class="card-img-top" alt="<?= $row["type"]?>" style="height: 20rem; width: auto;">
            <div class="card-body">
              <h5 class="card-title"> <?= $row["name"]; ?></h5>
              <p class="card-text"> <?= $row["description"]; ?></p>
              <p class="crad-text"><b>$<?= $row["price"]; ?></b></p>
              <form action="cart.php" method="POST">
                <input type="hidden" name="product_id" value="<?=$row["id"]?>">
                <input type="submit" value="Add To Cart" name="add"> 
              </form>
            </div>
        </div>
        </div>
            <?php endwhile; ?>

      </div>
</div>

<?= template_footer() ?>