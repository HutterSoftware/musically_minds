<?php

require_once("./utils/design.php");
require_once("./utils/database.php");

$data = array($_COOKIE["musically_minds"]);
$rows = executeQuery("exist-session-hash", "s", $data, DATA_YES);

var_dump($_POST);

if (sizeof($rows) == 0) {
  header("Location: /", 200);
}

if (!isset($_POST["band"])) {

}

if (isset($_POST["songname"])) {

}

if (!isset($_POST["content"])) {

}

echo "final";


 ?>
