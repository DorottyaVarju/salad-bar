<?php

function Products(): void
{
  $id = $_SESSION["id"];

  foreach ($GLOBALS["result"] as $r) {
    echo "
          <section class='col-lg-6 products'>
          <img src='/salad-bar/media/image/products/" .
      $r["type"] .
      "/" .
      $r["image"] .
      "' width='700' height='700' alt='" .
      $r["product_name"] .
      "' class='products' >
          <div>
          <h3>" .
      $r["product_name"] .
      "</h3>
          <p>" .
      $r["ingredients"] .
      "</p>
          <p class='prices'>" .
      $r["price"] .
      "$";
    if (isset($id)) {
      echo " &nbsp; <button class='btn btn-success basket' data-product-id='" .
        $r["id"] .
        "' data-product-name='" .
        $r["product_name"] .
        "'data-product-price='" .
        $r["price"] .
        "' data-product-quantity=1>To Basket &nbsp;<i class='fa fa-shopping-basket'></i></button>";
    }

    echo "</p>
          </div>
          </section>
          ";
  }
  echo "<script src='../js/basket.js'></script>";
}
?>
