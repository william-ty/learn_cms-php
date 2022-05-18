<?php

/***
 * contents controller 
 */

$data = [];

$idContentType = $_GET['id'];


// Get contents
try {
  $args = ['id' => $idContentType];
  $sql = 'SELECT id_content, ct.id_content_type AS id_content_type, c.name AS content_name, data, created_at, updated_at, ct.name AS content_type_name, uid_content_type, c.id_user, u.firstname, u.lastname
  FROM "content" c
  JOIN "content_type" ct ON c.id_content_type = ct.id_content_type
  JOIN "user" u ON c.id_user = u.id_user
  WHERE c.id_content_type = :id';
  // WHERE c.id_content_type = ct.id_content_type';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $idContentType, PDO::PARAM_INT);
  $stmt->execute($args);
  $contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}

$data['contents'] = $contents;
// var_dump($contents);



loadTemplate('contentTypeContents', $data);
