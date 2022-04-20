<?php

/***
 * login controller 
 */

$data = "login_controller";

if (isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($email && $password) {

    if (!filter_var(
      $email,
      FILTER_VALIDATE_EMAIL
    ) === false) {

      // Request user
      $sql = 'SELECT * FROM "user" WHERE email=:email';
      $args = ['email' => $email];
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute($args);
      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if (isset($user[0])) {

        $hashed_password = $user[0]['password'];
        if (password_verify($password, $hashed_password)) {
          // if ($stmt->rowCount() > 0) {
            
          // Request user role
          $id = $user[0]['id_user_role'];
          $sql = 'SELECT "role" FROM "user_role" WHERE id_user_role = :id';
          $args = ['id' => $id];
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);
          $stmt->execute($args);
          $role = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
          // var_dump($role[0]);
          // var_dump($args);
          // die();

          $_SESSION['user_role'] = $role[0]['role'];
          $_SESSION['user'] = $email;
          echo '<script type="text/javascript"> window.open("index.php?page=home","_self");</script>';
        } else {
          $data = "<strong>Wrong credentials</strong>";
        }
      } else {
        $data = "<strong>Wrong credentials</strong>";
      }
    } else {
      $data = "<strong>Invalid Email</strong>";
    }
  } else if (!$password) {
    $data = "<strong>Password missing !</strong>";
  }
  // else {
  //   $data = "<strong>Email manquant !</strong>";
  // }
}

loadTemplate('login', $data);
