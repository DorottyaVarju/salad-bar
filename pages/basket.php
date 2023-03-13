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
      <tr>
        <td>Caesar Salad</td>
        <td>2</td>
        <td>
            <select class="form-select">
                <?php for ($i = 1; $i < 100; $i++) {
                  echo "<option>" . $i . "</option>";
                } ?>
            </select>
            <button class="btn btn-success">Add</button>
        </td>
        <td><i class="fa fa-trash"></i></td>
        <td>4.8$</td>
      </tr>
      <tr>
        <td>Strawberry Smoothie</td>
        <td>1</td>
        <td>
            <select class="form-select">
                <?php for ($i = 1; $i < 50; $i++) {
                  echo "<option>" . $i . "</option>";
                } ?>
            </select>
            <button class="btn btn-success">Add</button>
        </td>
        <td><i class="fa fa-trash"></i></td>
        <td>4.75$</td>
      </tr>
      <tr class="all">
        <th>All</th>
        <th>3</th>
        <th></th>
        <th></th>
        <th>9.55$</th>
      </tr>
    </tbody>
  </table>
  <button class="btn btn-success till">To till</button>
</main>

<?php require_once "./footer.php"; ?>
