<?php

/***
 * editContent controller 
 */

$idContentType = $_GET['id'];

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

// $data = "editContent_controller";

// Refactor
if (!isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}

if (isset($_POST['edit_content_type'])) {

  // Request to find user
  $_email = $_SESSION['user'];
  $sql = 'SELECT * FROM "user" WHERE email=:email';
  $args = ['email' => $_email];
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':email', $_email, PDO::PARAM_STR);
  $stmt->execute($args);
  $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $name = $_POST['name'];

  if ($name && $idContentType) {
    // Request
    $args = [$name, $idContentType];
    $sql = "UPDATE content_type
      SET name = :name
      WHERE id_content_type = :id_content_type";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':id_content_type', $idContentType, PDO::PARAM_INT);
    $stmt->execute($args);

    header("Location:index.php?page=contentTypes");
    echo "<br/>Content type '" . $name . "' updated!<br/>";
  } else {
    echo "<br/>Missing field!<br/>";
  }
}

$data = [];
// $data['content'] = array_merge($content[0], ['content_type']$contentTypeForContent);
$data['content_type'] = $contentType;
// $data[] = ['content_types' => $contentTypes];
// $data[] = ['content' => $content[0]];


loadTemplate('editContentType', $data);
