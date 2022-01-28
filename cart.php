<?php
    include "functions.php";
    // start session
    session_start();

    if (isset($_POST["add"])) {
        // print_r($_POST["product_id"]);
        if (isset($_SESSION["cart"])) {             // check to see if the cart is created 
            // create an array of product ids
            $product_array_id = array_column($_SESSION["cart"], "product_id");
            $count = count($_SESSION["cart"]);

            $product_array = array(
                "product_id" => $_POST["product_id"]
            );

            $_SESSION["cart"][$count] = $product_array;
            // print_r($_SESSION["cart"]);
        } else {
            $product_array = array(
                "product_id" => $_POST["product_id"]
            );

            // create new session variable
            $_SESSION["cart"][0] = $product_array;
            // print_r($_SESSION["cart"]);
        }
    }

    if (isset($_POST["remove"])) {
        if ($_GET["action"] == "remove") {
            foreach($_SESSION["cart"] as $key => $value) {
                if ($value["product_id"] == $_GET["id"]) {
                    unset($_SESSION["cart"][$key]);
                    echo "<script>Product has been removed</script>";
                }
            }
        }
    }

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "mydatabase";
  
    $mysqli = new mysqli($servername, $username, $password, $dbname);
?>

<?= template_header("Cart") ?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h3>Cart</h3>
                <hr>
                <?php
                    $total = 0;
                    if (isset($_SESSION["cart"])) {
                        $product_id = array_column($_SESSION["cart"], "product_id");
                        $sql = "SELECT * FROM products";
                        $result = $mysqli -> query($sql);
                        while($row = $result -> fetch_assoc()) {
                            foreach($product_id as $id) {
                                 if ($row["id"] == $id) {
                                   echo "
                                   <form action=\"cart.php?action=remove&id=$row[id]\" method=\"POST\" class=\"cart-items\">
                                   <div class=\"border rounded\">
                                       <div class=\"row bg-white\">
                                           <div class=\"col-md-3\">
                                               <img src=\"$row[image]\" alt=\"laptop\" class=\"img-fluid\">
                                           </div>
                                           <div class=\"col-md-6\">
                                               <h5 class=\"pt-2\">$row[name]</h5>
                                               <h5 class=\"pt-2\">$row[price]</h5>
                                               <button type=\"submit\" value=\"remove\" class=\"btn btn-danger\" name=\"remove\">Remove</button>
                                           </div>
                                       </div>
                                   </div>
                               </form>";
                               $total = $total + $row['price'];
                                 }
                            }
                        }
                    } else {
                        echo "<h5>No items in the cart</h5>";
                    }
                  ?>
                
        
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h4>Price Details:</h4>
                <hr>
                 <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if(isset($_SESSION["cart"])) {
                                $count = count($_SESSION["cart"]);
                                echo "<h6>Items in cart ($count)</h6>";
                            } else {
                                echo "<h6>No items in cart</h6>";
                            }
                        ?>
                    </div>
                 </div>   
                 
                <?php
                    if (isset($_SESSION["cart"])) {
                        $charge = 1.25 * count($_SESSION["cart"]);
                        echo "<h6>Delivery Charges: $$charge</h6>";
                        $total = $total + $charge;
                    } else {
                        echo "<h6>Delivery Charges:</h6>";
                    }
                ?>
                 
            <h4>Total: $<?php echo $total; ?></h4>
            </div>
        </div>
        
    </div>
</div>

<?= template_footer() ?>