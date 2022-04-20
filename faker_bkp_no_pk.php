<?php

$pdo = $GLOBALS['pdo'];

function createUserRole(PDO $pdo, string $role, string $uidUserRole)
{
  $sql = "INSERT INTO user_role (role, uid_user_role) VALUES (?,?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$role, $uidUserRole]);
}

function createUser(PDO $pdo, string $firstname, string $lastname, string $email, string $password, int $idUserRole)
{
  $sql = 'INSERT INTO "user" (firstname, lastname, email, password, id_user_role) VALUES (?,?,?,?,?)';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$firstname, $lastname, $email, $password, $idUserRole]);
}

function createContentType(PDO $pdo, string $name, string $uidContentType)
{
  $sql = "INSERT INTO content_type (name, uid_content_type) VALUES (?,?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$name, $uidContentType]);
}

function createContent(PDO $pdo, string $name, string $data, int $idUser, int $idContentType)
{
  $createdAt = $updatedAt = (new DateTime())->format('d/m/Y');
  $sql = "INSERT INTO content (name, data, created_at, updated_at, id_user, id_content_type) VALUES (?,?,?,?,?,?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$name, $data, $createdAt, $updatedAt, $idUser, $idContentType]);
}


/**
 * 
 */
function pdoStatementToJson($stmt)
{
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $json = json_encode($results);
  echo $json;
}

// Execute Fixtures
createUserRole($pdo, "admin", "uid1");
createUserRole($pdo, "superadmin", "uid2");
createUser($pdo, "Eddy", "Cochran", "eddy.cochran@tuto.xyz", "password", 1);
createUser($pdo, "Bob", "Marley", "bob.marley@tuto.xyz", "password", 1);
createUser($pdo, "Rory", "Gallagher", "rory.gallagher@tuto.xyz", "password", 2);
createContentType($pdo, "article", "uid11");
createContentType($pdo, "comment", "uid12");
createContent($pdo, "An interesting story", "This article is written with great inspiration...", 1, 1);
createContent($pdo, "Not sure about that", "Let's be honest, this article isn't that great...", 2, 2);
