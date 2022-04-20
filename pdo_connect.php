<?php

require_once 'pdo_config.php';
// require_once 'pdo_config_local.php';

// DSN = Data Source Name

try {
  $dsn = "pgsql:host=$host;port=$port;dbname=$db;";

  // Make DB Connection
  $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  $GLOBALS['pdo'] = $pdo;

  if ($pdo) {
    // echo "<br/>Connected to the $db database successfully!";
    // echo '<script type="text/javascript"> console.log("Connected to the $db database successfully!");</script>';
  }
} catch (PDOException $e) {
  die($e->getMessage());
}
//  finally {
//   if ($pdo) {
//     $pdo = null;
//   }
// }

// return $pdo;