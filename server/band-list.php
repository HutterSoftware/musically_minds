<?php

chdir("php");

require_once("./utils/database.php");

$data = array($_COOKIE["musically_minds"]);
$rows = executeQuery("exist-session-hash", "s", $data, DATA_YES);

if (sizeof($rows) == 0) {
  //header("Location: /", 200);
}

 ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>musically_minds</title>
    <link href="/css/default.css" rel="stylesheet" type="text/css">
    <link href="/css/band-list.css" rel="stylesheet" type="tex/css">
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

      switch (sizeof($result)) {
        case 0:
          echo "<div id=\"not-member-of-any-band\">Sie gehören bisher noch nicht zu einer Band</div>";
          die();
          break;

        case 1:
          header("Location: /band.php?band=" . $result[0][0], 200);
          die();
          break;
      }

      foreach ($result as $rows) {
        echo "<div class=\"band-item\"><a href=\"/band.php?band=" .
          $rows[0] .
          "\">" .
          $rows[0] .
          "</a></div>";
      }

      ?>
    </div>
  </body>
</html>
