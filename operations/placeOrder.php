<?php
require_once "../pages/header.php";
require_once "../database/dbConnection.php";
?>
<link rel="stylesheet" href="/salad-bar/css/products.css" type="text/css" />
<link rel="stylesheet" href="/salad-bar/css/orders.css" type="text/css" />
<link rel="stylesheet" href="/salad-bar/css/orderinfo.css" type="text/css" />
<link rel="stylesheet" href="/salad-bar/css/basket.css" type="text/css" />


<main class="container">
     <?php
     $id = $_SESSION["id"];
     $productsInBasket = explode(",", $_COOKIE["productsInBasket"]);

     if($productsInBasket[0]==""){
        unset($productsInBasket[0]);
        $productsInBasket = array_values($productsInBasket);
     }

     if(!empty($productsInBasket)){
          $productIDs = [];
          $productPrices = [];
          $productQuantites = [];
          $i = 0;
          $p = 2;
          foreach ($productsInBasket as $key => $value) {
            if ($i % 4 == 0) {
              array_push($productIDs, (int) $productsInBasket[$key]);
            }
            if ($p <= count($productsInBasket)) {
              array_push($productPrices, (float) $productsInBasket[$p]);
              array_push($productQuantites, (int) $productsInBasket[$p + 1]);
            }
            $i++;
            $p += 4;
          }
          $sum = 0;
          foreach ($productPrices as $key => $value) {
            $sum += $productPrices[$key] * $productQuantites[$key];
          }
          try {
            $handle = $conn->prepare(
              "INSERT INTO orders (recent_status, sum, userID) VALUES('pending', :sum, :id)"
            );

            $params = [
              ":id" => $id,
              ":sum" => $sum,
            ];

            $handle->execute($params);

            $handle = $conn->prepare("SELECT MAX(id) FROM orders WHERE userID=:id");

            $params = [
              ":id" => $id,
            ];

            $handle->execute($params);
            $result = $handle->fetch(PDO::FETCH_ASSOC);

            $orderID = $result["MAX(id)"];

            foreach ($productIDs as $key => $value) {
              $handle = $conn->prepare(
                "INSERT INTO contain (productID, orderID, quantity) VALUES(:productID, :orderID, :quantity)"
              );

              $params = [
                ":productID" => $productIDs[$key],
                ":orderID" => $orderID,
                ":quantity" => $productQuantites[$key],
              ];
              $handle->execute($params);
            }
            $success =
              "<h2 style='justify-content: center; display: flex; text-align: center'>Thank You for Your order!</h2><br><h3 style='justify-content: center; display: flex; text-align: center'>We have started preparing your order, our courier will leave with it soon.</h3>";
            echo "<br>".$success."<br><br>";

            $handle = $conn->prepare(
              "SELECT product.product_name, product.price, contain.quantity, orders.sum FROM product INNER JOIN contain ON product.id = contain.productID INNER JOIN orders ON contain.orderID = orders.id WHERE orders.userID=:id AND recent_status = 'pending' AND orders.id = :orderID"
            );

            $params = [
              ":id" => $id,
              ":orderID" => $orderID,
            ];

            $handle->execute($params);

            $result = $handle->fetchAll(PDO::FETCH_ASSOC);

            setcookie('productsInBasket', '', time() - 3600, '/');

            echo "<table class='table table-condensed table-borderless'>
            <thead>
            <tr><th></th><th>Order Information</th><th></th></tr>
            <tr>
            <th>Productname</th>
            <th>Quantity</th>
            <th>Price</th>
            </tr>
            </thead>
            <tbody>
            ";
            foreach ($result as $r) {
              echo "<tr><td>" .
                $r["product_name"] .
                "</td><td>" .
                $r["quantity"] .
                "</td><td>" .
                $r["price"] .
                " $</td></tr>";
            }
            echo "
            <tr><th>Amount to be paid</th><th></th><th>" .
              $r["sum"] .
              " $ + 2$ Delievery Fee</th></tr>
            </tbody>
            </table>";
          } catch (connException $e) {
            echo $e->getMessage();
          }
    }else {
          echo "
            <br><br><br><br><h2 style='justify-content: center; display: flex; text-align: center'>Placing order was unsuccessful, Your basket is empty!</h2><br><h3 style='justify-content: center; display: flex; text-align: center'>Select at least one product to place an order!</h3>
            <br><br><br>
            <a href='/salad-bar/pages/salads.php' class='d-flex justify-content-center' style='text-decoration: none;'><button class='btn btn-success order'>Our Salads</button></a>
            <br><br>
            <a href='/salad-bar/pages/smoothies.php' class='d-flex justify-content-center' style='text-decoration: none;'><button class='btn btn-success order'>Our Smoothies</button></a>
            <br><br>
            <a href='/salad-bar/pages/soups.php' class='d-flex justify-content-center' style='text-decoration: none;'><button class='btn btn-success order'>Our Soups</button></a>
          ";
    }
     ?>
</main>

<?php require_once "../pages/footer.php"; ?>
