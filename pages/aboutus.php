<?php
require_once "./header.php";
require_once "../database/dbConnection.php";
?>

<link rel="stylesheet" href="../css/aboutus.css" type="text/css" />

<main class="container-fluid">
     <?php
     $stmt = $conn->prepare("SELECT * FROM salad_bar.worker;");
     $stmt->execute();

     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     foreach ($result as $r) {
       echo "
         <div class='col-md-3 workers'>
         <img src='../media/image/workers/" .
         $r["image"] .
         "' width='700' height='700' alt='" .
         $r["firstname"] .
         " " .
         $r["lastname"] .
         "' class='workers' >
         <div>
         <h4>" .
         $r["firstname"] .
         " " .
         $r["lastname"] .
         "</h4>
            <h6>" .
         $r["position"] .
         "</h6><br>
         <p class='intro'>" .
         $r["introduction"] .
         "</p>
         </select>
         </p>
         </div>
         </div>
         ";
     }
     ?>
</main>

<?php require_once "./footer.php"; ?>  ?>