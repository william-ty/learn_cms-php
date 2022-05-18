<?php

/***
 * deleteContent controller 
 */

$idContentType = $_GET['id'];



// $data = "deleteContent_controller";

// Refactor
if (!isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}

try {
  $sql = 'DELETE FROM content_type WHERE content_type.id_content_type = :id';
  $args = ['id' => $idContentType];
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $idContentType, PDO::PARAM_INT);
  $stmt->execute($args);
  $content_type = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}

header("Location:index.php?page=contentTypes");

// loadTemplate('deleteContent', $data);
