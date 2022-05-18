<?php

/***
 * detailsContent controller 
 */

$idContentType = $_GET['id'];


// Get content type
try {
  $sql = 'SELECT * FROM content_type WHERE content_type.id_content_type = :id';
  $args = ['id' => $idContentType];
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $idContentType, PDO::PARAM_INT);
  $stmt->execute($args);
  $contentType = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}


// Refactor
if (!isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}

$data = [];
$data['content_type'] = $contentType;

loadTemplate('detailsContentType', $data);
