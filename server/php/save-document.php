<?php

echo "WEfw)";
chdir("../");

require_once("./php/utils/database.php");

$data = array($_COOKIE["musically_minds"]);
$authResult = executeQuery("exist-session-hash", "s", $data, DATA_YES);
echo "Wefw";
//print_r($authResult);
/*if (sizeof($authResult) == 0) {
  //die();
}

$data = array($_POST["band-id"]);
$bandId = executeQuery("get-band-id-by-name", "s", $data, DATA_YES)[0];

$data = array($_POST["song-id"]);
$songId = executeQuery("get-song-id-by-name", "s", $data, DATA_YES)[0];

$md5 = md5_file($_FILE[0]->tmp_name);

echo $bandId . " " . $songId . " " . $md5 . " " . $_FILE["name"];
//mkdir("/documents/" . $)

//move_uploaded_file($_FILE[0], )*/
 ?>
