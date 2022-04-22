<?php

/***
 * deleteContent controller 
 */

$idContent = $_GET['id'];



// $data = "deleteContent_controller";

// Refactor
if (!isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}

try {
  $sql = 'DELETE FROM content WHERE content.id_content = :id';
  $args = ['id' => $idContent];
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $idContent, PDO::PARAM_INT);
  $stmt->execute($args);
  $content = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}

header("Location:index.php?page=home");

// loadTemplate('deleteContent', $data);
