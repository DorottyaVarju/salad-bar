<?php
$servername = "localhost";
$username = "root";
$password = "password";

try {
  $conn = new PDO(
    "mysql:host=$servername;dbname=salad_bar",
    $username,
    $password
  );
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>