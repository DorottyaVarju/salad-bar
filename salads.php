<?php
require_once "header.php";
require_once "productsFunction.php";
?>
<link rel="stylesheet" href="css/products.css" type="text/css" />

<main class="container-fluid">
     <?php

$stmt = $conn->prepare("SELECT * FROM salad_bar.product where type='salad';");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

Products();
?>
</main>
<?php
require_once "footer.php";
?> 