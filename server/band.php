<?php

chdir("php");

require_once("./utils/database.php");

$data = array($_COOKIE["musically_minds"]);
$rows = executeQuery("exist-session-hash", "s", $data, DATA_YES);

if (sizeof($rows) == 0) {
  header("Location: /", 200);
}

 ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>musically_minds</title>
    <link href="/css/default.css" rel="stylesheet" type="text/css">
    <link href="/css/band.css" rel="stylesheet" type="tex/css">
  </head>
  <body>
    <?php

    require_once("./utils/design.php");
    require_once("./utils/database.php");
    printHeader();

    ?>

    <div id="content">

      <?php

      $data = array($_COOKIE["musically_minds"]);
      $result = executeQuery("get-bands-of-user", "s", $data, DATA_YES);

      if (sizeof($result) == 0) {
          echo "<div id=\"back-to-band-list\" class=\"link-block\"><a href=\"-band-list.php\">Zurück zur Bandübersicht</a></div>";
      }

      echo "<div class=\"link-block\"><a href=\"/line-up-list.php?band=" . $_GET["band"] . "\">Line Ups</a></div>";

      echo "<div class=\"line-block\"><form action=\"/php/add-new-song.php\" method=\"post\">";

      echo "<input name=\"band-name\" hidden value=\"" .$_GET["band"] . "\">";

      echo "<label for=\"new-song-name\">Neuer Songname</label><input id=\"new-song-name\" name=\"new-song-name\"><button>Speichern</button></form></div>";



      ?>

    </div>
  </body>
</html>
