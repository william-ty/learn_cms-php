<?php

/***
 * addContentType controller 
 */

$data = "addContentType_controller";

// Refactor
if (!isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}

if (isset($_POST['add_content_type'])) {
  $name = $_POST['name'];
  $uidContentType = uniqid();

  if ($name && $uidContentType) {
    // Request
    $args = [$name, $uidContentType];
    $sql = "INSERT INTO content_type (name, uid_content_type) VALUES (:name, :uid_content_type)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':uid_content_type', $uidContentType, PDO::PARAM_STR);
    $stmt->execute($args);
    
    echo "<br/>Content type '" . $name . "' added!<br/>";

  } else {
    echo "<br/>Missing field!<br/>";
  }
}


loadTemplate('addContentType', $data);
