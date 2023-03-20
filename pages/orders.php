<?php require_once "./header.php";
require_once "../database/dbConnection.php";
?>

<link rel="stylesheet" href="/salad-bar/css/orders.css" type="text/css" />

<main class="container">
<table class="table table-condensed table-borderless" >
    <thead>
      <tr><th></th><th>Your Previous Orders</th><th></th></tr>
      <tr>
        <th>Order ID</th>
        <th>Sum</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $id = $_SESSION["id"];
      try {
        $handle = $conn->prepare(
          "SELECT id, recent_status, sum FROM orders WHERE userID=:id"
        );
        $params = [
          ":id" => $id,
        ];

        $handle->execute($params);

        $result = $handle->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $r) {
          echo "<tr><td>" .
            $r["id"] .
            "</td><td>" .
            $r["sum"] .
            "</td><td>" .
            $r["recent_status"] .
            "  </td></tr>";
        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
      ?>
    </tbody>
  </table>
  <br> <br> <br> <br>
</main>

<?php require_once "./footer.php"; ?>
