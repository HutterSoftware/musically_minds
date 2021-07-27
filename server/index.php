<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>musically_minds</title>
    <link href="/css/default.css" rel="stylesheet" type="text/css">
    <link href="/css/login.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php

    require_once("./php/utils/design.php");
    printHeader();

     ?>
    <form action="/php/login.php" method="post">
      <label for="username">Benutzername</label>
      <input id="username" name="username">

      <label for="password">Passwort</label>
      <input id="password" name="password" type="password">

      <button>Anmelden</button>
    </form>

    <a href="register.php">Registrieren</a>
  </body>
</html>
