<?php

if (isset($_GET["band-name"])) {
  header("Location: /band-list.php", 200);
  die();
}echo 1;

if (isset($_GET["new-song-name"])) {
  header("Location: /band.php?band=" . $_GET["band"], 200);
  die();
}echo 2;


require_once("./utils/database.php");

$data = array();
array_push($data, $_POST["band-name"]);

echo 3;
$bandId = executeQuery("get-band-id-by-name", "s", $data, DATA_YES);


$data = array();
array_push ($data, $_POST["new-song-name"]);
array_push($data, $bandId);

executeQuery("add-new-song", "si", $data, DATA_NO);

header("Location: /band.php?band=" . $_POST["band-name"], 200);

 ?>
