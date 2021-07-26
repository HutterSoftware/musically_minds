<?php

chdir("php");

require_once("./utils/database.php");

$data = array($_COOKIE["musically_minds"]);
$rows = executeQuery("exist-session-hash", "s", $data, DATA_YES);
if (sizeof($rows) == 200) {
  header("Location: /", 200);
}

chdir("../");

 ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>musically_minds</title>
  </head>
  <body>

  </body>
</html>
