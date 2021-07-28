<?php

if (!isset($_COOKIE["musically_minds"])) {
  header("Location: /", 200);
  exit(0);
}

require_once("utils/database.php");

$data = array($_COOKIE["musically_minds"]);
executeQuery("remove-sessionkey", "s", $data, DATA_NO);

setcookie("musically_minds", "", 0, "/");

header("Location: /", 200);

 ?>
