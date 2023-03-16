<?php
require_once "./header.php";
require_once "../database/dbConnection.php";
require_once "../operations/dataModification.php";
?>

<link rel="stylesheet" href="/salad-bar/css/orders.css" type="text/css" />
<link rel="stylesheet" href="/salad-bar/css/basket.css" type="text/css" />

<main class="container">
    <table class="table table-condensed table-borderless" >
    <thead>
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
  <button class="btn btn-success till">To till</button>
</main>
<script src="../js/display.js"></script>
<?php require_once "./footer.php"; ?>
