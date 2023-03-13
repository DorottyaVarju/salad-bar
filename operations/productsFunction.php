<?php

function Products(): void
{
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
      "$ &nbsp; <button class='btn btn-success basket' data-product-id='" .
      $r["id"] .
      "' data-product-name='" .
      $r["product_name"] .
      "'data-product-price='" .
      $r["price"] .
      "'>To Basket &nbsp;<i class='fa fa-shopping-basket'></i></button>
          </p>
          </div>
          </section>
          ";
  }
}
?>
