<?php

chdir("php");

require_once("./utils/design.php");
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
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>musically_minds</title>

    <link href="/css/default.css" rel="stylesheet" type="text/css">
    <link href="/css/song.css" rel="stylesheet" type="text/css">
    <link href="/css/jtab-helper.css" rel="stylesheet" type="text/css">

    <script src="/js/jquery.js"></script>
    <script src="/js/raphael.js"></script>
    <script src="/js/jtab.js"></script>
    <script src="/js/song.js"></script>
  </head>
  <body>
    <?php

    printHeader();

    ?>

    <div id="content">

      <?php
      echo "<div id=\"song-title\">" . $_GET["songname"] . "</div>";

      $data = array($_GET["songname"]);
      $completeSong = executeQuery("get-song", "s", $data, DATA_YES);

      echo "<div id=\"song\">";

      foreach ($completeSong as $songPart) {
        echo "<div class\"line\">";
        echo "<div class=\"jtab\">" . $songPart[1] . "</div>";
        echo "<div class=\"chords\">" . str_replace(" ", "&nbsp", $songPart[2]);
          "<div>";
        echo "<div class=\"text\">" . $songPart[2] . "</div>";
        echo "</div>";
      }

      echo "</div>";

      echo "<div class=\"link-block\" onclick=\"addNewLine()\">Neue Zeile</div>";
      echo "<div class=\"link-block\" onclick=\"jtab.renderimplicit();\">Rendern</div>";
      echo "<div class=\"line-block\" onclick=\"saveSong()\">Speichern</div>";

      printLogoutButton();

       ?>

    </div>
    <script>
      jtab.renderimplicit();
    </script>
  </body>
</html>
