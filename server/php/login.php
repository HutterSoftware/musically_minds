<?php

if (!isset($_POST["username"])) {
  header("Location: /", 200);
}

if (!isset($_POST["password"])) {
  header("Location: /", 200);
}

require_once("./utils/database.php");


$data = array($_POST["username"]);
$rows = executeQuery(
  "get-password-hash-by-username",
  "s",
  $data,
  DATA_YES
);

if (sizeof($rows) == 0) {
  header("Location: /", 200);
}

$passwordHash = $rows[0][0];

if (!password_verify($_POST["password"], $passwordHash)) {
  header("Location: /", 200);
}

$cookieValue = microtime() . $_POST["username"] .  $_POST["password"];
$cookieHash = hash("sha256", $cookieValue);

$data = array();
array_push($data, $cookieHash);
array_push($data, $_POST["username"]);
executeQuery("set-session-hash", "ss", $data, DATA_NO);

$cookieExpiration = json_decode(
  file_get_contents("../../configuration/general-settings.json")
)->{"cookie-expiration"};

setcookie("musically_minds", $cookieHash, time() + $cookieExpiration, "/");

header("Location: /band-list.php", 200);

?>
