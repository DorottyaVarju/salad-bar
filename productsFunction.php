<?php
function Products()
{
    foreach ($GLOBALS['result'] as $r) {
        echo "
          <section class='col-lg-6 products'>
          <img src='media/image/products/" . $r["type"] . "/" . $r["image"] . "' width='700' height='700' alt='" . $r["product_name"] . "' class='products' >
          <div>
          <h3>" . $r["product_name"] . "</h3>
          <p>" . $r["ingredients"] . "</p>
          <p class='prices'>" . $r["price"] . "$ &nbsp; <i class='fa fa-plus'></i>&nbsp;
          <select class='quantity'>";
        for ($i = 1; $i < 11; $i++) {
            echo "<option>" . $i . "</option>";
        }
        echo "
          </select>
          </p>
          </div>
          </section>
          ";
    }
}
?>