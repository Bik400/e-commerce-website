<?= template_header("Home") ?>
<div class="row">

    <div class="card mx-auto" style="width: 18rem;">
        <img src="./images/laptop1.jpg" class="card-img-top" alt="laptop" style="height: 20rem; width: auto;">
        <div class="card-body">
          <h5 class="card-title">Laptops</h5>
          <p class="card-text">Choose from the latest laptops on the market</p>
          <a href="products.php" class="btn btn-primary">Explore</a>
        </div>
    </div>
    
    <div class="card mx-auto" style="width: 18rem;">
        <img src="./images/phone1.jpg" class="card-img-top" alt="phone" style="height: 20rem; width: auto;">
        <div class="card-body">
          <h5 class="card-title">Phones</h5>
          <p class="card-text">Choose from the hottest phones on the market</p>
          <a href="products.php" class="btn btn-primary">Explore</a>
        </div>
    </div>

    <div class="card mx-auto" style="width: 18rem;">
        <img src="./images/accessory1.jpg" class="card-img-top" alt="headphones" style="height: 20rem; width: auto;">
        <div class="card-body">
          <h5 class="card-title">Accessories</h5>
          <p class="card-text">Shop the latest accessories for your devices</p>
          <a href="products.php" class="btn btn-primary">Explore</a>
        </div>
    </div>

</div>

<?= template_footer() ?>