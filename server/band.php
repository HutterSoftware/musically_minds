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
    <link href="/css/band.css" rel="stylesheet" type="text/css">
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
          header("Location: /band-list.php", 200);
          exit(0);
      }

      echo "<div id=\"site-header\" class=\"link-block\">" . $_GET["band"] . "</div>";

      echo "<div class=\"link-block\"><a href=\"/line-up-list.php?band=" . $_GET["band"] . "\">Line Ups</a></div>";

      echo "<div class=\"link-block\"><form action=\"/php/add-new-song.php\" method=\"post\">";

      echo "<input name=\"band-name\" hidden value=\"" .$_GET["band"] . "\">";

      echo "<label for=\"new-song-name\">Neuer Songname</label><input id=\"new-song-name\" name=\"new-song-name\"><button>Speichern</button></form></div>";

      echo "<div id=\"songs\" class=\"link-block\">Songs</div>";

      echo "<div id=\"song-list\" class=\"link-block\">";

      $data = array($_GET["band"]);
      $results = executeQuery("get-complete-song-list", "s", $data, DATA_YES);

      foreach ($results as $result) {
        echo "<div class=\"song-block\"><a href=\"/song.php?band=" . $_GET["band"] .  "&songname=" . $result[0] . "\">" . $result[0] . "</a></div>";
      }

      echo "</div><div class=\"link-block\"><a href=\"/band-list.php\">Zurück</a></div>";

      printLogoutButton();

      ?>

    </div>
  </body>
</html>
