<?php

if (!isset($_POST["username"])) {
  header("Location: /", 200);
}

if (!isset($_POST["password"])) {
  header("Location: /", 200);
}

if (!isset($_POST["email"])) {
  header("Location: /", 200);
}

require_once("./utils/database.php");

$option = [
  "costs" => 15
];

$passwordHash = password_hash($_POST["password"], PASSWORD_BCRYPT, $option);

$data = array($_POST["username"], $passwordHash, $_POST["email"]);

executeQuery("register-user", "sss", $data, DATA_NO);
header("Location: /", 200);

 ?>
