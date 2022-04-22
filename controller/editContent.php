<?php

/***
 * editContent controller 
 */

$idContent = $_GET['id'];

try {
  $sql = 'SELECT * FROM content WHERE content.id_content = :id';
  $args = ['id' => $idContent];
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $idContent, PDO::PARAM_INT);
  $stmt->execute($args);
  $content = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}

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

try {
  $sql = 'SELECT * FROM content_type';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $contentTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}

// $data = "editContent_controller";

// Refactor
if (!isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}

if (isset($_POST['edit_content'])) {

  // Request to find user
  $_email = $_SESSION['user'];
  $sql = 'SELECT * FROM "user" WHERE email=:email';
  $args = ['email' => $_email];
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':email', $_email, PDO::PARAM_STR);
  $stmt->execute($args);
  $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $name = $_POST['name'];
  $data = $_POST['data'];
  $idUser = $user[0]['id_user'];
  $idContentType = strval($_POST['id']);
  $uidContent = uniqid();

  if ($name && $data && $idUser && $idContentType) {
    // Request
    $createdAt = $updatedAt = (new DateTime())->format('d/m/Y:H:m');
    $args = [$name, $data, $updatedAt, $idUser, $idContentType, $idContent];
    $sql = "UPDATE content
      SET name = :name, data = :data, updated_at = :updated_at , id_user = :id_user, id_content_type = :id_content_type
      WHERE id_content = :id_content";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':data', $data, PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $updatedAt, PDO::PARAM_STR);
    $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
    $stmt->bindParam(':id_content_type', $idContentType, PDO::PARAM_INT);
    $stmt->bindParam(':id_content', $idContent, PDO::PARAM_INT);
    $stmt->execute($args);

    header("Location:index.php?page=home");
    echo "<br/>Content '" . $name . "' updated!<br/>";
  } else {
    echo "<br/>Missing field!<br/>";
  }
}

$data = [];
// $data['content'] = array_merge($content[0], ['content_type']$contentTypeForContent);
$data['content'] = $content;
$data['content']['content_type'] = $contentTypeForContent;
$data['content_types'] = $contentTypes;
// $data[] = ['content_types' => $contentTypes];
// $data[] = ['content' => $content[0]];


loadTemplate('editContent', $data);
