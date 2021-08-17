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
      echo "<div id=\"site-header\" class=\"link-block\">" .
        $_GET["songname"] .
        "</div>";

      echo "<div id=\"song\">";

      $data = array($_GET["songname"], $_GET["band"]);
      $allDocumentsOfSong = executeQuery(
        "get-documents-of-song",
        "ss",
        $data,
        DATA_YES
      );

      echo "<div class=\"link-block\">Dokumente</div><div>";

      foreach ($allDocumentsOfSong as $document) {
        echo "<div class=\"link-block\"><a href=\"/documents/" .
          $document[3] .
          "/" .
          $document[2] .
          "\">" .
          $document[2] .
          "</a></div>";
      }

      echo "</div>";

      $data = array($_GET["songname"]);
      $completeSong = executeQuery("get-song", "s", $data, DATA_YES);

      foreach ($completeSong as $songPart) {
        echo "<div class\"line\">";
        echo "<div class=\"editor\" hidden>" . $songPart[1] . "</div>";
        echo "<div class=\"jtab\">" . $songPart[1] . "</div>";
        echo "<div class=\"chords\">" . str_replace(" ", "&nbsp", $songPart[2]);
          "<div>";
        echo "<div class=\"text\">" . $songPart[2] . "</div>";
        echo "</div>";
      }

      echo "</div>";

      echo "<div class=\"link-block\"><label for=\"new-document\">Neues Dokument</label><input id=\"documents\" type=\"file\" accept=\"application/pdf\"><button onclick=\"addDocument()\">Hochladen</button></div>";
      echo "<div class=\"link-block\" onclick=\"showCloseEditor()\">Bearbeiten</div>";
      echo "<div class=\"link-block\" onclick=\"addNewLine()\">Neue Zeile</div>";
      echo "<div class=\"link-block\" onclick=\"jtab.renderimplicit();\">Rendern</div>";
      echo "<div class=\"link-block\" onclick=\"saveSong()\">Speichern</div>";

      printLogoutButton();

       ?>

    </div>
    <script>
      jtab.renderimplicit();
    </script>
  </body>
</html>
