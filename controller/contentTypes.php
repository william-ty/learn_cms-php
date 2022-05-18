<?php

/***
 * contents controller 
 */

$data = [];

// Get content_types
try {
  $sql = 'SELECT * FROM "content_type"';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $content_types = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}

$data['content_types'] = $content_types;
// var_dump($content_types);



loadTemplate('contentTypes', $data);
