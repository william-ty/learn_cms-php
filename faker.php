<?php

$GLOBALS['PDO'] = $pdo;

function createUserRole(PDO $pdo, string $role, string $uidUserRole, int $idUserRole)
{
  $sql = "INSERT INTO user_role (role, uid_user_role, id_user_role) VALUES (:role, :uid_user_role, :id_user_role)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':role', $role, PDO::PARAM_STR);
  $stmt->bindParam(':uid_user_role', $uid_user_role, PDO::PARAM_STR);
  $stmt->bindParam(':id_user_role', $id_user_role, PDO::PARAM_INT);
  $stmt->execute([$role, $uidUserRole, $idUserRole]);
  echo "<br/>User role created successfully<br/>";
}

function createUser(PDO $pdo, string $firstname, string $lastname, string $email, string $password, int $idUserRole, int $idUser)
{
  $sql = 'INSERT INTO "user" (firstname, lastname, email, password, id_user_role, id_user)
    VALUES (:firstname, :lastname, :email, :password, :id_user_role, :id_user)';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
  $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
  $stmt->bindParam(':id_user_role', $idUserRole, PDO::PARAM_STR);
  $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
  $stmt->execute([$firstname, $lastname, $email, $password, $idUserRole, $idUser]);
  echo "<br/>User created successfully<br/>";
}

function createContentType(PDO $pdo, string $name, string $uidContentType, int $idContentType)
{
  $sql = "INSERT INTO content_type (name, uid_content_type, id_content_type) VALUES (:name, :uid_content_type, :id_content_type)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':uid_content_type', $uidContentType, PDO::PARAM_STR);
  $stmt->bindParam(':id_content_type', $idContentType, PDO::PARAM_INT);
  $stmt->execute([$name, $uidContentType, $idContentType]);
  echo "<br/>Content type created successfully<br/>";
}

function createContent(PDO $pdo, string $name, string $data, int $idUser, int $idContentType, int $idContent)
{
  $createdAt = $updatedAt = (new DateTime())->format('d/m/Y');
  $sql = "INSERT INTO content (name, data, created_at, updated_at, id_user, id_content_type, id_content)
    VALUES (:name, :data, :created_at, :updated_at, :id_user, :id_content_type, :id_content)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':data', $data, PDO::PARAM_STR);
  $stmt->bindParam(':created_at', $createdAt, PDO::PARAM_STR);
  $stmt->bindParam(':updated_at', $updatedAt, PDO::PARAM_STR);
  $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
  $stmt->bindParam(':id_content_type', $idContentType, PDO::PARAM_INT);
  $stmt->bindParam(':id_content', $idContent, PDO::PARAM_INT);
  $stmt->execute([$name, $data, $createdAt, $updatedAt, $idUser, $idContentType, $idContent]);
  echo "<br/>Content created successfully<br/>";
}

// Execute Fixtures
// createUserRole($pdo, "admin", "uid1", 1);
// createUserRole($pdo, "superadmin", "uid2", 2);
// createUserRole($pdo, "regular", "uid3", 3);
// createUser($pdo, "Eddy", "Cochran", "eddy.cochran@tuto.xyz", "password", 1, 1);
// createUser($pdo, "Bob", "Marley", "bob.marley@tuto.xyz", "password", 1, 2);
// createUser($pdo, "Rory", "Gallagher", "rory.gallagher@tuto.xyz", "password", 2, 3);
// createContentType($pdo, "article", "uid11", 1);
// createContentType($pdo, "comment", "uid12", 2);
// createContent($pdo, "An interesting story", "This article is written with great inspiration...", 1, 1, 1);
// createContent($pdo, "Not sure about that", "Let's be honest, this article isn't that great...", 2, 2, 2);
