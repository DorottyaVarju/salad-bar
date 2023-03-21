<?php
require_once "./header.php";
require_once "../database/dbConnection.php";
require_once "../operations/dataModification.php";
?>
<link rel="stylesheet" href="/salad-bar/css/data.css" type="text/css" />

<main class="container-fluid">
<?php if (isset($success)) {
  echo '<br><br><br><p class="text-success d-flex justify-content-center">
  ' .
    $success .
    "</p>";
} elseif (isset($allEmpty)) {
  echo '<br><br><br><p class="text-danger d-flex justify-content-center">' .
    $allEmpty .
    "</p>";
} ?>
  <section class="col-md-6 currentData dataModification">
    <h1>Your Current Data</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th >Lastname</th>
        <th>Email</th>
        <th>Address</th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $_SESSION["firstname"]; ?></td>
      <td><?php echo $_SESSION["lastname"]; ?></td>
      <td><?php echo $_SESSION["email"]; ?></td>
      <td><?php echo $_SESSION["address"]; ?></td>
    </tr>
  </tbody>
</table>
  </section>
  <section class="col-md-6 dataModification">
    <h1>Data Modification</h1>
    <form action="" method="POST">
      <label for="firstname">Firstname</label><br>
      <input type="text" name="firstname" id="firstname"><br><br>
      <label for="lastname">Lastname</label><br>
      <input type="text" name="lastname" id="lastname"><br><br>
      <label for="address">Address</label><br>
      <input type="text" name="address" id="address"><br><br>
      <label for="oldPassword">Old password</label><br>
      <input type="password" name="oldPassword" id="oldPassword"><br><br>
      <label for="newPassword">New password</label><br>
      <input type="password" name="newPassword" id="newPassword"><br><br>
      <label for="newPasswordConf">New password confirmation</label><br>
      <input type="password" name="newPasswordConf" id="newPasswordConf">
      <?php if (isset($wrongOldPassword)) {
        echo "<p class='text-danger'>" . $wrongOldPassword . "</p>";
      } elseif (isset($passwordsDontMatch)) {
        echo "<p class='text-danger'>" . $passwordsDontMatch . "</p>";
      } else {
        echo "<br><br>";
      } ?>
      <input type="submit" class="btn btn-success submit" id="submit" name="submit" value="Submit"><br>
    </form>
  </section>
</main>

<?php
if (isset($success) || isset($allEmpty)) {
  echo '<script>
  document.getElementsByClassName("dataModification")[1].style.padding = "0% 7.5% 5% 2.5%";
  </script>';
}
require_once "./footer.php";


?>
