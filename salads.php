<?php require_once('header.php');?>
<main class="container-fluid">
     <?php
     $stmt = $conn->prepare("SELECT * FROM salad_bar.product where type='salad';");
     $stmt->execute();
   
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach ($result as $r) {
          
          echo "
          <section class='col-lg-6 products'>
          <img src='media/image/products/".$r['type']."/".$r['image']."' width='700' height='700' alt='".$r['product_name']."' class='salads' >
          <div>
          <h3>".$r['product_name']."</h3>
          <p>".$r['ingredients']."</p>
          <p>".$r['price']."$</p>
          </div>
          </section>
          ";
     }
     ?>
</main>
<?php require_once('footer.php');?>