<?php
if (isset($_POST["submit1"])) {
  if (
    isset($_POST["email1"], $_POST["password1"]) &&
    !empty($_POST["email1"]) &&
    !empty($_POST["password1"])
  ) {
    $email = htmlspecialchars(trim($_POST["email1"]));
    $password = htmlspecialchars(trim($_POST["password1"]));

    $hashPassword = sha1($password);

    $handle = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $params = [":email" => $email];
    $handle->execute($params);
    $getRow = $handle->fetch(PDO::FETCH_ASSOC);

    $passwordInDB = $getRow["pw"];
    $idInDB = $getRow["id"];

    if ($handle->rowCount() > 0) {
      if ($hashPassword == $passwordInDB) {
        unset($getRow["pw"]);
        $_SESSION["id"] = $getRow["id"];
        $id = $_SESSION["id"];
        $_SESSION["email"] = $getRow["email"];
        $_SESSION["firstname"] = $getRow["firstname"];
        $_SESSION["lastname"] = $getRow["lastname"];
        $_SESSION["address"] = $getRow["address"];
        header("Location: /salad-bar/pages/salads.php");
      } else {
        $wrongPassword = "Wrong password.";
      }
    } else {
      $notRegisteredEmail =
        "You have not yet registered with us with this email address.";
    }
  } else {
    $emptyEmail = "Enter Your email.";
    $emptyPassword = "Enter Your password.";
  }
}
?>
