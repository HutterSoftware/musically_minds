<?php

define("DATA_YES", true);
define("DATA_NO", false);

function createDBConnection() {
  $connectionSettings =
    json_decode(file_get_contents("../../configuration/db-settings.json"));

  $connection = mysqli_connect(
    $connectionSettings->host,
    $connectionSettings->username,
    $connectionSettings->password,
    $connectionSettings->databasename
  );

  if ($connection == false) {
    header("Location: /", 200);
    die();
  }

  return $connection;
}

function getSQLStatement($queryKey) {
  return
    json_decode(
      file_get_contents("../../configuration/sql-statements.json")
    )->$queryKey;
}

function executeQuery($queryKey, $dataTypes, $data, $wantData) {
  $connection = createDBConnection();

  $statementString = getSQLStatement($queryKey);
  $statement = $connection->prepare($statementString);
  $statement->bind_param($dataTypes, ...$data);
  $executeResult = $statement->execute();

  if (!$wantData) {
    return $executeResult;
  }

  $result = $statement->get_result();
  $rows = $result->fetch_all();
  $connection->close();

  return $rows;
}

?>
