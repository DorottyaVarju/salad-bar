<?php
require_once "./header.php";
require_once "../database/dbConnection.php";
require_once "../operations/dataModification.php";
?>

<link rel="stylesheet" href="/salad-bar/css/orders.css" type="text/css" />
<link rel="stylesheet" href="/salad-bar/css/basket.css" type="text/css" />

<main class="container">
    <table class="table" >
    <thead>
      <tr><th colspan="5" class="heading">Basket <i class="fa fa-shopping-basket"></i></th></tr>
      <tr>
        <th>Productname</th>
        <th>Quantity</th>
        <th>Modify</th>
        <th>Delete</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <a href="../operations/placeOrder.php"><button class="btn btn-success order">Place Order</button></a>
</main>
<script src="../js/basket.js"></script>
<script src="../js/display.js"></script>
<script src="../js/delete.js"></script>
<script src="../js/add.js"></script>

<?php require_once "./footer.php"; ?>
