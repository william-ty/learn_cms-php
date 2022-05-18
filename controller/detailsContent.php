<?php

/***
 * detailsContent controller 
 */

$idContent = $_GET['id'];

// Get content details
try {
  $sql = 'SELECT id_content, ct.id_content_type AS id_content_type, c.name AS content_name, data, created_at, updated_at, ct.name AS content_type_name, uid_content_type, c.id_user, u.firstname, u.lastname
  FROM "content" c
  JOIN "content_type" ct ON c.id_content_type = ct.id_content_type
  JOIN "user" u ON c.id_user = u.id_user
  WHERE c.id_content = :id';
  $args = ['id' => $idContent];
  $stmt = $pdo->prepare($sql);
  $stmt->execute($args);
  $content = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}

// Get content type
try {
  $idContentType = $content['id_content_type'];
  $sql = 'SELECT * FROM content_type WHERE content_type.id_content_type = :id';
  $args = ['id' => $idContentType];
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $idContentType, PDO::PARAM_INT);
  $stmt->execute($args);
  $contentTypeForContent = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}

// $data = "detailsContent_controller";

// Refactor
if (!isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}


$data = [];
// $data['content'] = array_merge($content[0], ['content_type']$contentTypeForContent);
$data['content'] = $content;
$data['content']['content_type'] = $contentTypeForContent;
// $data[] = ['content_types' => $contentTypes];
// $data[] = ['content' => $content[0]];


loadTemplate('detailsContent', $data);
