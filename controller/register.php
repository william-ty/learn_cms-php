<?php

/***
 * register controller 
 */

$data = "register_controller";

if (isset($_SESSION['user'])) {
  header("Location:index.php?page=home");
}

if (isset($_POST['register'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordCheck = $_POST['password_check'];
  $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

  if ($firstname && $lastname && $email && $password && $passwordCheck) {

    if (!filter_var(
      $email,
      FILTER_VALIDATE_EMAIL
    ) === false) {
        
      if($password === $passwordCheck) {

        $isSecure = true;
        $regMsgs = [];

        // $patternFull = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        $patterns = [
          '0' => [
            'reg' => '/^(?=.*[A-Z]).{8,}$/',
            'msg' => 'Password must contain an uppercase letter'
          ],
          '1' => [
            'reg' => '/^.{8,}$/',
            'msg' => 'Password must be at least 8 characters long'
          ],
          '2' => [
            'reg' => '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/',
            'msg' => 'Password must contain a number'
          ],
          '3' => [
            'reg' => '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/',
            'msg' => 'Password must a special character'
          ],
        ];

        for ($i=0; $i < count($patterns); $i++) { 
          if(!preg_match($patterns[$i]['reg'], $password)){
            $isSecure = false;
            array_push($regMsgs, $patterns[$i]['msg']);
          }
        }
        
        if($isSecure) {

          // Request
          $sql = 'INSERT INTO "user" (firstname, lastname, email, password, id_user_role)
            VALUES (:firstname, :lastname, :email, :password, :id_user_role)';
          $args = [$firstname, $lastname, $email, $hashedPassword, 3];
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
          $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
          $stmt->bindParam(':email', $email, PDO::PARAM_STR);
          $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
          $stmt->bindParam(':id_user_role', $idUserRole, PDO::PARAM_STR);
          $stmt->execute($args);

          $_SESSION['user'] = $email;
          
          echo '<script type="text/javascript"> window.open("index.php?page=home","_self");</script>';

        } else {
          foreach ($regMsgs as $msg) {
            echo '<br/>' . $msg;
          }
          echo '<br/>';
          echo '<br/>';
        }
        
      } else {
        echo "<br/>Passwords don't match !<br/>";
      }
    } else {
      echo "<br/>Please enter a valid email address !<br/>";
    }
  } else {
    echo "<br/>Missing field !<br/>";
  }

  echo '<br/>';
}


loadTemplate('register', $data);
