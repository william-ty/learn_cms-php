<?php

/***
 * addContent controller 
 */

try {
  $sql = 'SELECT * FROM content_type';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $contentTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
  echo $th;
}

$data = $contentTypes;
// $data = "addContent_controller";

// Refactor
if (!isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}

if (isset($_POST['add_content'])) {

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
    $args = [$name, $data, $createdAt, $updatedAt, $idUser, $idContentType];
    $sql = "INSERT INTO content (name, data, created_at, updated_at, id_user, id_content_type)
      VALUES (:name, :data, :created_at, :updated_at, :id_user, :id_content_type)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':data', $data, PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $createdAt, PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $updatedAt, PDO::PARAM_STR);
    $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
    $stmt->bindParam(':id_content_type', $idContentType, PDO::PARAM_INT);
    $stmt->execute($args);

    echo "<br/>Content '" . $name . "' added!<br/>";
  } else {
    echo "<br/>Missing field!<br/>";
  }
}


loadTemplate('addContent', $data);
