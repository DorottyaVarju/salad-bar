<?php
if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $pattern = "/set/i";

  if (isset($_POST["submit"])) {
    $modifiedData = "";
    $setting = "";
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
      try {
        $row = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $params = [":id" => $id];
        $row->execute($params);
        $getRow = $row->fetch(PDO::FETCH_ASSOC);
        $passwordInDB = $getRow["pw"];
      } catch (Exception $e) {
        $e->getMessage();
      }

      $oldPassword = htmlspecialchars(trim($_POST["oldPassword"]));
      $newPassword = htmlspecialchars(trim($_POST["newPassword"]));
      $newPasswordConf = htmlspecialchars(trim($_POST["newPasswordConf"]));
      $hashedOldPw = sha1($oldPassword);
      $hashedNewPw = sha1($newPassword);
      if ($passwordInDB == $hashedOldPw) {
        if ($_POST["newPassword"] == $_POST["newPasswordConf"]) {
          if (preg_match($pattern, $setting) == 1) {
            $setting .= ", pw=:hashedNewPw ";
          } else {
            $setting .= " SET pw=:hashedNewPw ";
          }
          $paramsUpdate[":hashedNewPw"] = $hashedNewPw;
          $modifiedData .= " password";
        } else {
          $passwordsDontMatch = "No matching passwords.";
        }
      } else {
        $wrongOldPassword = "Wrong old password.";
      }
    }

    if (
      (!empty($_POST["oldPassword"]) && empty($_POST["newPassword"])) ||
      (!empty($_POST["oldPassword"]) && empty($_POST["newPasswordConf"])) ||
      (!empty($_POST["oldPassword"]) &&
        empty($_POST["newPassword"]) &&
        empty($_POST["newPasswordConf"]))
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
    if (!empty($setting)) {
      try {
        $query = "UPDATE users" . $setting . "WHERE id=:id";

        $paramsUpdate[":id"] = $id;

        $rowUpdate = $conn->prepare($query);

        $rowUpdate->execute($paramsUpdate);
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
