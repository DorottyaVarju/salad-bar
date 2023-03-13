<?php
if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $pattern = "/set/i";

  if (isset($_POST["submit"])) {
    $modifiedData = "";
    $setting = "";
    echo $modifiedData;
    if (!empty($_POST["firstname"])) {
      $firstname = htmlspecialchars(trim($_POST["firstname"]));
      if (preg_match($pattern, $setting) == 1) {
        $setting .= ", firstname=:firstname ";
      } else {
        $setting .= " SET firstname=:firstname ";
      }
      $paramsUpdate[":firstname"] = $firstname;
      $modifiedData .= " firstname";
      $_SESSION["firstname"] = $firstname;
    }
    if (!empty($_POST["lastname"])) {
      $lastname = htmlspecialchars(trim($_POST["lastname"]));
      if (preg_match($pattern, $setting) == 1) {
        $setting .= ", lastname=:lastname ";
      } else {
        $setting .= " SET lastname=:lastname ";
      }
      $paramsUpdate[":lastname"] = $lastname;
      $modifiedData .= " lastname";
      $_SESSION["lastname"] = $lastname;
    }
    if (!empty($_POST["address"])) {
      $address = htmlspecialchars(trim($_POST["address"]));
      if (preg_match($pattern, $setting) == 1) {
        $setting .= ", address=:address ";
      } else {
        $setting .= " SET address=:address ";
      }
      $paramsUpdate[":address"] = $address;
      $modifiedData .= " address";
      $_SESSION["address"] = $address;
    }
    if (
      !empty($_POST["oldPassword"]) &&
      !empty($_POST["newPassword"]) &&
      !empty($_POST["newPasswordConf"])
    ) {
      if ($_POST["newPassword"] == $_POST["newPasswordConf"]) {
        $oldPassword = htmlspecialchars(trim($_POST["oldPassword"]));
        $newPassword = htmlspecialchars(trim($_POST["newPassword"]));
        $newPasswordConf = htmlspecialchars(trim($_POST["newPasswordConf"]));
        $hashedPassword = sha1($newPassword);
        if (preg_match($pattern, $setting) == 1) {
          $setting .= ", pw=:hashedPassword ";
        } else {
          $setting .= " SET pw=:hashedPassword ";
        }
        $paramsUpdate[":hashedPassword"] = $hashedPassword;
        $modifiedData .= " password";
      } else {
        $passwordsDontMatch = "No matching passwords.";
      }
    }
    if (
      !empty($_POST["oldPassword"]) &&
      (empty($_POST["newPassword"]) || empty($_POST["newPasswordConf"]))
    ) {
      $passwordsDontMatch = "Enter a new password and confirm it.";
    }

    if (
      empty($_POST["firstname"]) &&
      empty($_POST["lastname"]) &&
      empty($_POST["address"]) &&
      empty($_POST["oldPassword"]) &&
      empty($_POST["newPassword"]) &&
      empty($_POST["lastname"])
    ) {
      $allEmpty = "Fill in the fields you want.";
    }
    if (isset($setting)) {
      try {
        $query = "UPDATE users" . $setting . "WHERE id=:id";

        $paramsUpdate[":id"] = $id;

        $handleUpdate = $conn->prepare($query);

        $handleUpdate->execute($paramsUpdate);
        $success =
          "You have successfully changed the following:" . $modifiedData . ".";
      } catch (Exception $e) {
        if (isset($passwordsDontMatch)) {
          $passwordsDontMatch = $e->getMessage();
        }
      }
    }
  }
}
?>
