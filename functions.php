<?php
function connect_to_database() {
  // Set up the database login stuff
  $servername = "localhost";
  $username = "root";
  $password = "password";
  $dbname = "mydatabase";

  $mysqli = new mysqli($servername, $username, $password, $dbname);
}

// header for the pages
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4c536a6bd5.js"></script>
	</head>
	<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="pointer-events: none;">e-commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="products.php">Laptops</a></li>
            <li><a class="dropdown-item" href="products.php">Phones</a></li>
            <li><a class="dropdown-item" href="products.php">Accessories</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" action="login_page.html">
        <button class="btn btn-outline-light">Login</button>
      </form>
      <form class="d-flex" id="signup-btn" action="signup_page.html">
          <button class="btn btn-outline-light">Sign Up</button>
      </form>
    </div>
  </div>
    <a href="cart.php" class="nav-item nav-link link-light">
       <i class="fas fa-shopping-cart">Cart</i>
    </a>
</nav>
<main>
EOT;
}
// footer for the pages
function template_footer() {
echo <<<EOT
      </main>
    </body>
</html>
EOT;
}


function cartElements($name, $price, $img, $id) {
  $element = "
  <form action='cart.php' method='GET' class='cart-items'>
    <div class='border rounded'>
        <div class='row bg-white'>
            <div class='col-md-3'>
                <img src='$img' alt='laptop' class='img-fluid'>
            </div>
            <div class='col-md-6'>
                <h5 class='pt-2'>$name</h5>
                <h5 class='pt-2'>$price</h5>
                <button type='submit' value='remove' class='btn btn-danger mx-2'>Remove</button>
            </div>
        </div>
    </div>
  </form>";

  echo $element;
}
?>

